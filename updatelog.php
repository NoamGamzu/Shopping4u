<?php
	session_start();	
	include "inc_db.php";	
	
	$cusid= $_REQUEST['cusid'];	
	$supid= $_REQUEST['supid'];
	$itemid= $_REQUEST['itemid'];
 	$items=explode(",", $itemid);
 	$itemslength=count($items);

	for ($i=0 ; $i<$itemslength ; $i++) {
	
	
	$query="SELECT * FROM `product` WHERE `p_id`=$items[$i]";
	$result = $conn->query($query);
	$row=$result->fetch_array(MYSQLI_ASSOC);
	$cost=$row['p_cost'];
	$query = "INSERT INTO `log` (`l_s_id`, `l_u_id`, `l_p_id`, `l_price`, `l_dt`) VALUES ('$supid', '$cusid','$items[$i]', '$cost', CURRENT_TIMESTAMP)";
	$result = $conn->query($query);
	}
	$conn->close(); 	
	

?>
<script>
window.close();
</script>
