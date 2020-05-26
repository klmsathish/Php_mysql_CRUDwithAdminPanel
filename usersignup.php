<?php session_start();
require_once('dbconnection.php');

//Code for Registration 
if(isset($_POST['signup']))
{
	$PName=$_POST['PName'];
	$PAdd1=$_POST['PAdd1'];
	$PAdd2=$_POST['PAdd2'];
	$PAdd3=$_POST['PAdd3'];
    $PPin=$_POST['PPin'];
    $RangeId=$_POST['RangeName'];
    // echo "<script type='text/javascript'>alert('$RangeId');</script>";
	$UserName=$_POST['UserName'];
    $Password=$_POST['Password'];
$sql=mysqli_query($con,"select UserName from users where Username='$UserName'");
$row=mysqli_num_rows($sql);
if($row>0)
{
	echo "<script>alert('Username already exist with another account. Please try with another username);</script>";
} else{
	$msg=mysqli_query($con,"insert into users(PName,PAdd1,PAdd2,PAdd3,PPin,RangeId,UserName,Password) values('$PName','$PAdd1','$PAdd2','$PAdd3','$PPin','$RangeId','$UserName','$Password')");

if($msg)
{
	echo "<script>alert('Registered successfully');</script>";
}
}
}
?>

<!DOCTYPE html>
<html>
<head>
<style>

select, option {
	color: Blue;
}
</style>
<title>Login System</title>
<link href="css/style.css" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="DST, Drug Sales Tracking, Poovai Pharmacy, Poonamallee, Thiruvallue"./>
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
</head>
<body>
<div class="main">
		<h1><font size = "4">PARACETAMOL, AZITHROMYCIN, HYDROXY CHLOROQUINE & COUGH FORMULATIONS - SALES TRACKING</font></h1>
		<h1><font size = "4">PHARMACY REGISTRATION</font></h1>
	 <div class="sap_tabs">	
			<div id="horizontalTab"; width: 100%; margin: 0px;">
			  <ul class="resp-tabs-list">
			  	  <li class="resp-tab-item" role="tab"><div class="top-img"><img src="images/top-note.png" alt=""/></div><span>Register</span>
			  	  	
				</li>
				  
				  <div class="clear"></div>
              </ul>		
			  	 
			<div class="resp-tabs-container">
					<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
					<div class="facts">
					
						<div class="register">
							<form name="registration" method="post" action="" enctype="multipart/form-data" onSubmit = "return checkPassword(this)">
								<p>Pharmacy Name</p>
								<input type="text" class="text" value="" name="PName" required >
								<p>Pharmacy Address</p>
								<input type="text" class="text" value="" name="PAdd1"  required >
								<p> </p>
								<input type="text" class="text" value="" name="PAdd2"  >
								<p> </p>
								<input type="text" value="" name="PAdd3">
								<p>Pincode </p>
                                <input type="text" value="" name="PPin"  required>

		                        <p>Select Range</p>
		                        <select  name="RangeName" id="Range" class="form-control" onChange= "myNewFunction(this);" reuired >
                                <option disabled selected value> Select Range </option>

                                <?php $ret=mysqli_query($con,"Select * from ranges ORDER BY RangeName");
                                while($row=mysqli_fetch_array($ret))
                                {
                                ?>
                                <option value =<?php echo $row['RangeId'];?> ><?php echo $row['RangeName'];?></option>
                                <!-- alert RangeName -->
                                <?php
                                }
                                ?>
                                </select>
                                <p>Username </p>
                                <input type="text" value="" name="UserName"  autocomplete = "no"  required>
                                <p>Password</p>
								<input type="password" value="" name="Password"  autocomplete = "no" required>
								<p>Confirm Password</p>
								<input type="password" value="" name="ConfirmPassword"  autocomplete = "new-password" required>
                                <div class="sign-up">

									<input type="reset" value="Reset">
									<input type="submit" name="signup"  value="Sign Up" >
									<div class="clear"> </div>
								</div>
							</form>

						</div>
					</div>
				</div>		
			</form>
					</div>
				</div> 
			</div> 			        					 
<style>
select
  {
    width: 100%;
  padding: 0.8em 0.8em;
  color: #fff;
  font-size: 15px;
  outline: none;
  background: none;
  font-weight: 500;
  border: 1px solid rgba(186, 40, 23, 0.69);
  font-family: 'Raleway', sans-serif;
  }
  </style>
  <script>
  function myNewFunction(sel) {
    // alert(sel.options[sel.selectedIndex].value);
    var RangeName = sel.options[sel.selectedIndex].value
  }

  function checkPassword(form) { 
	password1 = form.Password.value; 
	password2 = form.ConfirmPassword.value; 
	// If Not same return False.     
	if (password1 != password2) { 
		alert ("\nPassword did not match: Please try again...") 
		return false; 
	} 
	var ddl = document.getElementById("Range");
 	var rangevalue = ddl.options[ddl.selectedIndex].value;
	if (rangevalue == 0) {
		alert("Please select a Range");
		return false;
	}
  } 
  </script>