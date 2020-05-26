<?php
session_start();
include'dbconnection.php';
//Checking session is valid or not
if (strlen($_SESSION['id']==0)) {
  header('location:logout.php');
  } else{

// for updating user info    
if(isset($_POST['Submit']))
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
    $dstno = $_GET['dstmstno'];
    
//   $id=intval($_GET['id']);
$q = "update DstMst set Trandate='$date',PtName='$patname',PtAdd='$pataddress',PtPhone ='$patphone',DrName ='$docname' where DstMstNo = $dstno" ;
// echo $q;
$query=mysqli_query($con, $q);
$r = "Delete from DstDtl WHERE DstMstNo = $dstno" ;
$query = mysqli_query($con, $r);

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

$_SESSION['msg']="Sales details Updated successfully";
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

    <title>User | Edit Data</title>
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

      
      <?php $ret=mysqli_query($con,"select M.*, U.PName from DstMst M, users U where M.UserId = U.UserId AND M.DstMstNo = '".$_GET['dstmstno']."'") ;
	  while($row=mysqli_fetch_array($ret))
	  
	  {?>
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i>Edit Sales Data</h3>
             	
				<div class="row">
                <div class="col-md-12">
                      <div class="content-panel">
                      <p align="center" style="color:#F00;"><?php echo $_SESSION['msg'];?><?php echo $_SESSION['msg']=""; ?></p>
                        <!-- <form class="form-horizontal style-form" name="form1" method="post" action="" onSubmit="return valid();"> -->
                           <p style="color:#F00"><?php echo $_SESSION['msg'];?><?php echo $_SESSION['msg']="";?></p>
                        <form class="form-horizontal style-form" name="form1" method="post" action="dstentryalter.php" enctype="multipart/form-data" onSubmit = "return valid();">
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Date</label>
                                <div class="col-sm-10">
                                    <input type="date" name="date" value = "<?php echo $row['TranDate'];?>" required>
                                </div>
                            </div>
                                
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Patient Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="patname" value="<?php echo $row['PtName'];?>" required >
                                </div>
                            </div>
                                
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;" >Patient Address </label>
                                <div class="col-sm-10">
                                    <textarea id="PatientAddress" rows="4" cols="50" name= "pataddress" required><?php echo $row['PtAdd'];?> </textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;" >Contact no. </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="patphone" value="<?php echo $row['PtPhone'];?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Doctor name & Address </label>
                                <div class="col-sm-10">
                                    <textarea id="DoctorName" rows="4" cols="50" name= "docname" required><?php echo $row['DrName'];?> </textarea>
                                </div>
                            </div>
                        <?php } ?> 
                        <div class="container py-5"> 
                        <?php 
                        $ret1=mysqli_query($con,"select * from DstDtl where DstMstNo = '".$_GET['dstmstno']."'") ;
                        $mdn = array("","","","","","","");
                        $mdq = array(0, 0, 0, 0, 0, 0, 0);
                        $c = 0;
                        while($row1=mysqli_fetch_array($ret1)) 
                        {
                            $mdn[$c] = $row1["MDName"];
                            $mdq[$c] = $row1["MDQty"];
                            $c = $c + 1;
                        } ?>
                                <div class="row">
                                    <div class="col-md-10 mx-auto">
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <label>Medicine Name</label>
                                                    <input type="text" class="form-control" placeholder="Enter medicine name" name ="md1" value = "<?php echo $mdn[0];?>" required>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label> Qty</label>
                                                    <input type="text" class="form-control"  placeholder="Enter Qty" name="qt1" value = "<?php echo $mdq[0];?>" required>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-10 mx-auto">
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" placeholder="Enter medicine name" name ="md2" value = "<?php echo $mdn[1];?>">
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control"  placeholder="Enter Qty" name="qt2" value = "<?php echo $mdq[1];?>">
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            
                                <div class="row">
                                    <div class="col-md-10 mx-auto">
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" placeholder="Enter medicine name" name ="md3" value = "<?php echo $mdn[2];?>">
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control"  placeholder="Enter Qty" name="qt3" value = "<?php echo $mdq[2];?>">
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            
                                <div class="row">
                                    <div class="col-md-10 mx-auto">
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" placeholder="Enter medicine name" name ="md4" value = "<?php echo $mdn[3];?>">
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control"  placeholder="Enter Qty" name="qt4" value = "<?php echo $mdq[3];?>">
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            
                                <div class="row">
                                    <div class="col-md-10 mx-auto">
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" placeholder="Enter medicine name" name ="md5" value = "<?php echo $mdn[4];?>">
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control"  placeholder="Enter Qty" name="qt5" value = "<?php echo $mdq[4];?>">
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            
                                <div class="row">
                                    <div class="col-md-10 mx-auto">
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" placeholder="Enter medicine name" name ="md6" value = "<?php echo $mdn[5];?>">
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control"  placeholder="Enter Qty" name="qt6" value = "<?php echo $mdq[5];?>">
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-10 mx-auto">
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" placeholder="Enter medicine name" name ="md7" value = "<?php echo $mdn[6];?>">
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control"  placeholder="Enter Qty" name="qt7" value = "<?php echo $mdq[6];?>">
                                                </div>
                                            </div>
                                    </div>
                                </div> 
                            <div style="margin-left:20px;">
                                <input type="submit" name="Submit" value="Update" class="btn btn-theme" onclick="myAlert()">
                            </div>          
                        </form>
                      </div>
                  </div>
                  
	                  
                  
              </div>
		</section>
        
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
      function myAlert() {
   alert("Sales Data Updated Successfully!!");
}
  </script>

  </body>
</html>
<?php } ?>