<?php include('dataconnection.php'); ob_start(); session_start();

?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Login V17</title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
	  <meta name="google-signin-client_id" content="608088875273-psgj3gnngi3n8s3qobeo7mbii0qra5ji.apps.googleusercontent.com.apps.googleusercontent.com">
      <!--===============================================================================================-->	

      <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
      <link rel="stylesheet" type="text/css" href="css/util.css">
      <link rel="stylesheet" type="text/css" href="css/main1.css">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,700,900|Display+Playfair:200,300,400,700">
      <link rel="stylesheet" href="fonts/icomoon/style.css">
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <link rel="stylesheet" href="css/aos.css">
      <link rel="stylesheet" href="css/style.css">
	  <script src="js/validation.js"></script>
	  <script src="https://apis.google.com/js/platform.js" async defer></script>
	  <style>
		.a{
			 background:url('salon.jpg');
			 background-size:100%;
		 }
	  </style>
   </head>
   <body>

         <?php include ("$_SERVER[DOCUMENT_ROOT]/Prototype/header.php"); ?>
         <div class="limiter ">
            <div class="container-login100 bg-gra-01 a">
               <div class="wrap-login100">
                  <form class="login100-form validate-form " name="loginform" method="get">
                     <span class="login100-form-title p-b-34">
                     Account Login
                     </span>
                     <div class="wrap-input100 rs1-wrap-input100 validate-input" id="email">
                        <input id="first-name" class="input100" type="text" name="email" placeholder="Email" onkeyup="validateEmail()" value="<?php 
							if(isset($_COOKIE['remember_email']))
								echo $_COOKIE['remember_email'];
							else if(isset($loginemail))
								echo $loginemail;
							else 
								echo '';
						?>">
                        <span class="focus-input100"></span>
                     </div>
					 
                     <div class="wrap-input100 rs2-wrap-input100 validate-input" id="pw">
                        <input class="input100" type="password" name="pw" placeholder="Password" onkeyup="validatePassword()" value="<?php 
							if(isset($_COOKIE['remember_password']))
								echo $_COOKIE['remember_password'];
							else 
								echo '';
						?>">
                        <span class="focus-input100"></span>
                     </div>
					 <div id="email-validation" class="validation-hint col-lg-6 "></div>
					 <div id="pw-validation" class="validation-hint col-lg-6 "></div>
					   <div class="form-group" style=" margin-top: .5rem;">
							<div class="form-check">
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
						  ?> >
						  <label class="form-check-label" for="gridCheck">
							Remember me
						  </label>
						  </div>
						  </div>
                     <div class="login100-form-btn ">
                        <input name="submitlogin" type="submit" class="login100-form-btn" value="Sign in">
                     </div>
                     <div class="w-full text-center p-t-27 p-b-239">
                        <span class="txt1">
                        Forgot
                        </span>
                        <a href="//localhost/Prototype/Login/login.php?forgotpw=true" class="txt2" data-toggle="modal" data-target="#forgotpasswordmodal">
                         password?
                        </a>
                     </div>
                     <div class="w-full text-center">
					<p>Haven't register yet ?
                        <a href="//localhost/Prototype/Register/register.php" class="txt3">
                        Sign Up Now
                        </a>
						</p>
                     </div>
                  </form>
                  <div class="login100-more" style="background-image: url('uk-hair-beauty-grantham.jpg');"></div>
               </div>
            </div>
         </div>
         <div id="dropDownSelect1"></div>
         <?php include ("$_SERVER[DOCUMENT_ROOT]/Prototype/footer.php"); ?>
      </div>
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
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	  <script src="http://code.jquery.com/jquery-1.11.1.js"></script>
      <script src="js/jquery-ui.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/aos.js"></script>
      <script src="js/main.js"></script>

	  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
   </body>
</html>
<?php 
	if(isset($_SESSION['loggedin']))
	{
		if($_SESSION['loggedin']!="")
		{
			echo "<script>
					Swal.fire ({
					html: '<b>You have already login!</b>',
					type: 'error'
					})
					</script>";
			header("Refresh:2.0 ; URL=//localhost/Prototype/Homepage/hairsal/index.php");
		}
	}
?>
<?php 
	if(isset($_GET['submitlogin']))
	{
		if($_GET['email']!='' && $_GET['pw']!='')
		{
			$email = $_GET['email'];
			$pw = $_GET['pw'];
			$query = "SELECT * FROM customer WHERE cust_email = '$email'";
			$result = mysqli_query($conn,$query);
			if(!$result|| mysqli_num_rows($result) ==0)
			{?>
				<script>
				 Swal.fire ({
				  html: '<b>Invalid Email, Please try again!</b>',
				  type: 'error'
				  })
				</script>
		<?php
			}
			else
			{
				while($row = mysqli_fetch_assoc($result))
				{
					$db_pw = $row['cust_pw'];
					$db_name = $row['cust_firstname']." ".$row['cust_lastname'];
					$activated = $row['is_activated'];
					if($pw==$db_pw && $activated == '1')
					{
						echo"<script>
						Swal.fire ({
						html: '<b>Welcome back, ".($db_name)."!</b>',
						type: 'success'
						});
						</script>";
					$_SESSION['valid'] = true;
					$_SESSION['loggedin'] = true;
					$_SESSION['timeout'] = time();
					$_SESSION['cust_username'] = $row['cust_firstname']." ".$row['cust_lastname'];
					$_SESSION['cust_id'] = $row['cust_id'];
					$_SESSION['cust_email'] = $row['cust_email'];
					$_SESSION['user'] = $row;
						if(isset($_GET['rememberme']))
						{
							setcookie("remember_email",$row['cust_email'],time()+(10 *365 *24 *60* 60));
							setcookie("remember_password",$row['cust_pw'],time()+(10 *365 *24 *60* 60));
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
						header("Refresh:2.0 ; URL=//localhost/Prototype/Homepage/hairsal/index.php");
					}
					else if($pw==$db_pw && $activated == '0')
					{
						echo "<script>
							 Swal.fire ({
							  html: '<b>Your account haven\'t been verified,<br>Please check your mailbox !</b>',
							  type: 'error'
							  })
							</script>";
					}
					else
					{
						$loginemail = $_GET['email'];
						echo "<script>
							 Swal.fire ({
							  html: '<b>Invalid password, Please try again!</b>',
							  type: 'error'
							  })
							</script>";
					}
				}
			}
		}
		else{
			echo "<script>
				Swal.fire ({
				  html: '<b>Please enter your email & password!</b>',
				  type: 'warning'
				  })</script>";
		}
	}
	?>
	
	
	<!-- VALIDATION WHETHER VERIFIED EMAIL PURPOSE -->
	<?php 
		if(!empty($_GET['token']) && !empty($_GET['targetemail']))
		{
			$token = $_GET['token'];
			$targetemail = $_GET['targetemail'];
			$getTargetinfo = mysqli_query($conn,"SELECT * FROM customer WHERE cust_email='$targetemail'");
			if($getTargetinfo)
			{
				while($row = mysqli_fetch_assoc($getTargetinfo))
				{
					$getToken = $row['cust_token'];
					if($token == $getToken)
					{
						$updatestatus = mysqli_query($conn,"UPDATE customer SET is_activated ='1' WHERE cust_email = '$targetemail'");
						if($updatestatus)
						{
							echo "<script>
							Swal.fire ({
							html: '<b>Email verified, Thanks for your time!</b>',
							type: 'success'
							})</script>";
						}
					}
					else
					{
						$newToken = md5(rand());
						$updatetoken =  mysqli_query($conn,"UPDATE customer SET cust_token = '$newToken' WHERE cust_email = '$targetemail'");
						$link = "//localhost/Prototype/Login/login.php?newToken=".$newToken."&targetemail=".$targetemail;
						
						echo "<script>
						Swal.fire ({
						html: '<b>Wrong verification link, <br>if you wish to resend a verification link, <br><a href=//".$link.">Click me!</a></b>',
						type: 'error'
						})</script>";
					}
				}
			}
		}
		if(!empty($_GET['newToken']) && !empty($_GET['targetemail']))
		{
			$regen_token = $_GET['newToken'];
			$regen_targetemail = $_GET['targetemail'];
			$template = file_get_contents("resendemailtemplate.php");
			$template = str_replace('{{token}}',$regen_token,$template);
			$template = str_replace('{{email}}',$regen_targetemail,$template);
			$update_regen_token = mysqli_query($conn,"UPDATE customer SET cust_token = '$regen_token 'WHERE cust_email = '$regen_targetemail'");
			if($update_regen_token)
			{
				echo"
				<script>
				Swal.fire ({
				html: '<b>Verification link resended!</b><br>Please check your mailbox!',
				type: 'success',
			 });
			  </script>";
				ini_set('sendmail_from', 'cukang98@gmail.com');
				$to = $targetemail;
				$subject = "Welcome to AerySalon";
				$message = $template;
				$headers =  'MIME-Version: 1.0' . "\r\n"; 
				$headers .= 'From: AerySalon <cukang98@gmail.com>' . "\r\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 

				mail($to, $subject, $message, $headers);
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
						$result = mysqli_query($conn,"SELECT * FROM customer WHERE cust_email = '$forgotpw_email' AND cust_contactnum = '$forgotpw_contactnum'");
						if($result && mysqli_num_rows($result)>0)
						{
							while($row = mysqli_fetch_assoc($result))
							{
								if(mysqli_num_rows($result)>0)
								{
									$updatenewpw = mysqli_query($conn,"UPDATE customer SET cust_pw = '$resetpw' WHERE cust_email = '$forgotpw_email' AND cust_contactnum = '$forgotpw_contactnum'");
									
									if($updatenewpw)
									{
										echo"
										<script>
										Swal.fire ({
										title: 'Password reset done!',
										html: 'We have send a temporary password to your email!<br>Please remember to change your password after login!',
										type: 'success',
										confirmButtonText: 'Done!',
										
										});
										</script>";
										 ini_set('sendmail_from', 'cukang98@gmail.com');
										  $to = $forgotpw_email;
										  $subject = "AerySalon - Password Reset";
										  $message = "<html><head/><body><h3>AerySalon - Reset Password</h3><br> Hi,".$row['cust_firstname']." ".$row['cust_lastname']."<br><br>You Have requested reset password, Please use the password below to login  <br><b>Password: '$resetpw'</b><br><br> Please do not forget to change your password once you have login! <br><br>Best Regards,<br>AerySalon Team</body></html>";
										  $headers =  'MIME-Version: 1.0' . "\r\n"; 
										  $headers .= 'From: AerySalon <cukang98@gmail.com>' . "\r\n";
										  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
										  mail($to, $subject, $message, $headers);
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