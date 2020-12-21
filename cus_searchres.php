<!DOCTYPE html>
<html dir="rtl" lang="he">

<?php
	session_start();
	if (isset($_SESSION['login'])) {			
	$login= $_SESSION['login'];
	$name=$_SESSION['name'];

}
?>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>searchres</title>
<link href="template_02.css" media="all" rel="stylesheet" type="text/css">
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
					<td class="gategory" onclick="location.href='cus_page.php'">
					דף צרכן</td>
				</tr>
				<tr>
					<td class="gategory" onclick="location.href='introduction.php'">
					היכרות</td>
				</tr>
				<tr>
					<td class="selected" onclick="location.href='cus_items.php'">
					הזמנה</td>
				</tr>
				<tr>
					<td class="gategory" onclick="location.href='reports.php'">דוחות</td>
				</tr>
			</table>
			</td>
			<td style="width: 20%"></td>
			<td id="data">
			<table id="dat1" valign="top">
				<tr>
					<td>
					<h3 style="text-align: right">רשימת תוצאות: יעודכן בהמשך
					</h3>
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
