<?php

	session_start();			
	$login= $_SESSION['login'];
	$id=$_SESSION['id'];
	$town=$_SESSION['town'];
	$products_list = array();
	$suitable_cust = array();
	$str= " ";



	include "inc_db.php";
	$query = "select * from `user` where town=$town AND `id` != $id "; //get all the people who live around the customer
	
	if (!$result = $conn->query($query)) exit;

	if ($result->num_rows == 0) echo "No records found!";
	else { 
	?>
<table align="center" border="1" style="width: 60%; border-collapse: collapse;">
	<tr>
		<th>אנשים הגרים בקרבתך-לחץ על מנת לשוחח</th>
	</tr>
	<?php
			while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
				$id2=$row['id'];
				$login=$row['login'];
				   echo "<tr class='rtmenu'>".
						"<td id=`$login` class='gategory'  onclick='open_talk(`$id2`)'>".$row['name']."</td>".
						"</tr>";
			}			
		}	
	?>
</table>
<br><br>
<table align="center" border="1" style="width: 60%; border-collapse: collapse;">
	<tr>
		<th>צרכנים בעלי צריכה דומה-לחץ על מנת לשוחח</th>
	</tr>
	<?php
//customers with the same consumption
	$query = "select * from `log` where `l_u_id`=$id group by `l_p_id`"; //first make a list of all the have been bought by the customer 

	if (!$result = $conn->query($query)) exit;

		else { 
		while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
		$p_id=$row['l_p_id'];
			$query1 = "select * from `product` where `p_id`=$p_id";	
				$result1 = $conn->query($query1);
				$row1 = $result1->fetch_array(MYSQLI_ASSOC);
				$products_list[]=array($row1['p_description']);
		}

	}
//after i listed all the customer's products i found suitable customers with common products.
	$query = "select * from `log` where `l_u_id`!=$id";
	if (!$result = $conn->query($query)) exit;
	else { 
		while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
		$p_id=$row['l_p_id'];
		$get_cus_id=$row['l_u_id'];
		$query1 = "select * from `product` where `p_id`=$p_id";	
		$result1 = $conn->query($query1);
		$row1 = $result1->fetch_array(MYSQLI_ASSOC);
		$prod_name=$row1['p_description'];
		 for ($i=0 ; $i < count($products_list) ; $i++) {
		 	if($products_list[$i][0]==$prod_name) {
		 		$suitable_cust[]=array($get_cus_id); 
			}	
		}
	}
}

$query = "select * from `user`"; //now i will get the customer details.
	if (!$result = $conn->query($query)) exit;
	if ($result->num_rows == 0) echo "No records found!";
	else { 
	while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
		$found=false;
		$suit_cust_check=$row['id'];
		$login=$row['login'];
		for ($i=0 ; $i < count($suitable_cust) ; $i++) {
			if ($suitable_cust[$i][0]==$suit_cust_check and $found==false ) { //i dont want that customer appear more than 1 time, thats why i added the found.
				echo "<tr class='rtmenu'>".
				"<td id=`$login` class='gategory'  onclick='open_talk(`$suit_cust_check`)'>".$row['name']."</td>".
				"</tr>";
				$found=true;
			}
			
		}
	}
}


		$result->free();
		$conn->close();
?>
</table>
