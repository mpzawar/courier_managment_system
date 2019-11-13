

<?php 
require_once('database/config.php');

session_start();
if(!isset($_SESSION["uid"])){
  
}

//$name =$email= $mobile=$address=$courierW=$courierA=$courierT="";
if($_SERVER['REQUEST_METHOD']=='POST'){
     $tname = $_POST["ctname"];
     $temail = $_POST["ctemail"];
     $tmob = $_POST["ctmob"];
     $name = $_POST["cfname"];
     $email = $_POST["cfemail"];
     $mobile = $_POST["cfmob"];
     $address = $_POST["cadd"];
     $deltype = $_POST["deltype"];
     $courierW = $_POST["cweight"];
     $courierA = $_POST["camount"];
     $courierB = $_POST["cbranch"];
     $courierTB = $_POST["ctbranch"];
     $courierCB = $_POST["cbranch"];
     $courierP = $_POST["cpincode"];
     $courierTP = $_POST["ctpincode"];
     $courierT = $_POST["ctype"];
     $userId = $_SESSION['uid'];
     $insert = "INSERT INTO `shipment_details` (`to_name`,`to_email`,`to_phone`,`from_name`,`from_email`,`from_phone`,`del_type`,`address`,`weight`,`amount`,`to_branch`,
     `from_branch`,`cur_branch`,`to_pincode`,`from_pincode`,`type`,`uid`,`status`,`date`) 
     VALUES ('$tname','$temail','$tmob','$name','$email','$mobile','$deltype','$address','$courierW','$courierA','$courierTB','$courierB','$courierCB','$courierTP','$courierP','$courierT','$userId','Book',now())";
     $result=mysqli_query($conn, $insert);
    
     
}
if ($result) {
    
    $last_id = $conn->insert_id;
    $sql="select * from shipment_details where id = '$last_id'"; 
    $appresult = $conn->query($sql);
    $select = $appresult->fetch_assoc();
    $cid = $select['id'];
    $act_id=1;
    $action_type = $select['status'];
    $action =  "Your courier has been " .  $action_type ;
    $history = "INSERT INTO `courier_history` (`cid`,`act_id`,`action`,`date`,`current_branch`,`status`) values ('$cid','$act_id','$action',now(),'$courierCB','$action_type')";
    $result1 = mysqli_query($conn, $history);
    
    if($result1) {
   
    header("Location:viewcourier.php?msg_insert=3");
    //header("Location:login.php?msg=".$msg);
    }
    
    else{
   	 header("Location:USmodnot.php");
	}
}
else{
   	 header("Location:USmodnot.php");
	}

//header("Location:login.php?msg=".$msg);
?>







