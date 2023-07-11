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
		.dot3 {
		    display: inline-block;
			content: '';
			-webkit-border-radius: 0.75rem;
			border-radius: 0.75rem;
			height: 1.25rem;
			width: 1.25rem;
			margin-right: 0.5rem;
			background-color: #ffebb3;
			vertical-align:middle;
		}
		.fixed-header {
		position: fixed !important;
		width:24.3%;
		top:11%;

		}
		.bottomside{
			position:absolute !important;
			bottom:0;
		}
	  </style>
</head>
<body onscroll="myFunction();">
<script>
$(window).scroll(function(){
    if ($(window).scrollTop() >= 950) {
		if($(window).scrollTop() >= $('footer').offset().top - $('#infoblock').height() - 300)
		{
			$('#infoblock').removeClass('fixed-header');
			$('#infoblock').addClass('bottomside');
		}
		else
		{
			$('#infoblock').addClass('fixed-header');
			$('#infoblock').removeClass('bottomside');
		}
    }
    else {
        $('#infoblock').removeClass('fixed-header');
    }
});

	function myFunction() {  
    var scrolltotop = document.scrollingElement.scrollTop;
    var target = document.getElementById("image1");
    var xvalue = "center";
    var factor = 0.5
    var yvalue = scrolltotop * factor;
    target.style.backgroundPosition = xvalue + " " + yvalue + "px";

  }
function findGetParameter(parameterName) {
    var result = null,
        tmp = [];
    location.search
        .substr(1)
        .split("&")
        .forEach(function(item) {
            tmp = item.split("=");
            if (tmp[0] === parameterName) result = decodeURIComponent(tmp[1]);
        });
    return result;
}
</script>
	<script src="datepickk/datepickk.min.js"></script>
	<script>hljs.initHighlightingOnLoad();</script>
	<script>var datepicker = new Datepickk();</script>
	
<?php include ("$_SERVER[DOCUMENT_ROOT]/Prototype/header.php"); ?>
<div class="site-blocks-cover" id="image1" style="background-image: url(images/bg_app.jpg);" style="">
    <div class="container">
         <div class="row align-items-center justify-content-center text-center">
              <div class="col-md-8" data-aos="fade-up" data-aos-delay="400">
                  <h5 class="text-white font-weight-light text-uppercase" style="font-family:verdana;">Welcome to AerySalon</h5>
                      <h2 class="text-white font-weight-light mb-2 display-1" style="font-family:verdana;">Book Online</h2>
              </div>
         </div>
	</div>
</div>
<div class="page-wrapper" id="bgcolor"style="background-image: url('bg.jpg'); background-size:cover">
<div class="container p-t-5 p-b-100" >
        <div class="container" style="font-family: 'Lato', sans-serif;
        font-size: 20px;margin:35px 0 35px 0;border:5px solid grey; background:rgba(255,255,255,0.5);padding-bottom:15px">
		<div class="steptitle" id="step1title">
        <h3 
		> CHOOSE YOUR HAIRDRESSER</h3>
		</div>
		<div id="step2title" class="steptitle" style="display:none">
        <h3 
		> CHOOSE APPOINTMENT DATE</h3>
		</div>
		<div class="steptitle" id="step3title" style="display:none">
        <h3 
		> CHOOSE SERVICES</h3>
		</div>
		<div class="steptitle" id="step4title" style="display:none">
        <h3 style=""
		> CHOOSE TIME SLOT</h3>
		</div>
		<div class="steptitle" id="step5title" style="display:none">
        <h3 style=""
		> CONFIRMATION</h3>
		</div>
		<div class="steptitle" id="step6title" style="display:none">
        <h3 style=""
		> DONE !</h3>
		</div>
        <ul class="progress-indicator">
            <li id="step1" class="active">
                <span class="bubble"></span>
                Step 1. <br><small><b>Hairdresser</b></small>
            </li>
            <li id="step2">
                <span class="bubble"></span>
                Step 2. <br><small><b>Appointment Date</b></small>
            </li>
            <li id="step3">
                <span class="bubble"></span>
                Step 3. <br><small><b>Services</b></small>
            </li>
            <li id="step4">
                <span class="bubble"></span>
                Step 4. <br><small><b>Time Slot</b></small>
            </li>
            <li id="step5">
                <span class="bubble"></span>
                Step 5. <br><small><b>Confirmation</b></small>
            </li>
			<li id="step6">
                <span class="bubble"></span>
                Done !<br>
            </li>
        </ul>
      </div>
	  
	  <div id="choosehairdresser">
	  <div class="alert alert-info alert-dismissable">
          <a class="panel-close close" data-dismiss="alert">×</a> ** <strong>Price of services might be various based on different hairdresser position and services</strong>
      </div>
	<?php 
	$result = mysqli_query($conn,"SELECT hairdresser.*, position.position_name FROM hairdresser INNER JOIN position ON hairdresser.position_id = position.position_id WHERE hairdresser.is_removed ='0'");
	if ($result)
	{
		while($row = mysqli_fetch_assoc($result))
		{
			$defimg ="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAMFBMVEXFxcX////CwsLGxsb7+/vT09PJycn19fXq6urb29vOzs7w8PDe3t7n5+f5+fnt7e2uCwolAAAFHUlEQVR4nO2dC5qqMAyFMTwUFNz/bq+VYYrKKJCkOfXmXwHna5uTpA+KwnEcx3Ecx3Ecx3Ecx3Ecx3Ecx3Ecx3Ecx3EcA2iO9cdIc5PUdO2l78+BU39p66b4HplE3eU6VIcnqmNfl1+gksr6+iIucr50WYukor7+re6Hoe1y1UhNO3zUd+fUFRmKpOa0Tt6dY5ubRCouG/QFzk1WGmnt/JxzykcjdZ/jyxJDLlOV2l36AtcsJJb9boG3YcR3DuqODIE3LtYKPkDdmwRmpUToUaSaq++AvRgZMWbOubQW8hdCAm8ZDugoikzREdCJ2okJPBx6azFLNOwoOgcxojJ98JkaTSJxMpklKrCAKhZGI0drTY/wU5lXoJYibannV9NYy4oozNEAkPHTjop+DTDxVGkIgYJNoyQQJtiIW+EMjGAjm649AjGIaqswcEZQKJ2QPlJbqytki6ZXAAZRJ52J2McaUowzAfs+uFzrYhnzaapphiPWdaJWShqxjqa6kTTQ205TVbsfMa6htL0iYOsXpJrQjHSmCkv1QGPtiHqlYcQ21Gj7fcDU8xOEUuNgSltPzexh+HqFlanCBHZ4OLhCV+gK/3OF6vWvucLv98MUOY2pwu/PS/+D2qJU7pYGbOvDFDW+bbON9p3o3oRxn0bfLgZTgSn6pSfrtr56qLHemtHPTK2319SzGvtjQ9qeb39Wgc66Cm073nd0U1PzDdJCO3Gzn6TKpl9Zq7ujGWsQhlA3NwWIMwG9zM08Y/tBrR9VWeczv5CSQuuUNKIUTk23ZJ5RKfVhjnkXotfWIlgX2BSCDYbZR+QTcLhb3dKZDUY2M0d4KWItwhHRah/zsrOgKw4wycwjcgEVcgQDQo23CqSiWEJkFAfod2oE1uIZdA1OsCPqFXYNTjCfb8Ez+iX2x5sKLlVbhtqdDcar9ZevhnbZxoBUD35k23t0d304LYs1ELVbnfFaZ/REJJX9niP8Q19moZGo3m8XR/yBvOnjFftncI2c8ZuNo7WMP5HQh6yRGrlmFOJTnyTcT+zRlqPUBI2gTVWNUzUna1ERgecgF4GpNBQ38jGqxVLzQA1A31Rrhk6Yz9QEh/WND0GnuG9huhiTXJkxfAizTHLr6cbJKN6UCU6x/2DTRE1xEeEXi3O0ZUqBN4nJRzHhFB1JPlFTBZlI2kQ8zc3KJ1Le8DIRmFJiknuVS6RK4Ej/JtBfJErDSzOBiY4wJHX6Z1I4v1GUmdCPNirnLLeg3oJLcbX5PcpHNbRvOa1A956QmRPOUXVF+zkaUJynpkYR0bOMJH2nNej1pqyV/aKkz9jr5yj5vrXXz1F5SQLACiMapmierj2ikLyleKdlA/I/2oFxiglxx9B+mHwz0lf34IZQfhDRhlD6bhvgEAoPYooHkTczSIZTLC+cEExsoNKZiGBiY9cCfo/Y/SjIOBMQizWWTe73CMUasJx7jlD+DdKdWUKoY4PRYFtGpO0G1Lx4RaadgTtJhf4fiGqGIwKWCGuGIwKWqP+7IxYCzygjR9IAO5pC7Da9g70TBVpWRNgFBlgT8RV2WxHbKwJMv4BOaEaYaU2K16yZMN/qgV+G7IWIvwyZCxHeDQMsR8wg0DBDDXB5H2EV+hkEGmaoySHQsEJNFoGGFWrAq98JRhUMX1iMMMqLLEIpK5jCbd4vw9nSt/72lewXiN6jmdjfq8Hdknlk92ZwJnbIMMRM7JBhiFlUFoHd1UWaP1QKsPsHA5mkNB+Smn9r+138jGzYzgAAAABJRU5ErkJggg==";
			if(!empty ($row['hairdresser_profpic']) || $row['hairdresser_profpic']!=null)
			{
				$defimg = base64_encode($row['hairdresser_profpic']);
					echo '
				<div class="card ml-2 mr-2" onclick="step1('.$row['hairdresser_id'].')">
				  <div class="card_image">';
					echo'<img class="hairdresser" src="data:image/jpeg;base64,'.base64_encode($row['hairdresser_profpic']).'"></div>';
				  
			}
			else{
				echo '
				<div class="card ml-2 mr-2" onclick="step1('.$row['hairdresser_id'].')">
				  <div class="card_image">';
					echo'<img class="hairdresser" src="'.($defimg).'"> </div>';
			}
			echo'<div class="card_title title-white">
				   '.$row['hairdresser_firstname']." ".$row['hairdresser_lastname'].'<br>
				  </div>
				  <div class="position_title title-black">
				  <i>'.$row['position_name'].'</i>
				  </div>
				</div>';
			
		}
	}
	 
	?>
	</div>
	
		<div class="col-xl-12">
			
			<div class="col-lg-4 col-md-12 border bg-white pl-4 pr-4 mr-lg-5 mt-lg-5 mb-sm-5" id="infoblock" style="display:none;padding:20px 35px;position:absolute">
			<nav>
			<p style="font-size:18px" >Appintment Info</p>
				<label style="border-bottom:2px solid silver;width:100%">
					<big>
						<font size="3"color="#919191">Selected Hairdresser</font>
					</big>
				</label>
				<img src="" style="margin-top:-30px"class="image-icon circular" id="hairdresserimage1">
				<p style="display:inline-block;">
					
					<div style="display:inline-block;">
					<font size="4"id="hairdressername"></font>&nbsp &nbsp <br>
					<font size="2"id="positionname"></font>
					</div>
				</p>
				<div id="datetimeblock" style="display:none">
					<label style="border-bottom:2px solid silver;width:100%">
						<big>
							<font size="3"color="#919191">Selected Date & Time</font>
						</big>
					</label>
					<p style="display:inline-block;">
						
						<div style="display:inline-block;" >
						<font size="3"class="infoblock-date"></font>
						<font size="3" class="infoblock-selectedtime"></font>
						</div>
					</p>
				</div>
				<div id="serviceblock" style="display:none">
					<label style="border-bottom:2px solid silver;width:100%">
						<big>
							<font size="3"color="#919191">Selected Service</font>
						</big>
					</label>
					<p style="display:inline-block;">
						<div style="display:inline-block;" >
						<font size="3"class="infoblock-service"></font>
						</div>
					</p>
				</div>
				<div id="estimateblock" style="display:none">
					<label style="border-bottom:2px solid silver;width:100%">
						<big>
							<font size="3"color="#919191">Estimated Fee & Duration</font>
							<span class="duration"></span>
						</big>
					</label>
					<p style="display:inline-block;">
						<div style="display:inline-block;" >
						<i class="fas fa-clock"></i>
						<font size="3"class="infoblock-duration" style="padding-left:3px"></font>
						<br>
						<i class="fas fa-dollar-sign" style="padding-left:2px"></i>
						<font size="3"class="infoblock-fee" style="padding-left:7px"></font>
						</div>
					</p>
				</div>
				<div id="endtimeblock" style="display:none">
							<label style="border-bottom:2px solid silver;width:100%">
								<big>
									<font size="3"color="#919191">Estimated End Time</font>
								</big>
							</label>
							<p style="display:inline-block;">
								<div style="display:inline-block;" >
								<i class="fas fa-clock"></i>
								<font size="3" class="infoblock-endtime" style="padding-left:3px"></font>
								</div>
							</p>
						</div>
				
			</nav>
			</div>
				<div id="choosedate" class="col-lg-7 col-md-12 mt-sm-5"style="display:none;margin-left:36%">
				 <div class="alert alert-info alert-dismissable">
					  <a class="panel-close close" data-dismiss="alert">×</a> ** <strong>Please be noted that you can only make appointment at least 2 day in advance</strong>
				  </div>
					<p align="center">
						<img src="" class="image-icon circular " id="hairdresserimage2"><span style="font-size:18px" id="hairdressernameforicon"></span>
					</p>
					
					<div id="demoPicker" class=""style="height:500px;width:100%;"></div>
					<script>
						var now = new Date();
						var step2url = '';
						var demoPicker = new Datepickk({
							container: document.querySelector('#demoPicker'),
							inline:true,
						});
						<?php 
							$id = $_SESSION['user']['cust_id'];
							$result = mysqli_query($conn,"SELECT * FROM appointment WHERE cust_id = '$id' AND status!='Cancelled' AND status!='Completed'");
							if($result)
							{
								echo"demoPicker.disabledDates = [" ;
								while($row = mysqli_fetch_assoc($result))
								{
									$date =date('Y-m-d', strtotime("-1 months", strtotime($row['date_appointment'])));
									$date = str_replace("-",",",$date);
									echo "new Date(".$date."),";
								}
								echo "];";

							}
							$result = mysqli_query($conn,"SELECT * FROM appointment WHERE cust_id = '$id' AND status!='Cancelled'");
							if($result)
							{
								echo "var highlight = {";
								echo "dates :[";
								$result = mysqli_query($conn,"SELECT * FROM appointment WHERE cust_id = '$id' AND status!='Cancelled' AND status!='Completed'");
								$numrowz = mysqli_num_rows($result);
								$numz = 1;
								while($row = mysqli_fetch_assoc($result))
								{
									$date =date('Y-m-d', strtotime("-1 months", strtotime($row['date_appointment'])));
									$date = str_replace("-",",",$date);
									echo "{start: new Date(".$date."),";
									echo "end: new Date(".$date.")}";
									if($numz != $numrowz)
										echo ",";
									$numz++;
								}
								echo "],";
								echo "backgroundColor: '#ff3c26',";
								echo "color: '#ffffff',";
								echo "legend: 'Appointment Made'};";
								echo"demoPicker.highlight = highlight;";

							}
						?>
						<?php 
							$result = mysqli_query($conn,"SELECT * FROM salon_closeday");
							if($result)
							{
								echo"demoPicker.disabledDates = [" ;
								while($row = mysqli_fetch_assoc($result))
								{
									$date = date($row['closeday_date']);
									$date = str_replace("-",",",$date);
									echo "new Date(".$date."),";
								}
								echo "];";

							}
						?>
						
						//to highlight salon close day date 
						<?php 
							$result = mysqli_query($conn,"SELECT * FROM salon_closeday");
							if($result)
							{
								echo "var highlight = {";
								echo "dates :[";
								$result = mysqli_query($conn,"SELECT * FROM salon_closeday ");
								$numrow = mysqli_num_rows($result);
								$num = 1;
								while($row = mysqli_fetch_assoc($result))
								{
									$date = date($row['closeday_date']);
									$date = str_replace("-",",",$date);
									echo "{start: new Date(".$date."),";
									echo "end: new Date(".$date.")}";
									if($num != $numrow)
										echo ",";
									$num++;
								}
								echo "],";
								echo "backgroundColor: '#E99C00',";
								echo "color: '#ffffff',";
								echo "legend: 'Salon Close Day'};";
								echo"demoPicker.highlight = highlight;";

							}
						?>

						var today = new Date();
						var tomorrow = new Date();
						tomorrow.setDate(today.getDate()+2);
						//demoPicker.minDate = tomorrow;
						demoPicker.maxSelections = 1;
						demoPicker.onSelect = function(checked){
							var weekday = new Array(7);
							weekday[0] =  "Sunday";
							weekday[1] = "Monday";
							weekday[2] = "Tuesday";
							weekday[3] = "Wednesday";
							weekday[4] = "Thursday";
							weekday[5] = "Friday";
							weekday[6] = "Saturday";
						var state = (checked)?'selected':'unselected';
						var StringDate = weekday[this.getDay()] +", "+this.getFullYear()+"-"+parseInt(this.getMonth()+1)+"-"+this.getDate();
						var date = this.getFullYear()+"-"+parseInt(this.getMonth()+1)+"-"+this.getDate();
						
						Swal.fire({
							  title: 'Are you sure?',
							  html: "<b style='font-weight:500'>You won't be able to change appointment date afterwards!<hr>Selected Date:<br>" + StringDate,
							  type: 'warning',
							  showCancelButton: true,
							  confirmButtonColor: '#3085d6',
							  cancelButtonColor: '#d33',
							  confirmButtonText: 'Confirm!'
							}).then((result) => {
							  if (result.value) {
	
								var newurl = window.location.href+'&date='+date;
								if(findGetParameter('serviceid')==null)
									history.pushState(null, '', step1url + '&date=' + date);
								else
									history.pushState(null, '', step1url + '&date=' + date+"&serviceid="+findGetParameter('serviceid'));
								step2url = window.location.href;
								$('#datetimeblock').toggle(1000);
								
								step3(StringDate);
							  }
							})
						};
					</script>
				</div>
				<!-- CHOOSE SERVICE -->
				<div id="chooseservice" style="display:none; margin-left:36%" class="col-lg-9 col-md-12 mt-sm-5">
				
					<div class="alert alert-info alert-dismissable">
                        <a class="panel-close close" data-dismiss="alert">×</a> ** <strong>Price of services might be various based on different hairdresser position and services</strong>
                    </div>
						<p align="right"><a href="//localhost/Prototype/Homepage/hairsal/services.php" target="_blank">-> <i>Click here to view more services details</i></a></p>
					
					<?php 
					$result = mysqli_query($conn,"SELECT * FROM service_type WHERE is_removed ='0'");
					while($row = mysqli_fetch_assoc($result))
					{
						$stid = $row['service_type_id'];
						echo "<div style='border-left:5px solid black;padding-left:15px' class='mt-3 mb-3'><font size='5' color='black'>".$row['service_type_name']."</font></div>";
						$serviceresult = mysqli_query($conn,"SELECT service.*,service_type.service_type_id FROM service INNER JOIN service_type ON service.service_type_id = service_type.service_type_id WHERE service.is_removed ='0' AND service.service_type_id = '$stid'");
						while($r = mysqli_fetch_assoc($serviceresult))
						{
							echo'
					<article class="card1 card--2" id="'.str_replace(' ','',$r['service_name']).'" style="box-shadow:none;cursor:pointer" onclick="selected('.$r['service_id'].',\''.str_replace(' ','',$r['service_name']).'\','.$row['service_type_id'].')">
					 
					  <div class="card__img" id="'.str_replace(' ','',$r['service_name']).'_img"></div>';
					  $curid = $r['service_id'];
					  $sname = str_replace(' ','',$r['service_name']);
					  $img = mysqli_query($conn,"SELECT * FROM service_image WHERE service_id = '$curid'");
					  $zz =0;
					  while($imgrow = mysqli_fetch_assoc($img))
					  {
						  if($zz ==0)
						  {
						  echo'
						  <script>
							$("#'.$sname.'_img").css("background-image","url(data:image/jpeg;base64,'.base64_encode($imgrow['image']).')");
						  </script>';
						  }
					  }
					  echo'
					  <a class="card_link" >
						 <div class="card__img--hover" id="'.str_replace(' ','',$r['service_name']).'_imghover"></div>
					   </a>';
					  $img = mysqli_query($conn,"SELECT * FROM service_image WHERE service_id = '$curid'");
					  $zz =0;
					  while($imgrow = mysqli_fetch_assoc($img))
					  {
						  if($zz ==0)
						  {
						  echo'
						  <script>
							$("#'.$sname.'_imghover").css("background-image","url(data:image/jpeg;base64,'.base64_encode($imgrow['image']).')");
						  </script>';
						  }
					  }
					   echo'
					  <div class="card__info">
						
						<h5 class="card__title">'.$r['service_name'].'</h5>
						<div class="card__category" style="display:inline-block"><i class="fas fa-clock"></i></div><font size="2">';
						$duration = $r['service_estimateduration'];
						
						$hour = 0;
						while($duration >=60)
						{
							$hour +=1;
							$duration = $duration - 60;
						}
						if($hour==0)
							echo ' '.$duration." Minutes";
						else
							echo ' '.$hour." Hour ".$duration." Minutes";
						echo'</font>
						
						<br>
						<div class="card__category" style="display:inline-block"><i class="fas fa-dollar-sign"></i></div><font size="2"> RM';
						if($r['service_position_charge']=='1')
						{
							echo '<span id="'.str_replace(' ','',$r['service_name']).'_fee" charge="true" fee="'.$r['service_estimatefee'].'"></span>';
						}
						else{
							echo '<span id="'.str_replace(' ','',$r['service_name']).'_fee" charge="false" fee="'.$r['service_estimatefee'].'"></span>';
						}
						echo'</font>
					  </div>
					</article>  ';
						}
						echo "<hr>";
					}
					?>
						<button class="login100-form-btn mb-3" onclick="todate()">Previous</button>
						<button class="login100-form-btn mb-3" style="float:right" onclick="confirmService()">Next</button>
				</div>
				<div id="choosetimeslot" style="display:none;margin-left:36%;" class="col-lg-9 col-md-12 pt-5">
				<form name="timeslotform">
				<div class="col-lg-10">
				
				<div style="width:50%;" class="mb-3 ml-2 d-inline-block"><span class="dot"></span>Exceed Operation Hour</div>
				<div style="width:45%;" class="mb-3 ml-2 d-inline-block"><span class="dot2"></span>Booked Time Slot</div>
				<div style="width:45%;" class="mb-3 ml-2 d-inline-block"><span class="dot3"></span>Prevent Time Slot Clash</div>
					<div class="panel panel-default col-lg-12 pl-0 pr-0 ml-2 mr-2" style="display:inline-block">
							<div class="panel-heading">Time Slot Selection</div>
							<div class="panel-body">
							<div class="col-lg-6" style="display:inline-block;float:left">
							<h4>Morning</h4><hr>
							 <div class="inputGroup">
								<input id="radio1000" name="tsradio" value="1000" type="radio" />
								<label for="radio1000" id="labelradio1000" >10:00 AM</label>
							 </div>
							 <div class="inputGroup">
								<input id="radio1030" name="tsradio" value="1030" type="radio"/>
								<label for="radio1030" id="labelradio1030" >10:30 AM</label>
							 </div>
							 <div class="inputGroup">
								<input id="radio1100" name="tsradio" value="1100" type="radio"/>
								<label for="radio1100" id="labelradio1100" >11:00 AM</label>
							 </div>
							 <div class="inputGroup">
								<input id="radio1130" name="tsradio" value="1130" type="radio"/>
								<label for="radio1130" id="labelradio1130" >11:30 AM</label>
							 </div>
							 <h4>Evening</h4><hr>
							 <div class="inputGroup">
								<input id="radio1800" name="tsradio" value="1800" type="radio"/>
								<label for="radio1800" id="labelradio1800">6.00 PM</label>
							 </div>
							 <div class="inputGroup">
								<input id="radio1830" name="tsradio" value="1830" type="radio"/>
								<label for="radio1830" id="labelradio1830">6:30 PM</label>
							 </div>
							 <div class="inputGroup">
								<input id="radio1900" name="tsradio" value="1900" type="radio"/>
								<label for="radio1900" id="labelradio1900">7:00 PM</label>
							 </div>
							 <div class="inputGroup">
								<input id="radio1930" name="tsradio" value="1930" type="radio"/>
								<label for="radio1930" id="labelradio1930">7:30 PM</label>
							 </div>
							</div>
							
							<div class="col-lg-6" style="display:inline-block">
							<h4>Afternoon</h4><hr>
							 <div class="inputGroup">
								<input id="radio1200" name="tsradio" value="1200" type="radio"/>
								<label for="radio1200" id="labelradio1200">12:00 PM</label>
							 </div>
							 <div class="inputGroup">
								<input id="radio1230" name="tsradio" value="1230" type="radio"/>
								<label for="radio1230" id="labelradio1230">12:30 PM</label>
							 </div>
							 <div class="inputGroup">
								<input id="radio1300" name="tsradio" value="1300" type="radio"/>
								<label for="radio1300" id="labelradio1300">1:00 PM</label>
							 </div>
							 <div class="inputGroup">
								<input id="radio1330" name="tsradio" value="1330" type="radio"/>
								<label for="radio1330" id="labelradio1330">1:30 PM</label>
							 </div>
							 <div class="inputGroup">
								<input id="radio1400" name="tsradio" value="1400" type="radio"/>
								<label for="radio1400" id="labelradio1400">2:00 PM</label>
							 </div>
							 <div class="inputGroup">
								<input id="radio1430" name="tsradio" value="1430" type="radio"/>
								<label for="radio1430" id="labelradio1430">2:30 PM</label>
							 </div>
							 <div class="inputGroup">
								<input id="radio1500" name="tsradio" value="1500" type="radio"/>
								<label for="radio1500" id="labelradio1500">3:00 PM</label>
							 </div>
							 <div class="inputGroup">
								<input id="radio1530" name="tsradio" value="1530" type="radio"/>
								<label for="radio1530" id="labelradio1530">3:30 PM</label>
							 </div>
							 <div class="inputGroup">
								<input id="radio1600" name="tsradio" value="1600" type="radio"/>
								<label for="radio1600" id="labelradio1600">4:00 PM</label>
							 </div>
							 <div class="inputGroup">
								<input id="radio1630" name="tsradio" value="1630" type="radio"/>
								<label for="radio1630" id="labelradio1630">4:30 PM</label>
							 </div>
							 <div class="inputGroup">
								<input id="radio1700" name="tsradio" value="1700" type="radio"/>
								<label for="radio1700" id="labelradio1700">5:00 PM</label>
							 </div>
							 <div class="inputGroup">
								<input id="radio1730" name="tsradio" value="1730" type="radio"/>
								<label for="radio1730" id="labelradio1730">5:30 PM</label>
							 </div>
							</div>
							
							</div>
						</div>
						<div class="col-lg-12 pl-0 pr-0">
					<button type="button" class="login100-form-btn ml-2 mb-3" onclick="toservice()">Previous</button>
					<button type="button" class="login100-form-btn mb-3" style="float:right;" onclick="confirmTimeslot()">Next</button>
				</div>
					</div>
					
				</form>
				
				</div>
		<div id="confirmation" class="col-lg-12" style="display:none">
			<hr>
				<p><h2 style="text-align:center">Almost Done !</h2></p>
			<hr>
				<div class="alert alert-info alert-dismissable">
                   <a class="panel-close close" data-dismiss="alert">×</a> ** Please note that you are only able to cancel your appointment before <strong>TWO DAYS</strong> of your appointment date.
                </div>
				<div class="col-lg-8" style="margin:0 auto;">
					
				<div class="col-lg-12 col-md-12 border bg-white pl-4 pr-4 mr-lg-5 mt-lg-3 mb-sm-5" id="confirmationblock" style="padding:20px 35px;">
					<nav>
					<p style="font-size:18px"align="center" >Appintment Info</p>
						<label style="border-bottom:2px solid silver;width:100%">
							<big>
								<font size="3"color="#919191">Selected Hairdresser</font>
							</big>
						</label>
						<img src="" style="margin-top:-30px"class="image-icon circular" id="confirmhairdresserimage1">
						<p style="display:inline-block;">
							
							<div style="display:inline-block;">
							<font size="4"id="confirmhairdressername"></font>&nbsp &nbsp <br>
							<font size="2"id="confirmpositionname"></font>
							</div>
						</p>
						<div id="datetimeblock">
							<label style="border-bottom:2px solid silver;width:100%">
								<big>
									<font size="3"color="#919191">Selected Date & Time</font>
								</big>
							</label>
							<p style="display:inline-block;">
								
								<div style="display:inline-block;" >
								<font size="3" class="infoblock-date"></font>
								<font size="3" class="infoblock-selectedtime"></font>
								</div>
							</p>
						</div>
						<div id="serviceblock">
							<label style="border-bottom:2px solid silver;width:100%">
								<big>
									<font size="3"color="#919191">Selected Service</font>
								</big>
							</label>
							<p style="display:inline-block;">
								<div style="display:inline-block;" >
								<font size="3" class="infoblock-service"></font>
								</div>
							</p>
						</div>
						<div id="estimateblock">
							<label style="border-bottom:2px solid silver;width:100%">
								<big>
									<font size="3"color="#919191">Estimated Fee & Duration</font>
								</big>
							</label>
							<p style="display:inline-block;">
								<div style="display:inline-block;" >
								<i class="fas fa-clock"></i>
								<font size="3" class="infoblock-duration" style="padding-left:3px"></font>
								<br>
								<i class="fas fa-dollar-sign" style="padding-left:2px"></i>
								<font size="3" class="infoblock-fee" style="padding-left:7px"></font>
								</div>
							</p>
							
						</div>
						<div id="endtimeblock">
							<label style="border-bottom:2px solid silver;width:100%">
								<big>
									<font size="3"color="#919191">Estimated End Time</font>
								</big>
							</label>
							<p style="display:inline-block;">
								<div style="display:inline-block;" >
								<i class="fas fa-clock"></i>
								<font size="3" class="infoblock-endtime" style="padding-left:3px"></font>
								</div>
							</p>
						</div>
						
					</nav>
					</div>
					<div class="col-lg-12 pl-0 pr-0">
						<button type="button" class="login100-form-btn ml-2" onclick="totimeslot()">Previous</button>
						<button type="button" class="login100-form-btn" style="float:right;" onclick="confirmAppointment()">Confirm</button>
					</div>
					</div>
				</div>
		<div class="col-lg-12" style="display:none;" id="appointmentConfirmed" >
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
<script>
var step1url = '';
var timeslots = ['1000','1030','1100','1130','1200','1230','1300','1330','1400','1430','1500','1530','1600','1630','1700','1730','1800','1830','1900','1930','2000','2030'];
    function step1(id) {
		 
        var newurl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?hairdresserid=' + id;
        window.history.pushState({
            path: newurl
        }, '', newurl);
        step2(id);
		step1url = newurl;
			$.ajax({
				type: 'get',
				url: 'fullappointment.php',
				dataType: "JSON",
				data: {
					'hairdresserid': findGetParameter('hairdresserid'),
				},
				success: function(response) {
					for(var i=0;i<response.date.length;i++)
					{
						var highlighta = {
							dates:[
							{start: new Date(response.date[i]),
							end: new Date(response.date[i])}],
							backgroundColor: '#cccccc',
						legend: 'Full Appointment'
						};
						demoPicker.highlight = highlighta;
						demoPicker.disabledDates = [new Date(response.date[i])];
					}
				}
			})
    }
var service = [];
var position_charge = 0;

function step2(id) {
	
    $('#infoblock').fadeToggle(1200);
    $('#infoblock').css("display", "inline-block");
    $("#choosehairdresser").fadeToggle(0);
    $("#step1title").fadeToggle(0);
    $("#choosedate").fadeToggle(1200);
    $('#choosedate').css("display", "inline-block");
    $("#step2title").fadeToggle(1200);
    $('#step2').addClass('active');
    $.ajax({
        type: 'get',
        url: 'getinfo.php',
        dataType: "JSON",
        data: {
            'hairdresserid': id,
        },
        success: function(response) {
            <!--Hairdresser Calendar Json Loading-- >
            document.getElementById('hairdressername').innerHTML = response.name;
            document.getElementById('hairdressernameforicon').innerHTML = response.name + "'s Appointment Calendar";
            document.getElementById('positionname').innerHTML = response.position;
            var a = []; 
			<!--Hairdresser Offday Json Loading-- >
            for (var i = 0; i < response.offday.length; i++) {

                var currdate = response.offday[i].split('-').join(',');
                demoPicker.disabledDates = [new Date(new Date(currdate).getFullYear(), new Date(currdate).getMonth() + 1, new Date(currdate).getDate())];
                var b = {
                    start: new Date(new Date(currdate).getFullYear(), new Date(currdate).getMonth() + 1, new Date(currdate).getDate()),
                    end: new Date(new Date(currdate).getFullYear(), new Date(currdate).getMonth() + 1, new Date(currdate).getDate())
                };
                a.push(b);
            }
            var highlight2 = {
                dates: a,
                backgroundColor: '#ff70b3',
                color: '#ffffff',
                legend: 'Off Day'
            };
            demoPicker.highlight = [highlight2]; 
			<!--Hairdresser Image Json Loading-- >
            if (response.image) {
                document.getElementById('hairdresserimage1')
                    .setAttribute(
                        'src', 'data:image/png;base64,' + response.image
                    );
                document.getElementById('hairdresserimage2')
                    .setAttribute(
                        'src', 'data:image/png;base64,' + response.image
                    );
            } else {
                var img = 'iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAMFBMVEXFxcX////CwsLGxsb7+/vT09PJycn19fXq6urb29vOzs7w8PDe3t7n5+f5+fnt7e2uCwolAAAFHUlEQVR4nO2dC5qqMAyFMTwUFNz/bq+VYYrKKJCkOfXmXwHna5uTpA+KwnEcx3Ecx3Ecx3Ecx3Ecx3Ecx3Ecx3Ecx3EcA2iO9cdIc5PUdO2l78+BU39p66b4HplE3eU6VIcnqmNfl1+gksr6+iIucr50WYukor7+re6Hoe1y1UhNO3zUd+fUFRmKpOa0Tt6dY5ubRCouG/QFzk1WGmnt/JxzykcjdZ/jyxJDLlOV2l36AtcsJJb9boG3YcR3DuqODIE3LtYKPkDdmwRmpUToUaSaq++AvRgZMWbOubQW8hdCAm8ZDugoikzREdCJ2okJPBx6azFLNOwoOgcxojJ98JkaTSJxMpklKrCAKhZGI0drTY/wU5lXoJYibannV9NYy4oozNEAkPHTjop+DTDxVGkIgYJNoyQQJtiIW+EMjGAjm649AjGIaqswcEZQKJ2QPlJbqytki6ZXAAZRJ52J2McaUowzAfs+uFzrYhnzaapphiPWdaJWShqxjqa6kTTQ205TVbsfMa6htL0iYOsXpJrQjHSmCkv1QGPtiHqlYcQ21Gj7fcDU8xOEUuNgSltPzexh+HqFlanCBHZ4OLhCV+gK/3OF6vWvucLv98MUOY2pwu/PS/+D2qJU7pYGbOvDFDW+bbON9p3o3oRxn0bfLgZTgSn6pSfrtr56qLHemtHPTK2319SzGvtjQ9qeb39Wgc66Cm073nd0U1PzDdJCO3Gzn6TKpl9Zq7ujGWsQhlA3NwWIMwG9zM08Y/tBrR9VWeczv5CSQuuUNKIUTk23ZJ5RKfVhjnkXotfWIlgX2BSCDYbZR+QTcLhb3dKZDUY2M0d4KWItwhHRah/zsrOgKw4wycwjcgEVcgQDQo23CqSiWEJkFAfod2oE1uIZdA1OsCPqFXYNTjCfb8Ez+iX2x5sKLlVbhtqdDcar9ZevhnbZxoBUD35k23t0d304LYs1ELVbnfFaZ/REJJX9niP8Q19moZGo3m8XR/yBvOnjFftncI2c8ZuNo7WMP5HQh6yRGrlmFOJTnyTcT+zRlqPUBI2gTVWNUzUna1ERgecgF4GpNBQ38jGqxVLzQA1A31Rrhk6Yz9QEh/WND0GnuG9huhiTXJkxfAizTHLr6cbJKN6UCU6x/2DTRE1xEeEXi3O0ZUqBN4nJRzHhFB1JPlFTBZlI2kQ8zc3KJ1Le8DIRmFJiknuVS6RK4Ej/JtBfJErDSzOBiY4wJHX6Z1I4v1GUmdCPNirnLLeg3oJLcbX5PcpHNbRvOa1A956QmRPOUXVF+zkaUJynpkYR0bOMJH2nNej1pqyV/aKkz9jr5yj5vrXXz1F5SQLACiMapmierj2ikLyleKdlA/I/2oFxiglxx9B+mHwz0lf34IZQfhDRhlD6bhvgEAoPYooHkTczSIZTLC+cEExsoNKZiGBiY9cCfo/Y/SjIOBMQizWWTe73CMUasJx7jlD+DdKdWUKoY4PRYFtGpO0G1Lx4RaadgTtJhf4fiGqGIwKWCGuGIwKWqP+7IxYCzygjR9IAO5pC7Da9g70TBVpWRNgFBlgT8RV2WxHbKwJMv4BOaEaYaU2K16yZMN/qgV+G7IWIvwyZCxHeDQMsR8wg0DBDDXB5H2EV+hkEGmaoySHQsEJNFoGGFWrAq98JRhUMX1iMMMqLLEIpK5jCbd4vw9nSt/72lewXiN6jmdjfq8Hdknlk92ZwJnbIMMRM7JBhiFlUFoHd1UWaP1QKsPsHA5mkNB+Smn9r+138jGzYzgAAAABJRU5ErkJggg==';
                document.getElementById('hairdresserimage1')
                    .setAttribute(
                        'src', 'data:image/png;base64,' + img
                    );
                document.getElementById('hairdresserimage2')
                    .setAttribute(
                        'src', 'data:image/png;base64,' + img
                    );
            }
            service = response.service;
            position_charge = response.position_charge;
        }
    })
}

function step3(date) {
    $("#choosedate").fadeToggle(0);
    $("#step2title").fadeToggle(0);
    $('#chooseservice').fadeToggle(1200);
    $('#chooseservice').css("display", "inline-block");
    $("#step3title").fadeToggle(1200);
    $('#step3').addClass('active');
    document.getElementsByClassName('infoblock-date')[0].innerHTML = date;
    document.getElementsByClassName('infoblock-date')[1].innerHTML = date;
    for (var i = 0; i < service.length; i++) {
        var tmp = service[i].split(' ').join('');
        var fee = parseInt($("#" + tmp + "_fee").attr('fee'));
        if ($("#" + tmp + "_fee").attr('charge') == 'true')
            fee += parseInt(position_charge);
        document.getElementById(tmp + "_fee").innerHTML = fee + " ++";
    }
	
}
var z = 0;
var serviceid = [];
var typeid = [];
var selectedname = '',
    fee = 0,
    duration = 0,
    hour = 0,
    minute = 0,
    totalMinute = 0;
var temp = timeslots.length;
var n = [];
function selected(s_id, name, t_id) {

    if ($('#' + name).css("box-shadow") == "none") {
		
        for (var i = 0; i < typeid.length; i++) {
            if (typeid[i] === t_id) {
                Swal.fire({
                    html: '<b>Can only choose one service from each service type!</b>',
                    type: 'warning'
                });
                return;
            }
        }
        $('#' + name).css("box-shadow", "0px 0px 5px 5px #6eff72");
		n.push(name);
        serviceid.push(s_id);
        typeid.push(t_id);
        $.ajax({
            type: 'get',
            url: 'getserviceinfo.php',
            dataType: "JSON",
            data: {
                'sid': s_id,
            },
            success: function(service) {
                if (z == 0) {
                    $('#serviceblock').toggle(1000);
                    $('#estimateblock').toggle(1000);
                }
                z += 1;
                selectedname += service.name + "<br>";
                while (hour >= 1) {
                    minute += 60;
                    hour -= 1;
                }
                minute += parseInt(service.estimateduration);
                fee += parseInt(document.getElementById(name + "_fee").innerHTML);
                document.getElementsByClassName('infoblock-service')[0].innerHTML = selectedname;
                $('.duration').attr("duration", minute);
                totalMinute = minute;
				
                while (minute >= 60) {
                    minute -= 60;
                    hour += 1;
                }
                if (hour != 0 && minute != 0) {
                    document.getElementsByClassName('infoblock-duration')[0].innerHTML = hour + " Hour " + minute + " Minutes";
                    document.getElementsByClassName('infoblock-duration')[1].innerHTML = hour + " Hour " + minute + " Minutes";
                } else if (hour != 0 && minute == 0) {
                    document.getElementsByClassName('infoblock-duration')[0].innerHTML = hour + " Hour ";
                    document.getElementsByClassName('infoblock-duration')[1].innerHTML = hour + " Hour ";
                } else {
                    document.getElementsByClassName('infoblock-duration')[0].innerHTML = minute + " Minutes";
                    document.getElementsByClassName('infoblock-duration')[1].innerHTML = minute + " Minutes";
                }
                document.getElementsByClassName('infoblock-fee')[0].innerHTML = "RM " + fee + " ++";
                document.getElementsByClassName('infoblock-fee')[1].innerHTML = "RM " + fee + " ++";
            }
        });
    } else {
        $('#' + name).css("box-shadow", "none");
        for (var i = 0; i < serviceid.length; i++) {
            if (serviceid[i] === s_id) {
                serviceid.splice(i, 1);
            }
        }
        for (var i = 0; i < typeid.length; i++) {
            if (typeid[i] === t_id) {
                typeid.splice(i, 1);
            }
        }
        $.ajax({
            type: 'get',
            url: 'getserviceinfo.php',
            dataType: "JSON",
            data: {
                'sid': s_id,
            },
            success: function(service) {
                selectedname = selectedname.replace(service.name + "<br>", "");
                while (hour >= 1) {
                    minute += 60;
                    hour -= 1;
                }
                minute -= parseInt(service.estimateduration);
                fee -= parseInt(document.getElementById(name + "_fee").innerHTML);
				totalMinute = minute;
                if (minute == 0 || selectedname == '') {
                    $('#estimateblock').toggle(1000);
                    $('#serviceblock').toggle(1000);
                    z = 0;
                }
                var aa = selectedname;
                document.getElementsByClassName('infoblock-service')[0].innerHTML = selectedname;
                document.getElementsByClassName('infoblock-service')[1].innerHTML = selectedname;
                while (minute >= 60) {
                    minute -= 60;
                    hour += 1;
                }
                if (hour != 0 && minute != 0) {
                    document.getElementsByClassName('infoblock-duration')[0].innerHTML = hour + " Hour " + minute + " Minutes";
                    document.getElementsByClassName('infoblock-duration')[1].innerHTML = hour + " Hour " + minute + " Minutes";
                } else if (hour != 0 && minute == 0) {
                    document.getElementsByClassName('infoblock-duration')[0].innerHTML = hour + " Hour ";
                    document.getElementsByClassName('infoblock-duration')[1].innerHTML = hour + " Hour ";
                } else {
                    document.getElementsByClassName('infoblock-duration')[0].innerHTML = minute + " Minutes";
                    document.getElementsByClassName('infoblock-duration')[1].innerHTML = minute + " Minutes";
                }
                document.getElementsByClassName('infoblock-fee')[0].innerHTML = "RM " + fee + " ++";
                document.getElementsByClassName('infoblock-fee')[1].innerHTML = "RM " + fee + " ++";
            }
        });
    }
    link = window.location.href;
	
    history.pushState(null, '', step2url + '&serviceid=' + serviceid);
    var servid = findGetParameter("serviceid").split(",");

}


	
$('input[type="radio"]'). click(function(){
	$('#endtimeblock').fadeIn(500);
	document.getElementsByClassName('infoblock-selectedtime')[0].innerHTML = " ," + tConv24(getEstimatedendtimewithbreak(timeslotform.tsradio.value, 0));
    document.getElementsByClassName('infoblock-selectedtime')[1].innerHTML = " ," + tConv24(getEstimatedendtimewithbreak(timeslotform.tsradio.value, 0));
    document.getElementsByClassName('infoblock-endtime')[0].innerHTML = tConv24(getEstimatedendtimewithbreak(timeslotform.tsradio.value, totalMinute));
	document.getElementsByClassName('infoblock-endtime')[1].innerHTML = tConv24(getEstimatedendtimewithbreak(timeslotform.tsradio.value, totalMinute));

})

function confirmTimeslot(id) {
	if(timeslotform.tsradio.value == "")
	{
		Swal.fire ({
		html: '<b>Please select a time slot!</b>',
		type: 'error'
	});
	return;
	}
    
    $('#choosetimeslot').fadeToggle(700);
	$('#step4title').toggle();
	$('#step5title').fadeToggle(500);
    $('#infoblock').fadeToggle(500);
    $('#confirmation').fadeToggle(500);
	$('#step5').addClass('active');
    var id = getUrlParameter("hairdresserid");
    $.ajax({
        type: 'get',
        url: 'getinfo.php',
        dataType: "JSON",
        data: {
            'hairdresserid': id,
        },
        success: function(response) {

            <!--Hairdresser Calendar Json Loading-- >
            document.getElementsByClassName('infoblock-service')[1].innerHTML = selectedname;
            document.getElementById('confirmhairdressername').innerHTML = response.name;
            document.getElementById('confirmpositionname').innerHTML = response.position;
            var a = []; 
			<!--Hairdresser Image Json Loading-- >
            if (response.image) {
                document.getElementById('confirmhairdresserimage1')
                    .setAttribute(
                        'src', 'data:image/png;base64,' + response.image
                    );
                document.getElementById('confirmhairdresserimage2')
                    .setAttribute(
                        'src', 'data:image/png;base64,' + response.image
                    );
            } else {
                var img = 'iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAMFBMVEXFxcX////CwsLGxsb7+/vT09PJycn19fXq6urb29vOzs7w8PDe3t7n5+f5+fnt7e2uCwolAAAFHUlEQVR4nO2dC5qqMAyFMTwUFNz/bq+VYYrKKJCkOfXmXwHna5uTpA+KwnEcx3Ecx3Ecx3Ecx3Ecx3Ecx3Ecx3Ecx3EcA2iO9cdIc5PUdO2l78+BU39p66b4HplE3eU6VIcnqmNfl1+gksr6+iIucr50WYukor7+re6Hoe1y1UhNO3zUd+fUFRmKpOa0Tt6dY5ubRCouG/QFzk1WGmnt/JxzykcjdZ/jyxJDLlOV2l36AtcsJJb9boG3YcR3DuqODIE3LtYKPkDdmwRmpUToUaSaq++AvRgZMWbOubQW8hdCAm8ZDugoikzREdCJ2okJPBx6azFLNOwoOgcxojJ98JkaTSJxMpklKrCAKhZGI0drTY/wU5lXoJYibannV9NYy4oozNEAkPHTjop+DTDxVGkIgYJNoyQQJtiIW+EMjGAjm649AjGIaqswcEZQKJ2QPlJbqytki6ZXAAZRJ52J2McaUowzAfs+uFzrYhnzaapphiPWdaJWShqxjqa6kTTQ205TVbsfMa6htL0iYOsXpJrQjHSmCkv1QGPtiHqlYcQ21Gj7fcDU8xOEUuNgSltPzexh+HqFlanCBHZ4OLhCV+gK/3OF6vWvucLv98MUOY2pwu/PS/+D2qJU7pYGbOvDFDW+bbON9p3o3oRxn0bfLgZTgSn6pSfrtr56qLHemtHPTK2319SzGvtjQ9qeb39Wgc66Cm073nd0U1PzDdJCO3Gzn6TKpl9Zq7ujGWsQhlA3NwWIMwG9zM08Y/tBrR9VWeczv5CSQuuUNKIUTk23ZJ5RKfVhjnkXotfWIlgX2BSCDYbZR+QTcLhb3dKZDUY2M0d4KWItwhHRah/zsrOgKw4wycwjcgEVcgQDQo23CqSiWEJkFAfod2oE1uIZdA1OsCPqFXYNTjCfb8Ez+iX2x5sKLlVbhtqdDcar9ZevhnbZxoBUD35k23t0d304LYs1ELVbnfFaZ/REJJX9niP8Q19moZGo3m8XR/yBvOnjFftncI2c8ZuNo7WMP5HQh6yRGrlmFOJTnyTcT+zRlqPUBI2gTVWNUzUna1ERgecgF4GpNBQ38jGqxVLzQA1A31Rrhk6Yz9QEh/WND0GnuG9huhiTXJkxfAizTHLr6cbJKN6UCU6x/2DTRE1xEeEXi3O0ZUqBN4nJRzHhFB1JPlFTBZlI2kQ8zc3KJ1Le8DIRmFJiknuVS6RK4Ej/JtBfJErDSzOBiY4wJHX6Z1I4v1GUmdCPNirnLLeg3oJLcbX5PcpHNbRvOa1A956QmRPOUXVF+zkaUJynpkYR0bOMJH2nNej1pqyV/aKkz9jr5yj5vrXXz1F5SQLACiMapmierj2ikLyleKdlA/I/2oFxiglxx9B+mHwz0lf34IZQfhDRhlD6bhvgEAoPYooHkTczSIZTLC+cEExsoNKZiGBiY9cCfo/Y/SjIOBMQizWWTe73CMUasJx7jlD+DdKdWUKoY4PRYFtGpO0G1Lx4RaadgTtJhf4fiGqGIwKWCGuGIwKWqP+7IxYCzygjR9IAO5pC7Da9g70TBVpWRNgFBlgT8RV2WxHbKwJMv4BOaEaYaU2K16yZMN/qgV+G7IWIvwyZCxHeDQMsR8wg0DBDDXB5H2EV+hkEGmaoySHQsEJNFoGGFWrAq98JRhUMX1iMMMqLLEIpK5jCbd4vw9nSt/72lewXiN6jmdjfq8Hdknlk92ZwJnbIMMRM7JBhiFlUFoHd1UWaP1QKsPsHA5mkNB+Smn9r+138jGzYzgAAAABJRU5ErkJggg==';
                document.getElementById('hairdresserimage1')
                    .setAttribute(
                        'src', 'data:image/png;base64,' + img
                    );
                document.getElementById('hairdresserimage2')
                    .setAttribute(
                        'src', 'data:image/png;base64,' + img
                    );
            }
            service = response.service;
            position_charge = response.position_charge;
        }
    })
} 
</script>
<?php if(!isset($_SESSION['loggedin']) && empty($_SESSION['loggedin']))
{
	echo"
	<script>
	 Swal.fire ({
		html: '<b>Please login!</b>',
		type: 'error'
	})
	</script>";

	header("Refresh:1.5 ; URL=//localhost/Prototype/Login/login.php");
}
?>
<?php
	if(isset($_GET['submit']))
	{
		$id = $_SESSION['user']['cust_id'];
		$hairdresserid = $_GET['hairdresserid'];
		$date_appointment_made = date('Y-m-d');
		$date = date($_GET['date']);
		$serviceid = $_GET['serviceid'];
		$serviceid = explode(",",$serviceid);
		$status = "Pending";
		$fee = $_GET['fee'];
		$duration = $_GET['duration'];
		$starttime = $_GET['ts'];
		$endtime = $_GET['endtime'];
		$endh = (int)substr($endtime,0,2);
		$endm = (int)substr($endtime,2);
		if($endm==45)
		{
			$endm = "00";
			$endh+=1;
		}
		if($endm==15)
		{
			$endm = "30";
		}
		if($endm==0)
			$endm = "00";
		$endtime = $endh.$endm;
		date_default_timezone_set("Asia/Kuala_Lumpur");
		$updatedate = date('Y-m-d H:i:sa ');
		$insert = mysqli_query($conn,"INSERT INTO appointment (cust_id,hairdresser_id,date_appointment_made,date_appointment,status,total_estimate_fee,total_estimate_duration,start_time,end_time,update_date) VALUES ('$id','$hairdresserid','$date_appointment_made','$date','$status','$fee','$duration','$starttime','$endtime','$updatedate')");
		$newid = mysqli_query($conn,"SELECT * FROM appointment");
		$lastid = '';
		if($newid)
			while($row = mysqli_fetch_assoc($newid))
			{
				$lastid = $row['appointment_id'];
			}
		for($i=0;$i<sizeof($serviceid);$i++)
		{
			$id = $serviceid[$i];
			$insert = mysqli_query($conn,"INSERT INTO appointment_service (appointment_id,service_id) VALUES ('$lastid','$id')");
		}
		include('updatetimeslot.php');
		
		header("Location://localhost/Prototype/Login/successappointment.php?success=true");
	}
?>
      <script src="js/jquery-ui.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/aos.js"></script>
      <script src="js/main.js"></script>
	  <script src="js/chooseservice.js"></script>
</body>
</html>