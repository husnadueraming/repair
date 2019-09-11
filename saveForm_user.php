<html>
<head>
<!-- ตรวจสอบ checkbox ว่ามีการเลือกไหม -->
<script language="javascript">
//  function check(frm) {
//    var inputs = frm.getElementsByID('elect');
//     for(var i = 0 ; i < inputs.length ; i++){
//      input = inputs[i];
//      if(input.type == 'elect'){
//         if (input.checked){
//             return true;
//         };
//      };
//     };
//    alert('กรุณาเลือกอย่างน้อย 1 รายการ');
//    return false;
// }


// function haveChk(chkboxname){
//   var chk = document.getElementsByName(values_type);
//   var i = 0, ln=chk.length; 
//   for(i; i<ln; i++) if( chk[i].checked) return true;
//   return false;
// }
</script>
</head>
</html>    


<?php
  require('connectdb.php');
   session_start();     //เปิด session
     if($_SESSION['ID'] == ""){
       header("Content-type: text/html; charset=utf-8");
       echo"<script language='JavaScript' >";
       echo"alert('กรุณากรอกข้อมูลเพื่อเข้าสู่ระบบ');";
       Header("Location: login.php");
       echo"</script>";		
      exit(); 
     }    
 
     $query = "SELECT * FROM user WHERE ID = '".$_SESSION['ID']."' ";            
     $result = mysqli_query($conn, $query) or die(mysqli_error());
     $objResult = mysqli_fetch_array($result);

/***************************************************************************************************************/
    $dt = $_POST["dt"];
    $fname = $_POST["fname"];    
    $sname = $_POST["sname"];    
    $department = $_POST["department"];
    $type = $_POST["type"];
    $description = $_POST["description"];
    $place = $_POST["place"];
    $values_type = implode(" ",$_POST["values_type"]);

    date_default_timezone_set('Asia/Bangkok');           
    $dt = date("Y-m-d H:i:s");
    
    $sql = "INSERT INTO repair_data (date,Department,Type,values_type,description,place,ID) 
            VALUES ('$dt','$department','$type','$values_type','$description','$place','".$_SESSION['ID']."')";
    $result = mysqli_query($conn, $sql) or die(mysqli_error());

    if($result) {
      echo "<script type='text/javascript'>alert('บันทึกข้อมูลเรียบร้อยแล้ว')</script>";
      echo "<meta http-equiv ='refresh'content='0;URL=show_user.php'>";
      // $_SESSION['ID']="";
    }else{
      echo "<script type='text/javascript'>alert('เกิดข้อผิดพลาดในการบันทึกข้อมูล');window.history.go(-1);</script>" ;
    }        
    mysqli_close($conn);

?>
