<html dir="rtl" lang="he">

<?php
	session_start();	
	include "inc_db.php";	
	$supid= $_REQUEST['supid3'];
	$prodname= $_REQUEST['newprodname'];
	$prodcost= $_REQUEST['newprodprice'];
	$prodcategory=$_REQUEST['newprodcategory'];
		$query="INSERT INTO `product` (`p_shop_id`, `p_category`, `p_description`, `p_cost`, `p_stock`) VALUES ('$supid', '$prodcategory', '$prodname', '$prodcost', '1')";
		$result = $conn->query($query);
		$conn->close(); 
		header("location: sup_updates.php");
	

?>

</html>
