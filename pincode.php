<?php
    require_once('database/config.php');
    $cbranch = $_POST['cbranchValue'];
    $select = "select * from `branch` where name = '$cbranch'";
    $query=mysqli_query($conn, $select);
    $res=mysqli_fetch_assoc($query);
    echo json_encode($res);
?>

