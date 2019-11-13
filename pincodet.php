<?php
    require_once('database/config.php');
    $cbrancht = $_POST['cbranchtValue'];
    $selectt = "select * from `branch` where name = '$cbrancht'";
    $queryt=mysqli_query($conn, $selectt);
    $rest=mysqli_fetch_assoc($queryt);
    echo json_encode($rest);
?>

