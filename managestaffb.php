<?php
    require_once('database/config.php');
    $b = $_POST['branch'];
    $select = "select * from `branch` where `name` = '$b'";
    $query=mysqli_query($conn, $select);
    $res=mysqli_fetch_assoc($query);
    echo json_encode($res);
?>

