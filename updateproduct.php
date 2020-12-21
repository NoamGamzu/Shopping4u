<?php
	session_start();	
	include "inc_db.php";	
	$supid= $_REQUEST['supid2'];
	$itemid= $_REQUEST['itemid2'];
	$price= $_REQUEST['newprice'];
	$query = "UPDATE `product` SET `p_cost`=$price WHERE `p_id`=$itemid AND `p_shop_id`=$supid";
	$result = $conn->query($query);
	$conn->close(); 
	header("location: sup_updates.php");
	
	

?>