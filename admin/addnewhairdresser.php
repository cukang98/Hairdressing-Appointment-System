<!DOCTYPE html>
<?php include("dataconnection.php"); ?>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>AerySalon - Add New hairdresser</title>
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <script src="http://code.jquery.com/jquery-1.11.1.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/datepicker3.css" rel="stylesheet">
        <link href="css/styles.css" rel="stylesheet">
        <!--Custom Font-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
        <script src="js/validation.js"></script>
        <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
      <![endif]-->
	  <!-- Date Pickk-->
		<link rel="stylesheet" href="datepickk/datepickk.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/8.7/styles/zenburn.min.css">
		<link href="https://fonts.googleapis.com/css?family=Raleway:400,600" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/8.7/highlight.min.js"></script>
        <style>
            .validation-hint {
                background-image: url("validation.png");
                background-repeat: no-repeat;
                background-size: 22px 18px;
                font-size: 10px;
                color: red;
                height: 17px;
                padding-top: 2px;
				margin-top:5px;
                padding-left: 25px;
                display: none;
            }
        </style>
		
    </head>

    <body>
		<script src="datepickk/datepickk.min.js"></script>
		<script>hljs.initHighlightingOnLoad();</script>
		<script>var datepicker = new Datepickk();</script>
	    <?php include("is_login.php"); ?>
        <?php include("topsidebar.php");?>
            <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
                <div class="row">
                    <ol class="breadcrumb">
                        <li>
                            <a href="#">
                                <em class="fa fa-home"></em>
                            </a>
                        </li>
                        <li class="active">Add New Hairdresser</li>
                    </ol>
                </div>
                <div class="row">
				<h1 class="page-header mb-3" align="center">
				<img src="hairdresser.png" class="titleimage"> Add New Hairdresser
				</h1> 
				</div>
                <hr class="mt-1">
                <!--/.row-->
                <form name="addnewhairdresserform" action="" method="get">
                    <div class="container">

                        <fieldset class="fieldset">
                            <div class="form-group row">
                                <label class="col-md-2  col-sm-3 col-xs-12 control-label">First Name</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <input type="text" name="hairdresser_firstname" class="form-control" placeholder="First Name"  id="firstname" value="<?php echo isset($_GET["hairdresser_firstname"])?$_GET["hairdresser_firstname"]:""; ?>" onkeyup="capitalize(this);validateFirstName()">
                                    <div id="firstname-validation" class="validation-hint"></div>
                                    <img class="tick" id="firstnametick" src="tick.png" width="25px" height="20px">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2  col-sm-3 col-xs-12 control-label">Last Name</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <input type="text" name="hairdresser_lastname" class="form-control" placeholder="Last Name"  id="lastname" value="<?php echo isset($_GET["hairdresser_lastname"])?$_GET["hairdresser_lastname"]:""; ?>" onkeyup="capitalize(this);validateLastName()">
                                    <div id="lastname-validation" class="validation-hint"></div>
                                    <img class="tick" id="lastnametick" src="tick.png" width="25px" height="20px">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2  col-sm-3 col-xs-12 control-label">Email</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <input type="text" name="hairdresser_email" class="form-control" placeholder="abc123@exmaple.com" id="email" onchange="validateEmail()" value="<?php echo isset($_GET["hairdresser_email"])?$_GET["hairdresser_email"]:""; ?>">
                                    <div id="email-validation" class="validation-hint"></div>
                                    <img class="tick" id="emailtick" src="tick.png" width="25px" height="20px">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2  col-sm-3 col-xs-12 control-label">Position</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <select name="hairdresser_position" class="form-control" onchange="validatePosition()" id="position">
                                        <?php $selectedposition = $_GET['hairdresser_position'] ? $_GET['hairdresser_position'] : 'empty'; ?>
                                            <option disabled="disabled" selected value="empty">Position</option>
											<?php 
												$position = mysqli_query($conn,"SELECT * FROM position WHERE is_removed='0'");
												if($position){
													while($row = mysqli_fetch_assoc($position))
													{
														echo"<option value='".$row['position_id']."'>".$row['position_name']."</option>";
													}
												}
                                            ?>
                                    </select>
                                    <img class="tick" id="positiontick" src="tick.png" width="25px" height="20px">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2  col-sm-3 col-xs-12 control-label">Contact Number</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <input type="text" name="hairdresser_contactnum" class="form-control" placeholder="0123456789" onchange="validateContact()" id="contact" value="<?php echo isset($_GET["hairdresser_contactnum"])?$_GET["hairdresser_contactnum"]:""; ?>">
                                    <div id="contact-validation" class="validation-hint"></div>
                                    <img class="tick" id="contacttick" src="tick.png" width="25px" height="20px">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2  col-sm-3 col-xs-12 control-label">Gender</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <select name="hairdresser_gender" class="form-control" onchange="validateGender()" id="gender">
                                        <?php $selectedgender = $_GET['hairdresser_gender'] ? $_GET['hairdresser_gender'] : 'empty'; ?>
                                            <option disabled="disabled" selected value="empty">Gender</option>
                                            <option <?php if($selectedgender=='male' )echo "selected";?> value="male">Male</option>
                                            <option <?php if($selectedgender=='female' )echo "selected";?> value="female">Female</option>
                                    </select>
                                    <div id="gender-validation" class="validation-hint"></div>
                                    <img class="tick" id="gendertick" src="tick.png" width="25px" height="20px">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2  col-sm-3 col-xs-12 control-label">Full Address</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <input type="text" name="hairdresser_address" class="form-control" placeholder="7B East High Ridge Street Marietta, GA 30008" id="address" onchange="validateAddress()" value="<?php echo isset($_GET["hairdresser_address"])?$_GET["hairdresser_address"]:""; ?>">
                                    <img class="tick" id="addresstick" src="tick.png" width="25px" height="20px">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2  col-sm-3 col-xs-12 control-label">State</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <select name="hairdresser_state" class="form-control" onchange="validateState()" id="state">
                                        <?php $selectedstate = $_GET['hairdresser_state'] ? $_GET['hairdresser_state'] : 'empty'; ?>
                                            <option disabled="disabled" selected value="empty">State</option>
                                            <option <?php if($selectedstate=='johor' )echo "selected";?> value="johor">JOHOR</option>
                                            <option <?php if($selectedstate=='malacca' )echo "selected";?> value="malacca">MALACCA</option>
                                            <option <?php if($selectedstate=='kedah' )echo "selected";?> value="kedah">KEDAH</option>
                                            <option <?php if($selectedstate=='kelantan' )echo "selected";?> value="kelantan">KELANTAN</option>
                                            <option <?php if($selectedstate=='pahang' )echo "selected";?> value="pahang">PAHANG</option>
                                            <option <?php if($selectedstate=='negeri sembilan' )echo "selected";?> value="negeri sembilan">NEGERI SEMBILAN</option>
                                            <option <?php if($selectedstate=='perak' )echo "selected";?> value="perak">PERAK</option>
                                            <option <?php if($selectedstate=='perlis' )echo "selected";?> value="perlis">PERLIS</option>
                                            <option <?php if($selectedstate=='penang' )echo "selected";?> value="penang">PENANG</option>
                                            <option <?php if($selectedstate=='selangor' )echo "selected";?> value="selangor">SELANGOR</option>
                                    </select>
                                    <img class="tick" id="statetick" src="tick.png" width="25px" height="20px">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2  col-sm-3 col-xs-12 control-label">Post Code</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <input type="text" name="hairdresser_postcode" class="form-control" placeholder="81300" onchange="validatePostcode()" id="postcode" value="<?php echo isset($_GET["hairdresser_postcode"])?$_GET["hairdresser_postcode"]:""; ?>">
                                    <div id="postcode-validation" class="validation-hint"></div>
                                    <img class="tick" id="postcodetick" src="tick.png" width="25px" height="20px">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2  col-sm-3 col-xs-12 control-label"></label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <button type="reset" class="btn btn-error" name="reset">Reset</button>
                                    <input class="btn btn-primary" type="submit" name="submitnewhairdresser" value="Submit">
                                </div>
                            </div>

                    </div>
                </form>
    </body>
    <script>
	document.getElementById("servicetab").classList.remove("active");
	document.getElementById("hairdressertab").classList.add("active");
	document.getElementById("customerlist").classList.remove("active");
    </script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/chart.min.js"></script>
    <script src="js/chart-data.js"></script>
    <script src="js/easypiechart.js"></script>
    <script src="js/easypiechart-data.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/custom.js"></script>

    </html>
    <?php 
	if(isset($_GET['submitnewhairdresser']))
	{
		if(!empty($_GET['hairdresser_firstname']) && !empty($_GET['hairdresser_lastname']) && !empty($_GET['hairdresser_email']) && !empty($_GET['hairdresser_contactnum']) && !empty($_GET['hairdresser_address']) && !empty($_GET['hairdresser_state']) && !empty($_GET['hairdresser_postcode'])  && !empty($_GET['hairdresser_gender']) && !empty($_GET['hairdresser_position']) )
		{
			$hairdresser_firstname = $_GET['hairdresser_firstname'];
			$hairdresser_lastname = $_GET['hairdresser_lastname'];
			$hairdresser_email = $_GET['hairdresser_email'];
			$hairdresser_contactnum = $_GET['hairdresser_contactnum'];
			$hairdresser_address = $_GET['hairdresser_address'];
			$hairdresser_state = $_GET['hairdresser_state'];
			$hairdresser_gender = $_GET['hairdresser_gender'];
			$hairdresser_postcode = $_GET['hairdresser_postcode'];
			$hairdresser_pw = randomPassword();
			$positionid = $_GET['hairdresser_position'];
			$curdate = date("Y-m-d");
			if(1 !== preg_match('~[0-9]~', $hairdresser_firstname))
			{
				if(1 !== preg_match('~[0-9]~', $hairdresser_lastname))
				{
					if(filter_var($hairdresser_email, FILTER_VALIDATE_EMAIL))
					{
						$dupemail = mysqli_query($conn,"SELECT * FROM hairdresser WHERE hairdresser_email = '$hairdresser_email'");
						if(!$dupemail || mysqli_num_rows($dupemail) ==0)
						{
							if(is_numeric($hairdresser_contactnum) && (strlen($hairdresser_contactnum)>=10 && strlen($hairdresser_contactnum)<=10))
							{
								if(strlen($hairdresser_postcode)==5 && is_numeric($hairdresser_postcode))
								{
									$insert = mysqli_query($conn,"INSERT INTO hairdresser (hairdresser_firstname,hairdresser_lastname,hairdresser_email,hairdresser_contactnum,hairdresser_pw,hairdresser_address,hairdresser_state,hairdresser_postcode,hairdresser_gender,join_date,position_id) VALUES ('$hairdresser_firstname','$hairdresser_lastname','$hairdresser_email','$hairdresser_contactnum','$hairdresser_pw','$hairdresser_address','$hairdresser_state','$hairdresser_postcode','$hairdresser_gender','$curdate','$positionid')");
									if($insert)
									{
										echo"
											 <script>
												Swal.fire ({
												title: 'Successful!',
												html: '<b>Auto generated password has sent to hairdresser\'s email!</b>',
												type: 'success'
												});
												</script>";
										ini_set('sendmail_from', 'cukang98@gmail.com');
										$template = file_get_contents("emailtemplate.php");
										$template = str_replace('{{password}}',$hairdresser_pw,$template);
											$to = $hairdresser_email;
											$subject = "Thank you for joinning AerySalon!";
											$message = $template;
											$headers =  'MIME-Version: 1.0' . "\r\n"; 
											$headers .= 'From: AerySalon <cukang98@gmail.com>' . "\r\n";
											$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 

											mail($to, $subject, $message, $headers);
									}
								}
								else{
									echo"
									<script>
									Swal.fire ({
									html: '<b>Please enter valid postcode!</b>',
									type: 'warning'
									});
									</script>";
								}
							}
							else{
								echo"
								<script>
								Swal.fire ({
								html: '<b>Please enter a contact number!</b>',
								type: 'warning'
								});
								</script>";
							}
						}
						else{
							echo"
								<script>
								Swal.fire ({
								html: '<b>Email already exists, Please try again!</b>',
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
					echo"<script>
							Swal.fire ({
							html: '<b>Please enter a valid last name!</b>',
							type: 'warning'
							});
							</script>";
				}
		}
		else{
			echo"
			<script>
			Swal.fire ({
			html: '<b>Please enter a valid first name!</b>',
			type: 'warning'
			});
			</script>";
		}
		echo"
				<script>
				validateFirstName();
				validateLastName();
				validateAddress();
				validateContact();
				validateEmail();
				validateGender();
				validatePosition();
				validatePostcode();
				validateState();
				Swal.fire ({
				html: '<b>Please fill up all information!</b>',
				type: 'warning'
				});
				</script>";
	}
		else{
			echo"
				<script>
				validateFirstName();
				validateLastName();
				validateAddress();
				validateContact();
				validateEmail();
				validateGender();
				validatePosition();
				validatePostcode();
				validateState();
				Swal.fire ({
				html: '<b>Please fill up all information!</b>',
				type: 'warning'
				});
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
