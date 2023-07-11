<!DOCTYPE html>
<html>
<?php include("dataconnection.php"); ?>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>AerySalon - Customer List</title>
        <script src="http://code.jquery.com/jquery-1.11.1.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
		<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/font-awesome.min.css" rel="stylesheet">
		<link href="css/styles.css" rel="stylesheet">
		<link href="css/awesome-bootstrap-checkbox.css" rel="stylesheet">
		<!--Custom Font-->
		<link href="css/main.css" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
	    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css" rel="stylesheet">
		<script src="js/editprofile-validation.js"></script>
		<!-- Date Pickk-->
		<link rel="stylesheet" href="datepickk/datepickk.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/8.7/styles/zenburn.min.css">
		<link href="https://fonts.googleapis.com/css?family=Raleway:400,600" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/8.7/highlight.min.js"></script>
		<style>
		#Datepickk .d-title {
			margin-top:80px;
		}
		.d-week  p{
			color:white
		}
		</style>
      
	  <!--[if lt IE 9]>
      <script src="js/respond.min.js"></script>
      <![endif]-->
		<script>
		
		$(document).ready(function(){
			$('#confirmremove').on('click',function(){
				Swal.fire({
				  title: 'Are you sure?',
				  text: "You won't be able to revert this!",
				  type: 'warning',
				  showCancelButton: true,
				  confirmButtonColor: '#3085d6',
				  cancelButtonColor: '#d33',
				  confirmButtonText: 'Yes, Remove it!'
				}).then((result) => {
				  if (result.value) {
					window.location = window.location.href+"?removeid="+$(this).attr('value');
				  }
				})
		})
		});
		function submit() {
    document.getElementById("uploadimage").submit();
};
		</script>
		<style>
		.validation-hint{
         background-image: url("validation.png");
         background-repeat:no-repeat;
         background-size: 23px 19px;
         font-size: 10px;
		line-height:2;
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
		</style>
	</head>

	<body>
		<script src="datepickk/datepickk.min.js"></script>
		<script>hljs.initHighlightingOnLoad();</script>
		<script>var datepicker = new Datepickk();</script>
		<script>var datepicker1 = new Datepickk();</script>
		<?php include("is_login-hairdresser.php"); ?>
		<?php include("topsidebar-hairdresser.php");?>
		<?php include("loadhairdresserinfo.php");?>
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main ">
      <div class="row">
        <ol class="breadcrumb">
          <li>
            <a href="#">
              <em class="fa fa-home">
              </em>
            </a>
          </li>
          <li class="active">Profile
          </li>
        </ol>
      </div>
      <!--/.row-->
      <div class="row p-b-100 pt-5" style="background-image: linear-gradient(to bottom, #ffffff, #f9fbff, #f1f7ff, #e5f5ff, #d8f3ff);">
        <div class="col-lg-3 order-lg-1 text-center">
          <h5>Profile Image
          </h5>
          <hr>
          <form name="uploadimage" method="POST" enctype="multipart/form-data" id="uploadimage">
            <?php
			$id = $_SESSION['hairdresser_id'];
				$userimage = mysqli_query($conn,"SELECT hairdresser_profpic FROM hairdresser WHERE hairdresser_id='".$id."'");
				while($row = mysqli_fetch_assoc($userimage))
				{
					$defimg ="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAMFBMVEXFxcX////CwsLGxsb7+/vT09PJycn19fXq6urb29vOzs7w8PDe3t7n5+f5+fnt7e2uCwolAAAFHUlEQVR4nO2dC5qqMAyFMTwUFNz/bq+VYYrKKJCkOfXmXwHna5uTpA+KwnEcx3Ecx3Ecx3Ecx3Ecx3Ecx3Ecx3Ecx3EcA2iO9cdIc5PUdO2l78+BU39p66b4HplE3eU6VIcnqmNfl1+gksr6+iIucr50WYukor7+re6Hoe1y1UhNO3zUd+fUFRmKpOa0Tt6dY5ubRCouG/QFzk1WGmnt/JxzykcjdZ/jyxJDLlOV2l36AtcsJJb9boG3YcR3DuqODIE3LtYKPkDdmwRmpUToUaSaq++AvRgZMWbOubQW8hdCAm8ZDugoikzREdCJ2okJPBx6azFLNOwoOgcxojJ98JkaTSJxMpklKrCAKhZGI0drTY/wU5lXoJYibannV9NYy4oozNEAkPHTjop+DTDxVGkIgYJNoyQQJtiIW+EMjGAjm649AjGIaqswcEZQKJ2QPlJbqytki6ZXAAZRJ52J2McaUowzAfs+uFzrYhnzaapphiPWdaJWShqxjqa6kTTQ205TVbsfMa6htL0iYOsXpJrQjHSmCkv1QGPtiHqlYcQ21Gj7fcDU8xOEUuNgSltPzexh+HqFlanCBHZ4OLhCV+gK/3OF6vWvucLv98MUOY2pwu/PS/+D2qJU7pYGbOvDFDW+bbON9p3o3oRxn0bfLgZTgSn6pSfrtr56qLHemtHPTK2319SzGvtjQ9qeb39Wgc66Cm073nd0U1PzDdJCO3Gzn6TKpl9Zq7ujGWsQhlA3NwWIMwG9zM08Y/tBrR9VWeczv5CSQuuUNKIUTk23ZJ5RKfVhjnkXotfWIlgX2BSCDYbZR+QTcLhb3dKZDUY2M0d4KWItwhHRah/zsrOgKw4wycwjcgEVcgQDQo23CqSiWEJkFAfod2oE1uIZdA1OsCPqFXYNTjCfb8Ez+iX2x5sKLlVbhtqdDcar9ZevhnbZxoBUD35k23t0d304LYs1ELVbnfFaZ/REJJX9niP8Q19moZGo3m8XR/yBvOnjFftncI2c8ZuNo7WMP5HQh6yRGrlmFOJTnyTcT+zRlqPUBI2gTVWNUzUna1ERgecgF4GpNBQ38jGqxVLzQA1A31Rrhk6Yz9QEh/WND0GnuG9huhiTXJkxfAizTHLr6cbJKN6UCU6x/2DTRE1xEeEXi3O0ZUqBN4nJRzHhFB1JPlFTBZlI2kQ8zc3KJ1Le8DIRmFJiknuVS6RK4Ej/JtBfJErDSzOBiY4wJHX6Z1I4v1GUmdCPNirnLLeg3oJLcbX5PcpHNbRvOa1A956QmRPOUXVF+zkaUJynpkYR0bOMJH2nNej1pqyV/aKkz9jr5yj5vrXXz1F5SQLACiMapmierj2ikLyleKdlA/I/2oFxiglxx9B+mHwz0lf34IZQfhDRhlD6bhvgEAoPYooHkTczSIZTLC+cEExsoNKZiGBiY9cCfo/Y/SjIOBMQizWWTe73CMUasJx7jlD+DdKdWUKoY4PRYFtGpO0G1Lx4RaadgTtJhf4fiGqGIwKWCGuGIwKWqP+7IxYCzygjR9IAO5pC7Da9g70TBVpWRNgFBlgT8RV2WxHbKwJMv4BOaEaYaU2K16yZMN/qgV+G7IWIvwyZCxHeDQMsR8wg0DBDDXB5H2EV+hkEGmaoySHQsEJNFoGGFWrAq98JRhUMX1iMMMqLLEIpK5jCbd4vw9nSt/72lewXiN6jmdjfq8Hdknlk92ZwJnbIMMRM7JBhiFlUFoHd1UWaP1QKsPsHA5mkNB+Smn9r+138jGzYzgAAAABJRU5ErkJggg==";
					if( ($row['hairdresser_profpic']) || $row['hairdresser_profpic']!=null)
						echo '<img src="data:image/jpeg;base64,'.base64_encode($row['hairdresser_profpic']).'" class="mx-auto img-thumbnail  d-block">';
					else
						echo '<img src='.$defimg.'  class="mx-auto img-thumbnail  d-block" alt="avatar">';
				}
			?>
			<h6 class="mt-2">Upload a different photo</h6>
            <label class="custom-file">
                <input type="file" id="image1" name="image" class="custom-file-input" style="display:none" onchange="submit()" accept="image/*" />
                <span class="btn btn-md btn-primary" id="choose" style="line-height:25px">CHOOSE IMAGE</span>
            </label>
            <hr>
          </form>
        </div>
        <div class="col-lg-9 order-lg-2" >
		
          <ul class="nav nav-tabs">
            <li class="nav-item active" id="profilenav">
              <a href="" data-target="#profile" data-toggle="tab" class="nav-link active" >Profile
              </a>
            </li>
            <li class="nav-item" id="editprofilenav" >
              <a href="" data-target="#edit" data-toggle="tab" class="nav-link" >Edit Profile
              </a>
            </li>
			<li class="nav-item" id="changepasswordnav" >
              <a href="" data-target="#changepassword" data-toggle="tab" class="nav-link" >Change Password
              </a>
            </li>
			<!--onConfirmDemo()-->
			<li class="nav-item">
				<a class="dropdown-toggle" data-toggle="dropdown" style="cursor:pointer">Off Day
				<span class="caret"></span></a>
				<ul class="dropdown-menu">
				  <li><a style="cursor:pointer" onclick="Addoffday()">Add Off Day</a></li>
				  <li><a style="cursor:pointer" onclick="Removeoffday()">Remove Off Day</a></li>
				</ul>
			  </li>
          </ul>
		  <script>
		  var a=[];
		  function Addoffday(){
			 // alert(new Date('2014-04-03'))
			 //new Date.getMonth();
						datepicker.unselectAll();
						datepicker.button = 'Submit';
						datepicker.onConfirm =  function redirect(){
							var date = [];
							var StringDate = [];
							var weekday = new Array(7);
							weekday[0] =  "Sunday";
							weekday[1] = "Monday";
							weekday[2] = "Tuesday";
							weekday[3] = "Wednesday";
							weekday[4] = "Thursday";
							weekday[5] = "Friday";
							weekday[6] = "Saturday";
							for(var i=0;i<datepicker.selectedDates.length;i++)
							{
								month = parseInt(datepicker.selectedDates[i].getMonth());
								month += 1;
								date[i] = datepicker.selectedDates[i].getFullYear() + "-" + datepicker.selectedDates[i].getMonth() + "-" + datepicker.selectedDates[i].getDate();
								StringDate[i] = "<br>" + weekday[datepicker.selectedDates[i].getDay()] + ' ' + datepicker.selectedDates[i].getFullYear() + "-" + month + "-" + datepicker.selectedDates[i].getDate();;
							}
							Swal.fire({
							  title: 'Are you sure?',
							  html: "<b style='font-weight:500'>Would you like to add offday?<hr>Offday Add:<br>" + StringDate,
							  type: 'warning',
							  showCancelButton: true,
							  confirmButtonColor: '#3085d6',
							  cancelButtonColor: '#d33',
							  confirmButtonText: 'Confirm!'
							}).then((result) => {
							  if (result.value) {
								window.location = window.location.href+"?offdaydate="+date;
							  }
							})
						}
						datepicker.onClose = function(){
							datepicker.button = null;
							datepicker.onClose = null;
						};
						datepicker.title = "Add Off Day";
						
						//to disable salon close day date 
						<?php 
							$result = mysqli_query($conn,"SELECT * FROM salon_closeday");
							if($result)
							{
								echo"datepicker.disabledDates = [" ;
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
								echo"datepicker.highlight = highlight;";

							}
						?>
						//datepicker.disabledDates = [new Date(),new Date(2015,6,20),;
						//to disable offday date 
						<?php 
							$hairdresser_id = $_SESSION['hairdresser_id'];;
							$result = mysqli_query($conn,"SELECT * FROM offday WHERE hairdresser_id = '$hairdresser_id'");
							if($result)
							{
								echo"datepicker.disabledDates = [" ;
								while($row = mysqli_fetch_assoc($result))
								{
									$date = date($row['offday_date']);
									$date = str_replace("-",",",$date);
									echo "new Date(".$date."),";
								}
								echo "];";

							}
						?>
						
						//to highlight offday date 
						
						//to tooltips the date that have appointment 
						<?php 
							$hid = $_SESSION['hairdresser_id'];
							$result = mysqli_query($conn,"SELECT DISTINCT date_appointment FROM appointment WHERE status ='Pending' AND hairdresser_id = '$hid'");
							if($result)
							while($row = mysqli_fetch_assoc($result))
							{
								$i=0;
								$date = strtotime($row['date_appointment']);
								$date = date("Y-m-d", strtotime("-1 month", $date));
								echo'var tooltip'.$i.' = { 
								date: new Date('.str_replace("-",",",$date).'),
								text: \'';
								$c = $row['date_appointment'];
								$r = mysqli_query($conn,"SELECT COUNT(*) AS total FROM appointment WHERE date_appointment = '$c' AND status !='Cancelled'");
								while($data=mysqli_fetch_assoc($r))
								{
									echo $data['total'].' Appointment Pending';
								}
								echo'\'
								};
								
								a.push("'.date('n/j/Y', strtotime($date. ' +1 month')).'");
								datepicker.tooltips = [tooltip'.$i.'];
								';
								$i++;
							}
						?>
						<?php
						$result = mysqli_query($conn,"SELECT DISTINCT date_appointment FROM appointment WHERE status ='Pending'");
							if($result)
							{
								echo "var highlight = {";
								echo "dates :[";
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
								echo "legend: 'Appointment Pending'};";
								echo"datepicker.highlight = highlight;";

							}
						?>
						//to disable confirm appointment date 
						<?php 
							$hairdresser_id = $_SESSION['hairdresser_id'];;
							$result = mysqli_query($conn,"SELECT DISTINCT date_appointment FROM appointment WHERE status ='Confirmed' AND hairdresser_id = '$hid'");
							if($result)
							{
								echo"datepicker.disabledDates = [" ;
								while($row = mysqli_fetch_assoc($result))
								{
									$date = strtotime($row['date_appointment']);
									$date = date("Y-m-d", strtotime("-1 month", $date));
									$date = str_replace("-",",",$date);
									echo "new Date(".$date."),";
								}
								echo "];";

							}
						?>
						
						//to tooltips confirm appointment date 
						<?php 
							$hid = $_SESSION['hairdresser_id'];
							$result = mysqli_query($conn,"SELECT DISTINCT date_appointment FROM appointment WHERE status ='Confirmed' AND hairdresser_id = '$hid'");
							if($result)
							while($row = mysqli_fetch_assoc($result))
							{
								$i=0;
								$date = strtotime($row['date_appointment']);
								$date = date("Y-m-d", strtotime("-1 month", $date));
								echo'var tooltip'.$i.' = { 
								date: new Date('.str_replace("-",",",$date).'),
								text: \'';
								$c = $row['date_appointment'];
								$r = mysqli_query($conn,"SELECT COUNT(*) AS total FROM appointment WHERE date_appointment = '$c' AND status !='Cancelled'");
								while($data=mysqli_fetch_assoc($r))
								{
									echo $data['total'].' Appointment Confirmed';
								}
								echo'\'
								};
								
								a.push("'.date('n/j/Y', strtotime($date. ' +1 month')).'");
								datepicker.tooltips = [tooltip'.$i.'];
								';
								$i++;
							}
						?>
						//highlight confirmed appointment date
						<?php 
							$hairdresser_id = $_SESSION['hairdresser_id'];;
							$result = mysqli_query($conn,"SELECT DISTINCT date_appointment FROM appointment WHERE status ='Confirmed' AND hairdresser_id = '$hid'");
							if($result)
							{
								
								echo "var highlight = {";
								echo "dates :[";
								$num = 1;
								while($row = mysqli_fetch_assoc($result))
								{
									$date = strtotime($row['date_appointment']);
								$date = date("Y-m-d", strtotime("-1 month", $date));
									$date = str_replace("-",",",$date);
									echo "{start: new Date(".$date."),";
									echo "end: new Date(".$date.")}";
									if($num != $numrow)
										echo ",";
									$num++;
								}
								echo "],";
								echo "backgroundColor: '#ffe380',";
								echo "color: '#000000',";
								echo "legend: 'Appointment Confirmed'};";
								echo"datepicker.highlight = highlight;";

							}
						?>
						<?php 
							$hairdresser_id = $_SESSION['hairdresser_id'];;
							$result = mysqli_query($conn,"SELECT * FROM offday WHERE hairdresser_id = '$hairdresser_id'");
							if($result)
							{
								
								echo "var highlight = {";
								echo "dates :[";
								$result = mysqli_query($conn,"SELECT * FROM offday WHERE hairdresser_id = '$hairdresser_id'");
								$numrow = mysqli_num_rows($result);
								$num = 1;
								while($row = mysqli_fetch_assoc($result))
								{
									$date = date($row['offday_date']);
									$date = str_replace("-",",",$date);
									echo "{start: new Date(".$date."),";
									echo "end: new Date(".$date.")}";
									if($num != $numrow)
										echo ",";
									$num++;
								}
								echo "],";
								echo "backgroundColor: '#ff70b3',";
								echo "color: '#ffffff',";
								echo "legend: 'Selected Off Day'};";
								echo"datepicker.highlight = highlight;";

							}
						?>
						
						datepicker.minDate = new Date();
						datepicker.show();
						
					}
			function Removeoffday(){
			 // alert(new Date('2014-04-03'))
			 //new Date.getMonth();
						datepicker1.unselectAll();
						datepicker1.onConfirm =  function redirect(){
							var date = [];
							var StringDate = [];
							var weekday = new Array(7);
							weekday[0] =  "Sunday";
							weekday[1] = "Monday";
							weekday[2] = "Tuesday";
							weekday[3] = "Wednesday";
							weekday[4] = "Thursday";
							weekday[5] = "Friday";
							weekday[6] = "Saturday";
							for(var i=0;i<datepicker1.selectedDates.length;i++)
							{
								month = parseInt(datepicker1.selectedDates[i].getMonth());
								month += 1;
								date[i] = datepicker1.selectedDates[i].getFullYear() + "-" + datepicker1.selectedDates[i].getMonth() + "-" + datepicker1.selectedDates[i].getDate();
								StringDate[i] = "<br>" + weekday[datepicker1.selectedDates[i].getDay()] + ' ' + datepicker1.selectedDates[i].getFullYear() + "-" + month + "-" + datepicker1.selectedDates[i].getDate();;
							}
							Swal.fire({
							  title: 'Are you sure?',
							  html: "<b style='font-weight:500'>You won't be able to change your offday afterwards!<hr>Offday Add:<br>" + StringDate,
							  type: 'warning',
							  showCancelButton: true,
							  confirmButtonColor: '#3085d6',
							  cancelButtonColor: '#d33',
							  confirmButtonText: 'Confirm!'
							}).then((result) => {
							  if (result.value) {
								window.location = window.location.href+"?offdaydate="+date;
							  }
							})
						}
						datepicker1.onClose = function(){
							datepicker1.button = null;
							datepicker1.onClose = null;
						};
						datepicker1.title = "Remove Off Day";
						datepicker1.disabledDates = false;
						datepicker1.highlight = false;
						datepicker1.onSelect = function(checked){
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
							  html: "<b style='font-weight:500'>Would you like to remove off day?<hr>Selected Date:<br>" + StringDate,
							  type: 'warning',
							  showCancelButton: true,
							  confirmButtonColor: '#3085d6',
							  cancelButtonColor: '#d33',
							  confirmButtonText: 'Confirm!'
							}).then((result) => {
							  if (result.value) {
	
								window.location.href = '//localhost/Prototype/admin/hairdresserindex.php?removeoffday='+date;
								
							  }
							})
						};
						
						
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
								echo"datepicker1.highlight = highlight;";

							}
						?>
						//datepicker1.disabledDates = [new Date(),new Date(2015,6,20),;
						
						
						//to highlight offday date 
						<?php 
							$hairdresser_id = $_SESSION['hairdresser_id'];;
							$result = mysqli_query($conn,"SELECT * FROM offday WHERE hairdresser_id = '$hairdresser_id'");
							if($result)
							{
								
								echo "var highlight = {";
								echo "dates :[";
								$result = mysqli_query($conn,"SELECT * FROM offday WHERE hairdresser_id = '$hairdresser_id'");
								$numrow = mysqli_num_rows($result);
								$num = 1;
								while($row = mysqli_fetch_assoc($result))
								{
									$date = date($row['offday_date']);
									$date = str_replace("-",",",$date);
									echo "{start: new Date(".$date."),";
									echo "end: new Date(".$date.")}";
									if($num != $numrow)
										echo ",";
									$num++;
								}
								echo "],";
								echo "backgroundColor: '#ff70b3',";
								echo "color: '#ffffff',";
								echo "legend: 'Selected Off Day'};";
								echo"datepicker1.highlight = highlight;";

							}
						?>
						
						datepicker1.minDate = new Date();
						datepicker1.show();
						
					}
		  </script>
          <div class="tab-content pt-5">
            <div class="tab-pane active" id="profile">
              <h5 class="mb-3">User Profile
              </h5>
              <hr>
              <div class="row">
                <div class="col-md-6">
                  <h6>Full Name
                  </h6>
                  <p>
                    <?php echo$hairdresser_firstname.' '.$hairdresser_lastname; ?>
                  </p>
                  <h6>Email
                  </h6>
                  <p>
                    <?php echo $hairdresser_email; ?>
                  </p>
                  <h6>Contact Number
                  </h6>
                  <p>
                    <?php echo $hairdresser_contact; ?>
                  </p>
				  <h6>Register Date
                  </h6>
                  <p>
                    <?php echo $hairdresser_registerdate; ?>
                  </p>
                </div>
                <div class="col-md-6">
                  <h6>Position
                  </h6>
                  <p>
                    <?php echo $hairdresser_position; ?>
                  </p>
				  <h6>Address
                  </h6>
                  <p>
                    <?php echo $hairdresser_address.', '.$hairdresser_state; ?>
                  </p>
				  <h6>Postcode
                  </h6>
                  <p>
                    <?php echo $hairdresser_postcode; ?>
                  </p>
                </div>
				<div class="col-md-12 m-t-50">
						<hr>
                            <h5 class="mt-2"><span class="fa fa-clock-o ion-clock float-right"></span> Recent Activity</h5>
                            <table class="table table-sm table-hover table-striped">
                                <tbody>   
									<?php 
									$id = $_SESSION['hairdresser_id'];
									  $result = mysqli_query($conn,"SELECT appointment.*, hairdresser.* FROM appointment INNER JOIN hairdresser ON appointment.hairdresser_id = hairdresser.hairdresser_id WHERE hairdresser.hairdresser_id = '$id' ORDER BY appointment.update_date DESC");
									// $result = mysqli_query($conn,"SELECT * FROM appointment WHERE cust_id = '$id'");
									$i=0;
									while($row = mysqli_fetch_assoc($result))
									{
										$custinfo = mysqli_query($conn,"SELECT * FROM customer WHERE cust_id='".$row['cust_id']."'");
										while($r = mysqli_fetch_assoc($custinfo))
										{
											$custname = $r['cust_firstname'].' '.$r['cust_lastname'];
										}
										if($i<5)
										{
											if($row['status'] =='Pending')
												{
												echo'<tr>';
												echo'<td><strong>You </strong> have an appointment on '.$row['date_appointment']." with <strong>".$custname."</strong> to be confirm! <span style='float:right;font-style: italic;'>".date('Y-m-d h:i A', strtotime($row['update_date'])).'</span>';
												echo'</tr>';
											}
											else if ($row['status'] =='Confirmed')
												{
												echo'<tr>';
												echo'<td><strong>You </strong> just confirmed '.$custname."'s appointment on ".date('Y-m-d', strtotime($row['date_appointment']))."<span style='float:right;font-style: italic;'>".date('Y-m-d h:i A', strtotime($row['update_date'])).'</span>!';
												echo'</tr>';
											}
											else if ($row['status'] =='Cancelled' && $row['cancelled_by_self']=='1')
											{
												echo'<tr>';
												echo'<td><strong>'.$custname.' </strong> just cancelled '."appointment that made on ".date('Y-m-d', strtotime($row['date_appointment_made']))."<span style='float:right;font-style: italic;'>".date('Y-m-d h:i A', strtotime($row['update_date'])).'</span>!';
												echo'</tr>';
											}
											else{
												echo'<tr>';
												echo'<td><strong>You </strong> have just '.strtolower($row['status'])." your appointment that on ".$row['date_appointment']."<span style='float:right;font-style: italic;'>".date('Y-m-d h:i A', strtotime($row['update_date'])).'</span>';
												echo'</tr>';
											}
											$i+=1;
										}
									}
									?>
                                    
                                </tbody>
                            </table>
                        </div>

              </div>
              <!--/row-->
            </div>
            <div class="tab-pane" id="history">
              <div class="alert alert-info alert-dismissable">
                <a class="panel-close close" data-dismiss="alert">×
                </a> This is an 
                <strong>.alert
                </strong>. Use this to show important messages to the user.
              </div>
              <table class="table table-hover table-striped">
                <tbody>                                    
                  <tr>
                    <td>
                      <span class="float-right font-weight-bold">3 hrs ago
                      </span> Here is your a link to the latest summary report from the..
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <span class="float-right font-weight-bold">Yesterday
                      </span> There has been a request on your account since that was..
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <span class="float-right font-weight-bold">9/10
                      </span> Porttitor vitae ultrices quis, dapibus id dolor. Morbi venenatis lacinia rhoncus. 
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <span class="float-right font-weight-bold">9/4
                      </span> Vestibulum tincidunt ullamcorper eros eget luctus. 
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <span class="float-right font-weight-bold">9/4
                      </span> Maxamillion ais the fix for tibulum tincidunt ullamcorper eros. 
                    </td>
                  </tr>
                </tbody> 
              </table>
            </div>
            <div class="tab-pane" id="edit">
              <form role="form" name="editprofileform" method="post">
                <div class="form-group row">
                  <label class="col-lg-3 control-label">First Name
                  </label>
                  <div class="col-lg-3">
                    <input class="form-control" type="text" id="fname" name="fname" onkeyup="capitalize(this)" value="<?php if(isset($_POST['fname'])) echo$_POST['fname']; else echo $hairdresser_firstname;?>" onchange="validateFirstName();">
                    <div id="firstname-validation" class="validation-hint">
                    </div>
                  </div>
				  <label class="col-lg-2 control-label">Last Name
                  </label>
                  <div class="col-lg-4">
                    <input class="form-control" type="text" id="lname" name="lname" onkeyup="capitalize(this)" value="<?php if(isset($_POST['lname'])) echo$_POST['lname']; else echo $hairdresser_lastname;?>" onchange="validateLastName();">
                    <div id="name-validation" class="validation-hint">
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-lg-3 control-label">Email
                  </label>
                  <div class="col-lg-9">
                    <input class="form-control" type="text" name="email" value="<?php echo $hairdresser_email;?>" readonly>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-lg-3 control-label">Contact Number
                  </label>
                  <div class="col-lg-9">
                    <input class="form-control validatecontact" type="text" id="contact" name="contact" value="<?php if(isset($_POST['contact'])) echo$_POST['contact']; else echo $hairdresser_contact;?>" onchange="validateContact()" >
                    <div id="contact-validation" class="validation-hint">
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-lg-3 control-label">Address
                  </label>
                  <div class="col-lg-9">
                    <input class="form-control" type="text" id="address" name="address" value="<?php if(isset($_POST['address'])) echo$_POST['address']; else echo $hairdresser_address;?>" onchange="validateAddress();">
                    <div id="address-validation" class="validation-hint">
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-lg-3 control-label">State
                  </label>
                  <div class="col-lg-3">
                    <select id="user_time_zone" name="state" id="state" class="form-control" size="1">
                      <option disabled="disabled"  value="empty">State
                      </option>
                      <option  value="johor" <?php if ($hairdresser_state == 'johor') echo 'selected';?>>JOHOR
                      </option>
                      <option  value="malacca" <?php if ($hairdresser_state == 'malacca') echo 'selected';?>>MALACCA
                      </option>
                      <option  value="kedah" <?php if ($hairdresser_state == 'kedah') echo 'selected';?>>KEDAH
                      </option>
                      <option  value="kelantan" <?php if ($hairdresser_state == 'kelantan') echo 'selected';?>>KELANTAN
                      </option>
                      <option value="pahang" <?php if ($hairdresser_state == 'pahang') echo 'selected';?>>PAHANG
                      </option>
                      <option  value="negeri sembilan" <?php if ($hairdresser_state == 'negeri sembilan') echo 'selected';?>>NEGERI SEMBILAN
                      </option>
                      <option value="perak" <?php if ($hairdresser_state == 'perak') echo 'selected';?>>PERAK
                      </option>
                      <option  value="perlis" <?php if ($hairdresser_state == 'perlis') echo 'selected';?>>PERLIS
                      </option>
                      <option  value="penang" <?php if ($hairdresser_state == 'penang') echo 'selected';?>>PENANG
                      </option>
                      <option  value="selangor" <?php if ($hairdresser_state == 'selangor') echo 'selected';?>>SELANGOR
                      </option>
                    </select>
                  </div>
                  <label class="col-lg-3 control-label">Postcode
                  </label>
                  <div class="col-lg-3">
                    <input class="form-control" type="text" id="postcode" name="postcode" value="<?php if(isset($_POST['postcode'])) echo$_POST['postcode']; else echo $hairdresser_postcode;?>" onchange="validatePostcode();">
                    <div id="postcode-validation" class="validation-hint">
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-lg-3 control-label">
                  </label>
                  <div class="col-lg-9">
                    <input type="reset" class="btn" value="Cancel">
                    <input type="submit" name="editprofile" class="btn btn-primary" value="Save Changes">
                  </div>
                </div>
              </form>
            </div>
			<div class="tab-pane" id="changepassword">
                    <form role="form" name="changepasswordform" method="post">
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label pt-3">Old Password</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="password" name="oldpw" id="oldpw" onkeyup="validateOldpw('<?php echo $hairdresser_email;?>');">
								<div id="oldpw-validation" class="validation-hint"></div>
								<img src="tick.png" class="tick" id="oldpwtick" width="25px" height="20px">
                            </div>
                        </div>
						<div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label pt-3">New password</label>
                            <div class="col-lg-9">
                                <input class="form-control validate" type="password" name="password1" id="password1" onchange="validateNewpw();">
								<div id="newpw-validation" class="validation-hint"></div>
								<img src="tick.png" class="tick" id="newpwtick" width="25px" height="20px">
                            </div>
                        </div>
						<div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label pt-3">Confirm new password</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="password" name="password2" id="password2" onchange="validateNewpw2();">
								<div id="newpw2-validation" class="validation-hint"></div>
								<img src="tick.png" class="tick" id="newpw2tick" width="25px" height="20px">
                            </div>
                        </div>
						
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label"></label>
                            <div class="col-lg-9">
                                <input type="reset" class="btn "  value="Cancel">
                                <input type="submit" class="btn btn-primary" name="changepassword" value="Save Changes">
                            </div>
                        </div>
                    </form>
                </div>
          </div>
        </div>
      </div>
    </div>
    <!--/.main-->
    <script src="js/jquery-1.11.1.min.js">
    </script>
    <script src="js/bootstrap.min.js">
    </script>
    <script src="js/chart.min.js">
    </script>
    <script src="js/chart-data.js">
    </script>
    <script src="js/easypiechart.js">
    </script>
    <script src="js/easypiechart-data.js">
    </script>
    <script src="js/bootstrap-datepicker.js">
    </script>
    <script src="js/custom.js">
    </script>
  </body>
    <script src="js/chart.min.js"></script>
    <script src="js/chart-data.js"></script>
    <script src="js/easypiechart.js"></script>
    <script src="js/easypiechart-data.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/custom.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script>

	</script>

</html>

<!-- Offday PHP handling -->
<?php
$hairdresser_email = $_SESSION['hairdresser_email'];
 if(isset($_GET['offdaydate']))
 {
	 $offday = explode(",",$_GET['offdaydate']);
	 $hairdresser_id = $_SESSION['hairdresser_id'];
	 for($i=0; $i<sizeof($offday); $i++)
	 {
		 $date = $offday[$i];
		 $date =date('Y-m-d', strtotime("+1 months", strtotime($date)));
		$cancel = mysqli_query($conn,"SELECT * FROM appointment WHERE date_appointment = '$date' AND hairdresser_id ='$id' AND status='Pending'");
		$fullname =$_SESSION['hairdresser_username'];
		while($row = mysqli_fetch_assoc($cancel))
		{
			$aid = $row['appointment_id'];
			$updatestatus = mysqli_query($conn,"UPDATE appointment SET status ='Cancelled' WHERE appointment_id = '$aid'");
			$custid = $row['cust_id'];
			$adate = $row['date_appointment'];
				$st=$row['start_time'];
				$status = $row['status'];
				//echo $st.date7("h:i:a");
				$st_h = substr($st,0,2);
				if($st_h>=12)
				{
					if($st_h>12)
					$st_h-=12;
					$st_z = " P.M.";
				}
				else{
					$st_z = " A.M.";
				}
				$st_m = substr($st,2);
											
				$timetotime = $st_h.":".$st_m.$st_z;
			$cust = mysqli_query($conn,"SELECT * FROM customer WHERE cust_id = '$custid'");
			
			while($ro = mysqli_fetch_assoc($cust))
			{
				$template = file_get_contents("cancelappointmenttemplate.php");
				$template = str_replace('{{cust_fullname}}',$ro['cust_firstname']." ".$ro['cust_lastname'],$template);
				$template = str_replace('{{hairdressername}}',$fullname,$template);
				$template = str_replace('{{appointment_date}}',$adate,$template);
				$template = str_replace('{{appointment_starttime}}',$timetotime,$template);
			
				$custemail = $ro['cust_email'];
				ini_set('sendmail_from', 'cukang98@gmail.com');
				$to = $custemail;
				$subject = "AerySalon - Appointment Cancelled";
				$message = $template;
				$headers =  'MIME-Version: 1.0' . "\r\n"; 
				$headers .= 'From: AerySalon <cukang98@gmail.com>' . "\r\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
				
			}
			mail($to, $subject, $message, $headers);
		}
	 }
	 for($i=0; $i<sizeof($offday); $i++)
	 {
		 $date = ($offday[$i]);
		$insertoffday = mysqli_query($conn,"INSERT INTO offday (hairdresser_id,offday_date) VALUES ('$hairdresser_id','$date') ");
	 }
	 echo"<script>
			Swal.fire ({
			html: '<b>Offday Added Successfully!</b>',
			type: 'success'
			});
			</script>";
			header("Refresh:2 ; URL=//localhost/Prototype/admin/hairdresserindex.php");
	 
 }	 
?>
<?php 
	if(isset($_POST['removeid']) && $_POST['removeid']!=''){
		$id = $_POST['removeid'];
		$remove = mysqli_query($conn,"UPDATE hairdresser SET is_removed = '1' WHERE hairdresser_id = '$id'");
		if($remove)
		{
			echo"<script>
			Swal.fire ({
			html: '<b>Removed Successfully!</b>',
			type: 'success'
			});
			</script>";
			header("Refresh:2 ; URL=//localhost/Prototype/admin/hairdresserindex.php");
		}
	}
?>
<?php 
			if(isset($_FILES['image']['name']))
			{
				
				$imageName = mysqli_real_escape_string($conn,$_FILES['image']['name']);
				$imageData = addslashes(file_get_contents($_FILES['image']['tmp_name']));
				$query = "UPDATE hairdresser SET hairdresser_profpic='$imageData' WHERE hairdresser_id = '$id'";
				$update = mysqli_query($conn,$query);
				if($update)
				{
					echo"
					<script>
					Swal.fire ({
						  html: '<b>Image Upload Successfully!</b>',
						  type: 'success'
						  });
					</script>";
					header("Refresh:2 ; URL=//localhost/Prototype/admin/hairdresserindex.php");
				}
			}
		if(isset($_POST['editprofile']))
		{
			$email = $_POST['email'];
			$fname = $_POST['fname'];
			$lname = $_POST['lname'];
			$contact = $_POST['contact'];
			$address = $_POST['address'];
			$postcode = $_POST['postcode'];
			$state = $_POST['state'];
			
			
			if(!empty($fname) && !empty($lname) && !empty($contact) && !empty($address) && !empty($postcode) && !empty($state))
			{
				$update = mysqli_query($conn,"UPDATE hairdresser SET hairdresser_firstname='$fname',hairdresser_lastname = '$lname',hairdresser_contactnum='$contact' ,hairdresser_address = '$address',hairdresser_postcode = '$postcode', hairdresser_state = '$state' WHERE hairdresser_email='$email'");
				if($update)
				{
					echo"
					<script>
					Swal.fire ({
						html: '<b>Profile edit successful!</b>',
						type: 'success'
					});
					</script>";
					header("Refresh:2 ; URL=//localhost/Prototype/admin/hairdresserindex.php");
				}
			}
			else {
				echo"
				<script>
				Swal.fire ({
								html: '<b>Please fillup all information!',
								type: 'error'
							});
							validateFirstName();
							validateLastName();
							validateContact();
							validateAddress();
							validatePostcode();
							
			$('#profilenav').removeClass('active');
			$('#profile').removeClass('active');
			$('#appointmenthistorynav').removeClass('active ');
			$('#history').removeClass('active');
			$('#editprofilenav').addClass('active');
			$('#edit').addClass('active');
			$('#changepasswordnav').removeClass('active');
			$('#changepassword').removeClass('active');
				</script>
				";
			}
		}
		include('changepassword.php');
?>
<?php
if(isset($_GET['removeoffday']))
{
	$date = $_GET['removeoffday'];
	$date = explode("-",$date);
	$month = $date[1];
	$month -=1;
	if(strlen($month)==1)
		$month = "0".$month;
	
	$date = "".$date[0]."-".$month."-".$date[2];
	$id = $_SESSION['hairdresser_id'];
	
	$result = mysqli_query($conn,"SELECT * FROM offday WHERE hairdresser_id ='$id' AND offday_date = '$date'");
	
	if($result)
		if(mysqli_num_rows($result)!=0)
		{
			$remove = mysqli_query($conn,"DELETE FROM offday WHERE hairdresser_id ='$id' AND offday_date = '$date'");
			if($remove)
			{
				echo"
				<script>
				Swal.fire ({
					html: '<b>Offday remove successful!</b>',
					type: 'success'
				});
				</script>";
				header("Refresh:2 ; URL=//localhost/Prototype/admin/hairdresserindex.php");
			}
		}
		else{
			echo"
				<script>
				Swal.fire ({
					html: '<b>Selected date is not offday, Please try again!</b>',
					type: 'error'
				});
				</script>";
				header("Refresh:2 ; URL=//localhost/Prototype/admin/hairdresserindex.php");
		}
	
}
?>
<?php
if(isset($_GET['ftlogin']))
{
	$hid = $_SESSION['hairdresser_id'];
	$result = mysqli_query($conn,"SELECT * FROM appointment WHERE hairdresser_id = '$hid' AND status = 'Pending'");
	if($result)
	{
		$i=0;
		while($row=mysqli_fetch_assoc($result))
		{
			$i+=1;
		}
		if($i>0)
		{
		echo"
		<script>
		Swal.fire({
		  position: 'top-end',
		  type: 'warning',
		  title: 'You have ".$i." appointment pending',
		  showConfirmButton: false,
		  timer: 1500
		})
		</script>";
		
		}
	}
	header("Refresh:1.8 ; URL=//localhost/Prototype/admin/hairdresserindex.php");
}
?>