<?php
require('connectdb.php');

// $id = $_REQUEST['id'];

// $sql = "DELETE from repair_data WHERE id ='$id'";

// //excute sql
// if($conn->query($sql)){
// 	// echo "Record deleted!";
// 	echo "<action=\"list1_form.php\">";
	
	
// }else{
// 	echo "Error :",mysql_error();
// }
// $conn->close();

if(isset($_POST["user_id"]))
{
	$image = get_image_name($_POST["user_id"]);
	if($image != '')
	{
		unlink("upload/" . $image);
	}
	$stmt = $connection->prepare(
		"DELETE FROM repair_data WHERE id = :bp_id"
	);

	$stmt->bindParam(':bp_id', $_POST["user_id"]);
	$result = $stmt->execute();
  	
	if(!empty($result))
	{
		echo 'Data Deleted';
	}
}
?>
