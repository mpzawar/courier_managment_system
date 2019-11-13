<?php


/*if(isset($_POST['sid'])){
    session_start();
//if(!isset($_SESSION["bid"])){
  //  header('Location:index.php');}

    require_once ('database/config.php');
    $staffId = $_POST['sid'];
   // $branchId = $_SESSION["bid"];
    if ($conn->query($sql) === TRUE) {
    header("Location:addstaff.php");
}else{
        echo 'error deleting staff';
    }
    
    
}*/

    require_once('database/config.php');
    $sid=$_POST['sid'];
    $delete="DELETE FROM `staff` where `id`=$sid";
    mysqli_query($conn, $delete);
   
    header("Location:addstaff.php");


?>

