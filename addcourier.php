<?php 
include('security.php');
include('includes/style.php');
include('user/includes/header.php');
include('user/includes/navbar.php');

?>


<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Couriers</h1>

    <div class="row">

        <div class="col-lg-12">

            <!-- Add Categories -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Send Courier to</h6>
                </div>


                <div class="container" style="padding-top: 3%;">
                    <div class="row justify-content-center" style="background-color: rgba(225,225,225,0.6); padding: 25px;">
                        <div class="media-container-column col-lg-8" data-form-type="formoid">
                            <div data-form-alert="" hidden="">
                                Thanks for filling out the form!
                            </div>

                            <form class="mbr-form" action="courier_process.php" method="post" data-form-title="Mobirise Form">
                                <div class="row row-sm-offset">
                                    <div class="col-md-4 multi-horizontal" data-for="name">
                                        <div class="form-group">
                                            <label class="form-control-label mbr-fonts-style display-7" for="name-form1-4t">To Name</label>
                                            <input type="text" class="form-control" name="ctname" data-form-field="Name" required="" id="ctname">
                                        </div>
                                    </div>
                                    <div class="col-md-4 multi-horizontal" data-for="email">
                                        <div class="form-group">
                                            <label class="form-control-label mbr-fonts-style display-7" for="email-form1-4t">To Email</label>
                                            <input type="email" class="form-control" name="ctemail" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-4 multi-horizontal" data-for="mobile">
                                        <div class="form-group">
                                            <label class="form-control-label mbr-fonts-style display-7" for="phone-form1-4t">To Phone</label>
                                            <input type="number" maxlength="10" class="form-control" name="ctmob" required="" data-form-field="Phone" id="phone-form1-4t">
                                        </div>
                                    </div>
                                </div>
                                <div class="row row-sm-offset">
                                    <div class="col-md-4 multi-horizontal" data-for="name">
                                        <div class="form-group">
                                            <label class="form-control-label mbr-fonts-style display-7" for="name-form1-4t">From Name</label>
                                            <input type="text" class="form-control" name="cfname" data-form-field="Name" required="" id="cfname" value="cfname" readonly>
                                            <input type="hidden" id="uid" name="uid" uid="<?php echo $_SESSION["uid"]?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4 multi-horizontal" data-for="email">
                                        <div class="form-group">
                                            <label class="form-control-label mbr-fonts-style display-7" for="email-form1-4t">From Email</label>
                                            <input type="email" class="form-control" name="cfemail" required="" id="cfmail" value="cfemail" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4 multi-horizontal" data-for="mobile">
                                        <div class="form-group">
                                            <label class="form-control-label mbr-fonts-style display-7" for="phone-form1-4t">From Phone</label>
                                            <input type="number" maxlength="10" class="form-control" name="cfmob" id="cfmob" required="" data-form-field="Phone" id="phone-form1-4t" value="cfmob" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row row-sm-offset">
                                    <div class="col-md-4 multi-horizontal" data-for="Courier Weight">
                                        <div class="form-group">
                                            <label class="form-control-label mbr-fonts-style display-7" for="name-form1-4t">Courier Weight (in gms)</label>
                                            <select type="text" class="form-control" name="cweight" data-form-field="Name" required="" id="name-form1-4t">
                                                <option value="null">Select Courier Weight</option>
                                                <option> 1gm to 100 gm</option>
                                                <option> 101gm to 200 gm</option>
                                                <option> 201gm to 500 gm</option>
                                                <option> 501gm to 1000 gm</option>
                                                <option> Above 1 kg</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 multi-horizontal" data-for="Courier type">
                                        <div class="form-group">
                                            <label class="form-control-label mbr-fonts-style display-7" for="email-form1-4t">Courier Type</label>
                                            <select class="form-control" name="ctype" data-form-field="Email" required="" id="email-form1-4t">
                                                <option value="null">Select Courier Type</option>
                                                <option>Documents</option>
                                                <option>Household Appliance</option>
                                                <option>Electronics Items</option>
                                                <option>Chemicals</option>
                                                <option>Cloths and Gifts</option>
                                                <option>Others</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 multi-horizontal" data-for="amount">
                                        <div class="form-group">
                                            <label class="form-control-label mbr-fonts-style display-7" for="phone-form1-4t">Delivery Type</label>
                                            <select class="form-control" name="deltype">
                                                <option value="null">Select Delivery Type</option>
                                                <option>Express Delivery</option>
                                                <option>Normal Delivery</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row row-sm-offset">
                                    <div class="col-md-4 multi-horizontal" data-for="Courier Weight">
                                        <div class="form-group">
                                            <label class="form-control-label mbr-fonts-style display-7" for="name-form1-4t">Select From Branch</label>
                                            <select name="cbranch" type="text" class="form-control" data-form-field="Name" required="" id="cbranch">
                                                <option value="null">Select From Branch</option>
                                                <?php $branch="select * from branch"; 
                                                $appresult = $conn->query($branch);
                                                if ($appresult->num_rows > 0) {
                                                while($row=$appresult->fetch_assoc()){?>
                                                <option><?php echo $row['name'];?></option>
                                                <?php } } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 multi-horizontal" data-for="Courier type">
                                        <div class="form-group">
                                            <label class="form-control-label mbr-fonts-style display-7" for="email-form1-4t">From Branch Pincode</label>
                                            <input class="form-control" id="cpincode" name="cpincode" required="" value="cpincode" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4 multi-horizontal" data-for="amount">
                                        <div class="form-group">
                                            <label class="form-control-label mbr-fonts-style display-7" for="phone-form1-4t">Courier Status</label>
                                            <input class="form-control" name="cstatus" value="Book" value="cstatus" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row row-sm-offset">
                                    <div class="col-md-4 multi-horizontal" data-for="Courier Weight">
                                        <div class="form-group">
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
                                    </div>
                                    <div class="col-md-4 multi-horizontal" data-for="Courier type">
                                        <div class="form-group">
                                            <label class="form-control-label mbr-fonts-style display-7" for="email-form1-4t">To Branch Pincode</label>
                                            <input class="form-control" id="ctpincode" name="ctpincode" required="" value="ctpincode" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4 multi-horizontal" data-for="amount">
                                        <div class="form-group">
                                            <label class="form-control-label mbr-fonts-style display-7" for="phone-form1-4t">Amount</label>
                                            <input class="form-control" name="camount">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group" data-for="address">
                                    <label class="form-control-label mbr-fonts-style display-7" for="message-form1-4t">Address</label>
                                    <textarea type="text" class="form-control" name="cadd" required="" rows="2"></textarea>
                                </div>

                                <span class="input-group-btn">
                                    <button href="" type="submit" class="btn btn-primary btn-form display-4">Book Courier</button>
                                </span>
                            </form>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>

<script src="jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#cbranch').change(function() {
            var myElement = document.getElementById('cbranch'),
                cbranchValue = myElement.value;
            var cpincode = $(this).attr('cbranchValue');
            // alert(cbranchValue);
            $.ajax({
                url: 'pincode.php',
                data: 'cbranchValue=' + cbranchValue,
                dataType: 'json',
                method: 'post',
                success: function(res) {
                    //console.log(res);
                    $('input[name="cpincode"]').val(res.pincode);
                }
            })
        })
    });

</script>
<script>
    $(document).ready(function() {
        $('#ctbranch').change(function() {
            var myElement = document.getElementById('ctbranch'),
                cbranchtValue = myElement.value;
            var ctpincode = $(this).attr('cbranchtValue');
            // alert(cbranchtValue);
            $.ajax({
                url: 'pincodet.php',
                data: 'cbranchtValue=' + cbranchtValue,
                dataType: 'json',
                method: 'post',
                success: function(rest) {
                    //console.log(res);
                    $('input[name="ctpincode"]').val(rest.pincode);
                }
            })
        })
    });

</script>

<script>
    $(document).ready(function() {
        $('#uid').show(function() {
            var uid = $(this).attr('uid');
            // alert(uid);
            $.ajax({
                url: 'userfetchdetails.php',
                data: 'uid=' + uid,
                dataType: 'json',
                method: 'post',
                success: function(resi) {
                    //console.log(res);
                    $('input[name="cfname"]').val(resi.name);
                    $('input[name="cfemail"]').val(resi.email);
                    $('input[name="cfmob"]').val(resi.mobno);
                }
            })
        })
    });

</script>
<?php 
include('user/includes/scripts.php');
/*include('includes/footer.php');*/
?>
