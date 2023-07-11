<?php ob_start(); session_start(); include("dataconnection.php"); ?>
<html lang="en">
   <head>
      <!-- Required meta tags-->
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <script src="https://www.google.com/recaptcha/api.js" async defer></script>
      <script src="http://code.jquery.com/jquery-1.11.1.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
      <!-- Title Page-->
      <title>Aery Salon - Register Account</title>
      <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
      <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
      <link href="css/main.css" rel="stylesheet" media="all">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,700,900|Display+Playfair:200,300,400,700">
      <link rel="stylesheet" type="text/css" href="css/main1.css">
      <link rel="stylesheet" href="fonts/icomoon/style.css">
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <link rel="stylesheet" href="css/style.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
      <script src="js/validation.js"></script>

      <style>
		 .a{
			 background:url('salon.jpg');
			 background-size:100%;
		 }
      </style>
   </head>
   <body>
	<?php include ("$_SERVER[DOCUMENT_ROOT]/Prototype/header.php"); ?>

      <div class="page-wrapper bg-gra-01 pt-5 pb-5 font-poppin a">
	  		<div class="bg-text col-lg-8">
			  <h2>Haven't Register Yet ?</h2>
			  <h1 style="font-size:50px">Join Us Now!</h1>
			  <p>If you have any queries, feel free to <a href="//localhost/Prototype/Homepage/hairsal/contact.php">contact us</a> now!</p>
			</div>
         <div class="wrapper wrapper--w780" style="margin-top:25px">
            <div class="card card-3" style="display:block;">
               <div class="card-heading"></div>
               <div class="card-body" style="background: rgb(220,218,255);
background: linear-gradient(180deg, rgba(220,218,255,1) 0%, rgba(237,255,254,1) 0%, rgba(184,243,255,1) 100%);min-width: 390px">
                  <h2 class="title" style="color:black;font-family:Poppins-Regular;">Registration Info</h2>
                  <form method="get" name="registerform">
                     <div class="input-group">
                        <span class="input-icon">
                        <img src="username.png" width="20px" height="20px">
                        </span>
                        <input class="input--style-3" value="<?php echo isset($_GET["firstname"])?$_GET["firstname"]:""; ?>" type="text" placeholder="First Name" name="firstname" id="firstname"  onkeyup="javascript:capitalize(this);validateFirstName()">
                        <img class="tick" id="firstnametick" src="tick.png" width="25px" height="20px">
						<div id="firstname-validation" class="validation-hint"></div>
                     </div>
                     <div class="input-group">
                        <span class="input-icon">
                        <img src="username.png" width="20px" height="20px">
                        </span>
                        <input class="input--style-3" value="<?php echo isset($_GET["lastname"])?$_GET["lastname"]:""; ?>" type="text" placeholder="Last Name" name="lastname" id="lastname"  onkeyup="javascript:capitalize(this);validateLastName()">
                        <img class="tick" id="lastnametick" src="tick.png" width="25px" height="20px">
						<div id="lastname-validation" class="validation-hint"></div>
                     </div>
                     <div class="input-group">
                        <span class="input-icon">
                        <img src="email.png" width="20px" height="20px">
                        </span>
                        <input class="input--style-3" value="<?php echo isset($_GET["email"])?$_GET["email"]:""; ?>" type="text" id="email" placeholder="Email" name="email" onkeyup="validateEmail()" autocomplete="off">
                        <img class="tick" id="emailtick" src="tick.png" width="25px" height="20px">
                        <div id="email-validation" class="validation-hint"></div>
                     </div>
                     <div class="input-group">
                        <span class="input-icon">
                        <img src="password.png" width="20px" height="20px">
                        </span>
                        <input class="input--style-3 validate" value="<?php echo isset($_GET["pw"])?$_GET["pw"]:""; ?>" id="password1" type="password" placeholder="Password" name="pw" onchange="validatePassword()" >
                        <img class="tick" id="pwtick" src="tick.png" width="25px" height="20px">
                        <div id="pw-validation" class="validation-hint"></div>
                     </div>
                     <div class="input-group">
                        <span class="input-icon">
                        <img src="password.png" width="20px" height="20px">
                        </span>
                        <input class="input--style-3" type="password"value="<?php echo isset($_GET["pwcf"])?$_GET["pwcf"]:""; ?>" id="password2" placeholder="Password Confirmation" name="pwcf" onkeyup="passwordConfirm()">
                        <img class="tick" id="pwconfirmtick" src="tick.png" width="25px" height="20px">
                        <div id="pwconfirm-validation" class="validation-hint"></div>
                     </div>
                      <div class="input-group">
                        <span class="input-icon">
                        <img src="contact.png" width="20px" height="20px">
                        </span>
                        <input class="input--style-3 validate" value="<?php echo isset($_GET["contact"])?$_GET["contact"]:""; ?>" type="text" id="contact" placeholder="Contact Number" name="contact" onkeyup="validateContact()">
                        <img class="tick" id="contacttick" src="tick.png" width="25px" height="20px">
                        <div id="contact-validation" class="validation-hint"></div>
                     </div>
                     <div class="input-group">
                        <span class="input-icon">
                        <img src="gender.png" width="20px" height="20px">
                        </span>
                        <div class="input--style-3 select2-selection" id="gender" style="width:100%;" >
                           <select name="gender" onchange="validateGender()" >
							<?php $selectedgender = $_GET['gender'] ? $_GET['gender'] : 'empty'; ?>
                              <option disabled="disabled" selected="selected" value="empty">Gender</option>
                              <option <?php if($selectedgender=='male')echo"selected";?> value="male">Male</option>
                              <option <?php if($selectedgender=='female')echo"selected";?> value="female">Female</option>
                           </select>
                           <div class="select-dropdown"></div>
                           <img class="tick" id="gendertick" src="tick.png" width="25px" height="20px">
                        </div>
                     </div>

                      <div onchange="captcha()" class="g-recaptcha" data-sitekey="6LfbHnMUAAAAAECV75utcCHHDM5YPBGl3f1a9Dco" id="captcha"></div>
                      <br/>
                     <div class="login100-form-btn">
                        <input name="submitregister" type="submit" class="login100-form-btn" value="Sign Up">
                     </div>

                  </form>
               </div>
            </div>
         </div>
      </div>
      <div id="dropDownSelect1"></div>
     <?php include ("$_SERVER[DOCUMENT_ROOT]/Prototype/footer.php"); ?>
      </div>
   </body>
</html>
<?php
   if(isset($_GET['submitregister']))
   {
      if(!empty($_GET['lastname']) && !empty($_GET['firstname']) && !empty($_GET['email'])&& !empty($_GET['pw'])&& !empty($_GET['pwcf'])&& !empty($_GET['contact'])&& !empty($_GET['gender']))
      {
		 $firstname = $_GET['firstname'];
		 $lastname = $_GET['lastname'];
		 $email = $_GET['email'];
		 $pw = $_GET['pw'];
		 $pwcf = $_GET['pwcf'];
		 $contact = $_GET['contact'];
		 $gender = $_GET['gender'];
		 $curdate = date("Y-m-d");

			$dupemail = mysqli_query($conn,"SELECT * FROM customer WHERE cust_email = '$email'");
			if(!$dupemail || mysqli_num_rows($dupemail) ==0)
			{
				if(filter_var($email, FILTER_VALIDATE_EMAIL))
				{
					$uppercase = preg_match('@[A-Z]@', $pw);
					$letter = preg_match('@[a-z]@', $pw);
					$containnumber = preg_match('@[0-9]@', $pw);
					$specialc = preg_match('@[^\w]@', $pw);
					
					if( $uppercase && $letter && $containnumber && $specialc )
					{
						if($pw == $pwcf)
						{
							if(is_numeric($contact) && (strlen($contact)>=10 && strlen($contact)<=10))
							{
								if(!empty($_GET['g-recaptcha-response']))
								{
									$token = md5(rand());
									$insert=mysqli_query($conn,"INSERT INTO customer (cust_firstname,cust_lastname,cust_email,cust_pw,cust_contactnum,cust_gender,cust_token,register_date) VALUES ('$firstname','$lastname','$email','$pw','$contact','$gender','$token','$curdate')");
									if($insert)
									{
									  $template = file_get_contents("emailtemplate.php");
									  $template = str_replace('{{token}}',$token,$template);
									  $template = str_replace('{{email}}',$email,$template);

								      echo"
									  <script>
									  Swal.fire ({
									  html: '<b>Thank you for joining us!</b><br>We have send an email to your mailbox forverification,<br> Please check your mailbox!',
										 type: 'success',
									  });
									  </script>";
									  ini_set('sendmail_from', 'cukang98@gmail.com');
									  $to = $email;
									  $subject = "Welcome to AerySalon";
									  $message = $template;
									  $headers =  'MIME-Version: 1.0' . "\r\n"; 
									  $headers .= 'From: AerySalon <cukang98@gmail.com>' . "\r\n";
									  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
									  mail($to, $subject, $message, $headers);
										  //header('Refresh:2 ; URL=register.php');
									}
								}
									else{
										echo"
										 <script>
										  Swal.fire ({
										  html: '<b>Please tick CAPTCHA box for verification!</b>',
										  type: 'warning'
										  });
										  </script>";
									}
							}
							else{
								echo"
								 <script>
								  Swal.fire ({
								  html: '<b>Please enter a valid contact number!</b>',
								  type: 'warning'
								  });
								  </script>";
							}
						}
						else{
							echo"
							 <script>
							  Swal.fire ({
							  html: '<b>Your password and password confirmation does not match!</b>',
							  type: 'warning'
							  });
							  </script>";
						}
					}
					else{
						echo"
							 <script>
							  Swal.fire ({
							  html: '<b>Your password does not fulfill requirement!</b>',
							  type: 'warning'
							  });
							  </script>";
					}
				}
				else{
					echo"
					 <script>
					  Swal.fire ({
					  html: '<b>Please enter a valid email!</b>',
					  type: 'warning'
					  });
					  </script>";
				}
			}
			else{
				echo"
				 <script>
				  Swal.fire ({
				  html: '<b>Your email already exists!</b>',
				  type: 'warning'
				  });
				  </script>";
				  
			}
		

      }
	  else
	  {	
		echo"
		<script>
		  validateFirstName(); 
		  validateLastName(); 
		  validateEmail(); 
		  validateContact();
		  validateGender();
		  validatePassword();
		  passwordConfirm();

		   Swal.fire ({
          html: '<b>Please fill up all information!</b>',
          type: 'warning'
          });
		 </script>";
 
	  }
		
}



