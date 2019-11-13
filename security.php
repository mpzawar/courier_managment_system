<?php
    session_start();
 
     include('database/config.php');
     if($config)
     {
        // echo "database connected";
     }
     else
     {
         header("Location:database/config.php");

     }
     if(!$_SESSION['username'])
     {
         header('location:index.php#section-login');

     }
 