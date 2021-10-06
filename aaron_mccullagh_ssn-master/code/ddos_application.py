####################################################################################

#Syn Flood Detection class
#File: ddos_application.py
#Author: Aaron McCullagh /40036410
#Course: CSC7078: Secure Softwarized Networks
#Description: class detects and mitigates TCP SYN flood attack by monitoring rate of 
#TCP SYN packets per second on switch ports. When rate of packets per second exceeds 
#threshold value, a drop rule is applied to source port of SYN Flood attack.

####################################################################################

from ryu.base import app_manager
from ryu.controller import ofp_event
from ryu.controller.handler import CONFIG_DISPATCHER, MAIN_DISPATCHER
from ryu.controller.handler import set_ev_cls
from ryu.ofproto import ofproto_v1_3
from ryu.lib.packet import packet
from ryu.lib.packet import ethernet
from ryu.lib.packet import ether_types
import time

class Syn_Flood_Detection(app_manager.RyuApp):
    OFP_VERSIONS = [ofproto_v1_3.OFP_VERSION]

    def __init__(self, *args, **kwargs):
        super(Syn_Flood_Detection, self).__init__(*args, **kwargs)  
       
        #initialise MAC address table 
        self.mac_to_port = {}
        
        #port list h1 to h4
        self.port_list = [1,2,3,4]
        
        #initialise tcp flow stats per port as a dictionary (key = port,value = tcp flow stats)
        self.tcp_flow_stats = {}
        
        #set port_id init. - incremented in reply_handler, used for identifying in_port_id 
        self.init_port_id=0  
        
        #intitialise packets per second rate per port as a dictionary (key = port, value = tcp pkts per second)
        self.pkts_per_second = {}         
        
        #syn flood rate threshold (pps)
        self.syn_threshold = 100        

    @set_ev_cls(ofp_event.EventOFPSwitchFeatures, CONFIG_DISPATCHER)
    def switch_features_handler(self, ev):
        '''
        initiate connection between openflow switch and controller.
        '''
        datapath = ev.msg.datapath
        ofproto = datapath.ofproto
        parser = datapath.ofproto_parser  
        
        #clear flow table
        self.delete_all_flows(datapath)    
                
        #default all to controller flow
        match = parser.OFPMatch()
        actions = [parser.OFPActionOutput(ofproto.OFPP_CONTROLLER,
                                          ofproto.OFPCML_NO_BUFFER)]
        
        #add table miss flow    
        self.add_flow(datapath, 0, match, actions)
        
        #Send OFPAggregateStatsRequest to Switch - Listen to tcp syn traffic per port
        for in_port in self.port_list:
            #initialise flow counts per port, {in_port1:0,in_port2:0,in_port3:0,in_port4:0}
            self.tcp_flow_stats[in_port] = 0
        
        time.sleep(float(1)/len(self.port_list))       
        match_tcp_syn_listen = parser.OFPMatch(in_port=in_port, eth_type=0x0800, ip_proto=6, tcp_flags=2)
        
        #sends SYN flow stats request
        #when controller receives reply - triggers aggregate_stats_reply_handler function 
        self.send_flow_stats_request(datapath, match_tcp_syn_listen)
        
        
    def add_flow(self, datapath, priority, match, actions, buffer_id=None, hard_timeout=0, idle_timeout=0):
        '''
         Set flow on a switch
        '''
        ofproto = datapath.ofproto
        parser = datapath.ofproto_parser

        inst = [parser.OFPInstructionActions(ofproto.OFPIT_APPLY_ACTIONS,
                                             actions)]
        if buffer_id:
            mod = parser.OFPFlowMod(datapath=datapath, buffer_id=buffer_id,
                                    priority=priority, match=match,idle_timeout=idle_timeout,hard_timeout=hard_timeout,
                                    instructions=inst)
        else:
            mod = parser.OFPFlowMod(datapath=datapath, priority=priority,
                                    match=match,idle_timeout=idle_timeout,hard_timeout=hard_timeout, instructions=inst)
        datapath.send_msg(mod)
        
        
    def send_flow_stats_request(self, datapath, match):
        '''
        Aggregate flow statistics request message, 
        The controller uses this message to query aggregate flow statictics.
        '''
        ofp = datapath.ofproto
        ofp_parser = datapath.ofproto_parser

        cookie = cookie_mask = 0
        req = ofp_parser.OFPAggregateStatsRequest(datapath, 0,
                                                 ofp.OFPTT_ALL,
                                                 ofp.OFPP_ANY, ofp.OFPG_ANY,
                                                 cookie, cookie_mask,
                                                 match)
        datapath.send_msg(req)
    
    def delete_all_flows(self, datapath):
        '''
        delete all flows: used in switch_features_handler to clear flow table.
        '''
        ofproto = datapath.ofproto
        parser = datapath.ofproto_parser
        match = parser.OFPMatch()
        mod = parser.OFPFlowMod(
                datapath, command=ofproto.OFPFC_DELETE,
                out_port=ofproto.OFPP_ANY, out_group=ofproto.OFPG_ANY, match=match)
        self.logger.debug("app reset")
        datapath.send_msg(mod)
    
    @set_ev_cls(ofp_event.EventOFPPacketIn, MAIN_DISPATCHER)
    def _packet_in_handler(self, ev):
        
        #When a new packet comes in at the controller -- "PACKET-IN"
        
        if ev.msg.msg_len < ev.msg.total_len:
            self.logger.debug("packet truncated: only %s of %s bytes",
                              ev.msg.msg_len, ev.msg.total_len)
            
        #all info is stored in the ev object, extract relevant fields
        
        #the message itself, which is the event:         
        msg = ev.msg
        
        #datapath is switch identifier
        datapath = msg.datapath        
        
        #determine open flow protocol thats being used
        ofproto = datapath.ofproto
        
        parser = datapath.ofproto_parser
        
        #get the recieved port number from packet_in message - the input port
        in_port = msg.match['in_port']
        
        #analyse the recieved packets using the packet library - 
        #extract information that we want from the packet
        pkt = packet.Packet(msg.data)
        
        #determine that ethernet protocol is being used
        eth = pkt.get_protocols(ethernet.ethernet)[0]
       
        if eth.ethertype == ether_types.ETH_TYPE_LLDP:
            # ignore lldp packet
            return
            
        #get the destination and source mac addresses of packet
        dst = eth.dst
        src = eth.src
                
        #get datapath id to identify openflow switch
        dpid = datapath.id
      
        #set the mac address table for switch
        self.mac_to_port.setdefault(dpid, {})        
        
        self.logger.info("packet in S: %s, src: %s, dst: %s, in_port: %s", dpid, src, dst, in_port)
        
        #learn a mac address to avoid FLOOD next time
        #populating mac address table - the swtich id & source - associating input port to source address
        self.mac_to_port[dpid][src] = in_port
        
        #search for dst mac address from packet in switch mac address table     
        if dst in self.mac_to_port[dpid]:
        
        #if mac address found - associate with output port
        #read output port from mac address table and apply to packet
            out_port = self.mac_to_port[dpid][dst]
            
        else:
            #if dst mac address not in mac address table
            #flood the packet out of every other port 
            out_port = ofproto.OFPP_FLOOD
            #mac address that recognises itself as a dest. will respond
        
        #construct action list 
        actions = [parser.OFPActionOutput(out_port)]

        # install a flow to avoid packet_in next time
        if out_port != ofproto.OFPP_FLOOD:
            #creating a flow to pass into the switch to avoid learning process again for same traffic    
            #match based on input port, ethernet dst & ethernet src
            match_basic = parser.OFPMatch(in_port=in_port, eth_dst=dst, eth_src=src)
            
            #match based on tcp syn flood check
            match_tcp_syn = parser.OFPMatch(in_port=in_port, eth_dst=dst, eth_src=src, eth_type=0x0800, ip_proto=6, tcp_flags=2 )
            
            #verify if valid buffer_id 
            if msg.buffer_id != ofproto.OFP_NO_BUFFER:            
                self.add_flow(datapath=datapath, priority=1, match=match_basic, actions=actions, buffer_id=msg.buffer_id, idle_timeout=180)               
                self.add_flow(datapath=datapath, priority=10, match=match_tcp_syn, actions=actions,idle_timeout=180)
                return
            else:
                self.add_flow(datapath=datapath, priority=1, match=match_basic, actions=actions, idle_timeout=180)               
                self.add_flow(datapath=datapath, priority=10, match=match_tcp_syn, actions=actions,idle_timeout=180)
                
        data = None
        
        #If the message buffer is on the switch, the message of the buffer is sent directly as data
        if msg.buffer_id == ofproto.OFP_NO_BUFFER:
            data = msg.data
            

        out = parser.OFPPacketOut(datapath=datapath, buffer_id=msg.buffer_id,
                                  in_port=in_port, actions=actions, data=data)
        datapath.send_msg(out)        

    @set_ev_cls(ofp_event.EventOFPAggregateStatsReply, MAIN_DISPATCHER)
    def aggregate_stats_reply_handler(self, ev):
        '''
        Aggregate flow statistics reply message
        the switch responds with this message to an aggregate flow statistics request.
        '''
        body = ev.msg.body
        datapath = ev.msg.datapath
        ofproto = datapath.ofproto
        parser = datapath.ofproto_parser
        self.logger.debug('AggregateStats: packet_count=%d byte_count=%d '
                          'flow_count=%d',
                          body.packet_count, body.byte_count,
                          body.flow_count)
        
        #interface polling, length of port list = 4, 0%4 = 0    
        in_port_id = self.init_port_id%len(self.port_list)
        
        #1st iteration: port_id =0, port_list [1, 2, 3, 4], port = 1
        in_port = self.port_list[in_port_id]
        
        #calculate packets per second - subtract flow between intervals (1 second)
        #tcp flow stats init. to 0 in switch features handler - 1st iteration = packet count - 0 
        self.pkts_per_second[in_port] = body.packet_count - self.tcp_flow_stats[in_port]
        
        #assign packet count to tcp_flow_stats
        self.tcp_flow_stats[in_port] = body.packet_count
        
        #check packets_per_second vs threshold
        if self.pkts_per_second[in_port] > self.syn_threshold:
        
        #If the syn rate is greater than the threshold, high priority flow rule created to drop packets        
            match = parser.OFPMatch(in_port=in_port)
            #drop packet
            actions = []
            #add flow rule - high priority
            self.add_flow(datapath=datapath, priority=100, match=match, actions=actions)
            self.logger.warning('ALERT: Blocking TCP SYN source in_port=%s : SYN packet speed %d pps exceeds threshold'%(in_port,self.pkts_per_second[in_port]))
         
        #1/4 second per port
        time.sleep(float(1)/len(self.port_list))
        
        #increment self.init_port_id
        self.init_port_id=self.init_port_id+1
        
        #get port_id, length of port list = 4
        in_port_id = self.init_port_id%len(self.port_list)
        
        in_port = self.port_list[in_port_id]
        
        #match
        match_tcp_syn_listen = parser.OFPMatch(in_port=in_port, eth_type=0x0800, ip_proto=6, tcp_flags=2)
        
        #resend AggregateStatsRequest message
        self.send_flow_stats_request(datapath, match_tcp_syn_listen)
