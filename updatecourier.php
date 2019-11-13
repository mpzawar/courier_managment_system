<?php 

require_once("database/config.php");

    $c_id=$_POST['couID'];
	$cstatus=$_POST['cstatus'];
	$ctbranch=$_POST['ctbranch'];
    $update="UPDATE `shipment_details` set `status`='$cstatus' where id = $c_id";
    mysqli_query($conn, $update);

    //selecting before branch
    $selectbb="SELECT `cur_branch` from `shipment_details` WHERE id=$c_id limit 1";
    $appresultbb=mysqli_query($conn, $selectbb);
    $valuebb=mysqli_fetch_array($appresultbb);
    $branchb = $valuebb[0];

    //update current branch
    $updateb="UPDATE `shipment_details` set `cur_branch`='$ctbranch' where id = $c_id";
    mysqli_query($conn, $updateb);


    //select after update current branch
    $selectba="SELECT `cur_branch` from `shipment_details` WHERE id=$c_id limit 1";
    $appresultba=mysqli_query($conn, $selectba);
    $valueba=mysqli_fetch_array($appresultba);
    $brancha = $valueba[0];

    //update shipment history with latest action_id
    $select="SELECT MAX(act_id) from courier_history WHERE cid=$c_id limit 1";
    $appresult=mysqli_query($conn, $select);
    $value=mysqli_fetch_array($appresult);
	$i = $value[0];
	$i++;

	$action="Your Courier has been assigned to branch " . $brancha . " by " . $branchb ." branch.";
	$insert="insert into `courier_history` (`cid`,`act_id`,`action`,`date`,`current_branch`,`status`) values ('$c_id', '$i', '$action', now(), '$brancha' ,'$cstatus')";
	$result=mysqli_query($conn, $insert);

	header("Location:courieraction.php?msg=4");


?>