<?php
	session_start();
	if (isset($_SESSION['login'])) {			
	$login= $_SESSION['login'];
	$id=$_SESSION['id'];
	include "inc_db.php";
}

?>
<!DOCTYPE>
<html dir="rtl" lang="he">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<link href="template_02.css" media="all" rel="stylesheet" type="text/css">
<title>reports_active</title>
<?php
	
			$users_report1 = array();
			$query ="SELECT * FROM `log` where `l_u_id`=$id ORDER BY `l_dt` DESC";	 
				if (!$result = $conn->query($query)) exit;

				if ($result->num_rows == 0) echo "לא נמצאו מוצרים שנרכשו על ידך.";
				else {
?><?php
				while ($row = $result->fetch_array(MYSQLI_ASSOC)) {	
					$supid=$row['l_s_id'];
					$cusid=$row['l_u_id'];
					$productid=$row['l_p_id'];
					$query1 ="SELECT * FROM `user` WHERE `id`=$supid";
					$result1 = $conn->query($query1);
					$row1 = $result1->fetch_array(MYSQLI_ASSOC);
					$supname=$row1['name'];
					$query3 ="SELECT * FROM `product` WHERE `p_id`=$productid";
					$result3 = $conn->query($query3);
					$row3 = $result3->fetch_array(MYSQLI_ASSOC);
					$productname=$row3['p_description'];
					
					 $users_report1[] = array($supname,$productname,$row['l_price'],$row['l_dt']);					

			}			
		}	
		$result->free();
		$conn->close();
			
	?>
</head>

<body>

<div id="table_div">
	<script src="https://www.gstatic.com/charts/loader.js" type="text/javascript"></script>
	<script type="text/javascript">
      google.charts.load('current', {'packages':['table']});
      google.charts.setOnLoadCallback(drawTable);

      function drawTable() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'שם הספק');
        data.addColumn('string', 'שם המוצר ');
        data.addColumn('number', 'מחיר מכירה');
        data.addColumn('string', 'תאריך מכירה');

       
		   <?php
            for ($i=0; $i < count($users_report1) ; $i++) { 
                echo 'data.addRow(["'.$users_report1[$i][0].'","'.$users_report1[$i][1].'",{v: '.$users_report1[$i][2].'},"'.$users_report1[$i][3].'"]);';
            }
        ?>



		 var table = new google.visualization.Table(document.getElementById('table_div'));

        table.draw(data, {showRowNumber: true, width: '100%', height: '100%'});
      }
   	 </script>
</div>

</body>

</html>
