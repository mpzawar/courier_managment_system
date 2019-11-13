<?php 
 include('security.php');
include('branch/includes/header.php');
include('branch/includes/navbar.php');
?>  
<?php
//session_start();
//if(!isset($_SESSION["bid"])){
   // header('Location:index.php');
//}
?>

<?php
require_once('database/config.php');
$Dto =$Dby= $date=$branchId=$cId="";
if($_SERVER['REQUEST_METHOD']=='POST'){
    if(isset($_POST["cId"])){
     $Dto = $_POST["dTo"];
     $Dby = $_POST["dBy"];
     $date = $_POST["dOn"];
     $branchId = $_SESSION['bid'];
     $cId = $_POST["cId"];
     $mysqli = "INSERT INTO `delivery` (`branch`,`deliveredTo`,`deliveredBy`,`datetime`,`courierId`) VALUES ('$branchId', '$Dto', ' $Dby',' $date', '$cId')";
     $conn->query($mysqli);
    $mysqli ="update courier set status = '1' where id = '$cId';";
    echo $mysqli ;
    if($conn->query($mysqli)){
    echo 'success';
    }else{
    echo("Error description: " . mysqli_error($conn));
    }
//    header("Location:deliver.php");
}}


?>
<div class="container-fluid">
 <h1 class="h3 mb-4 text-gray-800">Deliver</h1>
  <div class="row">
   <div class="col-lg-12">
    <div class="card shadow mb-4">
     <div class="card-header py-3">
     <h6 class="m-0 font-weight-bold text-primary">Make Delivery</h6>
     </div>

<html>
     <div class="container-fluid" style="margin-top:1%;">
      <div class="row" style="width:100%;"> 
        <div class="col-md-6">
        <div class="container-fluid" style=" width: 150%;">
         <div class="row justify-content-left">
            <div class="media-container-column col-lg-8" data-form-type="formoid">
         
            <form class="mbr-form" action="deliver.php" method="post" data-form-title="Mobirise Form">
                <div class="form-group" data-for="address">
                <label class="form-control-label mbr-fonts-style display-7" for="message-form1-4t">Select Courier to deliver</label>
                 <select class="btn btn-primary btn-lg" style="width: 100%;" name="cId" id="cId">
                 <?php
                 include('database/config.php');
                 $uid = $_SESSION["uid"];
                 $mysqli="select * from courier where status=0 "; 
                 $appresult = $conn->query($mysqli);
                 if ($appresult->num_rows > 0) {
                 while($row = $appresult->fetch_assoc()) 
                 {
                  ?>
                 <option value="<?php echo $row['id'];?>">Courier to : <?php echo $row['name']?> || email address :<?php echo $row['email']?> || mobile No : <?php echo $row['mobile']?> </option>
                 <?php
                  }}
                 ?>                               
                 </select>
                </div>
                        
                <div class="row row-sm-offset">
                <div class="col-md-8 multi-horizontal" >
                <div class="form-group">
                <label class="form-control-label mbr-fonts-style display-7" >delivered on</label>
                <input type="date" class="form-control" name="dOn"  required="" id="name-form1-4t">
                </div>
                </div>

                <div class="col-md-8 multi-horizontal" data-for="">
                <div class="form-group">
                <label class="form-control-label mbr-fonts-style display-7" >delivered TO</label>
                <input class="form-control" name="dTo" data-form-field="Email" required="" id="email-form1-4t">
                </div>
                </div>

                <div class="col-md-8 multi-horizontal" data-for="amount">
                <div class="form-group">
                <label class="form-control-label mbr-fonts-style display-7" for="phone-form1-4t">Delivered BY</label>
                <select  id="dBy" class="btn btn-primary btn-lg" style="width: 100%;" name="dBy">
                <?php include('database/config.php');
                $bid = $_SESSION["bid"];
                $mysqli="select * from staff where branch ='$bid'"; 
                $appresult = $conn->query($mysqli);
                if ($appresult->num_rows > 0) {
                    // output data of each row
                 while($row = $appresult->fetch_assoc()) 
                 {
                     ?>  <option value="<?php echo $row['name'];?>"><?php echo $row['name'];?></option>  <?php
                }}
                 ?>
                 </select>
                </div>
                </div>
                </div>
                    
                <span class="input-group-btn">
                <button href="" type="submit" class=" pull-right btn btn-success btn-form display-4 btn-lg">deliver Courier  <span class="fa fa-rocket"></span></button>
                </span>
        </form>
        </div>
        </div>
        </div>
        </div>
            <div class="col-md-6">
            <div class="" style="margin-top:1%; width: 100%;">
            <h3>Deliveries Done</h3>
            <table id="datatable" class="table table-striped table-bordered">
	   <thead>
		<tr>
			<th>ID</h1></th>
			<th>delivered TO</th>
			<th>delivered By</th>
			<th>delivered On</th>
            <th>Courier Id</th>
		</tr>
	    </thead>
	      <tbody>
               <?php      
                include('database/config.php');
                //$bid = $_SESSION["bid"];
                //$mysqli="select * from delivery where branch = '$bid'"; 
                $mysqli="select * from delivery";
                $appresult = $conn->query($mysqli);
                if ($appresult->num_rows > 0) {
                 // output data of each row
                 while($row = $appresult->fetch_assoc()) 
                 {
                  $id = $row['id'];
                  $dto=$row['deliveredTo'];
                  $dby=$row['deliveredBy'];
                  $dt=$row['datetime'];
                  $cid = $row['courierId'];
                ?>
            <tr>
                <td><?php echo $id;?></td>
                <td><?php echo $dto;?></td>
                <td><?php echo $dby;?></td>
                <td><?php echo $dt;?></td>
                <td><?php echo $cid;?></td>
            </tr>
            <?php
            }}  
            ?>
	</tbody>
    </table>
     </div>
     </div>
     </div></div>  
    </body>
</html>

</div>
</div>
</div></div>
       
        
        
    </body>
</html>

<?php 
include('branch/includes/scripts.php');
include('branch/includes/footer.php');
?>  