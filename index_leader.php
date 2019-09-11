<?php
    require('connectdb.php');
    session_start();
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
    

    // $_SESSION["username"] = 'username';

    // $_SESSION["Firstname"] = 'Firstname';
    // session_write_close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ระบบแจ้งซ่อมทั่วไปฝ่ายอาคารสถานที่</title>
    <!--=======================================================================================================-->
    <!-- bootrap -->
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!--=======================================================================================================-->
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/popper_1_14_3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!--=======================================================================================================-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/design.css">
    <!--=======================================================================================================-->
    
    <style>
      #header {
        background-color:#90DCFF;
        padding: 4rem;
        color: #fff;
      }
    </style>
</head>

<body>
    <!-- header -->
    <div class="jumbotron jumbotron-fluid text-center mb-0" id="header">
        <div class="container">
            <img src="https://eds.trang.psu.ac.th/mis/student/assets/images/logo.png" alt="Responsive image"></div>
        <div class="mt-4">
            <h1>ระบบแจ้งซ่อมทั่วไปฝ่ายอาคารสถานที่</h1>
            <h4>มหาวิทยาลัยสงขลานครินทร์ วิทยาเขตตรัง</h4>
        </div>
    </div>

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bar-top">
        <a class="navbar-brand" href="#">PSU Trang</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index_leader.php">หน้าหลัก</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="d-inline" src="img/5.png" width="40" height="40"><?php echo $objResult["Firstname"]." ".$objResult["Lastname"];?>
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
    <div class="container my-5">
        <!-- <div class="row "></div> -->
        <div class="row " align="center">
            <div class="col-sm-6 my-5">
                <a href="listmana.php"><img src="img/1.png" style="height:100px;margin-bottom:15px" ; class="img-responsive"
                    alt="Responsive image"></a><br>
                <h3><a href="listmana.php" style="text-decoration: none;">รายการแจ้งซ่อม</a></h3>
            </div> 
            <div class="col-sm-6 my-5">
                    <a href="profile_leader.php"><img src="img/3.png" style="height:100px;margin-bottom:15px" ; class="img-responsive"
                        alt="Responsive image"></a><br>
                    <h3><a href="profile_leader.php" style="text-decoration: none;">ข้อมูลส่วนตัว</a></h3>
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