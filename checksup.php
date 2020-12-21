<!DOCTYPE html><?php
	session_start();
?>
<html dir="rtl" lang="he">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>check supplier</title>
<link href="template_02.css" media="all" rel="stylesheet" type="text/css">
<style>
.font {
	font-size: 45px;
	font-family: Calibri Light;
	color: #FF9900;
	font-weight: 900;
}
</style>
</head>

<body id="background">

<?php
	include "inc_db.php";
	$datetime = $_REQUEST['dt'];	
	$login=$_REQUEST['login'];
	$password=$_REQUEST['password'];
	$query = "select * from `user` where login=\"$login\" AND password= \"$password\"";
	if (!$result = $conn->query($query)) {
	    echo "Error: Our query failed to execute and here is why: \n";
	    echo "Query: " . $query . "\n";
	    echo "Errno: " . $conn->errno . "\n";
	    echo "Error: " . $conn->error . "\n";
	    exit;
	   
	}
	if (!($result->num_rows == 0)) {
						$row=$result->fetch_array(MYSQLI_ASSOC);
						$id=$row['id'];
						$query="select * from `supplier` where u_id=$id"; //check if the customer is a supplier.
						$result = $conn->query($query);
						if (!($result->num_rows == 0)) {
						$_SESSION['name']=$row['name'];
						$_SESSION['town']=$row['town'];
						$_SESSION['id']=$row['id'];
						$town=$row['town'];
						$_SESSION['login'] = $_REQUEST['login'];
						$_SESSION['logindate'] = date("Y-m-d h:m:s");	// Get the date from the server	
						
						
						$query = "UPDATE user SET dt =\"$datetime\" WHERE id = $id"; //set login date to the supllier
						

						$result = $conn->query($query);
						$conn->close();
						header('Location: sup_page.php'); 

	}
}

?><?php include("header.php"); ?><br>
<table style="width: 100%">
	<tr>
		<td id="menunactive" style="height: 71px; width: 20%"></td>
		<td id="data" style="height: 50%">
		<table id="dat1" style="width: 100%">
			<tr>
				<td class="font" colspan="3" style="height: 5%">שם משתמש או סיסמא 
				שגויה</td>
			</tr>
			<tr>
				<td style="width: 33%"></td>
				<td class="bottuns_dat1" onclick="document.location.href='index.php' " style="height: 5%; width: 33%;">
				חזור לדף הבית</td>
				<td style="width: 33%; ;"></td>
			</tr>
			<tr>
				<td style="width: 33%">&nbsp;</td>
				<td style="height: 15%">&nbsp;</td>
				<td style="width: 33%; ;">&nbsp;</td>
			</tr>
		</table>
		</td>
		<td id="data" style="height: 71px; width: 20%">&nbsp;</td>
	</tr>
</table>

</body>

</html>
