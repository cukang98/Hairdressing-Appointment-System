<!DOCTYPE html>
<?php include("dataconnection.php"); session_start(); ?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>AerySalon Dashboard - Login</title>
	<script src="http://code.jquery.com/jquery-1.11.1.js"></script>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body style="background-image: linear-gradient(to top, #c5fff8, #a9f8f6, #89f0f7, #65e8fa, #2edfff);background-repeat:no-repeat;height:-webkit-fill-available; overflow:hidden">
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4" style="margin:0 auto;">
			<div class="panel" >
				<p align="center" class="panel-heading">Log in to AerySalon</p>
				<div class="panel-body">
					<form role="form" method="post">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="E-mail" name="email" type="email" value="<?php 
							if(isset($_COOKIE['remember_email']))
								echo $_COOKIE['remember_email'];
							else if(isset($loginemail))
								echo $loginemail;
							else 
								echo '';
						?>"autofocus="">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" value="<?php 
							if(isset($_COOKIE['remember_password']))
								echo $_COOKIE['remember_password'];
							else if(isset($loginemail))
								echo $loginemail;
							else 
								echo '';
						?>">
							</div>
					      <input class="form-check-input" type="checkbox" id="gridCheck" style=" margin-top: .5rem;" name="rememberme" <?php
						  if(isset($_COOKIE['rememberme']))
							  echo "checked";
						  else
						  {
							  if(isset($_COOKIE['rememberme']))
							  {
								  setcookie ("rememberme", "", time() - 3600);
								  setcookie ("remember_email", "", time() - 3600);
								  setcookie ("remember_password", "", time() - 3600);
							  }
						  }
						  ?> ></input>
						  <div class="col-lg-12">
							  <label class="form-check-label pl-1 col-lg-6" for="gridCheck">
								Remember me
							  </label>
							  <label class="pl-4 col-lg-6" style="float:right;text-align:right">
							  <a href="#"  class="txt2" data-toggle="modal" data-target="#forgotpasswordmodal">
								<i>Forgot Password?</i>
							  </a>
							  </label>
						  </div>
							<p align="right">
							<div class="w-full text-center p-t-27 p-b-239">
								<input type="submit" name="submitbtn" class="btn btn-primary" value="Submit"></input>
							</div>
							</p>
							</fieldset>
					</form>
				</div>

			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
		<div class="modal fade" id="forgotpasswordmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Forgot Password ?</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
			  <div class="modal-body">
				<form name="forgotpwform" method="get">
				<h6>Please enter your email & contact number, We will reset password and send it to your email</h6>
				<hr>
				  <div class="form-group">
					<label for="message-text" class="col-form-label">Email:</label>
					<input type="text" class="form-control" name="forgotpw-email">
				  </div>
				  <div class="form-group">
					<label for="recipient-name" class="col-form-label">Contact Number:</label>
					<input type="text" class="form-control" name="forgotpw-contactnum">
				  </div>
				<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<input type="submit" class="btn btn-primary" value="Submit" name="submitforgotpw"></input>
			  </div>
				</form>
			  </div>
			  
			</div>
		  </div>
		</div>
<script src="js/chart.min.js"></script>
    <script src="js/chart-data.js"></script>
    <script src="js/easypiechart.js"></script>
    <script src="js/easypiechart-data.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/custom.js"></script>
	<script src="js/bootstrap.min.js"></script>
	
</body>

</html>
<?php
	if(isset($_POST['submitbtn']))
	{
		if((isset($_POST['email']) && $_POST['email']!="") && (isset($_POST['password']) && $_POST['password']!=""))
		{
			$email = $_POST['email'];
			$password = $_POST['password'];
			$query = "SELECT * FROM hairdresser WHERE hairdresser_email = '$email'";
			$result = mysqli_query($conn,$query);
			if($result)
			{
				while($row = mysqli_fetch_assoc($result))
				{
					if($row['hairdresser_email'] == $email && $row['hairdresser_pw'] == $password && $row['is_admin'] == '1')
					{
						echo"<script>
						Swal.fire ({
						html: '<b>Welcome back, ".($row['hairdresser_firstname']).' '.($row['hairdresser_lastname'])."!</b>',
						type: 'success'
						});
						</script>";
						$_SESSION['hairdresser_loggedin'] = false;
						$_SESSION['admin_valid'] = true;
						$_SESSION['admin_loggedin'] = true;
						$_SESSION['admin_timeout'] = time();
						$_SESSION['admin_id'] = $row['hairdresser_id'];
						$_SESSION['admin_username'] = strtoupper($row['hairdresser_firstname']).' '.strtoupper($row['hairdresser_lastname']);
						$_SESSION['admin_email'] = $row['hairdresser_email'];
						
						if(isset($_SESSION['hairdresser_loggedin']))
						{
							unset($_SESSION['hairdresser_loggedin']);
							unset($_SESSION['hairdresser_valid']);
							unset($_SESSION['hairdresser_loggedin'] );
							unset($_SESSION['hairdresser_timeout'] );
							unset($_SESSION['hairdresser_id'] );
							unset($_SESSION['hairdresser_username'] );
							unset($_SESSION['hairdresser_email'] );
						}
						
						if(isset($_POST['rememberme']))
						{
							setcookie("remember_email",$row['hairdresser_email'],time()+(10 *365 *24 *60* 60));
							setcookie("remember_password",$row['hairdresser_pw'],time()+(10 *365 *24 *60* 60));
							setcookie("rememberme",true,time()+(10 *365 *24 *60* 60));
						}
						else
						  {
							  if(isset($_COOKIE['rememberme']))
							  {
								  setcookie ("rememberme", "", time() - 3600);
								  setcookie ("remember_email", "", time() - 3600);
								  setcookie ("remember_password", "", time() - 3600);
							  }
						  }
						header("Refresh:1.5 ; URL=//localhost/Prototype/admin/dashboard.php");
					}
					else if($row['hairdresser_email'] == $email && $row['hairdresser_pw'] == $password && $row['is_admin'] == '0')
					{
						echo"<script>
						Swal.fire ({
						html: '<b>Welcome back, ".($row['hairdresser_firstname']).' '.($row['hairdresser_lastname'])."!</b>',
						type: 'success'
						});
						</script>";
						$_SESSION['admin_loggedin'] = false;
						$_SESSION['hairdresser_valid'] = true;
						$_SESSION['hairdresser_loggedin'] = true;
						$_SESSION['hairdresser_timeout'] = time();
						$_SESSION['hairdresser_id'] = $row['hairdresser_id'];
						$_SESSION['hairdresser_username'] = ($row['hairdresser_firstname']).' '.($row['hairdresser_lastname']);
						$_SESSION['hairdresser_email'] = $row['hairdresser_email'];
						
						if(isset($_SESSION['admin_loggedin']))
						{
						unset($_SESSION['admin_loggedin'] );
						unset($_SESSION['admin_valid']);
						unset($_SESSION['admin_loggedin'] );
						unset($_SESSION['admin_timeout'] );
						unset($_SESSION['admin_id']);
						unset($_SESSION['admin_username']);
						unset($_SESSION['admin_email']);
						}
						
						if(isset($_POST['rememberme']))
						{
							setcookie("remember_email",$row['hairdresser_email'],time()+(10 *365 *24 *60* 60));
							setcookie("remember_password",$row['hairdresser_pw'],time()+(10 *365 *24 *60* 60));
							setcookie("rememberme",true,time()+(10 *365 *24 *60* 60));
						}
						else
						  {
							  if(isset($_COOKIE['rememberme']))
							  {
								  setcookie ("rememberme", "", time() - 3600);
								  setcookie ("remember_email", "", time() - 3600);
								  setcookie ("remember_password", "", time() - 3600);
							  }
						  }
						header("Refresh:1.5 ; URL=//localhost/Prototype/admin/hairdresserindex.php?ftlogin=true");
					}
					else if($row['hairdresser_email'] != $email || $row['hairdresser_pw'] != $password)
					{
						echo"
							<script>
							Swal.fire ({
							html: '<b>Wrong email or password!</b>',
							type: 'error',
							});
							</script>";
					}
				}
				if(mysqli_num_rows($result)==0)
				{
					echo"
						<script>
						Swal.fire ({
						html: '<b>Wrong email or password!</b>',
						type: 'error',
						});
						</script>";
				}
			}
		}
		else
		{
			echo"
				<script>
				Swal.fire ({
				html: '<b>Please fill up all information!</b>',
				type: 'error',
				});
				</script>";
		}
		
	}
?>
	<!-- FORGOT PASSWORD -->
	<?php 
		if(isset($_GET["submitforgotpw"]))
		{
			if($_GET['forgotpw-contactnum']!="" && isset($_GET['forgotpw-email']) && isset($_GET['forgotpw-contactnum']) && $_GET['forgotpw-email']!="" )
			{
				$forgotpw_email = $_GET['forgotpw-email'];
				$forgotpw_contactnum = $_GET['forgotpw-contactnum'];
				$mailbox = substr($forgotpw_email, strrpos($forgotpw_email, '@') + 1);
				$resetpw = randomPassword();
				if(filter_var($forgotpw_email, FILTER_VALIDATE_EMAIL))
				{
					if(is_numeric($forgotpw_contactnum) && (strlen($forgotpw_contactnum)>=10 && strlen($forgotpw_contactnum)<=11))
					{
						$result = mysqli_query($conn,"SELECT * FROM hairdresser WHERE hairdresser_email = '$forgotpw_email' AND hairdresser_contactnum = '$forgotpw_contactnum'");
						if($result)
						{
							while($row = mysqli_fetch_assoc($result))
							{
								if(mysqli_num_rows($result)>0)
								{
									$updatenewpw = mysqli_query($conn,"UPDATE hairdresser SET hairdresser_pw = '$resetpw' WHERE hairdresser_email = '$forgotpw_email' AND hairdresser_contactnum = '$forgotpw_contactnum'");
									
									if($updatenewpw)
									{
										echo"
										<script>
										Swal.fire ({
										title: 'Password reset done!',
										html: 'We have send a temporary password to your email!<br>Please remember to change your password after login!',
										type: 'success',
										showCancelButton: true,
										confirmButtonText: 'Done',
										});
										</script>";
										 ini_set('sendmail_from', 'cukang98@gmail.com');
										  $to = $forgotpw_email;
										  $subject = "AerySalon - Password Reset";
										  $message = "<html><head/><body><h3>AerySalon - Reset Password</h3><br> Hi,".$row['hairdresser_firstname']." ".$row['hairdresser_lastname']."<br><br>You Have requested reset password, Please use the password below to login  <br><b>Password: '$resetpw'</b><br><br> Please do not forget to change your password once you have login! <br><br>Best Regards,<br>AerySalon Team</body></html>";
										  $headers =  'MIME-Version: 1.0' . "\r\n"; 
										  $headers .= 'From: AerySalon <cukang98@gmail.com>' . "\r\n";
										  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
										  mail($to, $subject, $message, $headers);
										  header("Refresh:1.5 ; URL=//localhost/Prototype/admin/login.php");
									}
								}
								else{
								echo "<script>
							Swal.fire ({
							html: '<b>Wrong email or contact number, Please try again!</b>',
							type: 'error'
							})
							</script>";
							}
							}
						
							
						}
						else{
							echo "<script>
							Swal.fire ({
							html: '<b>Wrong email or contact number, Please try again!</b>',
							type: 'error'
							})
							</script>";
						}
					}
					else{
						echo "<script>
						Swal.fire ({
						html: '<b>Please enter a valid contact number!</b>',
						type: 'error'
						})
						</script>";
					}
				}
				else{
					echo "<script>
					Swal.fire ({
					html: '<b>Please enter a valid email!</b>',
					type: 'error'
					})
					</script>";
				}
			}
			else{
				echo "<script>
					Swal.fire ({
					html: '<b>Please fill up all information!</b>',
					type: 'error'
					})
					</script>";
			}
		}
	?>
<?php 
function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}
?>