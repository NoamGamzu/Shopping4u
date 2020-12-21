<!DOCTYPE html>
<html dir="rtl" lang="he">

<?php
	session_start();	
	include "inc_db.php";	
	$id=$_SESSION['id'];
	$name= $_REQUEST['name'];	
	$city= $_REQUEST['newcity'];
	$adress= $_REQUEST['adress'];
	$phone= $_REQUEST['phone'];
	$delshop=$_REQUEST['delshop'];
	
	if ($delshop==0) {
	
	$query="UPDATE `shop` SET `s_name` = '$name', `s_town_id` = '$city', `s_location` = '$adress', `s_phone` = '$phone' WHERE `shop`.`s_id` = $id";
	$result = $conn->query($query);
	$conn->close(); 
 	header('Location: manager_updates.php');	
	

		}
		
	else if ($delshop==1) {
	$query="DELETE FROM `product` where p_shop_id  = $id";
	$result = $conn->query($query);
	
	$query="DELETE FROM `shop` where s_id  = $id";
	$result = $conn->query($query);
	
	$query="DELETE FROM `chat` where t1 ='s_$id'";
	$result = $conn->query($query);
	
	$query="DELETE FROM `log` where l_s_id  =$id";
	$result = $conn->query($query);
	
	$query="DELETE FROM `supplier` where s_id =$id";
	$result = $conn->query($query);


	
	$conn->close(); 
 	header('Location: index.php');	


	}

?>

</html>
