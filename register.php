<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ลงทะเบียน</title>
    <!--=====================================================================================================-->
     <!-- bootrap -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <!--=====================================================================================================-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <!-- close bootrap -->

    <!--=====================================================================================================-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!--=====================================================================================================-->
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/popper_1_14_3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!--=====================================================================================================-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/design.css">
    <!--=====================================================================================================-->
    
    <style>
    /* body{
        margin: 0;
        padding: 0;
        background: #F3F9F8;
        background: url("img/9.jpg") no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    
    } */

    #header {
      background-color:#90DCFF;
      padding: 4rem;
      color: #fff;
        
    }
    .form{
      text-align: center;
    }
    .signup-form{
      width: 400px;
      padding: 50px;
      text-align: center;
      background: #73CFB0;
      /* position: absolute; */
      top: 50%;
      left: 50%; 
      /* transform: translate(-50%,-50%); */
      border-radius: 24px; 
    }
    .signup-form h1{
      color: #fff;
    }
    .signup-form input{
        display: block;
        width: 100%;
        padding: 0 16px;
        height: 40px;
        text-align: center;
        box-sizing: border-box;
        outline: none;
        border: none;
    }
    #usertype{
        margin: 15px 0;
        background: rgb(255,255,255,.5);
        border-radius: 6px;
    }
    .txtb{
        margin: 15px 0;
        background: rgb(255,255,255,.5);
        border-radius: 6px;
    }
    .signup-btn{
        margin-top: 20px;
        margin-bottom: 20px;
        background: #487eb0;
        color: #fff;
        border-radius: 44px; 
        cursor: pointer;
        transition: 0.8s;
    }
    .signup-btn:hover{
        transform: scale(0.96);
    }
    .signup-form a{
        text-decoration: none;
        color: #fff;
        font-size: 16px;
        padding: 10pz;
        transition: 0.8s;
        display: block;
    }
    .signup-form a:hover{
        background: rgb(0,0,0,.3);
    }
    </style>
</head>
<body>
    <?php
    require('connectdb.php');
        //if form submit, insert values in to database.
        //ถ้า form ถูก submit ให้ insert ข้อมูลลงไปที่ database.
    if(isset($_REQUEST['Username'])) {
            //remove backslash.
            //(isset มีหน้าที่ดักจับว่าตัวแปรไหนที่มีการส่งค่าแล้ว จะส่งค่ากลับไปเป็น 1 ส่วนตัวแปรไหนที่ครอบด้วย isset นี้ไม่มีค่า จะส่งค่ากลับเป็นค่าว่าง)
        $username = stripcslashes($_REQUEST['Username']);
            //escape special charecters in a sreing.
            //เป็นการป้องกันตัวอักษรพิเศษใน string.
        $username = mysqli_real_escape_string($conn, $username);
        $email = stripslashes($_REQUEST['email']);
        $email = mysqli_real_escape_string($conn, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn, $password);
        $trn_date = date("Y-m-d H:i:S");
        $firstname = stripcslashes($_REQUEST['Firstname']);
        $lastname = stripcslashes($_REQUEST['Lastname']);
        $userlevel= stripcslashes($_REQUEST['usertype']);

        $query = "INSERT INTO user (Username, Password, email, trn_date, Firstname, Lastname, Userlevel)
                    VALUES ('$username', '".md5($password)."', '$email', '$trn_date', '$firstname', '$lastname', '$userlevel')" ;

        $result = mysqli_query($conn, $query);
        
        if($result) {
            echo "<script>alert('ลงทะเบียนเสร็จสมบูรณ์');window.location='login.php';</script>";
            // echo "<div class='form'>
            // <h3>ลงทะเบียนเสร็จสมบูรณ์</h3>
            // <br> คลิกที่นี่เพื่อ <a href='login.php'>Login</a>
            // </div>";
        }
    } else {
    
?>
<!-- header -->
  <div class="jumbotron jumbotron-fluid text-center mb-0" id="header">
    <div class="container">
        <img src="img/PSU.png" class="ml-3 my-auto mr-2 " width="60px" hight="200px" alt="Responsive image"></div>
    <div class="mt-4">
        <h1>ระบบแจ้งซ่อมทั่วไปฝ่ายอาคารสถานที่</h1>
        <h4>มหาวิทยาลัยสงขลานครินทร์ วิทยาเขตตรัง</h4>
    </div>
  </div>
  <div class="container ">
    <div class="signup-form  my-5 mx-auto">
        <h1>ลงทะเบียน</h1>
        <form name="registration" action="" method="post">
            <input type="text" name="Firstname" placeholder="Firstname" class="txtb" required>
            <input type="text" name="Lastname" placeholder="Lastname" class="txtb" required>
            <input type="email" name="email" placeholder="Email" class="txtb" required>
            <input type="text" name="Username" placeholder="Username" class="txtb" required>
            <input type="password" name="password" placeholder="Password" class="txtb" required>
            <select class="custom-select " name="usertype"  id="usertype" required>
              <option value="">---เลือกประเภทผู้ใช้---</option>
              <option value="A">ผู้ดูแลระบบ(admin)</option>
              <option value="M">หน่วยงาน</option>
              <option value="L">หัวหน้างาน</option>
              <option value="T">ช่าง</option>
            </select><br><br>
            <input type="submit" name="submit" value="Register" class="signup-btn"><br>
            
        </form>
        <p>เป็นสมาชิกแล้วใช่ไหม? <a  href="login.php">เข้าสู่ระบบที่นี่</a></p>
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
<?php } ?>
</body>
</html>