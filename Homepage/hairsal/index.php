<!DOCTYPE html>
<?php  ob_start(); session_start(); ?>
<html lang="en">
  <head>
    <title>AerySalon</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,700,900|Display+Playfair:200,300,400,700"> 
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/style.css">
    
  </head>
  <body>
  
  <div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
 <?php include ("$_SERVER[DOCUMENT_ROOT]/Prototype/header.php"); ?>
    <div class="slide-one-item home-slider owl-carousel">
      
      <div class="site-blocks-cover" style="background-image: url(images/hero_bg_1.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center text-center">

            <div class="col-md-8" data-aos="fade-up" data-aos-delay="400">
              <h5 class="text-white font-weight-light text-uppercase" style="font-family:verdana;">Welcome to AerySalon</h5>
              <h2 class="text-white font-weight-light mb-2 display-1"style="font-family:verdana;">Hair Salon Expert</h2>

              <p><a href="//localhost/Prototype/Login/makeappointment.php" class="btn btn-black py-3 px-5">Book Now!</a></p>
            </div>
          </div>
        </div>
      </div>  

      <div class="site-blocks-cover" style="background-image: url(images/hero_bg_2.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center text-center">

            <div class="col-md-8" data-aos="fade-up" data-aos-delay="400">
              <h2 class="text-white font-weight-light mb-2 display-1" style="font-family:verdana;">Beautiful Hair, Healthy You!</h2>

              <p><a  href="//localhost/Prototype/Login/makeappointment.php" class="btn btn-black py-3 px-5">Book Now!</a></p>
            </div>
          </div>
        </div>
      </div>  

    </div>


    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-4 text-center">
            <h3 class="line-height-1 mb-3"><span class="d-block display-4 line-height-1 text-black">Welcome to</span> <span class="d-block display-4 line-height-1"><em class="text-primary font-weight-bold">AerySalon</em></span></h3>
            <p>

Aerysalon is a modern salon located in Bukit Beruang,close to the bustling city centre of Melaka, Malaysia. With an experience of over 25 years, we believe your happiness as a client is the most important and mutual trust is key. </p>
            <p><a href="#"><small class="text-uppercase font-weight-bold">Read More</small></a></p>
          </div>
          <div class="col-md-6 col-lg-4">
            <figure class="h-100 hover-bg-enlarge">
              <div class="bg-image h-100 bg-image-md-height" style="background-image: url('images/img_2.jpg');"></div>
            </figure>
          </div>
          <div class="col-md-6 col-lg-4">
            <div class="border p-4 d-flex align-items-center justify-content-center h-100">
              <div class="text-center">
                <h2 class="text-primary h2 mb-5">Opening Hours</h2>
                <p class="mb-4">
                  <span class="d-block font-weight-bold">Tues – Sun </span>
                  10:00 AM – 8:30 PM
                </p>

                <p class="mb-4">
                  <span class="d-block font-weight-bold">Monday</span>
                  Closed
                </p>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7">
            <h2 class="site-section-heading font-weight-light text-black text-center" style="font-family:verdana;">Featured Services</h2>
          </div>
        </div>

        <div class="row">
		<?php 
		$i=0;
		$result = mysqli_query($conn,"SELECT * FROM service WHERE is_removed ='0'");
		while($row = mysqli_fetch_assoc($result))
		{
			$i++;
			$servicename = $row['service_name'];
			$servicecharge = $row['service_estimatefee'];
			$desc = $row['service_description'];
			if($i<4)
			echo'
		 <div class="col-md-6 col-lg-4 text-center mb-5 mb-lg-5">
            <div class="h-100 p-4 p-lg-5 bg-light site-block-feature-7">
              <span class="icon flaticon-razor display-3 text-primary mb-4 d-block"></span>
              <h3 class="text-black h4">'.$servicename.'</h3>'
              .$desc.'
              <p><strong class="font-weight-bold text-primary">MYR 29+</strong></p>
            </div>
          </div>';
		}
		?>


        </div>
      </div>
    </div>

    <div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 mb-5">
            <img src="images/person_1.jpg" alt="Image" class="img-md-fluid">
          </div>
          <div class="col-lg-6 bg-white p-md-5 align-self-center">
            <h2 class="display-1 text-black line-height-1 site-section-heading mb-4 pb-3">New hairstyle!</h2>
            <p class="text-black lead"><em>&ldquo;'Hair that looks great and healthy but is effortless is always something that people aspire to have! Whether you add a soft and tousled wave, a loose modern kick instead of a curl or go for a perfectly polished sleek do, the mirror like shine is something that will be key for next year. The aim is for your hair to be as blinding as your highlighter.&rdquo;</em></p>
            <p class="lead text-black">&mdash; <em> Zoe Irwin, ghd Ambassador</em></p>
          </div>
        </div>
      </div>
    </div>


    <div class="site-blocks-cover overlay inner-page-cover" style="background-image: url(images/hero_bg_2.jpg); background-attachment: fixed;">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">

          <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">
            <h2 class="text-white font-weight-light mb-5 display-3"style="font-family:verdana;">Experience Our Outstanding Services</h2>
            <a href="https://vimeo.com/channels/staffpicks/93951774" class="play-single-big d-inline-block popup-vimeo"><span class="icon-play"></span></a>
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