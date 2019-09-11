<?php
  require('connectdb.php');
  session_start(); //เปิด session
    if($_SESSION['ID'] == ""){
      header("Content-type: text/html; charset=utf-8");
      echo"<script language='JavaScript' >";
      echo"alert('กรุณากรอกข้อมูลเพื่อเข้าสู่ระบบ');";
      echo"</script>";		
     exit(); 
    }    

    $query = "SELECT * FROM user WHERE ID = '".$_SESSION['ID']."' ";            
    $result = mysqli_query($conn, $query) or die(mysqli_error());
    $objResult = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width=, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>ข้อมูลการซ่อม</title>
  <!--=======================================================================================================-->
  <!-- bootstrap -->
  
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
  <!--=======================================================================================================-->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
  <!-- close bootrap -->
  <!--=======================================================================================================-->
  <!--husnaddddd-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrap.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrap.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <!--=======================================================================================================-->
  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/popper_1_14_3.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/design.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <!--=======================================================================================================-->

  <!-- dataTables -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <script type="text/javascript" charset="utf8"
    src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

  <script type="text/javascript">
    $(document).ready(function () {
      $('#table_id').DataTable();
    });
  </script>
  <style>
    h2,
    h4 {
      text-align: left;
      color: #fff;
    }
  </style>
</head>

<body>
<!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bar-top">
    <div><img src="img/PSU.png" class="ml-3 my-auto mr-2 img-hd" alt="Responsive image"></div>

    <a class="navbar-brand" href="#">ระบบแจ้งซ่อมทั่วไปฝ่ายอาคารสถานที่</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto nav-a">
        <li class="nav-item ">
          <a class="nav-link" href="index_leader.php">หน้าหลัก</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="listmana.php">รายการแจ้งซ่อม</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <img class="d-inline" src="img/5.png" width="40" height="40"> <?php echo $objResult["Firstname"]." ".$objResult["Lastname"];?>
                    </a>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="profile_leader.php">ข้อมูลส่วนตัว</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="logout.php">ออกจากระบบ</a>
          </div>
        </li>
      </ul>
    </div>
  </nav>

  <!-- main -->
  <div class="container-flud my-5">
    <div class="alert alert-warning mx-5 px-5">
      <strong><h5>รายการแจ้งซ่อม</h5></strong>
    </div>

    <hr class="hr-line">
    
    <div class="row mx-1 my-5 ">
      <div class="col-sm">
        <table id="table_id" class="display text-nowrap text-center" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>ลำดับ</th>
              <th>วันที่</th>
              <th>ชื่อผู้แจ้งซ่อม</th>
              <th>หน่วยงาน</th>
              <th>ประเภท</th>
              <th>สถานะการซ่อม</th>
              <th>มอบหมายงาน</th>
            </tr>
          </thead>

          <tbody>
            <?php
              $sql = "SELECT * FROM repair_data, user, form";
              $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                      echo "<td>" . $row["RepID"]. "</td>";
                      echo "<td>" . $row["date"]. "</td>";
                      echo "<td>" . $row["Firstname"]. "</td>";
                      echo "<td>" . $row["department"]. "</td>";
                      echo "<td>" . $row["Type"]. "</td>";
                      echo "<td>" . $row["status"]. "</td>";
                      <td><button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-black">Open Tabbed Modal</button>"</td>";
                      
                  }
                }
              $conn->close();
            // while($row = mysqli_fetch_array($result))
            // {
            // ?>
            // <tr>
            //   <td><?php echo $row["RepID"]; ?></td>
            //   <td><?php echo $row["date"]; ?></td>
            //   <td><?php echo $row["Firstname"]; ?></td>
            //   <td><?php echo $row["department"]; ?></td>
            //   <td><?php echo $row["Type"]; ?></td>
            //   <td><?php echo $row["Lastname"]; ?></td>
            //   <td><input type="button" name="select" values="เลือกช่าง" id="<?php echo $row["id"]; ?>" class="edit" ></td>
            // </tr>
            //   <?php
            //   }
            //   ?>
          </tbody>
        </table><br>
      </div>
    </div>
  </div>

  <!-- footer -->
  <div class="footer foot">
    <div>PSU Trang Campus.</div>
    <span>Copyright © 2019 | <a href="http://www.trang.psu.ac.th">มหาวิทยาลัยสงขลานครินทร์ วิทยาเขตตรัง</a></span>
  </div>
  </div>

</body>
</html>
