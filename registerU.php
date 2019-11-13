<?php
include('includes/header.php');
include("security.php");
//require_once('database/config.php');
$name = $_POST['name'];
$email = $_POST['email'];
$mobno = $_POST['mobno'];
$password = $_POST['password'];
$insert="INSERT INTO `user` (`name`, `email`, `mobno`, `password`) VALUES ('$name', '$email', '$mobno' ,'$password')" ;
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
