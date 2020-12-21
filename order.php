<?php
	$val = "";
	if (isset($_REQUEST['val'])) $val = $_REQUEST['val'];
	

	session_start();			
	$login= $_SESSION['login'];
	$id=$_SESSION['id'];
	$town=$_SESSION['town'];


	include "inc_db.php";
?>
<html dir="rtl" lang="he">

<head>
<link href="template_02.css" media="all" rel="stylesheet" type="text/css">
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>new order</title>
<script>
var items=[];
var restart_arr=[];
var items_int=[];
var str=" ";
var sum=0;
var cnt=1

function restart_order() {
document.getElementById("orderdetails").innerHTML=" ";
items=restart_arr;
str=" ";
sum= 0;
document.getElementById("totalprice").innerHTML=" ";
cnt=1;
}
function add_items() {
  var x = document.getElementById("selectprod").selectedIndex;
  var y = document.getElementById("selectprod").options;
  var cost=document.getElementById("selectprod").value;
  var res=cost.replace(/[^\d.-]/g, ''); //remove the ' ' from the string to parsefloat
  cost_float = parseFloat(res);
  cost_fixed = cost_float.toFixed(3);
  sum+=cost_float;
  sum_rnd=sum.toFixed(2);
  document.getElementById("totalprice").innerHTML=sum_rnd;
  str+=cnt + ".";
  str+=y[x].text+" <br>";
  cnt+=1;
 
  items.push(y[x].id); 
  document.getElementById("orderdetails").innerHTML=str; //add item to the list
  
}
function additemstodb(){ //remove the '' from the item id for  parseINT .
if (items.length==0) {
alert("אין מוצרים בסל הקניות.");

return
}
for ( i=0 ; i<items.length ; i++ ) {
var res=items[i].replace(/[^\d.-]/g, ''); //remove the ' ' from the string
itemid = parseInt(res);
items_int[i]=itemid; //parseint the item_id.


}
document.getElementById("itemid").value = items_int ;
document.getElementById("supid").value ='<?php echo $_SESSION['id']?>';
document.getElementById("cusid").value ='<?php echo $val?>';
formupadte.submit();
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

<body>

<form action="updatelog.php" method="post" name="formupadte">
	<script>
GetData('php_data1','ajax_product.php');
</script>
	<table class="order" style="width: 100%; text-align : right">
		<tr>
			<td style="width: 20%; height: 22px;">מספר לקוח</td>
			<td style="width: 5%; height: 22px;"><?php echo $val ?></td>
			<td colspan="2" style="width: 55%; height: 22px;">בחירת פריט</td>
			<td class="nhidden_btn" onclick="restart_order()" style="width: 20%; height: 22px;">
			איפוס הזמנה</td>
		</tr>
		<tr>
			<td style="height: 22px">פריט להזמנה</td>
			<td style="height: 22px"></td>
			<td id="php_data1" colspan="2" style="height: 22px"></td>
			<td class="nhidden_btn" onclick="add_items()">הוסף פריט להזמנה</td>
		</tr>
		<tr>
			<td></td>
			<td>&nbsp;</td>
			<td colspan="2">&nbsp;</td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td>&nbsp;</td>
			<td style="width: 50%">&nbsp;</td>
			<td style="width: 50%"><span lang="en-us">סה"כ עלות:</span></td>
			<td id="totalprice"></td>
		</tr>
		<tr>
			<td></td>
			<td>&nbsp;</td>
			<td id="orderdetails" colspan="2" rowspan="2">&nbsp;</td>
			<td></td>
		</tr>
		<tr>
			<td><span lang="en-us">פרטי הזמנה:</span></td>
			<td>&nbsp;</td>
			<td id="5thitembtn" class="bottuns_dat1" onclick="additemstodb()">אשר 
			הזמנה</td>
		</tr>
	</table>
	<input id="cusid" name="cusid" type="hidden">
	<input id="supid" name="supid" type="hidden">
	<input id="itemid" name="itemid" type="hidden">
</form>

</body>

</html>
