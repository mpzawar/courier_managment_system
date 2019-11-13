<?php 
include('security.php');
if(isset($_GET['t_id']))
     {
        $c_id=$_GET['t_id'];
     }

?>
<style>

.modal-dialog  {width: 400px; }
 
.modal-header {
  background-color:#4e73df;
  padding:16px 16px;
  color:#FFF;
  border-bottom:2px dashed #4e73df;

 }

</style>

 <!-- Details Modal -->
 <div class="modal fade" id="trackModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
     <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="trackModal">Courier History</h5>
                 <button type="button" class="close" data-dismiss="modal" onclick="window.location='managecourier.php'" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                  <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                     <tr>
                         <th>Courier ID</th>
                         <th>Staff ID</th>
                         <th>Delivery Type</th>
                         <th>Delivery By</th>
                         <th>Delivery To</th>
                         <th>Remark</th>
                         <th>Status</th>

                     </tr>
                 </thead>
                 <tbody>
                     <?php $query="SELECT * FROM `delivery_details` WHERE cid=$c_id "; 
                    $appresult = $conn->query($query);
                    if ($appresult->num_rows > 0) {
                        while($row=$appresult->fetch_assoc()){?>
                     <tr>
                         <td><?php echo $row['cid'];?> </td>
                         <td><?php echo $row['sid'];?> </td>
                         <td> <?php echo $row['del_type'];?></td>
                         <td> <?php echo $row['delivered_by'];?></td>
                         <td><?php echo $row['delivered_to'];?></td>
                         <td><?php echo $row['remarks'];?></td>
                         <td><?php echo $row['status'];?></td>
                     </tr> <?php } } ?>
             </div>
                 </tbody>    
                 </table>
     <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="window.location='managecourier.php'">Close</button>
     </div>
 </div>
 </div>
 </div>

 <?php 
include('admin/includes/scripts.php');
?>

 <script>
     $("#trackModal").modal('show');

 </script>
