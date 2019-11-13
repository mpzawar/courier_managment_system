<?php
include('security.php');
include('admin/includes/header.php');
include('admin/includes/navbar.php');
?>

<?php 
	require_once('database/config.php');
	$user_id=$_GET['uid'];
    $select="SELECT * FROM `user` where id ='$user_id'";
    $query= mysqli_query($conn, $select);
    $res= mysqli_fetch_object($query);
  
    
?>

<div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">User</h1>
          <div class="row">
          <div class="col-lg-12">

              <!-- Add User -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Edit User</h6>
                </div>
             

<div class="container">
<div class="row justify-content-center">
<div class="col-xl-6 col-lg-6 col-md-6">
<div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
        <div class="col-lg-12">
        <div class="p-5">
          
<h4>Update User</h4>
<br>
<form action="updateuser.php" method="post"  enctype="multipart/form-data">

    <label > Name :</label>
    <input type="text" class="form-control" name="name" value="<?php echo $res->name; ?>">
    <label> Email :</label>
	<input type="text" class="form-control"  name="email"  value="<?php echo $res->email; ?>">
	<label> Mobile :</label>
	<input type="text" class="form-control"  name="mobno" value="<?php echo $res->mobno; ?>">

<br>
	<div class="col-6">
	<input type="submit"  class="btn btn-danger btn-user btn-block btn-lg text-center "  value="UPDATE">

</form>
</div>
</div>
          </div>
        </div>
      </div>
    </div>

  </div>
 </div>
  </div>
   </div>
    </div>
</div>

</div>


<?php 
include('admin/includes/scripts.php');
include('includes/footer.php');
?>  
