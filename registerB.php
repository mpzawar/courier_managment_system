<?php
include('includes/header.php');
include("security.php");
//require_once('database/config.php');
$name = $_POST['name'];
$email = $_POST['email'];
$mobno = $_POST['mobno'];
$password = $_POST['password'];
$add = $_POST['add1'];
$pincode = $_POST['pincode'];

$insert="INSERT INTO `branch` (`name`, `email`, `mobno`, `password`, `address`,`pincode` )
VALUES ('$name', '$email', '$mobno' ,'$password', '$add', '$pincode')" ;
$result=mysqli_query($conn, $insert);

if ($result) {
header("Location:USmod.php");
//header("Location:login.php?msg=".$msg);
}
else{
   	 header("Location:USmodnot.php");
	}

//header("Location:login.php?msg=".$msg);
?>
