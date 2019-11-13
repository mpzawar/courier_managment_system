<?php
    require_once('database/config.php');
    $uid = $_POST['uid'];
    $select = "select * from `user` where id = '$uid'";
    $query=mysqli_query($conn, $select);
    $resi=mysqli_fetch_assoc($query);
    echo json_encode($resi);
?>

