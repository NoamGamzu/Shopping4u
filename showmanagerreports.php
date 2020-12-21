<?php
	session_start();
	include "inc_db.php";	
	$report=$_REQUEST['report'];
		if (isset($_SESSION['login'])) {			
			$login= $_SESSION['login'];
			$id=$_SESSION['id'];
			$name= $_SESSION['name'];


}
?>
<!DOCTYPE html>
<html lang="he" dir="rtl">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>manager_report_with_tables</title>
<link rel="stylesheet" type="text/css" href="template_02.css" media="all">

</head>

<body id="background">


 
<?php
	include "inc_db.php";
?>
<script> 
</script>
<div>
 
	 <?php include("header.php"); ?>
	<br>	
		<table style="width: 100%">
			<tr>
				<td id="menuactive" style="width: 200px" valign="top">
					<table style="width:200px">
						<tr>
							<td class="hello">שלום <?php echo $name?></td>
						</tr>
						<tr>
							<td onclick="location.href='manager_reports.php'" class="selected">דוחות והצגת צרכני המערכת</td>
						</tr>
						<tr>
							<td onclick="location.href='manager_updates.php'" class="gategory">עדכון פרטי החנות</td>
						</tr>
							<tr>
							<td onclick="location.href='sup_page.php'" class="gategory">עבור לדף ספק</td>
						</tr>				

					</table>
				</td>
				<td style="width:20%"></td>
				<td id="data">
<table id="dat1">
		<tr>	<td  style="height:5%; text-align: center;">הצגת הדוח:</td></tr>
		<tr>
				<td class="bottuns_dat1" style="width: 60%; height:6%" onclick="location.href='manager_reports.php'">חזור להצגת דוחות נוספים</td>		
		</tr>

<tr>
<td>
<?php

if($report==0)//show all the users
 {
	$query = 'select * from user';

	if (!$result = $conn->query($query)) exit;

	if ($result->num_rows == 0) echo "No records found!";
	else { // no records found
?>
		<table border="1" style="width: 60%; border-collapse: collapse;" align="center">
		<tr>
			<th>שם</th>
			<th>כתובת</th>
			<th>עיר</th>
			<th>טלפון</th>
		</tr>
	<?php
			while ($row = $result->fetch_array(MYSQLI_ASSOC)) {	
			
				$tid=$row['town'];
						$query1 ="SELECT * FROM `town` WHERE `t_id`=$tid";
						$result1 = $conn->query($query1);
						$row1 = $result1->fetch_array(MYSQLI_ASSOC);
						$cityname=$row1['t_city'];

		
				   echo "<tr>".
				   		"<td>".$row['name']."</td>".
						"<td>".$row['address']."</td>".
						"<td>".$cityname."</td>".
						"<td>".$row['phone']."</td></tr>";	
			
			}			
		}	
		$result->free();
		$conn->close();
	}
		if($report==1)//show all customers in the system orderby dt
		 {
			$query = 'SELECT * FROM `user` ORDER BY `dt` DESC';		 
	if (!$result = $conn->query($query)) exit;

	if ($result->num_rows == 0) echo "No records found!";
	else {
?>
		<table border="1" style="width: 60%; border-collapse: collapse;" align="center">
		<tr>
			<th>שם</th>
			<th>תאריך התחברות</th>
		</tr>
	<?php
			while ($row = $result->fetch_array(MYSQLI_ASSOC)) {	
					   echo "<tr>".
				   		"<td>".$row['name']."</td>".
						"<td>".$row['dt']."</td></tr>";	
			
			}			
		}	
		$result->free();
		$conn->close();
		}
		if($report==2)//show all suppliers in the DB order by dt
		 {
		 

			$query ="SELECT * FROM `user` ORDER BY `dt` DESC";	 
				if (!$result = $conn->query($query)) exit;

				if ($result->num_rows == 0) echo "No records found!";
				else {
?>
				<table border="1" style="width: 60%; border-collapse: collapse;" align="center">
				<tr>
				<th>שם</th>
				<th>תאריך התחברות</th>
			</tr>
		<?php
				while ($row = $result->fetch_array(MYSQLI_ASSOC)) {	
				$query1 = "SELECT * FROM `supplier`";
				$result1 = $conn->query($query1);
				while ($row1 = $result1->fetch_array(MYSQLI_ASSOC)) {
				$sid=$row1['u_id'];
				if($sid==$row['id']) {
						   echo "<tr>".
					   		"<td>".$row['name']."</td>".
							"<td>".$row['dt']."</td></tr>";	
					}
				}
			}			
		}	
		$result->free();
		$conn->close();

		}
				if($report==3)//show all suppliers sales order by dt
		 {
		 
		 					$query ="SELECT * FROM `user` ORDER BY `dt` DESC";	 
				if (!$result = $conn->query($query)) exit;

				if ($result->num_rows == 0) echo "אין צרכנים במערכת";
				else {
?>
				<table border="1" style="width: 60%; border-collapse: collapse;" align="center">
				<tr>
				<th>שם הספק</th>
				<th>סה"כ רווח ממוצרים</th>
			</tr>
		<?php
				while ($row = $result->fetch_array(MYSQLI_ASSOC)) {	
				$query1 = "SELECT * FROM `supplier`";
				$result1 = $conn->query($query1);
				while ($row1 = $result1->fetch_array(MYSQLI_ASSOC)) {
				$sid=$row1['s_id'];
				$totalsales=0;
				$query2 = "select * from `log` WHERE `l_s_id`=$sid";
				if (!$result2 = $conn->query($query2)) exit;	
    			 while ($row2 = $result2->fetch_array(MYSQLI_ASSOC)) {
   					 $totalsales+=$row2['l_price'];
		}

				if($sid==$row['id']) {
						   echo "<tr>".
					   		"<td>".$row['name']."</td>".
							"<td>".$totalsales."</td></tr>";	
					}
				}
			}			
		}



 
				
			$query ="SELECT * FROM `log` ORDER BY `l_dt` DESC";	 
				if (!$result = $conn->query($query)) exit;

				if ($result->num_rows == 0) echo "אין מכירות במערכת";
				else {
?>
				<table border="1" style=" overflow-y:auto; width: 80%; height:30%; border-collapse: collapse;" align="center"  >
				<tr>
				<th>שם ספק</th>
				<th>שם לקוח</th>
				<th>מוצר שנקנה</th>
				<th>מחיר המכירה</th>
				<th>תאריך המכירה</th>
			</tr>
		<?php
				while ($row = $result->fetch_array(MYSQLI_ASSOC)) {	
					$supid=$row['l_s_id'];
					$cusid=$row['l_u_id'];
					$productid=$row['l_p_id'];
					$query1 ="SELECT * FROM `user` WHERE `id`=$supid";
					$result1 = $conn->query($query1);
					$row1 = $result1->fetch_array(MYSQLI_ASSOC);
					$supname=$row1['name'];
					$query2 ="SELECT * FROM `user` WHERE `id`=$cusid";
					$result2 = $conn->query($query2);
					$row2 = $result2->fetch_array(MYSQLI_ASSOC);
					$cusname=$row2['name'];
					$query3 ="SELECT * FROM `product` WHERE `p_id`=$productid";
					$result3 = $conn->query($query3);
					$row3 = $result3->fetch_array(MYSQLI_ASSOC);
					$productname=$row3['p_description'];


						  echo "<tr>".
					   		"<td>".$supname."</td>".
							"<td>".$cusname."</td>".
							"<td>".$productname."</td>".
							"<td>".$row['l_price']."</td>".
							"<td>".$row['l_dt']."</td></tr>";	
					
				
			}			
		}	
		$result->free();
		$conn->close();

		}
		
		if($report==4)//show all customers purchases order by dt
		 {
		 
		 					$query ="SELECT * FROM `user` ORDER BY `dt` DESC";	 
				if (!$result = $conn->query($query)) exit;

				if ($result->num_rows == 0) echo "אין לקוחות במערכת!";
				else {
?>
				<table border="1" style="width: 60%; border-collapse: collapse;" align="center">
				<tr>
				<th>שם הלקוח</th>
				<th>סה"כ הוצאות על קניות</th>
			</tr>
		<?php
				while ($row = $result->fetch_array(MYSQLI_ASSOC)) {	
				$cid=$row['id'];
				$totalsales=0;
				$query2 = "select * from `log` WHERE `l_u_id`=$cid";
				if (!$result2 = $conn->query($query2)) exit;	
    			 while ($row2 = $result2->fetch_array(MYSQLI_ASSOC)) {
   					 $totalsales+=$row2['l_price'];
		}
						   echo "<tr>".
					   		"<td>".$row['name']."</td>".
							"<td>".$totalsales."</td></tr>";	
				
			}			
		}



 
				
			$query ="SELECT * FROM `log` ORDER BY `l_dt` DESC";	 
				if (!$result = $conn->query($query)) exit;

				if ($result->num_rows == 0) echo "אין מכירות במערכת";
				else {
?>
				<table border="1" style=" overflow-y:auto; width: 80%; height:30%; border-collapse: collapse;" align="center"  >
				<tr>
				<th>שם לקוח</th>
				<th>שם ספק</th>
				<th>מוצר שנקנה</th>
				<th>מחיר המכירה</th>
				<th>תאריך המכירה</th>
			</tr>
		<?php
				while ($row = $result->fetch_array(MYSQLI_ASSOC)) {	
					$supid=$row['l_s_id'];
					$cusid=$row['l_u_id'];
					$productid=$row['l_p_id'];
					$query1 ="SELECT * FROM `user` WHERE `id`=$supid";
					$result1 = $conn->query($query1);
					$row1 = $result1->fetch_array(MYSQLI_ASSOC);
					$supname=$row1['name'];
					$query2 ="SELECT * FROM `user` WHERE `id`=$cusid";
					$result2 = $conn->query($query2);
					$row2 = $result2->fetch_array(MYSQLI_ASSOC);
					$cusname=$row2['name'];
					$query3 ="SELECT * FROM `product` WHERE `p_id`=$productid";
					$result3 = $conn->query($query3);
					$row3 = $result3->fetch_array(MYSQLI_ASSOC);
					$productname=$row3['p_description'];


						  echo "<tr>".
					   		"<td>".$cusname."</td>".
							"<td>".$supname."</td>".
							"<td>".$productname."</td>".
							"<td>".$row['l_price']."</td>".
							"<td>".$row['l_dt']."</td></tr>";	
					
				
			}			
		}	
		$result->free();
		$conn->close();

		}



		
		
	?>
		</table>
		</table>
		</table>
		</table>
		</table>
		</table>
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

