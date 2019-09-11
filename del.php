<?php
require('connectdb.php');
//ลบทีละแถว
  // $idSelect = $_GET['id'];
  // $sql ="DELETE from repair_data WHERE RepID =$idSelect";
  // $result =mysqli_query($conn,$sql) or die(mysqli_error());
  // if($result){
  //   echo"<script language='JavaScript' >";
  //   echo"alert('ลบข้อมูลเรียบร้อย');";
  //   Header("Location: show_user.php");
  //   echo"</script>";		

  // }else{
  //   echo"<script language='JavaScript' >";
  //   echo"alert('เกิดข้อผิดพลาด');";
  //   Header("Location: show_user.php");
  //   echo"</script>";
  // }

// ลบทีละหลายแถวจาก checkbox ที่เลือก
  $idSelect =implode(",",$_POST['id']);
  $sql ="DELETE from repair_data WHERE RepID in($idSelect)";
  $result =mysqli_query($conn,$sql) or die(mysqli_error());

  if($result){
    echo"<script language='JavaScript' >";
    echo"alert('ลบข้อมูลเรียบร้อย');window.location='show_user.php';";
    echo"</script>";		
    
  }else{
    echo"<script language='JavaScript' >";
    echo"alert('เกิดข้อผิดพลาด'.mysqli_error($conn);";
    Header("Location: show_user.php");
    echo"</script>";
  }

?>