# DDoS TCP SYN Flood Attack: Detection & Mitigation

**Background:**

A TCP SYN flood attack is a common DDoS attack that exploits the three-way handshake process of TCP connection. An attacker will overwhelm the target machine with a flood of spoofed SYN packets with the goal of exhausting memory within the network by maintaining half opened connections, degrading the performance of the SDN controller and preventing legitimate traffic as a result.

**Objective**

The objective of this project is to detect and mitigate a TCP SYN Flood attack within a Software Defined Network;

*  Diferentiating between legitimate TCP traffic and malicious TCP SYN flood traffic.
*  Protecting the network, by blocking malicious traffic from entering.
*  Allowing legitimate traffic to flow on the network, achieving the network security goal of availability.
*  Maintaining network performance while solution application is running at the controller.


**Solution**

* The network topology consists of 4 hosts and 1 switch.
* The controller which is located in the control plane, communicates with the solution application via the nortbound API.
* The OpenFlow switch which is located in the data plane communicates with the controller via the soutbound API - OpenFlow v1.3
* The OpenFlow switch recieves traffic from h1 to h4, on the ingress ports.

*Network Architecture* [*diagram*:](https://gitlab2.eeecs.qub.ac.uk/csc7078_40036410/aaron_mccullagh_ssn/tree/master/diagrams)
<p align="center">
   <img src="diagrams/network architecture.png?raw=true" alt="Network Architecture" width="550" />
</p>


The solution application “ddos_application.py”, monitors the rate of TCP SYN packets per second, incoming on each ingress port on the OpenFlow switch. When the rate of packets per second exceeds the threshold of 100 PPS, a drop rule is added to the flow table, which matches on the 'in_port'.

As there is 4 hosts on the network, connected to one switch on seperate in_ports, blocking traffic on the source in_port of the SYN flood attack is the chosen method of mitigation as non malicious hosts will not be prevented from accessing the network.

 IP and MAC addresses are often spoofed during SYN flood attacks, therefore blocking IP or MAC addresses could have limited effect in mitigating the attack, and could exhaust the OpenFlow table memory.

TCP SYN Flood, detection & mitigation within [solution application:](https://gitlab2.eeecs.qub.ac.uk/csc7078_40036410/aaron_mccullagh_ssn/blob/master/code/ddos_application.py)
*  `switch_features_handler` calls `send_flow_stats_request` function, which sends `OFPAggregateStatsRequest`.
*  `OFPAggregateStatsReply` event is triggered in the `aggregate_stats_reply_handler` function.
*  `in_port_id `(index of port within port list) is determined by returning the remainder of `self.init_port_id` (set to zero in class initialisation & incremented in reply handler) divided by length of `port_list`.
*  `in_port_id` is 0 on first iteration & is then incremented : 0%4 =0, then; 1%4 =1, 2%4 = 2, 3%4 =3, 4%4 =0, 5%4 =1, 6%4=2 etc.. index[0][1][2][3] for port_list[1,2,3,4]. 
*  `in_port` is then identified: `self.port.list[in_port_id]`.
*  The packets per second is worked out by subtracting `self.tcp_flow_stats[in_port]` from `body.packet_count`.(note the tcp_flow_stats for each port is initialised to zero).
*  The `self.tcp_flow_stats[in_port]` is then set as the value of `body.packet_count` to compare with packet count on same port after 1 second interval.
*  If packet per second is > than 100 PPS, a drop rule which matches on the `in_port` is added to the flow table.
*  After 0.25 seconds, the `init_port_id` is incremented to identify the next port in the port list, the match is made for TCP SYN packets, and the `self.send_flow_stats` request is resent.
*  The cycle continues for each port, resulting in the packet count at 1 second intervals being compared with previous packet count to determine packets per second on each port.

**Folders:**

[**code**](https://gitlab2.eeecs.qub.ac.uk/csc7078_40036410/aaron_mccullagh_ssn/tree/master/code): contains solution; [ddos_application.py](https://gitlab2.eeecs.qub.ac.uk/csc7078_40036410/aaron_mccullagh_ssn/blob/master/code/ddos_application.py), [ddos_scenario.yaml](https://gitlab2.eeecs.qub.ac.uk/csc7078_40036410/aaron_mccullagh_ssn/blob/master/code/ddos_scenario.yaml) & [task.yaml](https://gitlab2.eeecs.qub.ac.uk/csc7078_40036410/aaron_mccullagh_ssn/blob/master/code/task.yaml) files.

[**diagrams**](https://gitlab2.eeecs.qub.ac.uk/csc7078_40036410/aaron_mccullagh_ssn/tree/master/diagrams): contains network architecture and topology diagrams.

[**commands**](https://gitlab2.eeecs.qub.ac.uk/csc7078_40036410/aaron_mccullagh_ssn/tree/master/commands): contains commands used to demonstrate solution.

[**evaluation**](https://gitlab2.eeecs.qub.ac.uk/csc7078_40036410/aaron_mccullagh_ssn/tree/master/evaluation): contains evaluation of solution.

**Prerequisites**:

Download & install Git, VirtualBox & Vagrant, and clone the SDN cockpit repository, which is the test environment for the solution.

**Instructions on running application**

1. Launch **ddos_application.py** at Ryu controller.
2. Launch **ddos_scenario.yaml** in mininet.
3. Test connectivity between hosts, in mininet enter: **pingall**
4. In mininet send excess TCP packets from h1 to h2, enter: **h1 hping3 -i u1000 -S 10.0.0.2** (optional).
5. If skipped step 4 - In mininet enter: **xterm h1**
6. If followed step 5 - In xterm window launch TCP SYN flood by entering: **hping3 -S --flood 10.0.0.2**
7. When cancelling SYN Flood attack, enter: **Ctrl C**
8. Observe notification at controller that traffic has been blocked.
9. In mininet pane check flow table by entering: **dpctl dump-flows**, to identify drop rule.
10. Test connectivity in mininet pane enter: **pingall**, to observe malicous host has been blocked on the network.
11. Observe legitmate TCP traffic on network: enter: **h3 hping3 h2**, or **h4 hping3 h3**






