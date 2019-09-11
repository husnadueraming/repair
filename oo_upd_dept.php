<?php
require('connectdb.php');
$description = $_REQUEST['description'];
$id = $_REQUEST['id'];

$sql = "UPDATE form set description='$description' where id='$id'";

//excute sql
if($conn->query($sql)){
	echo "RECORD UPDATE";
}else{
	echo "ERROR :",mysql_error();
}

?>