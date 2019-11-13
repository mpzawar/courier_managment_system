 <?php 
include('security.php');
if(isset($_GET['c_id']))
     {
        $c_id=$_GET['c_id'];
     }

?>
<style>

.modal-dialog  { width: 400px;}
 
.modal-header {
  background-color: #4e73df;
  padding:16px 16px;
  color:#FFF;
  border-bottom:2px dashed #4e73df;
 }

</style>
 <!-- Details Modal -->
 <div class="modal fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
     <div class="modal-dialog modal-md" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLongTitle">Courier Details</h5>
                 <button type="button" class="close" data-dismiss="modal" onclick="window.location='viewcourier.php'" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <?php $query="select * from shipment_details where id=$c_id"; 
        $appresult = $conn->query($query);
        if ($appresult->num_rows > 0) {
        while($row=$appresult->fetch_assoc()){?>

                 <div class="row">
                     <div class="col-md-5">
                         <label>Courier Number :</label>
                     </div>
                     <label class="col-md-7">
                         <?php echo $row['id'];?>
                     </label>
                 </div>
                 <br>

                 <div class="row">
                     <div class="col-md-5">
                         <label>To Name :</label>
                     </div>
                     <label class="col-md-7">
                         <?php echo $row['to_name'];?>
                     </label>
                 </div>
                 <br>

                 <div class="row">
                     <div class="col-md-5">
                         <label>To Email :</label>
                     </div>
                     <label class="col-md-7">
                         <?php echo $row['to_email'];?>
                     </label>
                 </div>
                 <br>

                 <div class="row">
                     <div class="col-md-5">
                         <label>To Phone :</label>
                     </div>
                     <label class="col-md-7">
                         <?php echo $row['to_phone'];?>
                     </label>
                 </div>
                 <br>

                 <div class="row">
                     <div class="col-md-5">
                         <label>From Name :</label>
                     </div>
                     <label class="col-md-7">
                         <?php echo $row['from_name'];?>
                     </label>
                 </div>
                 <br>

                 <div class="row">
                     <div class="col-md-5">
                         <label>From Email :</label>
                     </div>
                     <label class="col-md-7">
                         <?php echo $row['from_email'];?>
                     </label>
                 </div>
                 <br>

                 <div class="row">
                     <div class="col-md-5">
                         <label>From Phone :</label>
                     </div>
                     <label class="col-md-7">
                         <?php echo $row['from_phone'];?>
                     </label>
                 </div>
                 <br>

                 <div class="row">
                     <div class="col-md-5">
                         <label>Delivery Type :</label>
                     </div>
                     <label class="col-md-7">
                         <?php echo $row['del_type'];?>
                     </label>
                 </div>
                 <br>

                 <div class="row">
                     <div class="col-md-5">
                         <label>Address :</label>
                     </div>
                     <label class="col-md-7">
                         <?php echo $row['address'];?>
                     </label>
                 </div>
                 <br>

                 <div class="row">
                     <div class="col-md-5">
                         <label>Weight :</label>
                     </div>
                     <label class="col-md-7">
                         <?php echo $row['weight'];?>
                     </label>
                 </div>
                 <br>

                 <div class="row">
                     <div class="col-md-5">
                         <label>Amount :</label>
                     </div>
                     <label class="col-md-7">
                         <?php echo $row['amount'];?>
                     </label>
                 </div>
                 <br>

                 <div class="row">
                     <div class="col-md-5">
                         <label>From Branch :</label>
                     </div>
                     <label class="col-md-7">
                         <?php echo $row['from_branch'];?>
                     </label>
                 </div>
                 <br>

                 <div class="row">
                     <div class="col-md-5">
                         <label>From Pincode :</label>
                     </div>
                     <label class="col-md-7">
                         <?php echo $row['from_pincode'];?>
                     </label>
                 </div>
                 <br>

                 <div class="row">
                     <div class="col-md-5">
                         <label>To Branch :</label>
                     </div>
                     <label class="col-md-7">
                         <?php echo $row['to_branch'];?>
                     </label>
                 </div>
                 <br>

                 <div class="row">
                     <div class="col-md-5">
                         <label>To Pincode :</label>
                     </div>
                     <label class="col-md-7">
                         <?php echo $row['to_pincode'];?>
                     </label>
                 </div>
                 <br>

                 <div class="row">
                     <div class="col-md-5">
                         <label>Type :</label>
                     </div>
                     <label class="col-md-7">
                         <?php echo $row['type'];?>
                     </label>
                 </div>
                 <br>

                 <div class="row">
                     <div class="col-md-5">
                         <label>Booked Date :</label>
                     </div>
                     <label class="col-md-7">
                         <?php echo $row['date'];?>
                     </label>
                 </div>
                 <br>

                 <div class="row">
                     <div class="col-md-5">
                         <label>Status :</label>
                     </div>
                     <label class="col-md-7">
                         <?php echo $row['status'];?>
                     </label>
                 </div>
                 <?php } } ?>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="window.location='viewcourier.php'">Close</button>
             </div>
         </div>
     </div>
 </div>
 
 <?php 
include('user/includes/scripts.php');
?>

 <script>
     $("#detailsModal").modal('show');
 </script>
 