<?php


?>

<!-- User Modal -->
<div class="modal fade" id="regUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="regUser">User Registration</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="registerU.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-11 text-left">
                                <input type="text dark h3" class="form-control" name="name" placeholder="Full Name" required>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-11 text-left">
                                <input type="email" class="form-control" name="email" placeholder="Email" required>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-11 text-left">
                                <input type="number" class="form-control" name="mobno" placeholder="Mobile No" required>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-11 text-left">
                                <input type="password" class="form-control" name="password" placeholder="Password" required>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Register</button>
            </div>
        </div>
    </div>
</div>
</form>

<!-- Branch Modal -->
<div class="modal fade" id="regBranch" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="regUser">Branch Registration</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="registerB.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-11 text-left">
                                <input type="text dark h3" class="form-control" name="name" placeholder="Branch Name" required>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-11 text-left">
                                <input type="email" class="form-control" name="email" placeholder="Email" required>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-11 text-left">
                                <input type="number" class="form-control" name="mobno" placeholder="Mobile No" required>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-11 text-left">
                                <input type="text" class="form-control" name="add1" placeholder="Address" required>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-11 text-left">
                                <input type="number" class="form-control" name="pincode" placeholder="Enter Area Pincode" required>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-11 text-left">
                                <input type="password" class="form-control" name="password" placeholder="Password" required>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Register</button>
            </div>
        </div>
    </div>
</div>
</form>

