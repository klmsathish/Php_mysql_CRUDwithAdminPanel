<?php
session_start();
error_reporting(0);
include("dbconnection.php");
if(isset($_POST['login']))
{
  $username=$_POST['username'];
  $pass=$_POST['password'];
$ret=mysqli_query($con,"SELECT * FROM users WHERE UserName='$username' and password='$pass'");
$num=mysqli_fetch_array($ret);
if($num>0)
{
$extra="dstentry.php";
$_SESSION['login']=$num['PName'];
$_SESSION['id']=$num['UserId'];
$_SESSION['CPName']=$num['CPName'];

echo "<script>window.location.href='".$extra."'</script>";
exit();
}
else
{
$_SESSION['action1']="*Invalid username or password";
$extra="index.php";
echo "<script>window.location.href='".$extra."'</script>";
exit();
}
}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Sundar">
    <meta name="keyword" content="Drug Sales Tracking, DST, Poovai Pharmacy">
<br>
<br>
<br>
<br>


<br>
<br>
<br>
<br>

    <title>Pharmacy | Login</title>
    <link href="admin/assets/css/bootstrap.css" rel="stylesheet">
    <link href="admin/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="admin/assets/css/style.css" rel="stylesheet">
    <link href="admin/assets/css/style-responsive.css" rel="stylesheet">
  </head>

<style>
body {
  background-image: url('images/med_bg.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}
right{
  text-align: right;
}
</style>

  <body>
	  <div id="login-page">
	  	<div class="container">
      
	  	
		      <form class="form-login" action="" method="post">
		        <h2 class="form-login-heading">DRUGS SALES TRACKER</h2>
                  <p style="color:#F00; padding-top:20px;" align="center">
                    <?php echo $_SESSION['action1'];?><?php echo $_SESSION['action1']="";?></p>
		        <div class="login-wrap">
		            <input type="text" name="username" class="form-control" placeholder="User ID" autofocus>
		            <br>
		            <input type="password" name="password" class="form-control" placeholder="Password"><br >
		            <input  name="login" class="btn btn-theme btn-block" type="submit">
                <br>
                <div class = "right"><font size = "3"> <a href = "usersignup.php">New User... Register Here</a></font></div>
		        </div>
		      </form>	  	
	  	
	  	</div>
	  </div>
    <script src="admin/assets/js/jquery.js"></script>
    <script src="admin/assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="admin/assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("admin/assets/img/login-bg.jpg", {speed: 500});
    </script>


  </body>
</html>
