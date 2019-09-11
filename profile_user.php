<?php
  require('connectdb.php');
  session_start(); //เปิด session
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

    $sql = "SELECT * FROM repair_data ";            
    $result_ = mysqli_query($conn, $sql) or die(mysqli_error());
    $objResult_ = mysqli_fetch_array($result_);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width=, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>ข้อมูลส่วนตัว</title>

  <!-- bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
  <!-- close bootrap -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/popper_1_14_3.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/design.css">


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
        <li class="nav-item py-1">
          <a class="nav-link" href="index_user.php">หน้าหลัก</a>
        </li>
        <li class="nav-item py-1">
          <a class="nav-link" href="form_user.php " >แจ้งซ่อม</a>
        </li>
        <li class="nav-item py-1">
          <a class="nav-link" href="show_user.php">ข้อมูลการซ่อม</a>
        </li>
        <li class="nav-item dropdown py-0">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <img class="d-inline img-fluid rounded-circle" src="uploads/<?=$objResult["image"]?>" width="38" height="30"> <?php echo $objResult["Firstname"]." ".$objResult["Lastname"];?>
                    </a>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="profile_user.php">ข้อมูลส่วนตัว</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="logout.php">ออกจากระบบ</a>
          </div>
        </li>
      </ul>
    </div>
  </nav>

  <!-- main -->
  <div class="container">
    <div class="row">
      <div class="col-sm-3 py-sm-5">
        <div class="card">
          <div class="card-body bg-light text-center text-info">
            <p>
            <img src="uploads/<?=$objResult["image"]?> " class="img-fluid rounded-circle" width="180" height="180">
            </p>
            <p><b><?=$objResult["Firstname"]." ".$objResult["Lastname"];?></b> <br>
                  <?=$objResult_["Department"];?></p>
          </div>
        </div>
      </div>

      <div class="col py-sm-5">
        <div class="card ">
          <div class="card-header text-light pt-4 pb-0">
            <h5>ข้อมูลส่วนตัว
              <a href="editProfile_user.php" class="btn btn-warning" role="button">แก้ไข</a>
            </h5>
          </div>
          <div class="card-body bg-light">
            <div class="table-responsive">
              <table class="table table-borderless">
                <thead></thead>
                <tbody>
                  <tr>
                    <td><b>ชื่อ</b></td>
                    <td><?=$objResult["Firstname"]." ".$objResult["Lastname"];?></td>
                  </tr>
                  <tr>
                    <td><b>หน่วยงาน</b></td>
                    <td><?=$objResult_["Department"];?></td>
                  </tr>
                  <td><b>เบอร์โทรศัพท์</b></td>
                  <td><?=$objResult["Tel"];?></td>
                  <tr>
                    <td><b>อีเมล</b></td>
                    <td><?=$objResult["email"];?></td>
                  </tr>
                  <tr>
                    <td><b>Username</b></td>
                    <td><?=$objResult["Username"];?></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- footer -->
<footer class="footer foot">
  <div class="container-fluid">
    <div class="footer-logo">PSU Trang Campus.</div>
    <span class="copyright">Copyright © 2019 | <a href="http://www.trang.psu.ac.th">มหาวิทยาลัยสงขลานครินทร์
        วิทยาเขตตรัง</a></span>
  </div>
</footer>
</body>

</html>