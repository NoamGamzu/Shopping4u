<!DOCTYPE html>
<html dir="rtl" lang="he">

<?php
	session_start();
	if (isset($_SESSION['login'])) {			
	$login= $_SESSION['login'];
	$id=$_SESSION['id'];
	$name=$_SESSION['name'];

}
?>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>manager_page</title>
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
					<td class="gategory" onclick="location.href='manager_reports.php'">
					דוחות והצגת צרכני המערכת</td>
				</tr>
				<tr>
					<td class="gategory" onclick="location.href='manager_updates.php'">
					עדכון פרטי החנות</td>
				</tr>
				<tr>
					<td class="gategory" onclick="location.href='sup_page.php'">
					עבור לדף ספק</td>
				</tr>
			</table>
			</td>
			<td style="width: 20%"></td>
			<td id="data">
			<table id="dat1">
				<tr>
					<td>
					<table align="center" style="border-radius: inherit; border-style: solid; border-width: 5px; width: 50%">
						<tr>
							<td>
							<h2>ברוך הבא לדף מנהל מערכת</h2>
							</td>
						</tr>
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
