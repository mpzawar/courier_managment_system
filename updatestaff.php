<?php 
require_once('database/config.php');

$staff_id=$_POST['staff_id'];
$name=$_POST['name1'];
$email=$_POST['email1'];
$mobile=$_POST['mobile1'];
$address=$_POST['address'];

 $update="UPDATE `staff` set `name`='$name', `email`='$email', `mobile`='$mobile' , `address`='$address' where `id`='$staff_id'";

mysqli_query($conn, $update);


header("Location:managestaff.php");

?>
