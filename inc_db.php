<?php
	$host="localhost";
	$username = "root";
	$password = "";
	$database="gk2020b";
	$conn = new mysqli($host,$username,$password,$database);
	if ($conn->connect_errno) exit;
	$conn->set_charset("utf8");
?>
