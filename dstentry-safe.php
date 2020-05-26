<?php
session_start();
include'dbconnection.php';
// checking session is valid for not 
if (strlen($_SESSION['id']==0)) {
  header('location:logout.php');
  } 
  else{
    if(isset($_POST['Sales']))
    {
	$date=$_POST['date'];
	$patname=$_POST['patname'];
    $pataddress=$_POST['pataddress'];
    $patphone=$_POST['patphone'];
    $docname=$_POST['docname'];
    $md1=$_POST['md1'];
    $md2=$_POST['md2'];
    $md3=$_POST['md3'];
    $md4=$_POST['md4'];
    $md5=$_POST['md5'];
    $md6=$_POST['md6'];
    $md7=$_POST['md7'];
    $qt1=$_POST['qt1'];
    $qt2=$_POST['qt2'];
    $qt3=$_POST['qt3'];
    $qt4=$_POST['qt4'];
    $qt5=$_POST['qt5'];
    $qt6=$_POST['qt6'];
    $qt7=$_POST['qt7'];
    $dstno=mysqli_query($con,"select dstmstno+1 from ctrlnos");
    $userid= $_SESSION['id'];
//   $uid=intval($_GET['uid']);
$query=mysqli_query($con,"insert into dstmst(DstMstNo, Date, UserId, PtName, PtAdd, PtPhone, DrName) values('$dstno','$date','$userid','$patname','$pataddress','$patphone','$docname'");
if($query)
{
    echo "<script>alert('inserted');</script>";
}
else
{
    echo "<script>alert('ERROR');</script>";
}
$query = mysqli_query($con, "update ctrlnos set mstdstno = '$dstno'");
$_SESSION['msg']="Profile Updated successfully";
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
</script>
<script src="js/jquery.min.js"></script>
<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
				<script type="text/javascript">
					$(document).ready(function () {
						$('#horizontalTab').easyResponsiveTabs({
							type: 'default',       
							width: 'auto', 
							fit: true 
						});
					});
				   </script>
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,400,600,700,200italic,300italic,400italic,600italic|Lora:400,700,400italic,700italic|Raleway:400,500,300,600,700,200,100' rel='stylesheet' type='text/css'>

    <title>Drugs Sales Tracker</title>
    <link href="admin/assets/css/bootstrap.css" rel="stylesheet">
    <link href="admin/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="admin/assets/css/style.css" rel="stylesheet">
    <link href="admin/assets/css/style-responsive.css" rel="stylesheet">
  </head>

  <body>

  <section id="container" >
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <a href="#" class="logo"><b>Welcome <?php echo $_SESSION['login'];?></b></a>
            <div class="nav notify-row" id="top_menu">
               
                         
                   
                </ul>
            </div>
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="logout.php">Logout</a></li>
            	</ul>
            </div>
        </header>
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a href="#"><img src="assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
              	  <h5 class="centered"><?php echo $_SESSION['login'];?></h5>
              	  	
                  <li class="mt">
                      <a href="change-password.php">
                          <i class="fa fa-file"></i>
                          <span>Change Password</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="manage-users.php" >
                          <i class="fa fa-users"></i>
                          <span>Manage Users</span>
                      </a>
                    
                   
                  </li>
                  <li class="sub-menu">
                      <a href="manage-zone.php" >
                          <i class="fa fa-cloud"></i>
                          <span>Manage Zones</span>
                      </a>
                    
                   
                  </li>
              
                  <li class="sub-menu">
                      <a href="manage-range.php" >
                          <i class="fa fa-globe"></i>
                          <span>Manage Range</span>
                      </a>
                    
                   
                  </li>
                 
              </ul>
          </div>
      </aside>


      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i>Enter Details</h3>
             	
				<div class="row">

                  <div class="col-md-12">
                      <div class="content-panel">
                            <!-- <p align="center" style="color:#F00;"><?php echo $_SESSION['msg'];?><?php echo $_SESSION['msg']=""; ?></p> -->
                          <form class="form-horizontal style-form" name="form1" method="post" action="" enctype="multipart/form-data">
                                <!-- <p style="color:#F00"><?php echo $_SESSION['msg'];?><?php echo $_SESSION['msg']="";?></p> -->
                            
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Date</label>
                                <div class="col-sm-10">
                                    <input type="date" name="date" value = "" require>
                                </div>
                            </div>
                            
                                <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Patient Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="patname" value="" require >
                                </div>
                            </div>
                            
                                <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;" >Patient Address </label>
                                <div class="col-sm-10">
                                <textarea id="PatientAddress" rows="4" cols="50" name= "pataddress" value = "" require> </textarea>
                                </div>
                            </div>
                                <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;" >Contact no. </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="patphone" value="" require>
                                </div>
                            </div>
                                <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Doctor name & Address </label>
                                <div class="col-sm-10">
                                <textarea id="PatientAddress" rows="4" cols="50" name= "pataddress" value = "" require> </textarea>
                                </div>
                            </div>

                            <div class="container py-5">
                                <div class="row">
                                    <div class="col-md-10 mx-auto">
                                        <form>
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <label for="inputFirstname">Medicine Name</label>
                                                    <input type="text" class="form-control" id="inputFirstname" placeholder="Enter medicine name" name ="md1">
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="inputLastname">Qty</label>
                                                    <input type="text" class="form-control" id="inputLastname" placeholder="Enter Qty" name="qt1">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <label for="inputAddressLine1"></label>
                                                    <input type="text" class="form-control" id="inputAddressLine1" placeholder="Enter medicine name" name="md2">
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="inputAddressLine2"></label>
                                                    <input type="text" class="form-control" id="inputAddressLine2" placeholder="Enter Qty" name="qt2">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <label for="inputCity"></label>
                                                    <input type="text" class="form-control" id="inputCity" placeholder="Enter medicine name"name="md3">
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="inputState"></label>
                                                    <input type="text" class="form-control" id="inputState" placeholder="Enter Qty"name="qt3">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <label for="inputContactNumber"></label>
                                                    <input type="text" class="form-control" id="inputContactNumber" placeholder="Enter medicine name" name = "md4">
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="inputWebsite"></label>
                                                    <input type="text" class="form-control" id="inputWebsite" placeholder="Enter Qty" name = "qt4">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <label for="inputContactNumber"></label>
                                                    <input type="text" class="form-control" id="inputContactNumber" placeholder="Enter medicine name" name = "md5">
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="inputWebsite"></label>
                                                    <input type="text" class="form-control" id="inputWebsite" placeholder="Enter Qty" name = "qt5">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <label for="inputContactNumber"></label>
                                                    <input type="text" class="form-control" id="inputContactNumber" placeholder="Enter medicine name" name = "md6">
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="inputWebsite"></label>
                                                    <input type="text" class="form-control" id="inputWebsite" placeholder="Enter Qty" name = "qt6">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <label for="inputContactNumber"></label>
                                                    <input type="text" class="form-control" id="inputContactNumber" placeholder="Enter medicine name" name = "md7">
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="inputWebsite"></label>
                                                    <input type="text" class="form-control" id="inputWebsite" placeholder="Enter Qty" name = "qt7">
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-primary px-4 float-right">Save</button>
                                    </form>
                                </div>
                                </div>
                            </div>
                            <div style="margin-left:20px;">
                                <input type="submit" name="Sales" value="Update" class="btn btn-theme">
                            </div>
                          </form>
                      </div>
                  </div>
              </div>
		</section>
        <?php } ?>
      </section></section>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/common-scripts.js"></script>
  <script>
      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
