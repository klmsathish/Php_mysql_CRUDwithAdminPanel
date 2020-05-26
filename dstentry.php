<?php
session_start();
include'dbconnection.php';
// checking session is valid or not 

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
    $dst=mysqli_query($con,"select DstMstNo+1 as dstnumber from CtrlNos");
    $row = mysqli_fetch_assoc($dst);

    $dstno = $row['dstnumber'];
    //echo "DST Number is '$dstno'";
    $userid= $_SESSION['id'];
//   $uid=intval($_GET['uid']);
// insert into dstmst table
$sql = "insert into DstMst(DstMstNo, TranDate, UserId, PtName, PtAdd, PtPhone, DrName) values($dstno,'$date',$userid,'$patname','$pataddress','$patphone','$docname')";
//echo "SQL query is : '$sql'";
$query = mysqli_query($con,$sql);
//if($query)
//{
//    echo "<script>alert('inserted');</script>";
//}
//else
//{
//    echo "<script>alert('ERROR');</script>";
//}

// insert into dstdtl table
// $m = "$".'md'.'$x';
// $q = "$".'qt'.'$x';
if(strlen(trim($md1)) > 0 && intval($qt1) > 0)
{
    $sql = "insert into DstDtl(DstMstNo, MDName, MDQty) values($dstno, '$md1', $qt1)";
    //echo "SQL query is : '$sql'";
    $query = mysqli_query($con,$sql);
}
if(strlen(trim($md2)) > 0 && intval($qt2) > 0)
{
    $sql = "insert into DstDtl(DstMstNo, MDName, MDQty) values($dstno, '$md2', $qt2)";
    $query = mysqli_query($con,$sql);
}
if(strlen(trim($md3)) > 0 && intval($qt3) > 0)
{
    $sql = "insert into DstDtl(DstMstNo, MDName, MDQty) values($dstno, '$md3', $qt3)";
    $query = mysqli_query($con,$sql);
}
if(strlen(trim($md4)) > 0 && intval($qt4) > 0)
{
    $sql = "insert into DstDtl(DstMstNo, MDName, MDQty) values($dstno, '$md4', $qt4)";
    $query = mysqli_query($con,$sql);
}
if(strlen(trim($md5)) > 0 && intval($qt5) > 0)
{
    $sql = "insert into DstDtl(DstMstNo, MDName, MDQty) values($dstno, '$md5', $qt5)";
    $query = mysqli_query($con,$sql);
}
if(strlen(trim($md6)) > 0 && intval($qt6) > 0)
{
    $sql = "insert into DstDtl(DstMstNo, MDName, MDQty) values($dstno, '$md6', $qt6)";
    $query = mysqli_query($con,$sql);
}
if(strlen(trim($md7)) > 0 && intval($qt7) > 0)
{
    $sql = "insert into DstDtl(DstMstNo, MDName, MDQty) values($dstno, '$md7', $qt7)";
    $query = mysqli_query($con,$sql);
}


echo "Data Added successfully";

//update dstmstno in ctrlnos table
$query = mysqli_query($con, "update CtrlNos set DstMstNo = $dstno");
if($query)
{
    echo "<script>alert('Data Saved');</script>";
}
else
{
    echo "<script>alert('ERROR in inserting detail');</script>";
}
}
$cdate = date("Y-m-d");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['postdata'] = $_POST;
    unset($_POST);
    header("Location: ".$_SERVER['PHP_SELF']);
    exit;
}

// unset($_POST);
?>

<!DOCTYPE html>

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
              
              	  <p class="centered"><a href="#"><img src="admin/assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
              	  <h5 class="centered"><?php echo $_SESSION['CPName'];?></h5>
              	  	

                    <li class="sub-menu">
                      <a href="dstentry.php" >
                          <i class="fa fa-users"></i>
                          <span>Enter Sales Data</span>
                      </a>
                    </li> 
                    
                    <li class="sub-menu">
                      <a href="dstentryalter.php" >
                          <i class="fa fa-edit"></i>
                          <span>Edit Sales Data</span>
                      </a>
                    </li> 
                    <li class="sub-menu">
                            <a href="user-change-password.php">
                                <i class="fa fa-file"></i>
                                <span>Change Password</span>
                            </a>
                    </li>  
            
              </ul>
          </div>
      </aside>


      <section id="main-content">
          <section class="wrapper">
              <br>

          	<h3><i class="fa fa-angle-right"></i>Enter Details</h3>
             	
				<div class="row">

                  <div class="col-md-12">
                      <div class="content-panel">
                      <p align="center" style="color:#F00;"><?php echo $_SESSION['message'];?><?php echo $_SESSION['mesaage']=""; ?></p>
                        <!-- <form class="form-horizontal style-form" name="form1" method="post" action="" onSubmit="return valid();"> -->
                           <p style="color:#F00"><?php echo $_SESSION['message'];?><?php echo $_SESSION['message']="";?></p>

                        <form class="form-horizontal style-form" name="form1" method="post" action="" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Date</label>
                                <div class="col-sm-10">
                                    <input type="date" name="date" value = "<?php echo $cdate;?>" required>
                                </div>
                            </div>
                                
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Patient Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="patname" value="" required >
                                </div>
                            </div>
                                
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;" >Patient Address </label>
                                <div class="col-sm-10">
                                    <textarea id="PatientAddress" rows="4" cols="50" name= "pataddress" value = "" required> </textarea>
                                </div>
                            </di
                            .v>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;" >Contact no. </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="patphone" value="" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Doctor name & Address </label>
                                <div class="col-sm-10">
                                    <textarea id="PatientAddress" rows="4" cols="50" name= "docname" value = "" required> </textarea>
                                </div>
                            </div>
                            
                            <div class="container py-5">
                                <div class="row">
                                    <div class="col-md-10 mx-auto">
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <label>Medicine Name</label>
                                                    <input type="text" class="form-control" placeholder="Enter medicine name" name ="md1" required>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label> Qty</label>
                                                    <input type="text" class="form-control"  placeholder="Enter Qty" name="qt1" required>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-10 mx-auto">
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" placeholder="Enter medicine name" name ="md2">
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control"  placeholder="Enter Qty" name="qt2">
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            
                                <div class="row">
                                    <div class="col-md-10 mx-auto">
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" placeholder="Enter medicine name" name ="md3">
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control"  placeholder="Enter Qty" name="qt3">
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            
                                <div class="row">
                                    <div class="col-md-10 mx-auto">
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" placeholder="Enter medicine name" name ="md4">
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control"  placeholder="Enter Qty" name="qt4">
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            
                                <div class="row">
                                    <div class="col-md-10 mx-auto">
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" placeholder="Enter medicine name" name ="md5">
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control"  placeholder="Enter Qty" name="qt5">
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            
                                <div class="row">
                                    <div class="col-md-10 mx-auto">
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" placeholder="Enter medicine name" name ="md6">
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control"  placeholder="Enter Qty" name="qt6">
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-10 mx-auto">
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" placeholder="Enter medicine name" name ="md7">
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control"  placeholder="Enter Qty" name="qt7">
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            <div style="margin-left:20px;">
                                <input type="submit" name="Sales" value="Update" class="btn btn-theme" onclick="myAlert()>
                            </div>          
                        </form>
                      </div>
                  </div>
              </div>
		</section>
        <?php } ?>
      </section></section>
    <script src="admin/assets/js/jquery.js"></script>
    <script src="admin/assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="admin/assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="admin/assets/js/jquery.scrollTo.min.js"></script>
    <script src="admin/assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="admin/assets/js/common-scripts.js"></script>
  <script>
      $(function(){
          $('select.styled').customSelect();
      });
      function getDate(){
    var today = new Date();


document.getElementById("date").value = today.getFullYear() + '-' + ('0' + (today.getMonth() + 1)).slice(-2) + '-' + ('0' + today.getDate()).slice(-2);
function myAlert() {
   alert(" Data Added Successfully!!");
}  
</script>

  </body>
</html>
