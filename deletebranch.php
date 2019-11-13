<?php
require_once('database/config.php');
    $bid=$_POST['bid'];
    $delete="DELETE FROM `branch` where `id`=$bid";
    mysqli_query($conn, $delete);
   
    header("Location:managebranch.php");
    ?>