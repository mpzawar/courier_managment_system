-<?php 
require_once('database/config.php');

$branch_id=$_POST['branch_id'];
$name=$_POST['name1'];
$email=$_POST['email1'];
$mobile=$_POST['mobile1'];
$address=$_POST['address'];
$pincode=$_POST['pincode'];


$update="UPDATE `branch` set `name`='$name', `email`='$email', `mobno`='$mobile', `address`='$address' ,`pincode`='$pincode' where `id`='$branch_id'";

mysqli_query($conn, $update);

header("Location:managebranch.php");

?>
