<?php

	session_start();			
	$login= $_SESSION['login'];
	$id=$_SESSION['id'];
	$town=$_SESSION['town'];
	include "inc_db.php";
	$query ="SELECT * FROM `shop` WHERE `s_id`=$id"; //get all the suppliers from shop table
	$result = $conn->query($query);
	$row = $result->fetch_array(MYSQLI_ASSOC);
	$cityid=$row['s_town_id'];	
	$query ="SELECT * FROM `town` WHERE `t_id`=$cityid"; //get the town name from town table
	$result = $conn->query($query);
	$row = $result->fetch_array(MYSQLI_ASSOC);
	$supcityname=$row['t_city'];
	$query = " select * from `town`";	
	if (!$result = $conn->query($query)) exit;
	else { 
?><select id="selecttown" name="selecttown" style="width: 100%"><?php	
			while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
			$tid=$row['t_id'];
			if($row['t_city']==$supcityname) {
				echo "<option id=`$tid` selected>".$row['t_city']. "</option>"; 
				}
			else if($row['t_city']!=$supcityname){
				echo "<option id=`$tid`>".$row['t_city']. "</option>";
				}
			}
		}
		$result->free();
		$conn->close();
	
			?></select> 