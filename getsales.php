<?php
session_start();
include'dbconnection.php';
// checking session is valid for not 
if (strlen($_SESSION['id']==0)) {
  header('location:dilogout.php');
  } 
  else
  {
    // echo $_SESSION['id'];
    $query = "Select DateCompleted from DIVsDate WHERE DIId = " .$_SESSION['id'];
    $res1 = mysqli_query($con, $query);
    if(mysqli_num_rows($res1) > 0)
     {
        $row = mysqli_fetch_array($res1);
        $cdate1 = $row['DateCompleted'];
        // date_add($cdate,date_interval_create_from_date_string("1 days"));
        $cdate = date("Y-m-d",strtotime($cdate1. ' + 1 days'));
        // echo $cdate;
     }
    else
     {
        $cdate = date("Y-m-d");
     }
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
                    <li><a class="logout" href="dilogout.php">Logout</a></li>
            	</ul>
            </div>
        </header>
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a href="#"><img src="admin/assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
              	  <h5 class="centered"><?php echo $_SESSION['CPName'];?></h5>
              	  	

                  <li class="sub-menu">
                      <a href="getsales.php" >
                          <i class="fa fa-users"></i>
                          <span>Sales Report</span>
                      </a>
                </li>
                <li class="mt">
                            <a href="di-change-password.php">
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
          	<h3><i class="fa fa-angle-right"></i>Enter Details</h3>
             	
				<div class="row">

                  <div class="col-md-12">
                      <div class="content-panel">
                            
                        <form class="form-horizontal style-form" name="form1" method="post" action="getexcel.php" enctype="multipart/form-data"  onSubmit = "return checkRange(this)">
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Date</label>
                                <div class="col-sm-10">
                                    <input type="date" name="date" value = <?php echo $cdate;?> required>
                                    <!-- <input type="text" name "id" value = <?php echo "{$_SESSION['id']}" ?> hidden> -->
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Range</label>
                                <div class="col-sm-10">
                                    <select  name="RangeName" id="Range" class="form-control" onChange= "myNewFunction(this);" reuired >
                                    <option disabled selected value> Select Range </option>
                                    <option value = "9999">---All---</option>

                                    <?php 
                                    $did = "{$_SESSION['id']}";
                                    $ret=mysqli_query($con,"Select R.* from ranges R, DIVsRange D WHERE D.RangeId = R.RangeId AND D.DIId = $did ORDER BY R.RangeName");
                                    while($row=mysqli_fetch_array($ret))
                                    {
                                    ?>
                                    <option value =<?php echo $row['RangeId'];?> ><?php echo $row['RangeName'];?></option>
                                    <!-- alert RangeName -->
                                    <?php
                                    }
                                    ?>
                                    </select>
                                </div>
                            </div>


                                 <!-- <div class="row">
                                    <div class="col-md-12">
                                        <div class="content-panel">
                                            <table class="table table-striped table-advance table-hover">
                                            <h4><i class="fa fa-angle-right"></i> All User Details </h4>
                                            <hr>
                                            <thead>
                                                <tr>
                                                <th>Sno.</th>
                                                <th class="hidden-phone">Date Of Transaction</th>
                                                <th> Pharmacy Name</th>
                                                <th>Name of the Medicine</th>
                                                <th>Quantity</th>
                                                <th>Patient Name</th>
                                                <th>Patient Phone</th>
                                                <th>Doctor Name</th>
                                                </tr>
                                            </thead>
                                                <tbody>
                                                    <?php $ret=mysqli_query($con,"Select M.TranDate, U.PName, U.Padd1, U.PAdd2, U.PAdd3, U.PPin, U.PPhone, D.MDName, D.MDQty, M.DstMstNo, M.PtName, M.PtAdd, M.PtPhone, M.DrName FROM users U, DstMst M, DstDtl D, ranges R, DIMaster DI, DIVsRange DV WHERE DV.DIId = DI.DIId AND DV.RangeId = R.RangeId AND U.RangeId = R.RangeId AND M.UserId = U.UserId AND D.DstMstNo = M.DstMstNo AND DI.DIId =  $_SESSION[id]");
                                                    $cnt=1;
                                                    while($row=mysqli_fetch_array($ret))
                                                    {?>
                                                    <tr>
                                                    <td><?php echo $cnt;?></td>
                                                    <td><?php echo $row['TranDate'];?></td>
                                                    <td><?php echo $row['PName'];?></td>
                                                    <td><?php echo $row['MDName'];?></td>
                                                    <td><?php echo $row['MDQty'];?></td> 
                                                    <td><?php echo $row['PtName'];?></td>
                                                    <td><?php echo $row['PtPhone'];?></td>
                                                    <td><?php echo $row['DrName'];?></td>
                                                    <td>
                                                        <a href="update-profile.php?uid=<?php echo $row['id'];?>"> 
                                                        <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                                                        <a href="manage-users.php?id=<?php echo $row['id'];?>"> 
                                                        <button class="btn btn-danger btn-xs" onClick="return confirm('Do you really want to delete');"><i class="fa fa-trash-o "></i></button></a>
                                                    </td>            
                                                    </tr>
                                                    <?php $cnt=$cnt+1; }?>
                                                    </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div> -->
                                            
                            <div style="margin-left:20px;">
                                <input type="submit" name="Sales" value="Get Excel" class="btn btn-theme">
                            </div>          
                        </form>
                      </div>
                  </div>
              </div>
        </section>
    </section>
        
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

    function myNewFunction(sel) {
        // alert(sel.options[sel.selectedIndex].value);
        var RangeName = sel.options[sel.selectedIndex].value
    }

    function checkRange(form) { 
        var ddl = document.getElementById("Range");
        var rangevalue = ddl.options[ddl.selectedIndex].value;
        if (rangevalue == 0) {
            alert("Please select a Range");
            return false;
        }
    } 
  </script>

  </body>
</html>
<?php } ?>