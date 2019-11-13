<?php 
 include('security.php');
 require_once("database/config.php");

    $c_id=$_POST['couID'];
	$cstatus=$_POST['cstatus'];
    $cstaff=$_POST['cstaff'];
    $bid=$_SESSION["bid"];

    //updating status out for delivery
    $update="UPDATE `shipment_details` set `status`='$cstatus' where id = $c_id";
    mysqli_query($conn, $update);

    //selecting before branch
    $selectbb="SELECT `cur_branch` from `shipment_details` WHERE id=$c_id limit 1";
    $appresultbb=mysqli_query($conn, $selectbb);
    $valuebb=mysqli_fetch_array($appresultbb);
    $branchb = $valuebb[0];

    //fetching user details
    $seluser="SELECT * from `shipment_details` WHERE id=$c_id";
    $resultuser=mysqli_query($conn, $seluser);
    $rowUser=mysqli_fetch_array($resultuser);

    //fetching staff details
    $selstaff="SELECT * from `staff` WHERE name='$cstaff'";
    $resultstaff=mysqli_query($conn, $selstaff);
    $rowStaff=mysqli_fetch_array($resultstaff);

    //making remark
    $remark="Your courier has been assigned to " . $rowStaff['name'] . " for delivery.";

    //insert into delivery details
    $insert_del="insert into `delivery_details`(`bid`,`cid`,`uid`,`sid`,`to_name`,`from_name`,`address`,`to_phone`,`to_email`,`del_type`,`delivered_by`,`delivered_to`,`remarks`,`status`,`date`) values ('$bid','$c_id','$rowUser[uid]','$rowStaff[id]','$rowUser[to_name]','$rowUser[from_name]','$rowUser[address]','$rowUser[to_phone]','$rowUser[to_email]','$rowUser[del_type]','$rowStaff[name]','$rowUser[to_name]','$remark','$cstatus',now())";
    mysqli_query($conn, $insert_del);
    //select after update current branch
    $selectba="SELECT `cur_branch` from `shipment_details` WHERE id=$c_id limit 1";
    $appresultba=mysqli_query($conn, $selectba);
    $valueba=mysqli_fetch_array($appresultba);
    $brancha = $valueba[0];

    //update shipment history with latest action_id
    $select_max="SELECT MAX(act_id) from courier_history WHERE cid=$c_id limit 1";
    $appresult_max=mysqli_query($conn, $select_max);
    $value_max=mysqli_fetch_array($appresult_max);
	$i = $value_max[0];
	$i++;

	$insert_his="insert into `courier_history` (`cid`,`act_id`,`action`,`date`,`current_branch`,`status`) values ('$c_id', '$i', '$remark', now(), '$brancha' ,'$cstatus')";
	$result_his=mysqli_query($conn, $insert_his);

	header("Location:courieraction.php?msg=4");


?>