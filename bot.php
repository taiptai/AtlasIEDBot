<?php
$access_token = 'mF2E9QKbmSxTVsszAnueqlfN034cqBYFb1nvl0OzSSvKlEta95S3BHvBrrFzzw2nPMlUah4Nsehhw8Bsm/6NXfSHPe346K1vHCBbLjOhrLFcJ5ZurPzsjGOIT3I2KxRJQzRWa4EirQBX18W9CPHnBgdB04t89/1O/w1cDnyilFU=';
// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
			// Get replyToken
			$replyToken = $event['replyToken'];
			// Build message to reply back
			
			if($text == 'เปิดไฟ'){
			$messages = [
				'type' => 'text',
				'text' => 'เปิดไฟเรียบร้อยแล้ว'
			];
			$url1 = 'https://api.netpie.io/topic/testPrj/gearname/Wemos02?auth=GClHtjv2wbUwh0j:bTQbMklYoD72BlCjyvIGtOUDl';
			$ch = curl_init($url1);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  
			curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);     
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);     
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");    
			curl_setopt($ch, CURLOPT_POSTFIELDS, "ON1");    
			$response = curl_exec($ch);     
			curl_close ($ch);
				
			}
			
			else if($text == 'ปิดไฟ'){
				$messages = [
				'type' => 'text',
				'text' => 'ปิดไฟเรียบร้อยแล้ว'
			];
			$url1 = 'https://api.netpie.io/topic/testPrj/gearname/Wemos02?auth=GClHtjv2wbUwh0j:bTQbMklYoD72BlCjyvIGtOUDl';
			$ch = curl_init($url1);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  
			curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);     
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);     
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");    
			curl_setopt($ch, CURLOPT_POSTFIELDS, "OFF1");    
			$response = curl_exec($ch);     
			curl_close ($ch);	
			}
			
			else if($text == 'SW'){
				$messages = [
				'type' => 'text',
				'text' => 'Test is toggled'
			];
			$url1 = 'https://api.netpie.io/topic/testPrj/gearname/Wemos02?auth=GClHtjv2wbUwh0j:bTQbMklYoD72BlCjyvIGtOUDl';
			$ch = curl_init($url1);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  
			curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);     
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);     
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");    
			curl_setopt($ch, CURLOPT_POSTFIELDS, "SW1");    
			$response = curl_exec($ch);     
			curl_close ($ch);	
			}
			
			else if($text == 'ON1'){
				$messages = [
				'type' => 'text',
				'text' => 'Plug1 is on'
			];
			$url1 = 'https://api.netpie.io/topic/testPrj/gearname/Wemos01?auth=nbsQSyoKJEf6Zsu:VROlSCXbWzfh2XbSG8OjVNGLg';
			$ch = curl_init($url1);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  
			curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);     
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);     
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");    
			curl_setopt($ch, CURLOPT_POSTFIELDS, "ON1");    
			$response = curl_exec($ch);     
			curl_close ($ch);	
			}
			else if($text == 'OFF1'){
				$messages = [
				'type' => 'text',
				'text' => 'Plug1 is off'
			];
			$url1 = 'https://api.netpie.io/topic/testPrj/gearname/Wemos01?auth=nbsQSyoKJEf6Zsu:VROlSCXbWzfh2XbSG8OjVNGLg';
			$ch = curl_init($url1);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  
			curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);     
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);     
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");    
			curl_setopt($ch, CURLOPT_POSTFIELDS, "OFF1");    
			$response = curl_exec($ch);     
			curl_close ($ch);	
			}
			else{
				$messages = [
				'type' => 'text',
				'text' => 'ป้อนข้อความไม่ถูกต้อง'
			];
			}
			
			
			// Make a POST Request to Messaging API to reply to sender
			
			
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);
			echo $result . "\r\n";
			
			
			
		}
	}
}
echo "This is bot.";
?>
