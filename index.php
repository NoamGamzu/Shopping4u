<!DOCTYPE html>
<html dir="rtl" lang="he">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>Home_Page</title>
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
					<td style="width: 2%">&nbsp;</td>
					<td class="bottuns_dat1" onclick="location.href='login_manager.php'" style="width: 10%">
					כניסה למנהל מערכת</td>
					<td class="dat1_login" colspan="3">ברוכים הבאים!</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td style="height: 22px;">&nbsp;</td>
					<td style="height: 22px;"></td>
					<td class="dat1_login" colspan="3" style="height: 22px">הכנס 
					לחשבון כדי שנוכל להתחיל</td>
					<td style="height: 22px"></td>
				</tr>
				<tr>
					<td style="height: 22px">&nbsp;</td>
					<td style="height: 22px"></td>
					<td class="dat1_profile" style="height: 22px">צרכן</td>
					<td style="width: 30px; height: 22px"></td>
					<td class="dat1_profile" style="height: 22px">ספק</td>
					<td style="width: 10%; height: 22px"></td>
				</tr>
				<tr>
					<td style="height: 10px;">&nbsp;</td>
					<td style="height: 10px;">&nbsp;</td>
					<td class="bottuns_dat1" onclick="location.href='login_cus.php'">
					התחברות לחשבון</td>
					<td>&nbsp;</td>
					<td class="bottuns_dat1" onclick="location.href='login_sup.php'">
					התחברות לחשבון</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td class="dat1_login" colspan="3">עוד לא נרשמת? הירשם עכשיו!</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td class="bottuns_dat1" onclick="location.href='noactivepage.php'">
					הירשם כצרכן</td>
					<td>&nbsp;</td>
					<td class="bottuns_dat1" onclick="location.href='noactivepage.php'">
					הירשם כספק</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td></td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
			</table>
			</td>
		</tr>
	</table>
</div>
<?php include("footer.php");?>

</body>

</html>
