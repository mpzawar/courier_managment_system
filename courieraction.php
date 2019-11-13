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
            <th>Sent To</th>
            <th>To Branch</th>
            <th>To Address</th>
            <th>Delivery Type</th>
            <th>Weight</th>
            <th>Courier Type</th>
            <th>Courier Status</th>
            <th>Assign to Next Branch</th>
            <th>Assign to Delivery Staff</th>
  </tr>
</thead>
<tbody>
  <?php 
                     require_once('database/config.php');
                    $bid = $_SESSION["bid"];
                    $select="SELECT * FROM `shipment_details` WHERE cur_branch in (SELECT name from branch where id=$bid) and ((status='Confirmed') || (status='Assign to Other Branch'));";
                    $appresult = $conn->query($select);
                    if ($appresult->num_rows > 0) {
                    $i=1;
                    while($row=mysqli_fetch_assoc($appresult)){
                    ?>
                    <tr>
                      <td><?php echo $i++;?></td>
                      <td><?php echo $row['from_name'];?></td>
                      <td><?php echo $row['to_name'];?></td>
                      <td><?php echo $row['to_branch'];?></td>
                      <td><?php echo $row['address'];?></td>
                      <td><?php echo $row['del_type'];?></td>
                      <td><?php echo $row['weight'];?></td>
                      <td><?php echo $row['type'];?></td>
                      <td><?php echo $row['status'];?></td>
                      <td> <a href="javascript:;" class="edit_cstatus" c_id="<?php echo $row['id']; ?>" data-toggle="modal" data-target="#editModal">Assign Courier</a> </td>
                      <td> <a href="javascript:;" class="edit_cstatus" c_id="<?php echo $row['id']; ?>" data-toggle="modal" data-target="#outModal">Out For Delivery</a> </td>
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
                    <form action="updatecourier.php" method="post">
                        <div class="form-group">
                            <div class="row">
                                <label class="text-dark h5">Courier Status</label>
                                <select class="form-control" name="cstatus" id="cstatus" value="In Transit"required>
                                    <option>Assign to Other Branch</option>
                                </select>
                            </div>
                            <div class="row">
                                <label class="form-control-label mbr-fonts-style display-7" for="name-form1-4t">Select To Branch</label>
                                <select name="ctbranch" type="text" class="form-control" data-form-field="Name" required="" id="ctbranch">
                                    <option value="null">Select To Branch</option>
                                    <?php $branch="select * from branch"; 
                                                $appresult = $conn->query($branch);
                                                if ($appresult->num_rows > 0) {
                                                while($row=$appresult->fetch_assoc()){?>
                                    <option><?php echo $row['name'];?></option>
                                    <?php } } ?>
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

    <!-- Out Modal -->
    <div class="modal fade" id="outModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Courier Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="delivercourier.php" method="post">
                        <div class="form-group">
                            <div class="row">
                                <label class="text-dark h5">Courier Status</label>
                                <select class="form-control" name="cstatus" id="cstatus" required>
                                    <option>Out For Delivery</option>
                                </select>
                            </div>
                            <br>
                             <div class="row">
                                <label class="form-control-label mbr-fonts-style display-7" for="name-form1-4t">Select Staff</label>
                                <select name="cstaff" type="text" class="form-control" data-form-field="Name" required="" id="cstaff">
                                    <option value="null">Select Staff</option>
                                    <?php 
                                                $bid=$_SESSION["bid"];
                                                $staff="select * from staff where bid=$bid"; 
                                                $appresult = $conn->query($staff);
                                                if ($appresult->num_rows > 0) {
                                                while($row=$appresult->fetch_assoc()){?>
                                    <option><?php echo $row['name'];?></option>
                                    <?php } } ?>
                                </select>
                            </div>
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
        $(document).ready(function() {
            $('.edit_cstatus').click(function() {
                var cidval = $(this).attr('c_id');
                //alert(cidval);
                $.ajax({
                    url: 'single_courier.php',
                    data: 'cidval=' + cidval,
                    dataType: 'json',
                    method: 'post',
                    success: function(res) {
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
