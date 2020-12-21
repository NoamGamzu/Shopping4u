<!DOCTYPE html>
<html dir="rtl" lang="he">

<?php
	session_start();
	if (isset($_SESSION['login'])) {			
	$login= $_SESSION['login'];
	$id=$_SESSION['id'];
	$name1=$_SESSION['name'];

}
?>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>manager_updates</title>
<link href="template_02.css" media="all" rel="stylesheet" type="text/css">
</head>

<body id="background">

<?php
	include "inc_db.php";
	$temp=0;
	$query = "select * from `shop` WHERE `s_id`=$id" ;
	$result = $conn->query($query);
    $row = $result->fetch_array(MYSQLI_ASSOC); 
    $name=$row['s_name'];
    $phone=$row['s_phone'];
    $adress=$row['s_location'];
    $cityid=$row['s_town_id'];
    $query ="SELECT * FROM `town` WHERE `t_id`=$cityid";
	$result = $conn->query($query);
	$row1 = $result->fetch_array(MYSQLI_ASSOC);
	$cityname=$row1['t_city'];
?>
<script> 
function setdetails() {
document.getElementById('name').defaultValue="<?php echo $name ?>";
document.getElementById('phone').defaultValue="<?php echo $phone ?>";
document.getElementById('adress').defaultValue="<?php echo $adress?>";
}
function delshop() {

if (confirm("האם אתה בטוח שברצונך למחוק את החנות וכל מוצריה?")) {
document.getElementById('delshop').value=1;
document.myform.submit();
	}
}


function mysubmit() 
{
  var x = document.getElementById("selecttown").selectedIndex;
  var y = document.getElementById("selecttown").options;
  var nid=y[x].id; 
  var res=nid.replace(/[^\d.-]/g, ''); //remove the ' ' from the string
  newcityid = parseInt(res); 
  document.getElementById("newcity").value=newcityid;
   while (document.getElementById("phone").value.includes("-")==false)
    {
	alert("מספר הטלפון חייב להכיל ' - ' לדוגמא 054-1234567 או 03-1234567 ");
	document.getElementById("phone").value = prompt("בבקשה רשום את מספר טלפון לפי הפורמט המבוקש.","");
	}
document.myform.submit();
					
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
					<td class="hello">שלום <?php echo $name1?></td>
				</tr>
				<tr>
					<td class="gategory" onclick="location.href='manager_reports.php'">
					דוחות והצגת צרכני המערכת</td>
				</tr>
				<tr>
					<td class="selected" onclick="location.href='manager_updates.php'">
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
				<form action="managerdetailsupdate.php" method="post" name="myform">
					<input id="newcity" name="newcity" type="hidden">
					<input id="delshop" name="delshop" type="hidden">
					<tr>
						<td>
						<table align="center" cellpadding="10" cellspacing="10" class="register_info">
							<tr class="get_block">
								<td id="register_wel" colspan="3" rowspan="2">עדכון 
								פרטי החנות</td>
								<td class="bottuns_dat1" onclick="delshop()" style="height: 40%; font-size: 13px">
								מחק חנות</td>
							</tr>
							<tr>
								<td style="height: 70%">&nbsp;</td>
							</tr>
							<tr>
								<td class="get_block">שם החנות</td>
								<td class="get_block" style="width: 20px">&nbsp;</td>
								<td class="get_block">
								<input id="name" name="name" type="text" /></td>
							</tr>
							<tr>
								<td class="get_block">עיר החנות</td>
								<td class="get_block"></td>
								<td id="php_data1" class="get_block"></td>
							</tr>
							<tr>
								<td class="get_block">כתובת חנות</td>
								<td class="get_block"></td>
								<td class="get_block">
								<input id="adress" name="adress" type="text" /></td>
							</tr>
							<tr>
								<td class="get_block">טלפון החנות</td>
								<td class="get_block" style="width: 20px">&nbsp;</td>
								<td class="get_block">
								<input id="phone" name="phone" type="text" /></td>
							</tr>
							<tr>
								<td colspan="3" style="text-align: left">
								<input name="Submit1" onclick="mysubmit() " type="button" value="עדכן">
								</td>
							</tr>
						</table>
						<?php  $conn->close();  ?></td>
					</tr>
				</form>
				<script> setdetails(),GetData('php_data1','ajax_town.php'); </script>
			</table>
			</td>
			<?php include("footer.php");?>
		</tr>
	</table>
</div>

</body>

</html>
