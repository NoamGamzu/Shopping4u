<?php

	session_start();			
	$login= $_SESSION['login'];
	$id=$_SESSION['id'];
	$town=$_SESSION['town'];
	include "inc_db.php";
	$query = " select * from `product` WHERE `p_shop_id`=$id"; 	
	if (!$result = $conn->query($query)) exit;

	if ($result->num_rows == 0) echo "אין לספק מוצרים";
	else { 
?><select id="selectprod" style="width: 100%"><?php	
			while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
			$description=$row['p_description'];
			$cost=$row['p_cost'];
			$pid=$row['p_id'];
			echo "<option id=`$pid` value=`$cost` >".$row['p_description']." במחיר ".$row['p_cost']."₪"."</option>"; //make a select with all products options
			}
		}
		$result->free();
		$conn->close();

			?></select> 