
<?php
    require('connectdb.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Table</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">

    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script type="text/javascript" chaeset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

    <link rel="stylesheet" href="css/style.css">

    <script type="text/javascript">
        $(document).ready(function() {
            $('#exampledata').DataTable();
        } );
    </script>
    <style>
     body {
            background: url("img/9.jpg") no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
    }
    </style>

</head>

<body>

<h2>ข้อมูลการแจ้งซ่อม</h2><br>
<div class="container" style="width:1300px;margin:auto">
<table id="exampledata" class="display" width="100%" cellspacing="0" >
<thead>
    <tr>
        <th>วันที่แจ้งซ่อม</th>
        <th>เลขที่แจ้ง</th>
        <th>หน่วยงาน</th>
        <th>ประเภทที่แจ้งซ่อม</th>
        <th>แจ้งซ่อม</th>
        <!-- <th>สุขาภิบาล/อาคาร</th>
        <th>อุปกรณ์สำนักงาน</th> -->
        <th>ลักษณะที่ชำรุด</th>
        <th>สถานที่/อาคาร</th>
        <th>สถานะ</th>
        <!--<th>อัพเดต</th>-->
        <th>ลบ</th> 
    </tr>
</thead>

<tbody>
<?php

       
           
$sql = "SELECT * FROM repair_data";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
            echo "<td>" . $row["date"]. "</td>";
            echo "<td>" . $row["id"]. "</td>";
            echo "<td>" . $row["department"]. "</td>";
            echo "<td>" . $row["type_id"]. "</td>";
            echo "<td>" . $row["values"]. "</td>";
            echo "<td>" . $row["description"]. "</td>";
            echo "<td>" . $row["place"]. "</td>";
            echo "<td>" . $row["status"]. "</td>";
            $description = $row["description"];
            $id = $row['id'];
//สร้าง link ไปยังโปรแกรม php ที่ทำหน้าที่ลบข้อมูลรพร้อมส่งรหัสแผนกหัสแผนก
            echo "<td><a href=\"oo_del_dept.php?id=$id\"><button type=\"button\" id=".$row["id"]." class=\"btn btn-danger btn-xs delete\">ลบ</button></td>";
        echo "</tr>";
    }
}

$conn->close();
        
?>

</tbody>
</table>
<br>

<a href="index.html"><button type="button" class="btn btn-success">ย้อนกลับสู่หน้าหลัก</button></a>
    </div>   
</body>
<script>
$(document).ready(function(){
  $(document).on('click', '.delete', function(){
		var user_id = $(this).attr("id");
		if(confirm("คุณแน่ใจหรือไม่ว่าต้องการลบข้อมูลนี้"))
		{
			$.ajax({
				url:"delete.php",
				method:"POST",
				data:{user_id:user_id},
				success:function(data)
				{
					alert(data);
					dataTable.ajax.reload();
				}
			});
		}
		else
		{
			return false;	
		}
	});
});
</script>
</html>