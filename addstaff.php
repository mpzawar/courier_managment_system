<?php
require_once('database/config.php');
include('security.php');
include('includes/style.php');
include('branch/includes/header.php');
include('branch/includes/navbar.php');
//session_start();
//if(!isset($_SESSION["branch"])){
//header('Location:login.php');}

if($_SERVER['REQUEST_METHOD']=='POST'){
    
    if(isset($_POST["sname"])){
     $bid = $_SESSION["bid"];
     $name = $_POST["sname"];
     $email = $_POST["semail"];
     $mobile = $_POST["sMob"];
     $address = $_POST["sAdd"];
      //$branchId = $_SESSION['bid'];
    $insert = "INSERT INTO `staff` (`name`,`email`,`mobile`,`address`,`bid`,`password`) VALUES ('$name','$email', '$mobile','$address','$bid','123')";
   // echo '/n'.$insert;
    mysqli_query($conn, $insert);
    //header("Location:addstaff.php");

   }}
?>


<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Staff</h1>
    <div class="row">
        <div class="col-lg-12">
            <!-- Add Categories -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Add New Staff</h6>
                </div>

                <html>

                <head>

                <body>
                    <div class="container-fluid">

                        <div class="row" style="width:100%;">
                            <div class="col-md-6">
                                <div class="container-fluid" style="margin-top: 10% ;">
                                    <div class="row justify-content-center">

                                        <div class="media-container-column col-lg-8" data-form-type="formoid">
                                            <div data-form-alert="" hidden="">
                                            </div>
                                            <br>
                                            <br>
                                            <form class="mbr-form" action="addstaff.php" method="post">
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

                                                <div class="form-group" data-for="address">
                                                    <label class="text-dark h5" for="message-form1-4t">Address</label>
                                                    <textarea type="text" class="form-control" name="sAdd" rows="7"></textarea>
                                                </div>

                                                <span class="input-group-btn">
                                                    <button href="" type="submit" class="btn btn-primary btn-form display-4">Register Staff</button>
                                                </span>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="" style="margin-top:10%; width: 100%;">
                                    <h2> Staff Members</h2>
                                     <table id="datatable" class="table table-striped table-bordered">

                                        <thead>
                                            <tr>
                                                <th>Sr no.</th>
                                                <th>name</th>
                                                <th>Email</th>
                                                <th>Mobile</th>
                                                <th>Address</th>
                                                <th>Remove Staff</th>
                                            </tr>
                                        </thead>
                                    <tbody>
                                <?php 
                                include('database/config.php');
                                $bid = $_SESSION["bid"];
                                $mysqli="select * from staff where bid = '$bid'";
                                //$mysqli="select * from staff"; 
                                $appresult = $conn->query($mysqli);
                                $i=1;
                                while($res=mysqli_fetch_assoc($appresult)){ 
                                ?>
                                            <tr>
                                                <td><?php echo $i++;?></td>
                                                <td><?php echo $res['name'];?></td>
                                                <td><?php echo $res['email'];?></td>
                                                <td><?php echo $res['mobile'];?></td>
                                                <td><?php echo $res['address'];?></td>
                                                <td>
                                                    <form method="post" action="deletestaff.php">
                                                        <input type="hidden" value=<?php echo $res['id'];?> name="sid">
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
                    </div>
                </body>

                </html>

                <?php 
include('branch/includes/scripts.php');
/*include('includes/footer.php');*/
?>
