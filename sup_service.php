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
<title>sup service</title>
<link href="template_02.css" media="all" rel="stylesheet" type="text/css">
<script>  
t1 = 0;
t2 = 0;

function open_talk(userid)  
{
uid=userid;
id='<?php echo $_SESSION['id'] ?>';
	t1 = window.open("chat.php?t1=s_"+id+"&t2=u_"+uid+"","T1","width=350px; height=500px;");
	openWin3(uid);
	}
	
	
	function openWin3(val) {
    myWindow = window.open("order.php?val="+val, "myWindow", "width=700, top=200,resizable=yes,left=500 ,height=250");
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

<?php include("header.php"); ?><br>
<table style="width: 100%">
	<tr>
		<td id="menuactive" style="width: 200px" valign="top">
		<table style="width: 200px">
			<tr>
				<td class="hello">שלום <?php echo $name?></td>
			</tr>
			<tr>
				<td class="selected" onclick="location.href='sup_service.php'">שירות</td>
			</tr>
			<tr>
				<td class="gategory" onclick="location.href='sup_updates.php'">עדכונים</td>
			</tr>
			<tr>
				<td class="gategory" onclick="location.href='sup_reports.php'">דוחות</td>
			</tr>
			<tr>
				<td class="gategory" onclick="location.href='managerpage.php'">עבור 
				לדף מנהל מערכת</td>
			</tr>
		</table>
		</td>
		<td style="width: 20%"></td>
		<td id="data">
		<table id="dat1">
			<tr>
				<td style="height: 15%"></td>
				<td id="php_data" rowspan="3">&nbsp;</td>
			</tr>
			<tr>
				<td class="bottuns_dat1" onclick="GetData('php_data','ajax_sup.php')" style="width: 40%; height: 15%">
				לחץ כאן על מנת לצפות בכל השיחות שלך </td>
			</tr>
			<tr>
				<td style="height: 15%"></td>
			</tr>
		</table>
		</td>
		<?php include("footer.php");?>
	</tr>
</table>

</body>

</html>
