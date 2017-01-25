
        // set url สำหรับดึงข้อมูล 
        curl_setopt($ch, CURLOPT_URL, "http://data.tmd.go.th/api/WeatherToday/V1/?type=json"); 

        //return the transfer as a string 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

        // ตัวแปร $output เก็บข้อมูลทั้งหมดที่ดึงมา 
        $output = curl_exec($ch); 
        
     
   

        // ปิดการเชื่อต่อ
        curl_close($ch);    
        // output ออกไปครับ
        echo $output;
