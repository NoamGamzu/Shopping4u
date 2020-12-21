<?php

	session_start();			
	$login= $_SESSION['login'];
	$id=$_SESSION['id'];
	

	include "inc_db.php";
	$query= "SELECT *,count(*) FROM user , chat where id = RIGHT(t2, LENGTH(t2)-2) and t1 = 's_$id' group by t2"; //get all the customer who waiting for the customer to answer
	if (!$result = $conn->query($query)) exit ;

	if ($result->num_rows == 0) echo "  אין לקוחות הממתינים למענה או שיחות ישנות שטרם יסתיימו";
	else { 
	?>
<table align="center" border="1" style="width: 60%; border-collapse: collapse;">
	<tr>
		<th>רשימת שיחות חדשות (לחץ על מנת להתחיל שיחה)</th>
	</tr>
	<?php	
			while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
			if( $row['count(*)']==1) {
				$id2=$row['id'];
				$login=$row['login'];	
				 echo "<tr>".
			 			"<td class='gategory' onclick='open_talk(`$id2`)'>".$row['name']."</td>".
						"</tr>";
			}			
		}	// no records found
	}	
	?>
</table>
<br><br><?php
		$query= "SELECT *,count(*) FROM user , chat where id = RIGHT(t2, LENGTH(t2)-2) and t1 = 's_$id' group by t2"; //get all the customer who are waiting for the supplier to answer
		if (!$result = $conn->query($query)) exit ;

		if ($result->num_rows == 0) echo " ";
		else { 
	?>
<table align="center" border="1" style="width: 60%; border-collapse: collapse;">
	<tr>
		<th>רשימת שיחות שלא הסתיימו (לחץ על מנת להתחיל שיחה)</th>
	</tr>
	<?php	
			while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
				if( $row['count(*)']>1) {
					$id2=$row['id'];
					$login=$row['login'];	
			 		echo "<tr>".
					 "<td class='gategory' onclick='open_talk(`$id2`)'>".$row['name']."</td>".
						"</tr>";
			}			
		}	// no records found
	}	
		
		$result->free();
		$conn->close();
	?>
</table>
