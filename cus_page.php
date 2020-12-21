<!DOCTYPE html>
<html lang="he" dir="rtl">

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
<title>Customer page</title>
<link rel="stylesheet" type="text/css" href="template_02.css" media="all">
<script>
function mysubmit() 
{
  var x = document.getElementById("selectreport").selectedIndex; 
  var y = document.getElementById("selectreport").options;
  var nid=y[x].id; //get the user's selection 
  document.getElementById("report").value=nid; //send the selection to hidden input because this page needed to be done with FORM.
	document.myform.submit();
		
				
}


</script>
</head>
<form name="myform" action="showcusreports.php" method="post">
<input id="report" name="report" type="hidden">

<body class="get_block" id="background" >


<div>
  <?php include("header.php"); ?>
	<br>	
		<table  style="width: 100%">
			<tr  >
				<td id="menuactive" style="width: 200px" valign="top">
					<table style="width:200px">
						<tr>
							<td class="hello">שלום <?php echo $name?></td>
						</tr>
						<tr>
							<td onclick="location.href='cus_page.php'" class="selected">
							דף צרכן</td>
						</tr>

						<tr>
							<td onclick="location.href='introduction.php'" class="gategory">
							היכרות</td>
						</tr>
						<tr>
							<td onclick="location.href='cus_items.php'" class="gategory">
							הזמנה</td>
						</tr>
						<tr>
							<td onclick="location.href='reports.php'" class="gategory">
							דוחות</td>
						</tr>

					</table>
				</td>
				<td style="width:20%"></td>
				<td id="data">
<table id="dat1">

<td>
<table style="width: 80%" class="order">
	<tr >
		<td style="width: 35%" id="get_block_id">בחר דוח שברצונך להציג</td>
		<td style="width: 25%" id="get_block_id"> 
		 <select id="selectreport" id="get_block_id">
    		<option id=0>הצגת כמות הלקוחות המערכת</option>
    		<option id=1>הצגת כמות הספקים במערכת</option>
    		<option id=2>כמות השיחות הפעילות במערכת</option>
     	 </select></td>
		<td id="get_block_id" class="bottuns_dat1" style="width:20%; height:15%" onclick="mysubmit()">
		דוח הצג</td>
		<td style="width: 15%; height:25%">	 &nbsp;</td>
	</tr>
</table>

</td>
	</table>
</td>
	
<?php include("footer.php"); ?>	
		</tr>
		</table>
</div>

</body>
</form>

</html>
