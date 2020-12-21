<?php
	session_start();
	include "inc_db.php";	
	$report=$_REQUEST['report2'];
		if (isset($_SESSION['login'])) {			
			$login= $_SESSION['login'];
			$id=$_SESSION['id'];
			$name= $_SESSION['name'];

}
?>
<!DOCTYPE html>
<html dir="rtl" lang="he">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>manager_reports_sort</title>
<link href="template_02.css" media="all" rel="stylesheet" type="text/css">
<?php
	
	$manager_report0 = array();
	$manager_report1 = array();
	$manager_report2 = array();
	$manager_report3_0 = array();
	$manager_report3_1 = array();
	$manager_report4_0 = array();
	$manager_report4_1 = array();
$query ="select * from user";	 
				if (!$result = $conn->query($query)) exit;

				if ($result->num_rows == 0) echo "אין לקוחות במערכת";
				else {
				while ($row = $result->fetch_array(MYSQLI_ASSOC)) {	
			
						$tid=$row['town'];
						$query1 ="SELECT * FROM `town` WHERE `t_id`=$tid";
						$result1 = $conn->query($query1);
						$row1 = $result1->fetch_array(MYSQLI_ASSOC);
						$cityname=$row1['t_city'];
					
					 $manager_report0[] = array($row['name'],$row['address'],$cityname,$row['phone']);
					
				}			
		}	
		
	//show all cus in the system by dt
		$query = 'SELECT * FROM `user` ORDER BY `dt` DESC';	 
				if (!$result = $conn->query($query)) exit;

				else {
				while ($row = $result->fetch_array(MYSQLI_ASSOC)) {						
					 $manager_report1[] = array($row['name'],$row['dt']);

				}			
		}	

//show all sup in the system by dt

			$query = 'SELECT * FROM `user` ORDER BY `dt` DESC';	 
			if (!$result = $conn->query($query)) exit;
			else {
				while ($row = $result->fetch_array(MYSQLI_ASSOC)) {						
				$query1 = "SELECT * FROM `supplier`";
				$result1 = $conn->query($query1);
				while ($row1 = $result1->fetch_array(MYSQLI_ASSOC)) {
				$sid=$row1['u_id'];
				if($sid==$row['id']) {
					$manager_report2[] = array($row['name'],$row['dt']);

			}			
		}	
	}
}
//show all sales by sup
		$query ="SELECT * FROM `user` ORDER BY `dt` DESC";	 
				if (!$result = $conn->query($query)) exit;


				else {
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
				
					 $manager_report3_0[] = array($row['name'],$totalsales);

				}			
			}
		}
	}	
	
	
			$query ="SELECT * FROM `log` ORDER BY `l_dt` DESC";	 
				if (!$result = $conn->query($query)) exit;

				else {
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
				
					 $manager_report3_1[] = array($supname,$cusname,$productname,$row['l_price'],$row['l_dt']);					
	}
		

}
//show all customers purchases by dt
$query ="SELECT * FROM `user` ORDER BY `dt` DESC";	 
	if (!$result = $conn->query($query)) exit;


	else {
				while ($row = $result->fetch_array(MYSQLI_ASSOC)) {		
				$cid=$row['id'];
				$totalsales=0;
				$query2 = "select * from `log` WHERE `l_u_id`=$cid";
				if (!$result2 = $conn->query($query2)) exit;	
    			 while ($row2 = $result2->fetch_array(MYSQLI_ASSOC)) {
   					 $totalsales+=$row2['l_price'];
		
	}
		
					 $manager_report4_0[] = array($row['name'],$totalsales);					
			}
		}	
	
		$query ="SELECT * FROM `log` ORDER BY `l_dt` DESC";	 
				if (!$result = $conn->query($query)) exit;

				else {
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
					 $manager_report4_1[] = array($cusname,$supname,$productname,$row['l_price'],$row['l_dt']);

							
			
	}
		

}
		$result->free();
		$conn->close();
			
	?><?php

if($report==0)//show all users
 { 
 ?>
<script src="https://www.gstatic.com/charts/loader.js" type="text/javascript"></script>
<script type="text/javascript">
      google.charts.load('current', {'packages':['table']});
      google.charts.setOnLoadCallback(drawTable);

      function drawTable() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'שם ');
        data.addColumn('string', 'כתובת');
        data.addColumn('string', 'עיר');
        data.addColumn('string', 'טלפון');

       
		   <?php
            for ($i=0; $i < count($manager_report0) ; $i++) { 
                echo "data.addRow(['".$manager_report0[$i][0]."','".$manager_report0[$i][1]."','".$manager_report0[$i][2]."','".$manager_report0[$i][3]."']);";
            }
        ?>



		 var table = new google.visualization.Table(document.getElementById('table_div0'));

        table.draw(data, {showRowNumber: true, width: '70%', height: '100%'});
      }
    </script>
<?php
}
	if($report==1)//show all customers in the DB order by dt
		 { 
 ?>
<script src="https://www.gstatic.com/charts/loader.js" type="text/javascript"></script>
<script type="text/javascript">
      google.charts.load('current', {'packages':['table']});
      google.charts.setOnLoadCallback(drawTable);

      function drawTable() {
        var data = new google.visualization.DataTable();
  	    data.addColumn('string', 'שם ');
        data.addColumn('string', 'תאריך התחברות');
		 <?php
            for ($i=0; $i < count($manager_report1) ; $i++) { 
                echo "data.addRow(['".$manager_report1[$i][0]."','".$manager_report1[$i][1]."']);";
            }
          ?>



		var table = new google.visualization.Table(document.getElementById('table_div1'));

        table.draw(data, {showRowNumber: true, width: '70%', height: '100%'});
      }
    </script>
<?php	
}
		if($report==2)//show all suppliers in the DB order by dt
 { 
 ?>
<script src="https://www.gstatic.com/charts/loader.js" type="text/javascript"></script>
<script type="text/javascript">
      google.charts.load('current', {'packages':['table']});
      google.charts.setOnLoadCallback(drawTable);

      function drawTable() {
     	var data = new google.visualization.DataTable();
     	data.addColumn('string', 'שם ');
        data.addColumn('string', 'תאריך התחברות');

       
		<?php
            for ($i=0; $i < count($manager_report2) ; $i++) { 
                echo "data.addRow(['".$manager_report2[$i][0]."','".$manager_report2[$i][1]."']);";
            }
        ?>
		var table = new google.visualization.Table(document.getElementById('table_div2'));

        table.draw(data, {showRowNumber: true, width: '80%', height: '100%'});
      }
    </script>
<?php
	
}
if($report==3)//show all suppliers sales order by dt
 { 

 ?>
<script src="https://www.gstatic.com/charts/loader.js" type="text/javascript"></script>
<script type="text/javascript">
      google.charts.load('current', {'packages':['table']});
      google.charts.setOnLoadCallback(drawTable);

      function drawTable() {
     var data1 = new google.visualization.DataTable();
     var data2 = new google.visualization.DataTable();
     data1.addColumn('string', 'שם הספק ');
     data1.addColumn('number', 'סה"כ רווח ממוצרים');

     data2.addColumn('string', 'שם הספק ');
     data2.addColumn('string', 'שם הלקוח');
     data2.addColumn('string', 'המוצר שנקנה ');
     data2.addColumn('number', 'מחיר המכירה');
     data2.addColumn('string', 'תאריך המכירה');
     <?php
           for ($i=0 ; $i < count($manager_report3_0) ; $i++) { 
               echo 'data1.addRow(["'.$manager_report3_0[$i][0].'",{v: '.$manager_report3_0[$i][1].'}]);';
            }
            for ($b=0 ; $b < count($manager_report3_1) ; $b++) { 
                echo 'data2.addRow(["'.$manager_report3_1[$b][0].'","'.$manager_report3_1[$b][1].'","'.$manager_report3_1[$b][2].'",{v: '.$manager_report3_1[$b][3].'},"'.$manager_report3_1[$b][4].'"]);';
            }

        ?>
		 var table1 = new google.visualization.Table(document.getElementById('table_div3_0'));
		 var table2 = new google.visualization.Table(document.getElementById('table_div3_1'));
      	 table1.draw(data1, {showRowNumber: true, width: '50%', height: '80%'});
     	 table2.draw(data2, {showRowNumber: true, width: '70%', height: '80%'});
      }
    
  </script>
<?php
}	
if($report==4)//show all customers purchase order by dt
{ 
 ?>
<script src="https://www.gstatic.com/charts/loader.js" type="text/javascript"></script>
<script type="text/javascript">
      google.charts.load('current', {'packages':['table']});
      google.charts.setOnLoadCallback(drawTable);

      function drawTable() {
    var data1 = new google.visualization.DataTable();
    var data2 = new google.visualization.DataTable();
     data1.addColumn('string', 'שם הלקוח ');
     data1.addColumn('number', 'סה"כ הוצאות על קניות');

     data2.addColumn('string', 'שם הלקוח');
     data2.addColumn('string', 'שם הספק');
     data2.addColumn('string', 'המוצר שנקנה ');
     data2.addColumn('number', 'מחיר המכירה');
     data2.addColumn('string', 'תאריך המכירה');
       
		   <?php
           for ($i=0 ; $i < count($manager_report4_0) ; $i++) { 
               echo 'data1.addRow(["'.$manager_report4_0[$i][0].'",{v: '.$manager_report4_0[$i][1].'}]);';
            }
            for ($b=0 ; $b < count($manager_report4_1) ; $b++) { 
                echo 'data2.addRow(["'.$manager_report4_1[$b][0].'","'.$manager_report4_1[$b][1].'","'.$manager_report4_1[$b][2].'",{v: '.$manager_report4_1[$b][3].'},"'.$manager_report4_1[$b][4].'"]);';
            }

        ?>
		 var table1 = new google.visualization.Table(document.getElementById('table_div4_0'));
		 var table2 = new google.visualization.Table(document.getElementById('table_div4_1'));
      	 table1.draw(data1, {showRowNumber: true, width: '50%', height: '80%'});
     	 table2.draw(data2, {showRowNumber: true, width: '70%', height: '80%'});
      }
    
  </script>
<?php
}		
	
	?>
</head>

<body id="background">

<?php include("header.php"); ?><br>
<table style="width: 100%">
	<tr>
		<td id="menuactive" valign="top">
		<table>
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
				<td class="gategory" onclick="location.href='sup_page.php'">עבור 
				לדף ספק</td>
			</tr>
		</table>
		</td>
		<td style="width: 20% "></td>
		<td id="data">
		<table id="dat1">
		<tr><td  style="height:5%; text-align: center;">הצגת הדוח:</td></tr>
			<tr>
				<td class="bottuns_dat1" style="width: 60%; height:6%" onclick="location.href='manager_reports.php'">חזור להצגת דוחות נוספים</td>		
			</tr>

			<tr style="width:85%; height:85%">
				<td class="get_block">
				<div id="table_div3_0">
				</div>
				<br>
				<div id="table_div3_1">
				</div>
				<div id="table_div4_0">
				</div>
				<br>
				<div id="table_div4_1">
				</div>
				<div id="table_div0">
				</div>
				<div id="table_div1">
				</div>
				<div id="table_div2">
				</div>
				</td>
			</tr>
		</table>
		</td>
	</tr>
</table>

</body>

</html>
