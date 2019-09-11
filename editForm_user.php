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
?>


<?php
  $idSelect = $_GET['id']; //รับค่า id  จากปุ่มแก้ไขมาเก็บไว้
  $query = "SELECT * FROM repair_data WHERE RepID=$idSelect";            
  $result = mysqli_query($conn, $query) or die(mysqli_error());
  $row = mysqli_fetch_assoc($result);

  print_r($row);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>แก้ไขข้อมูลแจ้งซ่อม</title>
    <!--=====================================================================================================-->
    <!-- bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!--=====================================================================================================-->
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
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/popper_1_14_3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!--=====================================================================================================-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/design.css">
    <!--=====================================================================================================-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!--=====================================================================================================-->

    <script>
        $(document).ready(function(){
            //ประเภท
            $("#elect, #san, #office").hide();
           
            $("#type1").change(function(){
                var value = $("#type1 option:selected").val();
                
                if (value == ""){
                    $('#elect').hide();
                    $('#san').hide();
                    $('#office').hide();
                }else if (value == "1"){
                    $('#elect').show();
                    $('#san').hide();
                    $('#office').hide();
                } else if(value == "2"){
                    $('#elect').hide();
                    $('#san').show();
                    $('#office').hide();
                }else{
                    $('#elect').hide();
                    $('#san').hide();
                    $('#office').show();
                }

            });  
        });
    </script>

    <style>
        @import url('https://fonts.googleapis.com/css?family=Bai+Jamjuree|Mali');

        h1 {
            color: rgb(0, 0, 0);
        }

        h2,h4{
            text-align: left;
            color: #fff;
        }
        #p4 {
            color:red;
        }

        label {
            font-family: 'Prompt', sans-serif;
        }

        #rowcenter {
            opacity: 0.9;
            filter: alpha(opacity=40);
            background-color: rgb(220, 228, 250);
            border-radius: 20px;
            box-shadow: 0 6px 10px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            
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
          <a class="nav-link" href="index_user.php">หน้าหลัก</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="form_user.php " >แจ้งซ่อม</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="show_user.php">ข้อมูลการซ่อม</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <img class="d-inline" src="img/5.png" width="40" height="40"> <?php echo $objResult["Firstname"]." ".$objResult["Lastname"];?>
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
<div class="container mt-5 mb-5 ">
    <div class="row">
      <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"> </div>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" id="rowcenter">
          <div style="margin:auto;width:80%;">

            <form method="POST" action="saveEditForm_user.php" enctype="multipart/form-data">
                <h1>แบบฟอร์มแจ้งซ่อม</h1>
                <!-- <h4 align="center">ฝ่ายอาคารสถานที่ มหาวิทยาลัยสงขลานครินทร์ วิทยาเขตตรัง</h4> -->
                <fieldset>
                  <p id="p4">*กรุณากรอกข้อมูล</p>
                        
                    <?php
                      // แปลงวันที่ให้เป็นรูปแบบ ว-ด-ป 
                      $strDate = $row['date'];     //เก็บวันที่ที่รับมาจาก DB ป-ด-ว
                      $Y = substr($strDate,0,4);  //ปี --> 2019
                      $Y = $Y+543;                //ปี --> 2562
                      $m = substr($strDate,5,2);  //เดือน 
                      $d = substr($strDate,8,2);  //วัน
                      $h = substr($strDate,10,10); //ชั่วโมง
                      date_default_timezone_set('Asia/Bangkok');  //timezone TH
                      $strDate_new = implode("-",array($d,$m,$Y))." ".$h;
                    ?><br>
                        
                    <div class="form-gruop">
                        <!-- <p align ="right"><label for="num">เลขที่แจ้ง </label>
                        <input type="text" name="number_id" value="<?=$id?>" style="width:30px; text-align:center;" readonly></p>
                     -->
                        <p align="right"><label for="dtime">วัน/เวลา</label>
                        <input type="datetime" name="dt" value="<?php  echo $strDate_new;?>" style="width:210px; text-align:center;" 
                        readonly></p>
                    </div>

                    <div class="form-gruop">
                        <label for="First Name">ชื่อ</label>
                        <input type="text" class="form-control" id="fname" name="fname"
                            readonly autofocus value="<?php echo $objResult["Firstname"];?>"><br>
                    </div>

                     <div class="form-gruop">
                        <label for="Last Name">นามสกุล</label>
                        <input type="text" class="form-control" id="sname" name="sname"
                           readonly autofocus value="<?php echo $objResult["Lastname"];?>"><br>
                    </div>

                    <div class="form-gruop">
                        <label for="Department">หน่วยงาน</label>
                        <input type="text" class="form-control" id="department" name="department" 
                           value="<?=$row['department']?>" autofocus><br>
                    </div>

                    <div class="form-gruop" >
                    <label for="type">ประเภท</label>
                        <select name="type" id="type1" required>
                            <option value="">---เลือกประเภท---</option>
                            <?php
                                $sql = "SELECT * FROM type";
                                $query = mysqli_query($conn,$sql);
                                while($data=mysqli_fetch_array($query)){
                            ?>
                            <option value="<?php echo $data['id']?>"><?php echo $data['name']?></option>
                            <?php } ?>

                        </select>
                    </div><br>

                    <div class="form-gruop" id="elect" >
                      <p class="mx-4 px-2 "><input type="checkbox" name="electricity[]" value="หลอดไฟ"> หลอดไฟ &nbsp;
                        <input type="checkbox" name="electricity[]" value="ปลั๊กไฟ"> ปลั๊กไฟ &nbsp;
                        <input type="checkbox" name="electricity[]" value="แอร์"> แอร์ &nbsp;
                        <input type="checkbox" name="electricity[]" value="พัดลม"> พัดลม<br>
                        <input type="checkbox" name="electricity[]" value="พัดลมดูดอากาศ"> พัดลมดูดอากาศ
                        &nbsp;<input type="checkbox" name="electricity[]" value="เครื่องใช้ไฟฟ้า(ของวิทยาเขต)"> เครื่องใช้ไฟฟ้า(ของวิทยาเขต) <br><br>
                        <textarea name="electricity[]" rows="4" cols="30" placeholder=" อื่นๆ (ระบุ)"></textarea> <br><br>
                      </p>
                    </div>

                    <div class="form-gruop" id="san">
                      <p class="mx-4 pl-2 "><input type="checkbox" name="sanitary[]" value="ประตู"> ประตู &nbsp;
                        <input type="checkbox" name="sanitary[]" value="หน้าต่าง"> หน้าต่าง &nbsp;
                        <input type="checkbox" name="sanitary[]" value="กระเบื้อง"> กระเบื้อง &nbsp;<br>
                        <input type="checkbox" name="sanitary[]" value="ฝ้าเพดาน"> ฝ้าเพดาน &nbsp;
                        <input type="checkbox" name="sanitary[]" value="ผนัง"> ผนัง &nbsp;
                        <input type="checkbox" name="sanitary[]" value="สี"> สี &nbsp;
                        <input type="checkbox" name="sanitary[]" value="ท่อนํ้า"> ท่อนํ้า &nbsp; <br>
                        <input type="checkbox" name="sanitary[]" value="สุขภัณฑ์"> สุขภัณฑ์ &nbsp;
                        <input type="checkbox" name="sanitary[]" value="นํ้าฝนรั่ว"> นํ้าฝนรั่ว<br><br>
                        <textarea name="sanitary[]" rows="4" cols="30" placeholder="อื่นๆ (ระบุ)"></textarea> <br><br>
                      </p>
                    </div>

                    <div class="form-gruop" id="office">
                      <p class="mx-4 px-2 ">
                        <input type="checkbox" name="office[]" value="เก้าอี้"> เก้าอี้ &nbsp;
                        <input type="checkbox" name="office[]" value="โต๊ะ"> โต๊ะ &nbsp;
                        <input type="checkbox" name="office[]" value="ตู้"> ตู้  &nbsp;
                        <input type="checkbox" name="office[]" value="งานโลหะ/ไม้"> งานโลหะ/ไม้ <br><br>
                        <textarea name="office[]" rows="4" cols="30" placeholder="อื่นๆ (ระบุ)"></textarea> <br><br>
                      </p>
                    </div>

                    <div class="form-gruop">
                        <label for="description">ลักษณะที่ชำรุด</label>
                        <textarea name="description" rows="4" cols="30" class="form-control" id="des"
                        value="<?php echo $row['description'];?>"  autofocus></textarea><br>
                    </div>

                    <div class="form-gruop">
                        <label for="place">สถานที่/อาคาร</label>
                        <textarea name="place" id="place" rows="3" cols="30" value="<?php echo $row['place'];?>" 
                        autofocus></textarea><br>
                    </div><br>
                </fieldset>

                <div class="text-center">
                    <button type="submit" value="submit" class="btn btn-success" onclice="check(frm)">บันทึกการแก้ไข</button>
                    <button type="reset" value="reset" class="btn btn-danger">ล้างทั้งหมด</button>
                </div>

            </form><br>
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



<!-- ตรวจสอบ checkbox ว่ามีการเลือกไหม -->
<script language="javascript">
function check(frm) {
   var inputs = frm.getElementsByTagName('input');
    for(var i = 0 ; i < inputs.length ; i++){
     input = inputs[i];
     if(input.type == 'checkbox'){
        if (input.checked){
            return true;
        };
     };
    };
   alert('กรุณาเลือกอย่างน้อย 1 รายการ');
   return false;
}


// function haveChk(chkboxname){
//    var chk = document.getElementsByName(chkboxname);
//    var i = 0, ln=chk.length; 
//    for(i; i<ln; i++) if( chk[i].checked) return true;
//   return false;
// }
</script>

</body>
</html>