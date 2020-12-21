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
<title>customer_introduction</title>
<link href="template_02.css" media="all" rel="stylesheet" type="text/css">
<script>  
t1 = 0;
t2 = 0;

function open_talk(userid)  
{
uid=userid;
id='<?php echo $_SESSION['id'] ?>';
	t1 = window.open("chat.php?t1=u_"+uid+"&t2=u_"+id+"","T1","width=350px; height=500px;");
	}

function close_talk()
{
	if (t1) t1.close();
	if (t2) t2.close();
}





function GetData(divn,url) 
{
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById(divn).innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", url, true);
  xhttp.send();
}
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
					<td class="gategory" onclick="location.href='cus_page.php'">
					דף צרכן</td>
				</tr>
				<tr>
					<td class="selected" onclick="location.href='introduction.php'">
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
			<table id="dat1" valign="top">
				<tr>
					<td style="height: 15%"></td>
					<td id="php_data" rowspan="3">&nbsp;</td>
				</tr>
				<tr>
					<td class="bottuns_dat1" onclick="GetData('php_data','ajax_param.php')" style="width: 40%; height: 15%">
					לחץ כאן על מנת להכיר צרכנים מהמערכת הגרים בקרבתך או קונים מוצרים 
					דומים לשלך!</td>
				</tr>
				<tr>
					<td style="height: 15%"></td>
				</tr>
			</table>
			</td>
			<?php include("footer.php");?>
		</tr>
	</table>
</div>

</body>

</html>
