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
<title>manager_reports</title>
<link href="template_02.css" media="all" rel="stylesheet" type="text/css">
</head>

<body id="background">

<?php
	include "inc_db.php";
?>
<script> 

function mysubmit() 
{//get the report value for normal reports
  var x = document.getElementById("selectreport").selectedIndex;
  var y = document.getElementById("selectreport").options;
  var nid=y[x].id;
  document.getElementById("report").value=nid;
	document.myform.submit();
		
				
}
function mysubmit2() 
{//get the report value for google chart reports
  var x = document.getElementById("selectreport").selectedIndex;
  var y = document.getElementById("selectreport").options;
  var nid=y[x].id;
  document.getElementById("report2").value=nid;
	document.myform2.submit();
		
				
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
					<td class="selected" onclick="location.href='manager_reports.php'">
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
				<form action="showmanagerreports.php" method="post" name="myform">
					<input id="report" name="report" type="hidden">
				</form>
				<form action="showmanagerreports_sort.php" method="post" name="myform2">
					<input id="report2" name="report2" type="hidden">
				</form>
				<tr>
					<td><?php  $conn->close();  ?>
					<table class="order" style="width: 80%">
						<tr class="get_block">
							<td class="get_block" style="width: 35%">בחר דוח שברצונך 
							להציג</td>
							<td class="get_block" style="width: 25%">
							<select id="selectreport" class="get_block">
							<option id="0">הצגת לקוחות המערכת</option>
							<option id="1">דוח כניסת צרכנים</option>
							<option id="2">דוח כניסת ספקים</option>
							<option id="3">דוח מכירות לפי ספק</option>
							<option id="4">קניות על פי צרכן</option>
							</select> </td>
							<td class="bottuns_dat1" onclick="mysubmit2()" style="width: 15%; height: 15%">
							הצג דוח "המאפשר מיון"</td>
							<td style="width: 15%; height: 25%">&nbsp;</td>
						</tr>
						<tr class="get_block">
							<td class="get_block" style="width: 35%">&nbsp;</td>
							<td class="get_block" style="width: 25%">&nbsp;</td>
							<td class="bottuns_dat1" onclick="mysubmit()" style="width: 15%; height: 15%">
							הצג דוח רגיל</td>
							<td style="width: 15%; height: 25%">&nbsp;</td>
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
