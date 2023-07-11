<!DOCTYPE html>
<?php include('dataconnection.php');
session_start();

 ?>

<html lang="en">
  <head>
    <title>HairSal &mdash; Colorlib Website Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,700,900|Display+Playfair:200,300,400,700"> 
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/mediaelementplayer.min.css">


    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">
    
  </head>
  <body>
<?php include ("$_SERVER[DOCUMENT_ROOT]/Prototype/header.php"); ?>

    <div class="slide-one-item  owl-carousel">
   
      <div class="site-blocks-cover inner-page-cover" style="background-image: url(images/hero_bg_2.jpg);">
        <div class="container">
          <div class="row align-items-center justify-content-center text-center">

            <div class="col-md-8">
              <h2 class="text-white font-weight-light mb-2 display-1">Contact Us</h2>

              
            </div>
          </div>
        </div>
      </div>  

    </div>



    <div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-7 mb-5">

            

            <form action="#" class="p-5 bg-white">
             

              <div class="row form-group">
                <div class="col-md-6 mb-3 mb-md-0">
                  <label class="text-black" for="fname">First Name</label>
                  <input type="text" id="fname" name="fname" class="form-control" <?php if(isset($_SESSION['cust_username']))
																			echo 'readonly value="'.$_SESSION['user']['cust_firstname'].'"';
																	?>
																	>
                </div>
                <div class="col-md-6">
                  <label class="text-black" for="lname">Last Name</label>
                  <input type="text" id="lname" name="lname" class="form-control" <?php if(isset($_SESSION['cust_username']))
																			echo 'readonly value="'.$_SESSION['user']['cust_lastname'].'"';
																	?>>
                </div>
              </div>

              <div class="row form-group">
                
                <div class="col-md-12">
                  <label class="text-black" for="email">Email</label> 
                  <input type="email" id="email" name="email" class="form-control" <?php if(isset($_SESSION['cust_username']))
																			echo 'readonly value="'.$_SESSION['user']['cust_email'].'"';
																	?>>
                </div>
              </div>

              <div class="row form-group">
                
                <div class="col-md-12">
                  <label class="text-black" for="subject">Subject</label> 
                  <input type="subject" id="subject" name='subject' class="form-control">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="message">Message</label> 
                  <textarea name="message" id="message" cols="30" rows="7" class="form-control" placeholder="Write your notes or questions here..."></textarea>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="Send Message" name='submit'class="btn btn-primary py-2 px-4 text-white">
                </div>
              </div>

  
            </form>
          </div>
          <div class="col-md-5">
            
            <div class="p-4 mb-3 bg-white">
              <p class="mb-0 font-weight-bold">Address</p>
              <p class="mb-4">AerySalon<br>Jalan Ayer Keroh Lama<br>
                  Ayer Keroh 75450<br>
                  Malacca, Malaysia</p>

              <p class="mb-0 font-weight-bold">Phone</p>
              <p class="mb-4"><a href="#">+06 523 3555</a></p>

              <p class="mb-0 font-weight-bold">Email Address</p>
              <p class="mb-0"><a href="#">cukang98@gmail.com</a></p>

            </div>
            
            <div class="p-4 mb-3 bg-white">
              <h3 class="h5 text-black mb-3">More Info</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa ad iure porro mollitia architecto hic consequuntur. Distinctio nisi perferendis dolore, ipsa consectetur? Fugiat quaerat eos qui, libero neque sed nulla.</p>
              <p><a href="index.php" class="btn btn-primary px-4 py-2 text-white">Learn More</a></p>
            </div>

          </div>
        </div>
      </div>
    </div>


<?php include ("$_SERVER[DOCUMENT_ROOT]/Prototype/footer.php"); ?>
  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/aos.js"></script>

  <script src="js/main.js"></script>
    
  </body>
</html>
<?php 
if (isset($_GET['submit']))
{
	$name = $_GET['fname']." ".$_GET['lname'];
	$email = $_GET['email'];
	$message = $_GET['message'];
	$subject = $_GET['subject'];
		$template = file_get_contents("contacttemplate.php");
		$template = str_replace('{{fullname}}',$name,$template);
		$template = str_replace('{{contact}}',$contact,$template);
		$template = str_replace('{{email}}',$email,$template);
		$template = str_replace('{{message}}',$message,$template);
		ini_set('sendmail_from', 'cukang98@gmail.com');
		$to = "cukang98@gmail.com";
		$message = $template;
		$headers =  'MIME-Version: 1.0' . "\r\n"; 
		$headers .= 'From: AerySalon <cukang98@gmail.com>' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
		mail($to, $subject, $message, $headers);
		echo " Swal.fire ({
          html: '<b>Email Sent!</b>',
          type: 'success'
          });
		 </script>";
}
?>