<?php

$url = "http://data.tmd.go.th/api/Weather3Hours/V1";
$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $url); 			//get the url contents

$data = curl_exec ($ch);						//execute curl request
curl_close($ch);

$xml = simplexml_load_string($data)

$con = mysql_connect("localhost","root",""); 	//connect to server
mysql_select_db("yecc", $con) or die(mysql_error());  //select database

foreach ($xml -> Station as $row){
	$DateTime = $row -> nTime;
	$BarometerTemperature = $row -> Temp;
	

$sql = "INSERT INTO 'temp' ('nTime', 'Temp')"
			. "VALUES ('nTime', 'Temp')";
			
$result = mysql_query($sql);
if (!result){
	echo 'MySQL ERROR';
	} else{
	echo 'Success';
	}
									}
?>
