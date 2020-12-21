<?php
	// All rights reserved to Gideon Koch 2020 

// end chat
// TRUNCATE table chat
// DELETE FROM `chat` WHERE t1=1 and t2=2
	session_start();
	
	$t1 = $_REQUEST['t1'];						// talker 1
	$t2 = $_REQUEST['t2'];						// talker 2
	
	include("inc_db.php");

	$query = "DELETE FROM `chat` WHERE t1=\"$t1\" and t2=\"$t2\"";
	$result = $conn->query($query);

	$conn->close();
?>