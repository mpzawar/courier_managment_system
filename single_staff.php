<?php 
require_once('database/config.php');
	$id=$_POST['id'];
	 $select="SELECT * from `staff` where id= $id";
    $query=mysqli_query($conn, $select);
   	$res=mysqli_fetch_assoc($query);
	echo json_encode($res);
?>
