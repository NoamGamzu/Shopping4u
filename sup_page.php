<!DOCTYPE html>
<html dir="rtl" lang="he">

<?php
	session_start();
	if (isset($_SESSION['login'])) {			
		$login= $_SESSION['login'];
		$id=$_SESSION['id'];
		$name= $_SESSION['name'];
	
}
?>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>sup_page</title>
<link href="template_02.css" media="all" rel="stylesheet" type="text/css">
<?php
	include "inc_db.php";
	$temp=0;
	$query = "select * from `log` WHERE `l_s_id`=$id" ;
	if (!$result = $conn->query($query)) exit;	
     while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
    $temp+=$row['l_price'];
}
		
	 
	$query = "select *,count(*)  from `chat`  where t1='s_$id' group by t1,t2";
	$cntchats=0;
	if (!$result = $conn->query($query)) exit;
	else {
		while ($row = $result->fetch_array(MYSQLI_ASSOC)) {		
		if($row['count(*)'] == 1 ) {
		$cntchats+=1;
			}
		}
			
	}
?>
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
					<td class="gategory" onclick="location.href='sup_service.php'">
					שירות</td>
				</tr>
				<tr>
					<td class="gategory" onclick="location.href='sup_updates.php'">
					עדכונים</td>
				</tr>
				<tr>
					<td class="gategory" onclick="location.href='sup_reports.php'">
					דוחות</td>
				</tr>
				<tr>
					<td class="gategory" onclick="location.href='managerpage.php'">
					עבור לדף מנהל מערכת</td>
				</tr>
			</table>
			</td>
			<td style="width: 20%"></td>
			<td id="data">
			<table id="dat1">
				<tr>
					<td>
					<table align="center" style="border-radius: inherit; border-style: solid; border-width: 5px; width: 38%">
						<tr>
							<td style="text-align: right; height: 23px; width: 70%;">
							סך עלות המכירות: </td>
							<td id="cnt" style="width: 35%; text-align: right; height: 23px;">
							<?php  echo $temp?></td>
						</tr>
						<tr>
							<td style="text-align: right; height: 23px;">שיחות חדשות:
							</td>
							<td style="width: 35%; text-align: right; height: 23px;">
							<?php  echo $cntchats?></td>
						</tr>
						<?php $conn->close(); ?>
					</table>
					</td>
				</tr>
			</table>
			</td>
			<?php include("footer.php");?>
		</tr>
	</table>
</div>

</body>

</html>
