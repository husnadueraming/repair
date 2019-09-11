<?php
  require('connectdb.php');
  include('functionDate.php');
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

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>กรอกข้อมูลแจ้งซ่อม</title>
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
      //show-hide ประเภท
      $("#elect, #san, #office").hide();
      
      $("#type1").change(function(){
        var value = $("#type1 option:selected").val();
          if (value == ""){
            $('#elect').hide();
            $('#san').hide();
            $('#office').hide();
          }else if (value == "ไฟฟ้า"){
            $('#elect').show();
            $('#san').hide();
            $('#office').hide();
          } else if(value == "ตัวอาคาร"){
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

    function check_click()
    {
    if(document.getElementById('wet').checked==true)
    {
    document.getElementById('button1').disabled = false;
    }
    else 
    {
    document.getElementById('button3').disabled = true;
  

    }
    }


  </script>

    <style>
        @import url('https://fonts.googleapis.com/css?family=Bai+Jamjuree|Mali');

        h3 {
            color: rgb(0, 0, 0);
            text-align: center;
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
        <li class="nav-item py-1">
          <a class="nav-link" href="index_user.php">หน้าหลัก</a>
        </li>
        <li class="nav-item active py-1">
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
<div class="container mt-5 mb-5 ">
    <div class="row">
      <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"> </div>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" id="rowcenter">
          <div style="margin:auto;width:80%;">

            <form method="POST" action="saveForm_user.php" enctype="multipart/form-data" name="form1" >
              <h3 class="mt-5">แบบฟอร์มแจ้งซ่อม</h3><br>
                <fieldset>
                  <div class="alert alert-danger">
                    <strong>*กรุณากรอกข้อมูล</strong> 
                  </div>
                        
                    <?php
                        /*วันที่*/
                        $strDate = date("d-m-Y");

                       /*รันเลขที่แจ้ง*/ 
                        $sql="SELECT MAX('id') AS 'lastid' FROM 'repair_data'";
                        // $sql = "SHOW TABLE STATUS LIKE 'form";
                        $result = @mysqli_query($sql);
                        $row = @mysqli_fetch_assoc($result);
                        $id = (int)$row['Auto_increment']+1; 
                        $id = substr("00000".$id,-2);

                        // $autoIdYear = $yearMounth."/".$id;

                        // $iD = 0;
                        // $iD = ($iD +1 );
                        // $iD = substr("00000".$iD,-2);
                        // echo "วันที่แจ้งซ่อม/เลขที่แจ้ง : " . $yearMounth."/".$id. "<br>";
                    ?><br>
                        
                    <div class="form-gruop ">
                        <p align ="right"><label for="num">เลขที่แจ้ง </label>
                        <input type="text" name="number_id" class="form-control" value="<?=$id?>" style="width:50px; text-align:center;" readonly></p>
                    
                        <p align="right"><label for="dtime">วัน/เวลา</label>
                        <input type="datetime"  class="form-control" name="dt" value="<?=DateD($strDate)?>" style="width:210px; text-align:center;" 
                        readonly autofocus></p>
                    </div>

                    <div class="form-gruop ">
                        <label for="FirstName">ชื่อ</label>
                        <input type="text" class="form-control" id="fname" name="fname"
                            readonly autofocus value="<?php echo $objResult["Firstname"];?>"><br>
                    </div>

                     <div class="form-gruop">
                        <label for="LastName">นามสกุล</label>
                        <input type="text" class="form-control" id="sname" name="sname"
                           readonly autofocus value="<?php echo $objResult["Lastname"];?>"><br>
                    </div>

                    <div class="form-gruop">
                        <label for="Department">หน่วยงาน</label>
                        <input type="text" class="form-control" id="department" name="department"
                            placeholder="" required autofocus><br>
                    </div>

                    <div class="form-gruop" >
                    <label for="type">ประเภท</label>
                        <select class="custom-select" name="type"  id="type1" required>
                            <option value="">---เลือกประเภท---</option>
                            <?php
                                $sql = "SELECT * FROM type";
                                $query = mysqli_query($conn,$sql);
                                while($data=mysqli_fetch_array($query)){
                            ?>
                            <option  value="<?php echo $data['name']?>"><?php echo $data['name']?></option>
                            <?php } ?>
                        </select>
                    </div><br>

                    <div class="form-gruop" id="elect">
                      <p class="mx-2 px-2 ">
                        <input type="checkbox" id= "bot" onclick="check_click()"  name="values_type[]"  value="หลอดไฟ" disabled="disabled" > หลอดไฟ <br>
                        <input type="checkbox" id= "bot" onclick="check_click()"  name="values_type[]"  value="ปลั๊กไฟ"> ปลั๊กไฟ <br>
                        <input type="checkbox" id= "bot" onclick="check_click()"  name="values_type[]"  value="แอร์"> แอร์ <br>
                        <input type="checkbox" id= "bot" onclick="check_click()"  name="values_type[]"  value="พัดลม"> พัดลม<br>
                        <input type="checkbox" id= "bot" onclick="check_click()"  name="values_type[]"  value="พัดลมดูดอากาศ"> พัดลมดูดอากาศ<br>
                        <input type="checkbox" id= "bot" onclick="check_click()"  name="values_type[]"  value="เครื่องใช้ไฟฟ้า(ของวิทยาเขต)"> เครื่องใช้ไฟฟ้า(ของวิทยาเขต)<br><br>
                        <textarea name="values_type[]" id= "bot" onclick="check_click()"    rows="4" cols="30" class="form-control" placeholder=" อื่นๆ (ระบุ)"></textarea> <br>
                      </p>
                    </div>

                    <div class="form-gruop" id="san">
                      <p class="mx-2 pl-2 ">
                        <input type="checkbox" id= "wet" onclick="check_click()"  name="values_type[]"  value="ประตู"><a id="button1" disabled="disabled"> ประตู </a><br>
                        <input type="checkbox" id= "wet" onclick="check_click()"  name="values_type[]"  value="หน้าต่าง"> หน้าต่าง <br>
                        <input type="checkbox" id= "wet" onclick="check_click()"  name="values_type[]"  value="กระเบื้อง"> กระเบื้อง <br>
                        <input type="checkbox" id= "wet" onclick="check_click()"  name="values_type[]"  value="ฝ้าเพดาน"> ฝ้าเพดาน <br>
                        <input type="checkbox" id= "wet" onclick="check_click()"  name="values_type[]"  value="ผนัง"> ผนัง <br>
                        <input type="checkbox" id= "wet" onclick="check_click()"  name="values_type[]"  value="สี"> สี <br>
                        <input type="checkbox" id= "wet" onclick="check_click()"  name="values_type[]"  value="ท่อนํ้า"> ท่อนํ้า <br>
                        <input type="checkbox" id= "wet" onclick="check_click()"  name="values_type[]"  value="สุขภัณฑ์"> สุขภัณฑ์ <br>
                        <input type="checkbox" id= "wet" onclick="check_click()"   name="values_type[]"  value="นํ้าฝนรั่ว"> นํ้าฝนรั่ว<br><br>
                        <textarea name="values_type[]"  id= "bot" onclick="check_click()"  rows="4" cols="30" class="form-control" placeholder="อื่นๆ (ระบุ)"></textarea> <br>
                      </p>
                    </div>

                    <div class="form-gruop" id="office">
                      <p class="mx-2 px-2 ">
                        <input type="checkbox" id= "yat" onclick="check_click()"  name="values_type[]"  value="เก้าอี้" ><a id="button2" disabled="disabled"> เก้าอี้ </a>  <br>
                        <input type="checkbox" id= "yat" onclick="check_click()"  name="values_type[]"  value="โต๊ะ"><a id="button3" disabled="disabled">  โต๊ะ  </a> <br>
                        <input type="checkbox" id= "yat" onclick="check_click()"  name="values_type[]"  value="ตู้"> ตู้  <br>
                        <input type="checkbox" id= "yat" onclick="check_click()"  name="values_type[]"  value="งานโลหะ/ไม้"> งานโลหะ/ไม้ <br><br>
                        <textarea name="values_type[]" id= "yat" onclick="check_click()"  rows="4" cols="30" class="form-control" placeholder="อื่นๆ (ระบุ)"></textarea> <br>
                      </p>
                    </div>

                    <div class="form-gruop">
                      <label for="description">ลักษณะที่ชำรุด</label>
                      <textarea name="description" rows="4" cols="30" class="form-control" id="des"
                          placeholder="เพิ่มเติมลักษณะที่ชำรุด"  autofocus></textarea><br>
                    </div> 

                    <div class="form-gruop">
                      <label for="place">สถานที่/อาคาร</label>
                      <textarea name="place" rows="4" cols="30" class="form-control" id="place"
                         required autofocus></textarea><br>
                    </div> 

                </fieldset>

                <div class="text-center">
                  <button type="submit" value="submit" class="btn btn-success" onclick="return confirm('ยืนยันการแจ้งซ่อม');">แจ้ง</button>
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

</body>
</html>