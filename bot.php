<?php



$access_token = '1eyYaLo2Ay3mZwH3Dt+uu9Q16MAxXYpIJ3gwVkFwhWLHtnRCVUU4pBtWfIe9TDcnKDdj8EHY9kpRFSyjVym6Wv3oujXz07ppL76ODiXG+zaHv+9tOSq7LB/VNg8cXzV6D44Z2TttTyN0lrEnLI3oNAdB04t89/1O/w1cDnyilFU=';

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
			if($text == 'On'){
				//microgear

			$messages = [
				'type' => 'text',
				'text' => '`On` is done'
			];
			}else if($text == 'Off'){
				//microgear
				
				$messages = [
				'type' => 'text',
				'text' => '`Off` is done'
			];
			}else{
				$messages = [
				'type' => 'text',
				'text' => 'I don`t know.'
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
