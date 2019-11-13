<?php 
include('security.php');
include('staff/includes/header.php');
include('staff/includes/navbar.php');
$sid = $_SESSION["sid"];
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
<html>
    <body>  
    <table id="datatable" class="table table-striped table-bordered">

  <thead>
  <tr>
            <th>Sr No</th>
            <th>Booked By</th>
            <th>Sent To</th>
            <th>Address</th>
            <th>Delivery Type</th>
            <th>Phone</th>
            <th>Delivered</th>
            <th>Not Delivered</th>

  </tr>
</thead>
<tbody>
  <?php 
                    $select="SELECT * FROM `delivery_details` WHERE sid = $sid and status in ('Out For Delivery','Delivery Reattempt')";
                    $appresult = $conn->query($select);
                    if ($appresult->num_rows > 0) {
                    $i=1;
                    while($row=mysqli_fetch_assoc($appresult)){
                    ?>
                    <tr>
                      <td><?php echo $i++;?></td>
                      <td><?php echo $row['from_name'];?></td>
                      <td><?php echo $row['to_name'];?></td>
                      <td><?php echo $row['address'];?></td>
                      <td><?php echo $row['del_type'];?></td>
                      <td><?php echo $row['to_phone'];?></td>
                      <td> <a href="javascript:;" class="edit_cstatus" c_id="<?php echo $row['cid']; ?>" data-toggle="modal" data-target="#delModal">Delivered</a> </td>
                      <td> <a href="javascript:;" class="edit_cstatus" c_id="<?php echo $row['cid']; ?>" data-toggle="modal" data-target="#notDelModal">Not Delivered</a> </td>
                                <?php
                                 }  }
                              ?>
    </tbody>
</table>
        </div>
        </div>
        </div>
         </div>

    <!-- Del Modal -->
   <div class="modal fade" id="delModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Courier Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="updateDel.php" method="post">
                    <div class="form-group">
                        <div class="row">
                            <label class="text-dark h5">Courier Status</label>
                            <select class="form-control" name="cstatus" id="cstatus" required>
                                <option>Delivered</option>
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

 <!-- Not Del Modal -->
   <div class="modal fade" id="notDelModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Courier Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="updateDel.php" method="post">
                    <div class="form-group">
                        <div class="row">
                            <label class="text-dark h5">Courier Status</label>
                            <select class="form-control" name="cstatus" id="cstatus" required>
                                <option>Delivery Reattempt</option>
                                <option>Delivery Denied</option>
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
/*include('branch/includes/footer.php');*/
?>
