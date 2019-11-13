<?php 

    include('security.php');

    $c_id=$_POST['couID'];
	$cstatus=$_POST['cstatus'];
    $sid = $_SESSION["sid"];
    //updating shipment status
    $update="UPDATE `shipment_details` set `status`='$cstatus' where id = $c_id";
    mysqli_query($conn, $update);

    //update delivery details
    $delupdate="UPDATE `delivery_details` set `status`='$cstatus' where cid = $c_id";
    mysqli_query($conn, $delupdate);

    //updating history table
    $select="SELECT MAX(act_id) from courier_history WHERE cid=$c_id limit 1";
    $selects="SELECT `name` from `staff` WHERE id=$sid limit 1";
    $selectb="SELECT `cur_branch` from `shipment_details` WHERE id=$c_id limit 1";



    $appresult=mysqli_query($conn, $select);
    $appresults=mysqli_query($conn, $selects);
    $appresultb=mysqli_query($conn, $selectb);

    $value=mysqli_fetch_array($appresult);
    $values=mysqli_fetch_array($appresults);
    $valueb=mysqli_fetch_array($appresultb);

	$i = $value[0];
	$i++;
	$staff = $values[0];
    $branch = $valueb[0];
	$action="Your Courier has been " . $cstatus . " by " . $staff;

	$insert="insert into `courier_history` (`cid`,`act_id`,`action`,`date`,`current_branch`,`status`) values ('$c_id', '$i', '$action', now(), '$branch','$cstatus')";
	$result=mysqli_query($conn, $insert);
	header("Location:deliveryaction.php?msg=4");


?>

