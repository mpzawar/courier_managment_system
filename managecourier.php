<?php
require_once('database/config.php');
include('security.php');
include('includes/style.php');
include('admin/includes/header.php');
include('admin/includes/navbar.php');
//session_start();
//if(!isset($_SESSION["branch"])){
//header('Location:login.php');}
?>



                            <div class="col-lg-12">
                                <div class="" style="margin-top:2%; width: 100%;">
                                    <h2> Courier List</h2>
                                     <table id="datatable" class="table table-striped table-bordered">

                                        <thead>
                                            <tr>
                                                <th>Sr no.</th>
                                                <th> Courier ID</th>
                                                <th> from Name</th>
                                                <th> from Email</th>
                                                <th> Status</th>
                                                <th> Date</th>
                                                <th> Courier Datails</th>
                                                <th> Track Courier</th>
                                                <th> View Delivery Details</th>
                                            </tr>
                                        </thead>
                                    <tbody>
                                <?php 
                                include('database/config.php');
                               
                                $mysqli="select * from shipment_details";
                                //$mysqli="select * from branch"; 
                                $appresult = $conn->query($mysqli);
                                $i=1;
                                while($res=mysqli_fetch_assoc($appresult)){ 
                                ?>
                                            <tr>
                                                <td><?php echo $i++;?></td>
                                                <td><?php echo $res['id'];?></td>
                                                <td><?php echo $res['from_name'];?></td>
                                                <td><?php echo $res['from_email'];?></td>
                                                <td><?php echo $res['status'];?></td>
                                                <td><?php echo $res['date'];?></td>
                                                <td> <a href="detailsModal1.php?c_id=<?php echo $res['id'];?>" class="details_modals" id="details_modals" >Courier Details</a></td>
                                                <td> <a href="trackModal1.php?t_id=<?php echo $res['id'];?>" class="track_status">Track Courier</a></td>
                                                <td> <a href="viewdeliverydetails.php?t_id=<?php echo $res['id'];?>" class="track_status">View Delivery Datails</a></td>

                                            </tr>
                                            <?php
                                 }
                              ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                        <!-- Modal -->
                        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="updatebranch.php" method="post"  enctype="multipart/form-data">

<label > Name :</label>
<input type="text" class="form-control" name="name1" id="name1">

    <label> Email :</label>
	<input type="text" class="form-control"  name="email1" id="email1">
	
    <label> Mobile :</label>
	<input type="text" class="form-control"  name="mobile1" id="mobile1">

    <label> Address:</label>
	<input type="text" class="form-control"  name="address" id="address">

    <label> Pincode :</label>
	<input type="text" class="form-control"  name="pincode" id="pincode">
    
    <input type="hidden" class="form-control" name="branch_id" id="branch_id">

  <div class= "modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="Submit" class="btn btn-secondary">
      </div>
</form>
      </div>
      
    </div>
  </div>
</div>

    </body>
    </html> 
<script src="jquery.min.js"></script>
 <script>

$(document).ready( function () {
              //alert("HH");
				$('.edit_branch').click(function(){
					var id=$(this).attr('id');
                    //alert(id);
					$.ajax({
						url:'single_branch.php',
						data:'id= '+ id,
						dataType:'json',
						method:'post',
						success:function(res){
						console.log(res);
			  $('#name1').val(res.name);
              $('#email1').val(res.email);
              $('#mobile1').val(res.mobno);
              $('#address').val(res.address);
              $('#pincode').val(res.pincode);
              $('#branch_id').val(res.id);
            
						}
					})
				})
            });
			
			

</script>
<?php
include('admin/includes/scripts.php');
/*include('includes/footer.php');*/
?>
