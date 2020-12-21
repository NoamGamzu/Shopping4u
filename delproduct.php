<?php
	session_start();	
	include "inc_db.php";	
	$supid= $_REQUEST['supid'];
	$itemid= $_REQUEST['itemid'];
	
	
	$query="DELETE FROM `log` WHERE `l_p_id`=$itemid  AND `l_s_id`=$supid "; //delete the chosen product from log table.
	$result = $conn->query($query);

	$query="DELETE FROM `product` WHERE `p_id`=$itemid  AND `p_shop_id`=$supid "; //delete the chosen product from the supplier's products.
	$result = $conn->query($query);
	$conn->close(); 
	
	header("location: sup_updates.php");


?>