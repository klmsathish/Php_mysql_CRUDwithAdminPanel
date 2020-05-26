<?php
session_start();
include'dbconnection.php';
// checking session is valid for not 
if (strlen($_SESSION['id']==0)) {
  header('location:dilogout.php');
  } else{

// for deleting user
if(isset($_GET['id']))
{
$adminid=$_GET['id'];
$msg=mysqli_query($con,"delete from users where id='$adminid'");
if($msg)
{
echo "<script>alert('Data deleted');</script>";
}
}
// if(isset($_POST['Sales']))
// {
//   $trandate=$_POST['date'];
//   $did = $_SESSION['id'];
// }
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


      <section id="main-content">
          <section class="wrapper">
              <br>
              <br>
          	<!-- <h3><i class="fa fa-angle-right"></i>Enter Details</h3> -->
             	
				<div class="row">

                  <div class="col-md-12">
                      <div class="content-panel">
                            
                        <!-- <form class="form-horizontal style-form" name="form1" method="post" action="getexcel.php" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Date</label>
                                <div class="col-sm-10">
                                    <input type="date" name="date" value = "" required>
                                    <input type="text" name "id" value = <?php echo "{$_SESSION['id']}" ?> hidden>
                                </div>
                            </div> -->
                                
                            <!-- <div class="form-group">
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
                            </div>
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
                                                    <input type="text" class="form-control" placeholder="Enter medicine name" name ="md1">
                                                </div>
                                                <div class="col-sm-6">
                                                    <label> Qty</label>
                                                    <input type="text" class="form-control"  placeholder="Enter Qty" name="qt1">
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
                                </div> -->

          	                            <!-- <h3><i class="fa fa-angle-right"></i> Manage Users</h3> -->
				                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="content-panel">
                                                            <table class="table table-striped table-advance table-hover">
	                  	  	                                <h4><i class="fa fa-angle-right"></i>Sales Details</h4>
	                  	  	                                <hr>
                                                            <thead>
                                                                <tr>
                                                                <th>Sno.</th>
                                                                <th class="hidden-phone">Date Of Transaction</th>
                                                                <th>Name of the Medicine</th>
                                                                <th>Quantity</th>
                                                                <th>Patient Name</th>
                                                                <th>Patient Phone</th>
                                                                <th>Doctor Name</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php $ret=mysqli_query($con,"Select M.TranDate, U.PName, U.Padd1, U.PAdd2, U.PAdd3, U.PPin, U.PPhone, D.MDName, D.MDQty, M.DstMstNo, M.PtName, M.PtAdd, M.PtPhone, M.DrName FROM users U, DstMst M, DstDtl D WHERE  M.DstMstNo = D.DstMstNo AND M.UserId = U.UserId AND D.DstMstNo = M.DstMstNo AND U.UserId =  $_SESSION[id]");
                                                                $cnt=1;
                                                                $olddstno = 0;
                                                                $curdstno = 0;
                                                                while($row=mysqli_fetch_array($ret))
                                                                {
                                                                $curdstno = $row['DstMstNo'];
                                                                // echo "Inside while loop ";
                                                                // echo $curdstno;
                                                                if($olddstno === $curdstno)
                                                                {
                                                                    ?>
                                                                    <tr>
                                                                    <td></td>
                                                                <td></td>
                                                                <td><?php echo $row['MDName'];?></td>
                                                                <td><?php echo $row['MDQty'];?></td> 
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                </tr>
                                                                <?php
                                                                }
                                                                else
                                                                {
                                                                    ?>
                                                                <tr>
                                                                <td><?php echo $cnt;?></td>
                                                                <td><?php echo $row['TranDate'];?></td>
                                                                <td><?php echo $row['MDName'];?></td>
                                                                <td><?php echo $row['MDQty'];?></td> 
                                                                <td><?php echo $row['PtName'];?></td>
                                                                <td><?php echo $row['PtPhone'];?></td>
                                                                <td><?php echo $row['DrName'];?></td>
                                                                <td>
                                                                <a href="dstentryedit.php?dstmstno=<?php echo $row['DstMstNo'];?>"> 
                                                                <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                                                                <a href="manage-users.php?id=<?php echo $row['id'];?>"> 
                                                                <button class="btn btn-danger btn-xs" onClick="return confirm('Do you really want to delete');"><i class="fa fa-trash-o "></i></button></a>
                                                                </td>
                                                                </tr>
                                                                <?php 
                                                                $cnt=$cnt+1; 
                                                                }
                                                                $olddstno = $curdstno;
                                                                }?>
                                                            </tbody>
                                                             </table>
                                                    </div>
                                                </div>
                                            </div>
                                            
                            <!-- <div style="margin-left:20px;">
                                <input type="submit" name="Sales" value="Get Excel" class="btn btn-theme">
                            </div>           -->
                        </form>
                      </div>
                  </div>
              </div>
        </section>
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

  </script>

  </body>
</html>
