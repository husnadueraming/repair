<?php
//รับค่ารหัสแผนกจากฟอร์ม
$description = $_REQUEST['description'];

require('connectdb.php');

//สร้างคำสั่ง sql
$query = "SELECT * FROM form WHERE description = '$description'";
// สั้งให้คำสั่ง sql ทำงาน
$result =$conn->query($query) or die ("Query Failed");

//ดึงข้อมูลมาใส่ในตัวแปล
include "form.php";
$row = $result->fetch_array();
$id = $row['id'];
$description = $row['description'];
$department = $row['department'];
$place = $row['place'];
echo "<b>แก้ไขข้อมูลการแจ้งซ่อม</b>";

//สร้าง ฟอร์มสำหรับข้อมูลใหม่
echo "<form action =\"oo_upd_dept.php\" methos=\"post\">";
echo "<input type=\"hidden\" name=\"id\" value=\"$id\">";
echo "หน่วยงาน : <input type=\"text\" name=\"department\" value=\"$department\"><br><br>";
echo "ลักษณะการชำรุด : <input type=\"text\" name=\"description\" value=\"$description\"><br><br>";
echo "สถานที่/อาคาร : <input type=\"text\" name=\"place\" value=\"$place\"><br>";
echo "<br><input type=\"submit\" name=\"update\" value=\"Update\">";
echo "</form>";

$result->free();
$conn->close();
?>