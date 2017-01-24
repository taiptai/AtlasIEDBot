<?php
$access_token = '1eyYaLo2Ay3mZwH3Dt+uu9Q16MAxXYpIJ3gwVkFwhWLHtnRCVUU4pBtWfIe9TDcnKDdj8EHY9kpRFSyjVym6Wv3oujXz07ppL76ODiXG+zaHv+9tOSq7LB/VNg8cXzV6D44Z2TttTyN0lrEnLI3oNAdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
