<?php 

require_once("database/config.php");

    $c_id=$_POST['couID'];
	$cstatus=$_POST['cstatus'];
    //updating shipment status
    $update="UPDATE `shipment_details` set `status`='$cstatus' where id = $c_id";
    mysqli_query($conn, $update);

    //updating history table
    $select="SELECT MAX(act_id) from courier_history WHERE cid=$c_id limit 1";
    $selectb="SELECT `from_branch` from `shipment_details` WHERE id=$c_id limit 1";

    $appresult=mysqli_query($conn, $select);
    $appresultb=mysqli_query($conn, $selectb);

    $value=mysqli_fetch_array($appresult);
    $valueb=mysqli_fetch_array($appresultb);

	$i = $value[0];
	$i++;
	$branch = $valueb[0];

	$action="Your Courier has been " . $cstatus . " by " . $branch ." branch";
	$insert="insert into `courier_history`(`cid`,`act_id`,`action`,`date`,`current_branch`,`status`) values ('$c_id', '$i', '$action', now(), '$branch','$cstatus')";
	$result=mysqli_query($conn, $insert);

	header("Location:courieraction.php?msg=4");


?>

