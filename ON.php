<?php
$url1 = 'https://api.netpie.io/topic/testPrj/gearname/Wemos02?auth=GClHtjv2wbUwh0j:bTQbMklYoD72BlCjyvIGtOUDl';
			$ch = curl_init($url1);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  
			curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);     
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);     
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");    
			curl_setopt($ch, CURLOPT_POSTFIELDS, "ON1");    
			$response = curl_exec($ch);     
			curl_close ($ch);	
?>
