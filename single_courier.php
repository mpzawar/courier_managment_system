<?php 
    require_once('database/config.php');

	$c_id=$_POST['cidval'];
    $select="SELECT * from `shipment_details` where id = $c_id";
    $query=mysqli_query($conn, $select);
   	$res=mysqli_fetch_assoc($query);
	echo json_encode($res);
?>