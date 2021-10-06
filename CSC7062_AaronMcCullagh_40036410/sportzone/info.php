<?php

session_start();
include("includes/functions.php");
head();
navbar();
$info = $_GET['info'];

if($info == "cookies"){

    echo"
    <br>
    <div class ='container'>

    <div>Privacy
    Company Name: Sport Zone Ltd <br>
    
    Company Number: 5434565463573457 <br>
    
    Territory: Ireland & UK <br><br><br>
    
    
    the best bits <br>
    We only use your data to improve your Sport Zone experience<br><br>
    
    keeping it real<br>
    We’ll talk to you straight – no stress, no worries<br><br>
    
    No Junk<br>
    You choose what and how we speak to you<br><br>
    
    Super Safe<br>
    Your Data is Protected 24 / 7<br><br>
    
    Everything we do at Sport is about you! Things change, but it’s nothing to worry about .
     We take our customers privacy and security very seriously and we are 100% committed to protecting it so you can shop away without a single worry. 
     If you have any questions about how we protect your privacy, just shout us @ Privacy.Support@sportzone.com<br><br>
    
    HOW WE USE YOUR DATA<br>
    We are committed to protecting your privacy.
     It is important that you understand how we look after your personal data and how we make sure that we meet our legal obligations to you under the data protection rules and 
     regulations in the relevant territory (including associated guidance) (the ' Data Protection Laws ').
      This privacy policy outlines how JD Sports Fashion plc and its group companies (together, the ' Sport Zone Group ') will collect, use, store and share your personal data.<br>
    
    If you have any questions in relation to this policy or generally how your personal data is processed by us,
     please contact our customer care team by letter.<br>
    
    This policy applies to any personal data that we collect about you when you:<br>
    
    visit our one of our websites;<br>
    purchase products from us;<br>
    visit one of our stores;<br>
    contact us, for example by telephone, email, post or through submitting a form on our websites.<br>
    WHO ARE WE?<br>
    In this privacy policy, the terms ' we ', ' our ', and ' us ' are used to refer to the Sport Zone.<br>
    
    The controller of your information for the purposes of the Data Protection Laws will depend on which member of the JD Group you are dealing with. The table below sets out each of the data controllers within the JD Group and each of the brands operated by those data controllers.<br>
    <br><br>
    </div>

    </div>


    ";

} else if ($info == "terms"){
    echo "
    <div class = container>
    <div>Terms and Conditions: Sale of Goods – Online and by Phone

    
    
    IMPORTANT: PLEASE READ
    
    WE DRAW YOUR ATTENTION TO THESE TERMS AND CONDITIONS, WHICH APPLY WHENEVER YOU BUY GOODS FROM US ONLINE OR OVER THE PHONE. PLEASE READ THEM CAREFULLY BEFORE YOU PROCEED TO MAKE YOUR PURCHASE.
    
    BY PLACING AN ORDER AND/OR USING OUR WEBSITE YOU AGREE TO BE BOUND BY THESE TERMS AND CONDITIONS.
    
    YOU SHOULD PRINT AND KEEP A COPY OF THESE TERMS AND CONDITIONS FOR YOUR RECORDS.
    
    In these Terms:
    
    'Website' means Our website at http://amccullagh06.lampt.eeecs.qub.ac.uk/sportzone/index.php and the Sport Zone mobile app.
    
    'Goods' means the goods which We will supply to You in accordance with these Terms and Conditions.
    
    'Order' means an order which You place with Us detailing the Goods You wish to buy from Us.
    
    'We/Us/Our' means Sport Zone Plc (company number 188842654653634)
    
    'You/Your' means you, the person using Our Website and/or buying Goods from Us.
    
    HOW THESE TERMS AND CONDITIONS APPLY
    
    The Terms in Section A explain how Our Website must be used. They apply to ALL users of the Website. Section B also applies when You buy Goods using the Website or over the phone. We may amend the Terms from time to time and You are advised to check them regularly for any changes that We make.
    
    When You use the Website, We may gather information about You and Your visit to the Website. Information about this can be found in Our Privacy Policy, which forms part of these Terms. The Privacy Policy and these Terms together govern Our relationship with You and form the contract between us ('Contract').
    
    

    </div>

    </div>
    <br><br><br><br><br><br><br><br>
    
    
    ";

} else if ($info == "faq"){
    

        echo"
        <br>
        <div class ='container'>
    
        <div>

        DELIVERY OPTIONS<br>
        
       You can choose between these delivery options: <br>

       Click & Collect - delivery to your chosen store,  three (3) to seven (7) days, £4.99<br>
       
       Standard Delivery - three (3) to seven (7) working days, £4.99.<br>
       
       Next Day Delivery - next day if you place your order before 7pm and receive your order the very next day (excludes Public/Bank Holidays)  - £7.99.<br>
       
       Oversized Delivery - Orders of large, bulky items and when the order requires a Two-Man Delivery; £9.99. This may include but not limited to items such as bikes,
        suitcases, running machines and golf bags.<br>
       
       BFPO Delivery - an order to a BFPO address will be delivered to the BFPO Headquarters,
        Once delivered there it will be the responsibility of the HQ to send these orders on to you, £15.<br><br>
       
       Working days do not include weekends or holidays.<br>
       
       If you are one of our international customers, you can check out the worldwide costs here and if you need any more help,
        please contact us and a team member will be more than happy to help! Please note there might be delays with orders outside 
        of the UK at the moment due to circumstances out of our control.<br><br>


        WHY IS MY ORDER LATE? <br>
        
        Depending on what delivery option you selected your order might still be out for delivery.<br>
        
        Click & Collect - delivery to your chosen store, three (3) to seven (7) days. <br>
        Standard Delivery - three (3) to seven (7) working days.<br>
        Next Day Delivery - next day if you place your order before 7pm and receive your order the very next day (excludes Public / Bank Holidays). <br>        
        
        You can also check the status of your order using your tracking number we sent you in the confirmation email.   <br><br>

        TRACKING DELIVERY<br>

        our dispatch email you'll have your unique tracking number for your order. Please check your junk folder, if you haven't got the email.<br>

        Click & Collect deliveries take three (3) to seven (7) days. <br>

        Standard Delivery takes three (3) to seven (7) working days. <br>

        Next Day Delivery will be delivered the next day if you order before 7pm (excludes Public / Bank holidays). <br>

        You can also find that tracking reference number in your order history, to track the progress of your shipment.<br>
        
        
        
        <br><br><br>

       
      
        </div>
    
        </div>
    
    
        ";
}else if ($info == "returns"){

    echo"
    <br>
    <div class ='container'>

    <div>

    RETURN TO SENDER <br>

    Our delivery partners will attempt to deliver your order three times. <br>

    If, for any reason they are unsuccessful, they will leave a calling card informing you your order is being returned to us. <br>

    Unfortunately, an order that has been returned to us by the courier can’t be re-directed out to our customers again, but will be refunded in full once the warehouse team has processed it. <br>

    If you require the items, we would ask you to place a new order.<br><br><br>
    
    WHY HAS MY ORDER NOT BEEN DELIVERED, BUT INSTEAD RETURNED TO YOU?<br>
Sorry to hear you haven't received your order.<br>

When an order is out for delivery our delivery partners will attempt to deliver it 3 times. If they can't deliver it, the order is returned back to us for a refund.<br>

Sometimes there might be problems finding or accessing the delivery address, and if the attempts are unsuccessful, the order will be returned.<br>

Occasionally, an order gets damaged in transit and can't be delivered.<br>

You should be able to check the reason why it's been returned by using the tracking link you got in the dispatch email.<br>

    
    <br><br><br>

   
  
    </div>

    </div>
";

} else if ($info == "delivery"){

    echo"
    <br>
    <div class ='container'>

    <div>

    DELIVERY OPTIONS<br>
You can choose between these delivery options:<br>

Click & Collect - delivery to your chosen store,  three (3) to seven (7) days, £4.99<br>

Standard Delivery - three (3) to seven (7) working days, £4.99.<br>

Next Day Delivery - next day if you place your order before 7pm and receive your order the very next day (excludes Public/Bank Holidays)  - £7.99.<br>

Oversized Delivery - Orders of large, bulky items and when the order requires a Two-Man Delivery; £9.99. This may include but not limited to 
items such as bikes, suitcases, running machines and golf bags.<br>

BFPO Delivery - an order to a BFPO address will be delivered to the BFPO Headquarters,
 Once delivered there it will be the responsibility of the HQ to send these orders on to you, £15.<br>

Working days do not include weekends or holidays.<br>

If you are one of our international customers, 
you can check out the worldwide costs here and if you need any more help, please contact us and a team member will be more than happy to help! 
Please note there might be delays with orders outside of the UK at the moment due to circumstances out of our control.

    
    <br><br><br>

   
  
    </div>

    </div>
";


} else if ($info == "track"){

    echo"
    <br>
    <div class ='container'>

    <div>
    TRACKING DELIVERY<br>
In our dispatch email you'll have your unique tracking number for your order. Please check your junk folder, if you haven't got the email.<br>

Click & Collect deliveries take three (3) to seven (7) days. <br>

Standard Delivery takes three (3) to seven (7) working days. <br>

Next Day Delivery will be delivered the next day if you order before 7pm (excludes Public / Bank holidays). <br>

You can also find that tracking reference number in your order history, to track the progress of your shipment.
   

    
    <br><br><br><br><br><br><br><br><br><br>

   
  
    </div>

    </div>
";
}

footer();

?>
