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

/************************************************************************************************************************/

/* รับค่าฟอร์มจาก editProfile_user.php */
    $txtFname = $_POST["txtFname"];
    $txtLname = $_POST["txtLname"];
    $txtDep = $_POST["txtDep"];
    $txtTel = $_POST["txtTel"];
    $txtEmail = $_POST["txtEmail"];
    $txtUsername = $_POST["txtUsername"];
    $txtPassword = $_POST["txtPassword"];
    $txtConPassword = $_POST["txtConPassword"];
    

 /* Upload Files Image */
    if (isset($_POST['submit'])){
        $file = $_FILES['file'];
        // print_r($file);
        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('jpg', 'jpeg', 'png', 'pdf');

        if(in_array($fileActualExt, $allowed)){
            if($fileError == 0){
                if($fileSize < 1000000){
                    $fileNameNew = uniqid('', true).".".$fileActualExt;
                    $fileDestination = 'uploads/'.$fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination);
                }else{
                    echo "<script>alert('ไฟล์ของคุณใหญ่เกินไป!');window.location='editProfile_user.php';</script>";
                }
            }else{
                echo "<script>alert('เกิดข้อผิดพลาดในการอัพโหลดไฟล์!');window.location='editProfile_user.php';</script>";
            }
        }else{
            
        }
    }

    $sql = "UPDATE user SET Password = '$txtPassword', Firstname = '$txtFname', Lastname = '$txtLname', Tel = '$txtTel'
            , email = '$txtEmail', Username = '$txtUsername', image = '$fileNameNew' WHERE ID = '".$_SESSION['ID']."' ";
    $result = mysqli_query($conn, $sql) or die(mysqli_error());

    if($result){
        echo "<script>alert('บันทึกข้อมูลเรียบร้อยแล้ว');window.location='profile_user.php';</script>";	
    }else{
        echo "<script>alert('ไม่สามารถบันทึกข้อมูลได้');window.location='editProfile_user.php';</script>";
    }

mysqli_close();
?>