<?php    header ('Content-type: text/html; charset=utf-8');

     
      
      
 
   
  
        $ch = curl_init(); 

        // set url 
        curl_setopt($ch, CURLOPT_URL, "http://data.tmd.go.th/api/WeatherToday/V1/?type=json"); 

        //return the transfer as a string 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

        // $output contains the output string 
        $output = curl_exec($ch); 
        
     
   

        // close curl resource to free up system resources 
        curl_close($ch);    
        
        echo $output;
        
       
        //$array = json_decode($output,TRUE);
        
         //print_r($array);
    
                 
          


?>
