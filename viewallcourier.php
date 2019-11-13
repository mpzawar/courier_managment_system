
<?php 
 include('security.php');
 error_reporting(1);
include('branch/includes/header.php');
include('branch/includes/navbar.php');
?> 
 
 <?php
    if(isset($_GET['msg']) && $_GET['msg']==4){
	echo "<p class='success'>Courier Updated Successfully!!!!</p>";}
    ?>
    
  <html>
<body>
<div class="container-fluid">
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Branch Courier</h1>
<div class="row">
  <div class="col-lg-12">
	<!-- Add Categories -->
	<div class="card shadow mb-4">
	  <div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">View ALL Courier</h6>
	  </div>
	   </div>
	    </div>
</div>


	 <table id="datatable" class="table table-striped table-bordered">
<?php
session_start();
if(!isset($_SESSION["bid"])){
    header('Location:index.php');
}
?>
<html>
    <body>  
    <table id="datatable" class="table table-striped table-bordered">

  <thead>
  <tr>
			<th>Sr No</th>
			<th>Booked By</th>
			<th>Sent TO</th>
			<th>Email</th>
			<th>Mobile</th>
            <th>Amount</th>
			<th>Branch</th>
			<th>Branch Pincode</th>
			<th>Courier Status</th>
            <th>To Address</th>
            <th>Weight (in gms)</th>
			<th>Courier Type</th>
			<th>Action</th>
  </tr>
</thead>
<tbody>
  <?php 
                     require_once('database/config.php');
                    $bid = $_SESSION["bid"];
                    $select="SELECT * FROM `courier` WHERE c_branch in (SELECT name from branch where id=$bid);";
                    $appresult = $conn->query($select);
                    if ($appresult->num_rows > 0) {
                    $i=1;
                    while($row=mysqli_fetch_assoc($appresult)){
                    ?>
                    <tr>
                      <td><?php echo $i++;?></td>
                    <?php
                        $uid= $row['uid'];
                        $user="SELECT * FROM user where id = $uid";
                        $appresult1 = $conn->query($user);
                          while($row1=mysqli_fetch_assoc($appresult1)){?>
                                   <td><?php echo $row1['name'];?></td>
                                   <?php } ?>
                                    <td><?php echo $row['name'];?></td>
                                    <td><?php echo $row['email'];?></td>
                                    <td><?php echo $row['mobile'];?></td>
                                    <td><?php echo $row['amount'];?></td>
                                    <td><?php echo $row['c_branch'];?></td>
                                    <td><?php echo $row['c_pincode'];?></td>
                                    <td><?php echo $row['c_status'];?></td>
                                    <td><?php echo $row['address'];?></td>
                                    <td><?php echo $row['weight'];?></td>
                                    <td><?php echo $row['type'];?></td>
                                    <td> <a href="javascript:;" class="edit_cstatus" c_id="<?php echo $row['id']; ?>" data-toggle="modal" data-target="#editModal">Edit</a> </td>
                                    <!--?<td>php echo ($row['status']==1 ?  'Delivered' :   "not Delivered"); ?></td>-->
                                                                  
                                </tr>
                                <?php
                                 }  }
                              ?>
	</tbody>
</table>
        </div>
        </div>
	    </div>
		 </div>
		 
<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Courier Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="update.php" method="post">
                    <div class="form-group">
                        <div class="row">
                            <label class="text-dark h5">Courier Status</label>
                            <select class="form-control" name="cstatus" id="cstatus" required>
                                <option value="null">Update Delievery Status</option>
                                <option>Registered</option>
                                <option>Dispatched</option>
                                <option>In Transit</option>
                                <option>Out for Delivery</option>
                                <option>Delivered</option>
                                <option>Not Delivered</option>
                                <option>Return to Origin</option>
                            </select>
                        </div>
                            <br>
                        <div class="row">
                            <input class="form-control" type="hidden" name="couID">
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <input type="Submit" class="btn btn-primary">
                            </div>
                        </div>  
                </form>
                </div>
            </div>

        </div>
    </div>
</div>
   <script src="jquery.min.js"></script>
 <script>

$(document).ready( function () {
              $('.edit_cstatus').click(function(){
					var cidval=$(this).attr('c_id');
			         //alert(cidval);
					   $.ajax({   
						url:'single_courier.php',
						data:'cidval='+cidval,
						dataType:'json',
						method:'post',
						success:function(res){
							//console.log(res);
                        $('input[name="couID"]').val(res.id);
                      }
					})
				})
            });
</script>
    </body>
   
</html>

<?php 
include('branch/includes/scripts.php');
include('branch/includes/footer.php');
?>  

