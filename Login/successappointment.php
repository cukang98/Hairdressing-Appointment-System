<?php include('dataconnection.php');
session_start();
include("loadcustomerinfo.php");	
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
      <title>AerySalon - Profile</title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!--===============================================================================================-->	
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	  <script src="http://code.jquery.com/jquery-1.11.1.js"></script>
	  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
	  <script src="js/validation.js"></script>
      <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	  
      <link rel="stylesheet" type="text/css" href="css/util.css">
      <link rel="stylesheet" type="text/css" href="css/main1.css">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,700,900|Display+Playfair:200,300,400,700">
      <link rel="stylesheet" href="fonts/icomoon/style.css">
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <link rel="stylesheet" href="css/aos.css">
      <link rel="stylesheet" href="css/style.css">
	  <link rel="stylesheet" href="css/hairdressercard.css">
	  <link rel="stylesheet" href="css/progress-wizard.min.css">
	  <link rel="stylesheet" href="css/chooseservice.css">
	  <link rel="stylesheet" href="css/radio.css">
	  <script src="https://kit.fontawesome.com/b716eb6197.js"></script>
	  <script src="js/navigation.js"></script>
	  <!-- Date Pickk-->
		<link rel="stylesheet" href="datepickk/datepickk.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/8.7/styles/zenburn.min.css">
		<link href="https://fonts.googleapis.com/css?family=Raleway:400,600" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/8.7/highlight.min.js"></script>
		
	  <style>
	  .login100-form-btn{
		  width:auto;
		  display:-webkit-inline-box;
		  height:43px;
	  }
	  .validation-hint{
         background-image: url("validation.png");
         background-repeat:no-repeat;
         background-size: 23px 19px;
         font-size: 10px;

         color:red;
         margin-top:8px;
         padding-left:25px;
         display:none;
         }
		 .tick {
			position: absolute;
			right: 30px;
			top: 10px;
			display: none;
		}
		.d-week  p{
			color:white
		}
		.dot {
		    display: inline-block;
			content: '';
			-webkit-border-radius: 0.75rem;
			border-radius: 0.75rem;
			height: 1.25rem;
			width: 1.25rem;
			margin-right: 0.5rem;
			background-color: #bdbdbd;
			vertical-align:middle;
		}
		.dot2 {
		    display: inline-block;
			content: '';
			-webkit-border-radius: 0.75rem;
			border-radius: 0.75rem;
			height: 1.25rem;
			width: 1.25rem;
			margin-right: 0.5rem;
			background-color: #ff6982;
			vertical-align:middle;
		}
	  </style>
</head>
<body onscroll="myFunction();">
<script>
	function myFunction() {  
    var scrolltotop = document.scrollingElement.scrollTop;
    var target = document.getElementById("image1");
    var xvalue = "center";
    var factor = 0.5
    var yvalue = scrolltotop * factor;
    target.style.backgroundPosition = xvalue + " " + yvalue + "px";

  }

</script>
	<script src="datepickk/datepickk.min.js"></script>
	<script>hljs.initHighlightingOnLoad();</script>
	<script>var datepicker = new Datepickk();</script>
	
<?php include ("$_SERVER[DOCUMENT_ROOT]/Prototype/header.php"); ?>
<div class="site-blocks-cover" id="image1" style="background-image: url(images/hero_bg_3.jpg);" style="">
    <div class="container">
         <div class="row align-items-center justify-content-center text-center">
              <div class="col-md-8" data-aos="fade-up" data-aos-delay="400">
                  <h5 class="text-white font-weight-light text-uppercase" style="font-family:verdana;">Welcome to AerySalon</h5>
                      <h2 class="text-white font-weight-light mb-2 display-1" style="font-family:verdana;">Book Online</h2>
              </div>
         </div>
	</div>
</div>
<div class="page-wrapper" style="background-image: linear-gradient(to bottom, #ffffff, #f6f7ff, #ecefff, #dee8ff, #cee2ff);">
<div class="container p-t-5 p-b-100" >
        <div class="container" style="font-family: 'Lato', sans-serif;
        font-size: 20px;margin-bottom:35px;">
		<div class="steptitle" id="step6title">
        <h3 style=""
		> DONE !</h3>
		</div>
        <ul class="progress-indicator">
            <li id="step1" class="active">
                <span class="bubble"></span>
                Step 1. <br><small>Hairdresser</small>
            </li>
            <li id="step2" class="active">
                <span class="bubble"></span>
                Step 2. <br><small>Appointment Date</small>
            </li>
            <li id="step3" class="active">
                <span class="bubble"></span>
                Step 3. <br><small>Services</small>
            </li>
            <li id="step4" class="active">
                <span class="bubble"></span>
                Step 4. <br><small>Time Slot</small>
            </li>
            <li id="step5" class="active">
                <span class="bubble"></span>
                Step 5. <br><small>Confirmation</small>
            </li>
			<li id="step6" class="active">
                <span class="bubble"></span>
                Done !<br>
            </li>
        </ul>
      </div>
	  
		<div class="col-lg-12" id="appointmentConfirmed" >
		<div class="jumbotron text-xs-center" style="margin:0 auto;background-image:url(bg4.png);background-size:cover">
		  <h1  align="center" style="color:white">Thank You!</h1>
		  <p class="lead" align="center" style="color:white"><strong>Any changes of your appointment will update to you through your email!</p>
		  <hr>
		  <p align="center" style="color:white">
			Having trouble? <a href="" align="center"> Contact us</a>
		  </p>
		  <p class="lead"align="center">
			<button class="login100-form-btn" style="width:150px; margin: 30px 150px">
				<span style="font-family:verdana">Homepage</span>
			</button>
		  </p>
		</div>
				
		</div>

</div>
</div>
<?php include ("$_SERVER[DOCUMENT_ROOT]/Prototype/footer.php"); ?>

      <script src="js/jquery-ui.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/aos.js"></script>
      <script src="js/main.js"></script>
	  <script src="js/chooseservice.js"></script>
</body>
</html>
<?php 
if(isset($_GET['success']))
{
	echo"
		<script>
		 Swal.fire ({
			html: '<b>Appointment made successfully!</b><br>You\'ll receive an email once your appointment have been confirmed by your hairdresser!',
			type: 'success',
			timer: 3000,
			showConfirmButton: false,
		})
		</script>";
		header("Refresh:2.5,Url=//localhost/Prototype/Login/successappointment.php");
}
?>