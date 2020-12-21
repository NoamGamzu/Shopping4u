<!DOCTYPE html>
<html dir="rtl" lang="he">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>Login_supplier</title>
<link href="template_02.css" media="all" rel="stylesheet" type="text/css">
<script>
var today = new Date();
function mysubmit() 
{
var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
document.getElementById("datetime").value =date+' '+time;
document.myform.submit();		
				
}



</script>
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
				<form action="checksup.php" method="post" name="myform">
					<tr>
						<td>
						<table align="center" cellpadding="10" cellspacing="10" class="register_info">
							<tr>
								<td id="register_wel" colspan="3">ברוכים השבים!</td>
							</tr>
							<tr>
								<td>שם משתמש</td>
								<td style="width: 20px">&nbsp;</td>
								<td><input name="login" required="" type="text"></td>
							</tr>
							<tr>
								<td>סיסמא</td>
								<td style="width: 20px">&nbsp;</td>
								<td>
								<input name="password" required="" type="password"></td>
							</tr>
							<tr>
								<td colspan="3" style="text-align: left">
								<input name="Submit1" onclick="mysubmit()" type="button" value="התחבר" />
								</td>
							</tr>
						</table>
						</td>
						<input id="datetime" name="dt" type="hidden">
					</tr>
				</form>
			</table>
			</td>
			<?php include("footer.php");?>
		</tr>
	</table>
</div>

</body>

</html>
