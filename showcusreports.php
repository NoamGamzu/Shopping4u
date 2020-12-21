<!DOCTYPE html>
<html dir="rtl" lang="he">

<?php
	session_start();
	include "inc_db.php";
	if (isset($_SESSION['login'])) {			
	$login= $_SESSION['login'];
	$id=$_SESSION['id'];
	$report=$_REQUEST['report'];
	$name= $_SESSION['name'];
	
}
$countcus=0;
$countsup=0;
$cntchats=0;

	$query = 'select * from user';
	if (!$result = $conn->query($query)) exit;
	if ($result->num_rows == 0) echo " ";
	else { 
		$countcus = $result->num_rows;	
	}	 
	$query = "select * from `supplier`";
	if (!$result = $conn->query($query)) exit;
	if ($result->num_rows == 0) echo " ";
	else {	
		$countsup = $result->num_rows;	
	}
	$query = "select *,count(*)  from `chat` group by t1,t2";
	if (!$result = $conn->query($query)) exit;

	if ($result->num_rows == 0) echo " ";
	else {
		while ($row = $result->fetch_array(MYSQLI_ASSOC)) {		
		if($row['count(*)'] > 1 ) {
			$cntchats+=1;
		}
	}
}
		$result->free();
		$conn->close();
	

?>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>Customer_reports</title>
<link href="template_02.css" media="all" rel="stylesheet" type="text/css">
<script>

</script>
</head>

<body id="background">

<div>
	<?php include("header.php"); ?><br>
	<table style="width: 100%">
		<tr>
			<td id="menuactive" style="width: 200px" valign="top">
			<table style="width: 200px">
				<tr>
					<td class="hello">שלום <?php echo $name?></td>
				</tr>
				<tr>
					<td class="selected" onclick="location.href='cus_page.php'">
					דף צרכן</td>
				</tr>
				<tr>
					<td class="gategory" onclick="location.href='introduction.php'">
					היכרות</td>
				</tr>
				<tr>
					<td class="gategory" onclick="location.href='cus_items.php'">
					הזמנה</td>
				</tr>
				<tr>
					<td class="gategory" onclick="location.href='reports.php'">דוחות</td>
				</tr>
			</table>
			</td>
			<td style="width: 20%"></td>
			<td id="data">
			<table id="dat1">
				<tr><td  style="height:5%; text-align: center;">הצגת הדוח:</td></tr>
				<tr>
				<td class="bottuns_dat1" style="width: 60%; height:6%" onclick="location.href='cus_page.php'">חזור להצגת דוחות נוספים</td>		
				</tr>
				<tr>
					<td><?php

if($report==0)//count users
 {
?>
					<h1><?php echo "מספר הלקוחות במערכת הם : ".$countcus?></h1>
					<?php
	
}
		
if($report==1)//show all cus in the system order by dt
{
	?>
					<h1><?php echo "מספר הספקים במערכת הם : ".$countsup   ?>
					</h1>
					<?php
	
}
		if($report==2)// show how many chats are in the database
		 {
	?>
					<h1><?php echo "כמות השיחות הפעילות במערכת הינם : ".$cntchats ?>
					</h1>
					<?php 		
		}

?></td>
				</tr>
			</table>
			<?php include("footer.php"); ?></td>
		</tr>
	</table>
</div>

</body>

</html>
