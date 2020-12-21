<!DOCTYPE html>

<?php
	session_start();
?>


<html lang="he" dir="rtl">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>defult</title>
<link rel="stylesheet" type="text/css" href="template_02.css" media="all">
<style>
.font {
	font-size: 45px ;
	font-family: Calibri Light; 
	color:#FF9900;
	font-weight:900;
	
	}
</style>

</head>

<body id="background">
 
<?php
	include "inc_db.php";
	$datetime = $_REQUEST['dt'];	
	$login=$_REQUEST['login'];
	$password=$_REQUEST['password'];
$query = "select * from `user` where login=\"$login\" AND password= \"$password\""; //check if its a register customer.
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
						$_SESSION['town']=$row['town'];
						$_SESSION['id']=$row['id'];
						$town=$row['town'];
						$_SESSION['name']=$row['name'];
						$_SESSION['login'] = $_REQUEST['login'];
						$_SESSION['logindate'] = date("Y-m-d h:m:s");	// Get the date from the server	
						$query = "UPDATE user SET dt =\"$datetime\" WHERE id = $id"; //set the login date
						

						$result = $conn->query($query);
						$conn->close();
						header('Location: cus_page.php');  //if the details are correct-> send the customer to his page

}

?>
<?php include("header.php"); ?>
	<br>	
		<table style="width: 100%">
			<tr>
				<td id="menunactive" style="height: 71px; width:20% "></td>
				<td  id="data" style="height: 50%" >
				
				<table  id="dat1" style="width: 100%">
					<tr>
						<td style="height:5%" class="font" colspan="3">שם משתמש או סיסמא שגויה</td>
					</tr>
					<tr>
						<td style="width: 33%" > </td>
						<td style="height:5%; width: 33%;" class="bottuns_dat1" onclick="document.location.href='index.php' "> חזור לדף הבית</td>
						<td style="width: 33%; ;"> </td>
					</tr>
					<tr>
						<td style="width: 33%" > &nbsp;</td>
						<td style =" height:15%"> 
						&nbsp;</td>
						<td style="width: 33%; ;"> &nbsp;</td>
					</tr>
				</table>
				
	   
</td>

				<td  id="data" style="height: 71px ;width: 20%" >	&nbsp;</td>
			</tr>
		</table>
	
	</body>

</html>
