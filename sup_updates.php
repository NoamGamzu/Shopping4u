<!DOCTYPE html>
<html dir="rtl" lang="he">

<?php
	session_start();
	if (isset($_SESSION['login'])) {			
		$login= $_SESSION['login'];
		$id=$_SESSION['id'];
		$name= $_SESSION['name'];
		include "inc_db.php";
	}
	
	$query ="SELECT * FROM `shop` WHERE `s_id`=$id";
	$result = $conn->query($query);
	$row = $result->fetch_array(MYSQLI_ASSOC);
	$shop_name = $row['s_name'];
	$adress=$row['s_location'];
	$cityid=$row['s_town_id'];
	
	$query ="SELECT * FROM `user` WHERE `id`=$id";
	$result = $conn->query($query);
	$row = $result->fetch_array(MYSQLI_ASSOC);
	$supname = $row['name'];


	
	
	$query ="SELECT * FROM `town` WHERE `t_id`=$cityid";
	$result = $conn->query($query);
	$row = $result->fetch_array(MYSQLI_ASSOC);
	$cityname=$row['t_city'];



?>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>sup_update</title>
<link href="template_02.css" media="all" rel="stylesheet" type="text/css">
<script>
var item;
function getitemid(){
 var x = document.getElementById("selectprod").selectedIndex;
 var y = document.getElementById("selectprod").options;
 item=y[x].id

if(item.length==3) {
var res = item.slice(1,2);
}
else if (item.length==4) {
var res = item.slice(1,3);
}
else if (item.length==5) {
var res = item.slice(1,4);
}
itemid = parseInt(res);

}

function newprod(){ 
if (confirm("האם אתה בטוח שברצונך להוסיף מוצר חדש?")) {
	document.getElementById("newprodname").value = prompt("בבקשה רשום את שם המוצר החדש","");
	document.getElementById("newprodcategory").value = prompt("בבקשה רשום את מספר קטגוריית המוצר החדש(1 עבור מאפים,2 עבור מוצרי חלב,3 עבור נקניקים או 4 עבור ביצים)","");
	while (document.getElementById("newprodcategory").value<1 ||document.getElementById("newprodcategory").value>4 ) {
		alert("יש לבחור 1,2,3,4 בלבד.");
		document.getElementById("newprodcategory").value = prompt("בבקשה רשום את מספר קטגוריית המוצר החדש(1 עבור מאפים,2 עבור מוצרי חלב,3 עבור נקניקים או 4 עבור ביצים)","");
	}

	document.getElementById("newprodprice").value = prompt("בבקשה רשום את מחיר המוצר החדש","");
	
	while (document.getElementById("newprodprice").value<=0) {
		alert("מחיר המוצר חייב להיות גדול מ 0");
		document.getElementById("newprodprice").value = prompt("בבקשה רשום את מחיר המוצר החדש","");
		}
	document.getElementById("supid3").value ='<?php echo $_SESSION['id']?>';
	addnewproduct.submit();
	}

}
function updateprod(){
getitemid()
if (confirm("האם אתה בטוח שברצונך לשנות את מחיר המוצר?")) {
	document.getElementById("newprice").value = prompt("בבקשה רשום את המחיר החדש","");
	while (document.getElementById("newprice").value<=0) {
		alert("מחיר המוצר חייב להיות גדול מ 0");
		document.getElementById("newprice").value = prompt("בבקשה רשום את המחיר החדש","");
		}
	document.getElementById("itemid2").value = itemid;
	document.getElementById("supid2").value ='<?php echo $_SESSION['id']?>';
	updateform.submit();
	}


}

function delprod(){
if (confirm("האם אתה בטוח שברצונך למחוק את המוצר?")) {
	getitemid();
	document.getElementById("itemid").value = itemid;
	document.getElementById("supid").value ='<?php echo $_SESSION['id']?>';
	delform.submit();
}
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

<form action="delproduct.php" method="post" name="delform">
	<input id="supid" name="supid" type="hidden">
	<input id="itemid" name="itemid" type="hidden">
</form>
<form action="updateproduct.php" method="post" name="updateform">
	<input id="newprice" name="newprice" type="hidden">
	<input id="supid2" name="supid2" type="hidden">
	<input id="itemid2" name="itemid2" type="hidden">
</form>
<form action="newproduct.php" method="post" name="addnewproduct">
	<input id="newprodname" name="newprodname" type="hidden">
	<input id="supid3" name="supid3" type="hidden">
	<input id="newprodcategory" name="newprodcategory" type="hidden">
	<input id="newprodprice" name="newprodprice" type="hidden">
</form>
<script>
GetData('php_data1','ajax_product.php');
</script>
<?php include("header.php"); ?><br>
<table style="width: 100%">
	<tr>
		<td id="menuactive" style="width: 200px; height: 166px;" valign="top">
		<table style="width: 200px">
			<tr>
				<td class="hello">שלום <?php echo $name?></td>
			</tr>
			<tr>
				<td class="gategory" onclick="location.href='sup_service.php'">שירות</td>
			</tr>
			<tr>
				<td class="selected" onclick="location.href='sup_updates.php'">עדכונים</td>
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
		<td style="width: 20%;"></td>
		<td id="data">
		<table id="dat1" class="order">
			<tr>
				<td style="width: 3%; height: 5%">&nbsp;</td>
				<td style="width: 10%; text-align: right">שם הספק:</td>
				<td style="text-align: right"><?php  echo $supname."." ?></td>
			</tr>
			<tr class="order">
				<td style="width: 3%; height: 5%">&nbsp;</td>
				<td style="text-align: right">כתובת החנות:</td>
				<td style="text-align: right"><?php echo $adress.",".$cityname."."?>
				</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>מוצרי הספק:</td>
				<td id="php_data1">&nbsp;</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td colspan="2">
				<table style="width: 100%">
					<tr>
						<td>
						<table style="width: 100%">
							<tr>
								<td class="bottuns_dat1" onclick="newprod()" style="width: 33%; height: 6%;">
								הוספת מוצר חדש</td>
								<td class="bottuns_dat1" onclick="updateprod()" style="width: 33%; height: 6%;">
								עדכון מחיר המוצר </td>
								<td class="bottuns_dat1" onclick="delprod()" style="width: 33%; height: 6%;">
								מחיקת המוצר</td>
							</tr>
						</table>
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

</body>

</html>
