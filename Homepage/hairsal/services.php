<!DOCTYPE html>
<?php  ob_start(); session_start(); ?>
    <html lang="en">

    <head>
        <title>AerySalon</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--===============================================================================================-->
        <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
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
	<script>
	
	</script>
    <body id="body" onscroll="myFunction()">
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
        <div class="site-wrap"  style="background-image: linear-gradient(to bottom, #ffffff, #edf8ff, #c6f6ff, #8af7ff, #3df7ff);">

            <div class="site-mobile-menu">
                <div class="site-mobile-menu-header">
                    <div class="site-mobile-menu-close mt-3">
                        <span class="icon-close2 js-menu-toggle"></span>
                    </div>
                </div>
                <div class="site-mobile-menu-body"></div>
            </div>
            <?php include ("$_SERVER[DOCUMENT_ROOT]/Prototype/header.php"); ?>

                <div class="site-blocks-cover" id="image1" style="background-image: url(images/service_bg.jpg);" style="">
                    <div class="container">
                        <div class="row align-items-center justify-content-center text-center">

                            <div class="col-md-8" data-aos="fade-up" data-aos-delay="400">
                                <h5 class="text-white font-weight-light text-uppercase" style="font-family:verdana;">Welcome to AerySalon</h5>
                                <h2 class="text-white font-weight-light mb-2 display-1" style="font-family:verdana;">Services</h2>

                                <p><a href="#" class="btn btn-black py-3 px-5">Book Now!</a></p>
                            </div>
                        </div>
                    </div>
                </div>
				<div class="container">
				<div class="mt-5 mb-5 border"style="background-color:white" >
				<?php 
					$servicetype = mysqli_query($conn,"SELECT * FROM service_type WHERE is_removed ='0'");
					if($servicetype)
					{
						while($typerow = mysqli_fetch_assoc($servicetype))
						{
							$thisid = $typerow['service_type_id'];
				echo'
                <div class="site-section pb-2 pt-4 pl-3 pr-3">
                    <div class="container">
                        <h2 style="border-left:5px solid silver;" class="pl-3">'.$typerow['service_type_name'].'</h2>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">';
						$service = mysqli_query($conn,"SELECT * FROM service WHERE is_removed ='0' AND service_type_id = $thisid");
						if($service)
						{
							$a = true;
							while($servicerow = mysqli_fetch_assoc($service))
							{	
								if($a)
								{
								echo'
								<li class="nav-item">
									<a class="nav-link active" id="'.str_replace(' ', '', $servicerow['service_name']).'-tab" data-toggle="tab" href="#'.str_replace(' ', '', $servicerow['service_name']).'" role="tab" aria-controls="'.str_replace(' ', '', $servicerow['service_name']).'" aria-selected="true">'.$servicerow['service_name'].'</a>
								</li>';
								$a = false;
								}
								else{
									echo'
								<li class="nav-item">
									<a class="nav-link" id="'.str_replace(' ', '', $servicerow['service_name']).'-tab" data-toggle="tab" href="#'.str_replace(' ', '', $servicerow['service_name']).'" role="tab" aria-controls="'.str_replace(' ', '', $servicerow['service_name']).'" aria-selected="false">'.$servicerow['service_name'].'</a>
								</li>';
								}
							}
						}
							echo'
                        </ul>
                        <div class="tab-content row mt-4" id="myTabContent">';
						$service = mysqli_query($conn,"SELECT * FROM service WHERE is_removed ='0' AND service_type_id = $thisid");
						$i = true;
						while($servicerow = mysqli_fetch_assoc($service))
						{
							$currid = $servicerow['service_id'];
							if($i)
							{
							echo'
                            <div class="tab-pane fade active show" id="'.str_replace(' ', '', $servicerow['service_name']).'" role="tabpanel" aria-labelledby="'.str_replace(' ', '', $servicerow['service_name']).'-tab">
                                <div id="carousel'.$servicerow['service_id'].'" class="carousel slide col-lg-4 float-left" data-ride="carousel">
                                    <div class="carousel-inner">';
                                    $result = mysqli_query($conn,"SELECT * FROM service_image WHERE service_id = '$currid'");
									if($result){
										$i=0;
										while($imagerow = mysqli_fetch_assoc($result))
										{
											if($i==0)
											{
												echo'<div class="carousel-item active">
													<img class="d-block w-100 " src="data:image/jpeg;base64,'.base64_encode($imagerow['image']).'" alt="First slide" style="width:350px !important; height:auto !important;">
												</div>';
												$i++;
											}
											else{
												echo'<div class="carousel-item">
													<img class="d-block w-100 " src="data:image/jpeg;base64,'.base64_encode($imagerow['image']).'" alt="First slide" style="width:350px !important; height:auto !important;">
												</div>';
											}
										}
									}
                                    echo'</div>
                                    <a class="carousel-control-prev" href="#carousel'.$servicerow['service_id'].'" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carousel'.$servicerow['service_id'].'" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
								<div class="col-lg-5 float-left border-right text-break h-100" style=" text-align: justify;width:750px">
								'.$servicerow['service_description'].'
								</div>
								<div class="col-lg-3 float-left text-break h-100">
								<label><b>Minimum Duration</b></label>
								<p><i>';
								$duration = $servicerow['service_estimateduration'];
								$hour = 0;
								while ( $duration >=60)
								{
									$hour+=1;
									$duration -=60;
								}
								if($duration !=0 && $hour !=0)
									echo $hour.' Hours '.$duration. ' Minutes';
								else if($duration ==0)
									echo $hour.' Hours ';
								else if($hour == 0)
									echo $duration.' Minutes ';
								
								if($servicerow['service_position_charge']=='1')
								{
									echo'</i></p>
									<label><b>Price</b><i><small> &nbsp(Depends on position)</small></i></label>
									<br>
									<i>';
									$position = mysqli_query($conn,"SELECT * FROM position WHERE is_removed ='0'");
									if($position)
									{
										while($positionrow = mysqli_fetch_assoc($position))
										{
											$total = (int)$positionrow['position_charge']+(int)$servicerow['service_estimatefee'];
											echo 'RM '.$total.' ++ ('.$positionrow['position_name'].')<br>';
										}
									}
								}
								else{
									echo'</i></p>
									<label><b>Price</b></label>
									<br>
									<i>';
									echo 'RM '.$servicerow['service_estimatefee'].' ++ <br>';
								}
								echo '</i>
								</div>
							
                            </div>';
							$i=false;
							}
							else{
							echo'
                            <div class="tab-pane fade" id="'.str_replace(' ', '', $servicerow['service_name']).'" role="tabpanel" aria-labelledby="'.str_replace(' ', '', $servicerow['service_name']).'-tab">
                                <div id="carousel'.$servicerow['service_id'].'" class="carousel slide col-lg-4 float-left" data-ride="carousel">
                                    <div class="carousel-inner">';
									
									$result = mysqli_query($conn,"SELECT * FROM service_image WHERE service_id = '$currid'");
									if($result){
										$i=0;
										while($imagerow = mysqli_fetch_assoc($result))
										{
											if($i==0)
											{
												echo'<div class="carousel-item active">
													<img class="d-block w-100 " src="data:image/jpeg;base64,'.base64_encode($imagerow['image']).'" alt="First slide" style="350px !important; height:auto !important;">
												</div>';
												$i++;
											}
											else{
												echo'<div class="carousel-item">
													<img class="d-block w-100 " src="data:image/jpeg;base64,'.base64_encode($imagerow['image']).'" alt="First slide" style="350px !important; height:auto !important;">
												</div>';
											}
										}
									}
										echo'
                                    </div>
                                    <a class="carousel-control-prev" href="#carousel'.$servicerow['service_id'].'" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carousel'.$servicerow['service_id'].'" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
								<div class="col-lg-5 float-left border-right text-break h-100" style=" text-align: justify;width:750px">
								'.$servicerow['service_description'].'
								</div>
								<div class="col-lg-3 float-left text-break h-100">
								<label><b>Minimum Duration</b></label>
								<p><i>';
								$duration = $servicerow['service_estimateduration'];
								$hour = 0;
								while ( $duration >=60)
								{
									$hour+=1;
									$duration -=60;
								}
								if($duration !=0 && $hour !=0)
									echo $hour.' Hours '.$duration. ' Minutes';
								else if($duration ==0)
									echo $hour.' Hours ';
								else if($hour == 0)
									echo $duration.' Minutes ';
								echo'</i></p>
								<label><b>Price</b></label>
								<br>
								<i>';
								if($servicerow['service_position_charge']=='1')
								{
									$position = mysqli_query($conn,"SELECT * FROM position WHERE is_removed ='0'");
									if($position)
									{
										while($positionrow = mysqli_fetch_assoc($position))
										{
											$total = (int)$positionrow['position_charge']+(int)$servicerow['service_estimatefee'];
											echo 'RM '.$total.' ++ ('.$positionrow['position_name'].')<br>';
										}
									}
								}
								else{
									echo 'RM '.$servicerow['service_estimatefee'].' ++ <br>';
								}
								echo '</i>
								</div>
							
                            </div>';
							$i = false;
							}
						}
							
							echo'
                        </div>
						<hr>
                    </div>
                </div>';
						}
					}
				?>
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