<?php
require_once('database/config.php');
    $uid=$_POST['uid'];
    $delete="DELETE FROM `user` where `id`=$uid";
    mysqli_query($conn, $delete);
   
    header("Location:manageuser.php");
    ?>