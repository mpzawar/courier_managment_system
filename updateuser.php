<?php 
require_once('database/config.php');

$user_id=$_POST['user_id'];
$name=$_POST['name1'];
$email=$_POST['email1'];
$mobile=$_POST['mobile1'];


$update="UPDATE `user` set `name`='$name', `email`='$email', `mobno`='$mobile' where `id`='$user_id'";

mysqli_query($conn, $update);

header("Location:manageuser.php");

?>
