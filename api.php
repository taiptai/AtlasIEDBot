<?php    header ('Content-type: text/html; charset=utf-8');

     

        $output = curl_exec(CURLOPT_URL, "http://data.tmd.go.th/api/WeatherToday/V1/?type=json"); 
        
     
   

        // ปิดการเชื่อต่อ
        curl_close($ch);    
        // output ออกไปครับ
        echo $output;
        
       
                 
          


?>
