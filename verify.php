<?php
$access_token = 'mF2E9QKbmSxTVsszAnueqlfN034cqBYFb1nvl0OzSSvKlEta95S3BHvBrrFzzw2nPMlUah4Nsehhw8Bsm/6NXfSHPe346K1vHCBbLjOhrLFcJ5ZurPzsjGOIT3I2KxRJQzRWa4EirQBX18W9CPHnBgdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
