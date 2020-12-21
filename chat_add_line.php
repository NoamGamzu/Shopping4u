<?php
	// All rights reserved to Gideon Koch 2020 

	session_start();
	$t1 = $_REQUEST['t1'];	// user ID
	$t2 = $_REQUEST['t2'];	// shop ID
	$talk = $_REQUEST['talk'];	// The line
	include("inc_db.php");
	$query = "INSERT INTO chat (t1, t2, talk) VALUES (\"$t1\", \"$t2\", \"$talk\")";
// echo $query;	
	$conn->query($query);

	$last_id = $conn->insert_id;
	echo($last_id);	// return the last chat_id is AUTO_INCREMENT field

	$conn->close();
?>