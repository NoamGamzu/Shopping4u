<!DOCTYPE html>
<html dir="rtl" lang="he">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>not_active_page</title>
<link href="template_02.css" media="all" rel="stylesheet" type="text/css">
</head>

<body id="background">

<div>
	<?php include("header_without_login.php"); ?><br>
	<table style="width: 100%">
		<tr>
			<td id="menunactive">&nbsp;</td>
			<td style="width: 20%"></td>
			<td id="data">
			<table id="dat1">
				<tr>
					<td style="width: 33%"></td>
					<td style="height: 33px">
					<h2>דף זה ייבנה בהמשך</h2>
					</td>
					<td style="width: 33%"></td>
				</tr>
				<tr>
					<td style="width: 33%"></td>
					<td class="bottuns_dat1" onclick="document.location.href='index.php' " style="height: 5%; width: 33%;">
					חזור למסך הראשי</td>
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
