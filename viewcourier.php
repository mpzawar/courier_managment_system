<?php 
include('security.php');
include('includes/style.php');
include('user/includes/header.php');
include('user/includes/navbar.php');

   ?>
<?php 

require_once('database/config.php');
$uid=$_SESSION["uid"];
$select="SELECT * FROM `courier` where uid=$uid";
$query=mysqli_query($conn, $select);

 if(isset($_GET['msg_insert']) && $_GET['msg_insert']==3){
	echo "Courier Inserted Successfully!!!!";
}
?>
<!DOOCTYPE html>
    <html>

    <br>

    <body>

        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Courier</h1>

            <div class="row">

                <div class="col-lg-12">

                    <!-- Add Categories -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">View Courier</h6>
                        </div>
                    </div>
                </div>
            </div>



            <?php
//session_start();

if(!isset($_SESSION["uid"])){
    header('Location:login.php');
}
?>
            <html>

            <body>
                <table id="datatable" class="table table-striped table-bordered">

                    <thead>
                        <tr>
                            <th>Sr No</th>
                            <th>Sent To</th>
                            <th>Branch</th>
                            <th>Delivery Type</th>
                            <th>Status</th>
                            <th>Track Courier</th>
                            <th>Courier Details</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php 
               $uid = $_SESSION["uid"];
               $sql="select * from shipment_details where uid = '$uid'"; 
               $appresult = $conn->query($sql);
               if ($appresult->num_rows > 0) {
                   // output data of each row
               $i=1;
                    
                  while($row=mysqli_fetch_assoc($appresult)){
                    ?>
                        <tr>
                            <td><?php echo $i++;?></td>
                            <td><?php echo $row['to_name'];?></td>
                            <td><?php echo $row['to_branch'];?></td>
                            <td><?php echo $row['del_type'];?></td>
                            <td><?php echo $row['status'];?></td>
                            <td> <a href="trackModal.php?t_id=<?php echo $row['id'];?>" class="track_status">Track Courier</a></td>
                            <td> <a href="detailsModal.php?c_id=<?php echo $row['id'];?>" class="details_modals" id="details_modals" >Courier Details</a></td>
                            
                        </tr>
                        <?php
                                 }  }
                              ?>
                    </tbody>
                </table>
        </div>


        <!--Track Modal -->

        <div class="modal fade" id="trackModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Courier Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
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
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        </div>

    </body>

    </html>




    <?php 
include('user/includes/scripts.php');
/*include('includes/footer.php');*/
?>
