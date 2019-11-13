 <?php
 include('includes/style.php');
 include('includes/scripts.php');
 ?>
 <html>
 <head>
 </head>
 <body>
<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registered Successfully !</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Kindly continue to login.
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="window.location='index.php#section-home'">Close</button>
        <button type="button" class="btn btn-primary" onclick="window.location='index.php#section-login'">Login</button>
      </div>
    </div>
  </div>
</div>
 
     <script>$("#loginModal").modal('show')</script>
 </body>
 </html>
