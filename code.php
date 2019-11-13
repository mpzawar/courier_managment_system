  <?php

include("security.php");


if(isset($_POST['login_btn']))
{

$email_login= $_POST['email'];
$password_login= $_POST['password'];


 $querya = "SELECT * FROM `admin` where `email`='$email_login' && `password`='$password_login '";
 $queryb = "SELECT * FROM `branch` where `email`='$email_login' && `password`='$password_login '";
 $queryu = "SELECT * FROM `user` where `email`='$email_login' && `password`='$password_login '";
 $querys = "SELECT * FROM `staff` where `email`='$email_login' && `password`='$password_login '";

 $query_a = mysqli_query($conn, $querya);
 $query_b = mysqli_query($conn, $queryb);
 $query_u = mysqli_query($conn, $queryu);
 $query_s = mysqli_query($conn, $querys);

 $res_a = mysqli_fetch_array($query_a);
 $res_b = mysqli_fetch_array($query_b);
 $res_u = mysqli_fetch_array($query_u);
 $res_s = mysqli_fetch_array($query_s);
    
if($res_a)
    {
		$_SESSION['aid']= $res_a['id'];
		$_SESSION['username']= $res_a['name'];
	    header('Location:adminpage.php');
    }
    
else if($res_b)
    {
        $_SESSION['bid']= $res_b['id'];
		$_SESSION['username']= $res_b['name'];
	    header('Location:branchpage.php');
    
    }

else if($res_u)
    {
		$_SESSION['uid']= $res_u['id'];
		$_SESSION['username']= $res_u['name'];
	    header('Location:userpage.php');
    }
    
else if($res_s)
    {
		$_SESSION['sid']= $res_s['id'];
		$_SESSION['username']= $res_s['name'];
	    header('Location:staffpage.php');
    }
    
else
    {
        $_SESSION['status']='Email id / Password is Invalid';
		header('Location:index.php#section-login');
	}
}


?>