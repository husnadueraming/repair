<?php  
// /*บันทึกข้อมูลลง Database*/
//   $sql = "INSERT INTO type (NameValue) 
//           VALUES ('$electricity')";
 date_default_timezone_set('Asia/Bangkok');           
 $dt = date("Y-m-d H:i:S");
 $sql = "INSERT INTO repair_data (date,TypeID,values_type,description,place) 
         VALUES ('$dt','$type','$electricity','$description','$place')";
 
 echo $sql;   //ทำการ echo ค่าของ $sql ออกมาดูครับ เพื่อจะทำไปแก้ Error โดยใช้ฐานข้อมูล mysql 
// mysqli_query($con, $sql) or die(Insert data Error);

 $result = mysqli_query($conn,$sql);
 if($result) {
  echo "('status' => '1','message'=> 'Record add successfully')";
 }else{
  echo "('status' => '0','message'=> 'Error insert data!')";
 }

 mysqli_close($conn);
 <?php  
 /*บันทึกข้อมูลลง Database*/
 $dt = $_POST["dt"];
 $fname = $_POST["fname"];    
 $sname = $_POST["sname"];    
 $department = $_POST["department"];
 $type = $_POST["type"];
 $description = $_POST["description"];
 $place = $_POST["place"];
 $dt = date("Y-m-d H:i:S");
 
 $sql = "INSERT INTO repair_data (date,TypeID,values_type,description,place) 
         VALUES ('$dt','$type','$electricity','$description','$place')";
 
 echo $sql;   //ทำการ echo ค่าของ $sql ออกมาดูครับ เพื่อจะทำไปแก้ Error โดยใช้ฐานข้อมูล mysql 
// mysqli_query($con, $sql) or die(Insert data Error);

 $result = mysqli_query($conn,$sql);
 if($result) {
  echo "('status' => '1','message'=> 'Record add successfully')";
 }else{
  echo "('status' => '0','message'=> 'Error insert data!')";
 }

 mysqli_close($conn);
 ?>