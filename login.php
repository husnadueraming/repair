<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width=, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login</title>
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
     /*body {
      margin: 0;
      padding: 0;
      /* font-family: sans-serif;
      background: #F3F9F8;
    } */ 
    #header {
      background-color:#90DCFF;
      padding: 4rem;
      color: #fff;
    }

    .box {
      width: 400px;
      padding: 50px;
      /* position: absolute; */
      top: 50%;
      left: 50%;
      transform: translate(+1%, +1%);
      background: #73CFB0;
      text-align: center;
      border-radius: 20px;
      /* 1 */
    }

    h2 {
      color: white;
      font-size: 30px;
      /* text-transform: uppercase; */
      font-weight: 550;
    }

    .box input[type="text"],
    .box input[type="password"] {
      border: 0;
      background: none;
      display: block;
      margin: 45px auto;
      text-align: center;
      border: 2px solid #511E0D;
      padding: 10px 10px;
      width: 280px;
      outline: none;
      color: white;
      border-radius: 24px;
      transition: 0.25s;
    }

    .avatar {
      width: 100px;
      height: 100px;
      border-radius: 50%;
      /* position: absolute; */
      top: -30px;
      left: 150px;
      /* padding-top: 20px; */
    }

    .box input[type="submit"] {
      border: 0;
      background: none;
      display: block;
      margin: 20px auto;
      text-align: center;
      border: 2px solid #12A21F;
      padding: 14px 40px;
      outline: none;
      color: white;
      border-radius: 24px;
      transition: 0.25s;
      cursor: pointer;
    }

    .box input[type="submit"]:hover {
      background: #09B118;
    }

    /* a {
      color: blue;
    } */

    /* .bg-modal{
    width: 100%;
    height: 100%;
    background-color: green; 
    position: absolute;
    } */
  </style>
</head>

<body>
  <?php
    require('connectdb.php');
    session_start();

    if(isset($_POST['username'])) {
      // removes backslashes
      $username = stripslashes($_REQUEST['username']);
      // escapes special characters in a string
      $username = mysqli_real_escape_string($conn, $username);
      $password = stripslashes($_REQUEST['password']);
      $password = mysqli_real_escape_string($conn, $password);

      // Checking is user existing in the database ot not
      $query = "SELECT * FROM user WHERE username='$username' AND password='".md5($password)."'";            
      $result = mysqli_query($conn, $query) or die(mysqli_error());
      $rows = mysqli_num_rows($result);

      if(mysqli_num_rows($result)==1){
 
        $row = mysqli_fetch_array($result);

        $_SESSION["ID"] = $row["ID"];//ประกาศตัวแปรUserIDไว้เพื่อส่งค่า
        $_SESSION["User"] = $row["Firstname"]." ".$row["Lastname"];//ประกาศตัวแปรUserไว้เพื่อส่งค่า
        $_SESSION["Userlevel"] = $row["Userlevel"];//ประกาศตัวแปรUserlevelไว้เพื่อส่งค่า

        if($_SESSION["Userlevel"]=="A"){        //ถ้าเป็น admin ให้กระโดดไปหน้า admin_page.php
          Header("Location: index_admin.php");
        }

        if ($_SESSION["Userlevel"]=="M"){       //ถ้าเป็น member ให้กระโดดไปหน้า user_page.php
          Header("Location: index_user.php");
        }

        if ($_SESSION["Userlevel"]=="L"){       //ถ้าเป็น หัวหน้างาน ให้กระโดดไปหน้า user_page.php
          Header("Location: index_leader.php");
        }

        if ($_SESSION["Userlevel"]=="T"){       //ถ้าเป็น ช่าง ให้กระโดดไปหน้า user_page.php
          Header("Location: index_technician.php");
        }

      } else {
        echo "<script>alert('Username หรือ Password ไม่ถูกต้อง กรุณาเข้าสู่ระบบใหม่อีกครั้ง!');history.back();</script>";
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
      <div class="box my-5 mx-auto">
        <img src="img/12.png" class="avatar"><br>
          <form action="" method="post" name="login">
            <h2>เข้าสู่ระบบ</h2>
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" name="submit" value="Login"><br>
          </form>
        <p>ยังไม่เป็นสมาชิกใช่ไหม? <a href="register.php">ลงทะเบียนที่นี่</a></p>
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