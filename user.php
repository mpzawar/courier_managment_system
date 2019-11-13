<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
 include('security.php');
 error_reporting(1);
include('includes/header.php');
include('includes/navbar.php');
session_start();
if(!isset($_SESSION["uid"])){
    header('Location:user.php');
}
?>
<html>
    

  
                <div class="col-md-6"><a href="addcourier.php" >
        
                     
                         <h2>Add new Couriers</h2>
                    </div></a>
                    <a href="viewcourier.php" >
                   
                         <h2>View My Couriers</h2>
                    </div></a>
                </div>
                
            </div>
            
        </div>
        
        
    </body>
   
</html>