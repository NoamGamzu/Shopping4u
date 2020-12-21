<!DOCTYPE html>
<html dir="rtl" lang="he">

<?php
	session_start();
	if (isset($_SESSION['login'])) {			
	$login= $_SESSION['login'];
	$name= $_SESSION['name'];

}
?>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>report_include_google_chart</title>
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
					<td class="gategory" onclick="location.href='cus_page.php'" style="height: 28px">
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
					<td class="selected" onclick="location.href='reports.php'">דוחות</td>
				</tr>
			</table>
			</td>
			<td id="get_block_id" style="width: 20%"></td>
			<td id="data">
			<table id="dat1" valign="top">
				<tr>
					<td class="get_block">
					<iframe id="iframe1" height="500" name="iframe1" src="iframe1_clickable.php" width="350">
					</iframe>
					<iframe id="iframe2" height="500" name="iframe2" src="iframe2_show_reports.php" width="350">
					</iframe></td>
				</tr>
			</table>
			</td>
			<?php include("footer.php");?>
		</tr>
	</table>
</div>

</body>

</html>
