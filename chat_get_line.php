<?php
	// All rights reserved to Gideon Koch 2020 
	session_start();
	
	$t1 = $_REQUEST['t1'];						// talker 1
	$t2 = $_REQUEST['t2'];						// talker 2
	$last_chat_id = $_REQUEST['last_chat_id'];	// The line
	
	include("inc_db.php");

	// Check if there are new lines after the last one I have $last_talk
	$query = "SELECT * FROM chat WHERE t1=\"$t1\" and t2=\"$t2\" and chat_id > $last_chat_id";
	$result = $conn->query($query);

	if ($result->num_rows == 0) {
		echo "";
	} else {
			while ($row = $result->fetch_array(MYSQLI_ASSOC)) {		
				echo $row["talk"]."<br>";
				$last_chat_id = $row['chat_id'];
			}
			echo "~~".$last_chat_id;
		}
	$result->free();
	$conn->close();
?>