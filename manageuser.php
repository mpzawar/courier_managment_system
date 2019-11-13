<?php
require_once('database/config.php');
include('security.php');
include('includes/style.php');
include('admin/includes/header.php');
include('admin/includes/navbar.php');
//session_start();
//if(!isset($_SESSION["branch"])){
//header('Location:login.php');}

if($_SERVER['REQUEST_METHOD']=='POST'){
    
    if(isset($_POST["sname"])){
     $name = $_POST["sname"];
     $email = $_POST["semail"];
     $mobno = $_POST["sMob"];
     $password = $_POST["sPwd"];
      //$branchId = $_SESSION['bid'];
    //$insert = "INSERT INTO `user` (`name`,`email`,`mobile`,`address`,`bid`,`password`) VALUES ('$name','$email', '$mobile','$address','$bid','123')";
   $insert="INSERT INTO `user` (`name`, `email`, `mobno`, `password`) VALUES ('$name', '$email', '$mobno' ,'$password')" ;
    // echo '/n'.$insert;
    mysqli_query($conn, $insert);
    //header("Location:addstaff.php");

   }}
?>


<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">User</h1>
    <div class="row">
        <div class="col-lg-12">
            <!-- Add Categories -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Add New User</h6>
                </div>

                <html>

                <head>

                <body>
                    <div class="container-fluid">

                        <div class="row" style="width:100%;">
                            <div class="col-md-5">
                                <div class="container-fluid" style="margin-top: 10% ;">
                                    <div class="row justify-content-center">

                                        <div class="media-container-column col-lg-8" data-form-type="formoid">
                                            <div data-form-alert="" hidden="">
                                            </div>
                                            <br>
                                            <br>
                                            <form class="mbr-form" action="manageuser.php" method="post">
                                                <div class="row row-sm-offset">
                                                    <div class="col-md-7 multi-horizontal" data-for="name">
                                                        <div class="form-group ">
                                                            <label class="text-dark h5  " for="email-form1-4t"> Name </label><br>
                                                            <input type="text" class="form-control" name="sname" data-form-field="Name" required="" id="name-form1-4t">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-7 multi-horizontal" data-for="email">
                                                        <div class="form-group">
                                                            <label class="text-dark h5" for="email-form1-4t">Email</label>
                                                            <input type="email" class="form-control" name="semail" required="">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-7 multi-horizontal" data-for="phone">
                                                        <div class="form-group">
                                                            <label class="text-dark h5" for="phone-form1-4t">Phone</label>
                                                            <input type="number" maxlength="10" class="form-control" name="sMob" data-form-field="Phone" id="phone-form1-4t">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group" data-for="password">
                                                    <label class="text-dark h5" for="message-form1-4t">Password</label>
                                                    <input type="password" class="form-control" name="sPwd">
                                                </div>

                                                <span class="input-group-btn">
                                                    <button href="" type="submit" class="btn btn-primary btn-form display-4">Register User</button>
                                                </span>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-7">
                                <div class="" style="margin-top:10%; width: 100%;">
                                    <h2> User List</h2>
                                     <table id="datatable" class="table table-striped table-bordered">

                                        <thead>
                                            <tr>
                                                <th>Sr no.</th>
                                                <th>name</th>
                                                <th>Email</th>
                                                <th>Mobile</th>
                                                <th>Action</th>
                                                <th>Remove User</th>
                                            </tr>
                                        </thead>
                                    <tbody>
                                <?php 
                                include('database/config.php');
                               
                                $mysqli="select * from user";
                                //$mysqli="select * from staff"; 
                                $appresult = $conn->query($mysqli);
                                $i=1;
                                while($res=mysqli_fetch_assoc($appresult)){ 
                                ?>
                                            <tr>
                                                <td><?php echo $i++;?></td>
                                                <td><?php echo $res['name'];?></td>
                                                <td><?php echo $res['email'];?></td>
                                                <td><?php echo $res['mobno'];?></td>
                                                
                                                <td> <a href="javascript:;" class="edit_user" id="<?php echo $res['id']; ?>" 
                                                  data-toggle="modal" data-target="#editModal">
                                                  Edit </a> </td>
                                                <td>
                                                    <form method="post" action="deleteuser.php">
                                                        <input type="hidden" value=<?php echo $res['id'];?> name="uid">
                                                        <button type="submit" class="btn btn-danger"><span class="fa fa-trash"></span></button>
                                                    </form>
                                                </td>
                                             
                                             

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
      <form action="updateuser.php" method="post"  enctype="multipart/form-data">

<label > Name :</label>
<input type="text" class="form-control" name="name1" id="name1">

    <label> Email :</label>
	<input type="text" class="form-control"  name="email1" id="email1">
	
    
    <label> Mobile :</label>
	<input type="text" class="form-control"  name="mobile1" id="mobile1">
    
    <input type="hidden" class="form-control" name="user_id" id="user_id">

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
<script src="jquery.min.js"></script>>
 <script>

$(document).ready( function () {
              //alert("HH");
				$('.edit_user').click(function(){
					var id=$(this).attr('id');
                    //alert(id);
					$.ajax({
						url:'single_user.php',
						data:'id= '+ id,
						dataType:'json',
						method:'post',
						success:function(res){
						console.log(res);
			  $('#name1').val(res.name);
              $('#email1').val(res.email);
              $('#mobile1').val(res.mobno);
              $('#user_id').val(res.id);
            
						}
					})
				})
            });
			
			

</script>
<?php
include('admin/includes/scripts.php');
/*include('includes/footer.php');*/
?>
