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
<title>customer search</title>
<link href="template_02.css" media="all" rel="stylesheet" type="text/css">
</head>

<body id="background">

<div class="get_block">
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
					<td style="width: 33%"></td>
					<td style="height: 33px">
					<h2>דף זה ייבנה בהמשך ויכלול בתוכו צאט עם ספק</h2>
					</td>
					<td style="width: 33%"></td>
				</tr>
				<tr>
					<td style="width: 33%"></td>
					<td class="bottuns_dat1" onclick="document.location.href='no_active_chat_with_sup.php' " style="height: 5%; width: 33%;">
					לחץ כאן על מנת להגיע לצאט עם ספק</td>
					<td style="width: 33%"></td>
				</tr>
				<tr style="width: 30%">
				</tr>
			</table>
			</td>
			<?php include("footer.php");?>
		</tr>
	</table>
</div>

</body>

</html>
