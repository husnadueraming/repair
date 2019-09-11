<?php
         
        /*วันที่*/         
        function changeDatee($date){ 
          $y = date('Y')+543;
          $date = date_default_timezone_set('asia/bangkok');
          $date = date('d-m-');
          $h = date("H:i");
          $yearMounth = $date.$y."    ".$h;
          
          return $yearMounth;
        }
        echo "changeDatee:" .changeDatee("2019-05-28")."<br>";

        $date = new DateTime('2000-01-01'); // $date_order
	    echo $date->format('m-d-Y');

        function changeDateee($date){ 
            $date = explode('-',$date);
            $year = date("Y")+543;
            $date = date('d-m-Y');
            return $date." ".$year;
          }
          echo "changeDateee:" .changeDateee("2019-05-28")."<br>";

        // $dt = $row['date'];
        $dt = date("d-m-y H:i");
        echo "date:" .date('d-m-Y H:i',strtotime('YYYY-mm-dd'))."<br>";
        
        $date="2005-12-26";
        list($y,$m,$d)=explode('-',$date);
        echo "explode:" .$d.'/'.$m.'/'.$y."<br>";
       
                       
        $date=date('d-m-y');
        echo "Date('d-m-y'):" .$date."<br>";
       

        // echo TIMESTAMP('2003-12-31','10:11:25');
                                              
        function changeDate($date){
          //ใช้ Function explode ในการแยกไฟล์ ออกเป็น  Array
          $get_date = explode("-",$date);
          //กำหนดชื่อเดือนใส่ตัวแปร $month
          $month = array("01"=>"ม.ค.","02"=>"ก.พ","03"=>"มี.ค.","04"=>"เม.ย.","05"=>"พ.ค.","06"=>"มิ.ย.","07"=>"ก.ค.","08"=>"ส.ค.","09"=>"ก.ย.","10"=>"ต.ค.","11"=>"พ.ย.","12"=>"ธ.ค.");
          // //month
          $get_month = $get_date["1"];

          //year	
          $year = $get_date["0"]+543;

          return $get_date["2"]." ".$month[$get_month]." ".$year;

          }
        //การเรียกใช้งาน Function
        echo change_date("2019-05-28")."<br>";
        
        function dateTime($date_time){
                        
          //ใช้ function explode แยกข้อมูลวันที่ กับ เวลา
          $get_date_time = explode(' ',$date_time);
                        
           //เรียกใช้ function changeDate สำหรับแสดงวันที่
           $date = changeDage($get_date_time['0']);
                        
           //ใช้ funciton substr เพื่อ ตัด ข้อมูลที่เป็น วินาทีออกไปซะ
          $time = substr($get_date_time['1'],0,-3);
                        
           return $date." เวลา ".$time;
        }
        //การเรียกใช้งาน Function
        echo dateTime("2015-05-05 10:11:25");
                        
?>