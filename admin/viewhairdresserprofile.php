<!DOCTYPE html>
<html>
  <?php include("dataconnection.php"); ?>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AerySalon - Hairdresser Profile
    </title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="http://code.jquery.com/jquery-1.11.1.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
		<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>

    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/datepicker3.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
	<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <!--Custom Font-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
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
		#Datepickk .d-title {
			margin-top:80px;
		}
		</style>

  </head>
  <body>
		<script src="datepickk/datepickk.min.js"></script>
		<script>hljs.initHighlightingOnLoad();</script>
		<script>var datepicker = new Datepickk();</script>
	 <?php include("is_login.php"); ?>
    <?php include("topsidebar.php") ?>
	<?php 
	$id = $_GET['hairdresserid'];
	$result = mysqli_query($conn,"SELECT hairdresser.*, position.position_name FROM hairdresser INNER JOIN position ON hairdresser.position_id = position.position_id WHERE hairdresser_id = '$id'");
		while($row = mysqli_fetch_assoc($result)){
			$hairdressername = $row['hairdresser_firstname']." ".$row['hairdresser_lastname'];
			$hairdresseremail = $row['hairdresser_email'];
			$hairdressercontactnum = $row['hairdresser_contactnum'];
			$hairdresseraddress = $row['hairdresser_address'];
			$hairdresserstate = $row['hairdresser_state'];
			$hairdresserpostcode = $row['hairdresser_postcode'];
			$hairdresserpw = $row['hairdresser_pw'];
			$hairdresserposition = $row['position_name'];
			$hairdresserregisterdate = $row['join_date'];
			$hairdresserpic = $row['hairdresser_profpic'];
			if(isset($_GET['hairdresserid']))
				$hairdresserposition = $row['position_name'];
			else
				$hairdresserposition = 'Admin';
		}
	?>
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main ">
      <div class="row">
        <ol class="breadcrumb">
          <li>
            <a href="#">
              <em class="fa fa-home">
              </em>
            </a>
          </li>
          <?php if(isset($_GET['custid']))
			{
			echo '<li class="active"><a href="customerlist.php">Customer List</a></li>';
			}
			else if(isset($_GET['hairdresserid']))
			{
			echo '<li class="active"><a href="hairdresserlist.php">Hairdresser List</a></li>';
			}?>
          <li class="active">Hairdresser Profile - <?php echo $hairdressername; ?>
          </li>
        </ol>
      </div>
      <!--/.row-->
      <div class="row p-t-50 p-b-100" style="background-image: linear-gradient(to right bottom, #ffffff, #f7fbff, #e5fbff, #cefbff, #b8fcff);min-height: -webkit-fill-available;">
        <div class="col-lg-3 order-lg-1 text-center">
          <h5>Profile Image
          </h5>
          <hr>
          <form name="uploadimage" method="POST" enctype="multipart/form-data" id="uploadimage">
            <?php
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
            <hr>
          </form>
        </div>
        <div class="col-lg-9 order-lg-2" >
          <ul class="nav nav-tabs">
            <li class="nav-item active">
              <a href="" data-target="#profile" data-toggle="tab" class="nav-link active" id="profilenav">Profile
              </a>
            </li>
            <li class="nav-item">
              <a href="" data-target="#history" data-toggle="tab" class="nav-link" id="appointmenthistorynav">Appointment History
              </a>
            </li>
			<li class="nav-item">
              <a href="" data-toggle="tab" class="nav-link" onclick="onConfirmDemo()">Off Day
              </a>
            </li>
          </ul>
		  <script>
		  function onConfirmDemo(){
			 // alert(new Date('2014-04-03'))
			 //new Date.getMonth();
						datepicker.unselectAll();
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
						datepicker.onClose = function(){
							datepicker.button = null;
							datepicker.onClose = null;
						};
						datepicker.title = '<?php echo $hairdressername; ?>\'s'+ " Off Day";
						//datepicker.disabledDates = [new Date(),new Date(2015,6,20),;
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
						
						//to highlight offday date 
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
						//to disable offday date 
						<?php 
							$hairdresser_id = $_GET['hairdresserid'];;
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
						<?php 
							$hairdresser_id = $_GET['hairdresserid'];;
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
								echo "backgroundColor: '#f5518d',";
								echo "color: '#ffffff',";
								echo "legend: '$hairdressername Off Day'};";
								echo"datepicker.highlight = highlight;";

							}
						?>
						datepicker.locked = true;
						datepicker.show();
					}
		  </script>
          <div class="tab-content py-4">
            <div class="tab-pane active" id="profile">
              <h5 class="mb-3">User Profile
              </h5>
              <hr>
<div class="row">
                <div class="col-md-6">
                  <h6>Full Name
                  </h6>
                  <p>
                    <?php echo$hairdressername; ?>
                  </p>
                  <h6>Email
                  </h6>
                  <p>
                    <?php echo $hairdresseremail; ?>
                  </p>
                  <h6>Contact Number
                  </h6>
                  <p>
                    <?php echo $hairdressercontactnum; ?>
                  </p>
				  <h6>Register Date
                  </h6>
                  <p>
                    <?php echo $hairdresserregisterdate; ?>
                  </p>
                </div>
                <div class="col-md-6">
                  <h6>Position
                  </h6>
                  <p>
                    <?php echo $hairdresserposition; ?>
                  </p>
				  <h6>Address
                  </h6>
                  <p>
                    <?php echo $hairdresseraddress.', '.$hairdresserstate; ?>
                  </p>
				  <h6>Postcode
                  </h6>
                  <p>
                    <?php echo $hairdresserpostcode; ?>
                  </p>
                </div>
              </div>
              <!--/row-->
            </div>
            <div class="tab-pane" id="history">
              <div class="col-lg-12 col-xs-12 mb-5">
					<table id="dataTable"  class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>No.</th>
								
								<th>Appointment Made On</th>
								<th>Appointment Date</th>
								<th>Time Slot</th>
								<th>Status</th>
								<th>Customer Full Name</th>
								<th class="cell100 column6">Action</th>
							</tr>
							</thead>
							<tbody>
								<?php
								$id =  $_GET['hairdresserid'];
								$query = "SELECT * FROM appointment WHERE hairdresser_id = '$id'";
								$a = mysqli_query($conn,$query);
								if($a)
								{
									$data = mysqli_num_rows($a);
									if($data != 0)
									{
										$i=1;
										while($row = mysqli_fetch_assoc($a))
										{
											echo'
											<tr>
											<td>'.$i.'</td>';
											$cid = $row['cust_id'];
											$h = mysqli_query($conn,"SELECT * FROM customer WHERE cust_id = '$cid'");
											while($r=mysqli_fetch_assoc($h))
											{
												$custname = $r['cust_firstname']." ".$r['cust_lastname'];
											}
											echo'
											
											<td>'.$row['date_appointment_made'].'</td>
											<td>'.$row['date_appointment'].'</td>';
											$st=$row['start_time'];
											$et=$row['end_time'];
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
											$et_h = substr($et,0,2);
											if($et_h>=12)
											{
												if($et_h>12)
													$et_h-=12;
												$et_z = " P.M.";
											}
											else{
												$et_z = " A.M.";
											}
											$et_m = substr($et,2);
											$timetotime = $st_h.":".$st_m.$st_z." - ".	$et_h.":".$et_m.$et_z;
											echo'
											<td>'.$timetotime.'</td>';
											if($status =="Pending")
												echo '<td><font color="blue"><b>Pending</b><font></td>';
												
											else if($status =="Cancelled")
												echo '<td><font color="red"><b>Cancelled</b><font></td>';
											else if($status =="Completed")
												echo '<td><font color="#15ff00"><b>Completed</b><font></td>';
											else if($status =="Confirmed")
												echo '<td><font color="#15ff00"><b>Confirmed</b><font></td>';
											echo '<td>'.$custname.'</td>';
											echo'
											<td><a href=\'//localhost/Prototype/admin/viewhairdresserprofile.php?hairdresserid='.$row["hairdresser_id"].'\' title="View Appointment Details" data-toggle="modal" data-target="#a'.$row['appointment_id'].'"><img src="view.png" width="18px" style="margin-top:1px"></img></a>';
											// if($status=="Pending")
											// {
												// echo' / <a style="cursor:pointer" onclick="cancelappointment('.$row['appointment_id'].')" title="Cancel Appointment"><img src="cancel.jpg" width="20px" style="margin-top:1px;"></a>';
											// }
											if($status=="Completed")
												echo ' / <a style="cursor:pointer" data-toggle="modal" data-target="#receipt'.$row['appointment_id'].'" title="Invoice"><img src="remark.png" width="18px" style="margin-top:1px;"></a>';
											
											
											echo'
											</td>
											</tr>';
											$i++;
											
										}
									}
								}
							?>
						</tbody>
						</table>
					</div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--/.main-->
	 <!-- Modal content-->
							<?php
							$id = $_GET['hairdresserid'];
							  $result = mysqli_query($conn,"SELECT * FROM appointment WHERE hairdresser_id = '$id'");
								if($result)
								{
									$data = mysqli_num_rows($result);
									if($data != 0)
									{
										while($row = mysqli_fetch_assoc($result))
										{
											$cid = $row['cust_id'];
											$aid = $row['appointment_id'];
											$cus = mysqli_query($conn,"SELECT * FROM customer WHERE cust_id ='$cid'");
											$status = $row['status'];
											if($cus)
											while($r = mysqli_fetch_assoc($cus))
											{
												$custname = $r['cust_firstname']." ".$r['cust_lastname'];
											}
											$query = "SELECT appointment_service.* FROM appointment_service WHERE appointment_service.appointment_id = '$aid'";
											$serv = mysqli_query($conn,$query);
											$servname = '';
											if($serv)
											while($s = mysqli_fetch_assoc($serv))
											{
												$cursid = $s['service_id'];
												$sname = mysqli_query($conn,"SELECT service_name FROM service WHERE service_id ='$cursid'");
												
												while($sn = mysqli_fetch_assoc($sname))
												{
													if($servname=="")
														$servname .= $sn['service_name'];
													else
														$servname .= ", ".$sn['service_name'];
												}
											}
											$duration = $row['total_estimate_duration'];
											$hour = 0;
											while($duration>=60)
											{
												$hour=1 + $hour;
												$duration = $duration - 60;

											}
											if($hour>0)
												$duration = $hour.' Hour '.$duration.' Minute';
											else
												$duration = $duration.' Minute';
											echo'
											  <div class="modal fade" id="a'.$row['appointment_id'].'" tabindex="-1" role="dialog" aria-labelledby="ModalLabel'.$row['appointment_id'].'" aria-hidden="true">'.
										  '<div class="modal-dialog" role="document">'.
											'<div class="modal-content-1">'.
											  '<div class="modal-header">'.
												'<h5 class="modal-title" id="ModalLabel'.$row['appointment_id'].'">Appointment Details</h5>'.
												'<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position:absolute;top:20px;right:20px;">'.
												  '<span aria-hidden="true">&times;</span>'.
												'</button>'.
											  '</div>'.
											  '<div class="modal-body">'.
												'<form name="updatepositionform" method="get">'.
												'<input type="hidden" class="form-control" name="aid" value="'.$aid.'" readonly>'.
												  '<div class="form-group">'.
													'<label for="recipient-name" class="col-form-label">Customer Name</label>'.
													'<input type="text" class="form-control" onkeyup="capitalize(this)" name="" value="'.$custname.'" readonly>'.
												  '</div>'.
												  '<div class="form-group">'.
													'<label for="recipient-name" class="col-form-label">Appointment Made On</label>'.
													'<input type="text" class="form-control" name="" value="'.$row['date_appointment_made'].'" readonly>'.
												  '</div>'.
												  '<div class="form-group" style="width:45%;display:inline-block;margin-right:5%">'.
													'<label for="recipient-name" class="col-form-label">Appointment Date</label>'.
													'<input type="text" class="form-control" name="" value="'.$row['date_appointment'].'" readonly>'.
												  '</div>'.
												  '<div class="form-group" style="width:50%;display:inline-block">'.
													'<label for="recipient-name" class="col-form-label">Time</label>'.
													'<input type="text" class="form-control" name="" value="'.$timetotime.'" readonly>'.
												  '</div>'.
												  '<div class="form-group">'.
													'<label for="recipient-name" class="col-form-label">Service</label>'.
													'<input type="text" class="form-control" name="" value="'.$servname.'" readonly>'.
												  '</div>'.
												  '<div class="form-group" style="width:45%;display:inline-block;margin-right:5%">'.
													'<label for="recipient-name" class="col-form-label">Estimate Fee</label>'.
													'<input type="text" class="form-control" name="" value="RM '.$row['total_estimate_fee'].'" readonly>'.
												  '</div>'.
												  '<div class="form-group" style="width:50%;display:inline-block">'.
													'<label for="recipient-name" class="col-form-label">Estimate Duration</label>'.
													'<input type="text" class="form-control" name="" value="'.$duration.'" readonly>'.
												  '</div>'.
												  '<div class="form-group" style="width:30%;display:inline-block">'.
													'<label for="recipient-name" class="col-form-label">Status</label>'.
													'<input type="text" class="form-control" name="" value="'.$status.'" readonly>'.
												  '</div>';
												  if($status=="Completed")
												  echo
												  '<div class="form-group">'.
													'<label for="recipient-name" class="col-form-label">Remark</label>'.
													'<textarea type="text" class="form-control" name="remark" value="'.$row['remark'].'" readonly></textarea>'.
												  '</div>'.
												  '<div class="form-group" >'.
													'<label for="recipient-name" class="col-form-label">Final Payment (RM)</label>'.
													'<input type="text" class="form-control" name="final_payment" value="'.$row['final_payment'].'" readonly>'.
												  '</div>';
												  echo
											  '</div>'.
											 ' <div class="modal-footer">'.
												'<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>'.
											 '</div>'.
											 '</form>'.
											'</div>'.
										  '</div>'.
										'</div>';
										}
									}
								}
								?>
<!-- Modal content-->
							  <?php
							  $result = mysqli_query($conn,"SELECT * FROM appointment WHERE status ='Completed'");
								if($result)
								{
									$data = mysqli_num_rows($result);
									if($data != 0)
									{
										while($row = mysqli_fetch_assoc($result))
										{
											echo'
											  <div class=" modal fade " id="receipt'.$row['appointment_id'].'" tabindex="-1" role="dialog" aria-labelledby="ModalLabel'.$row['appointment_id'].'" aria-hidden="true">'.
										  '<div class="modal-dialog" style="width:800px" role="document">'.
											'<div class="modal-content-1" >'.
											  '<div class="modal-header">'.
												'<h5 class="modal-title" id="ModalLabel'.$row['appointment_id'].'">Appointment Receipt</h5>'.
												'<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position:absolute;top:20px;right:20px;">'.
												  '<span aria-hidden="true">&times;</span>'.
												'</button>'.
											  '</div>'.
											  '<div class="modal-body">'.
												  '<object class="col-lg-12" data="//localhost/Prototype/admin/receiptid'.$row['appointment_id'].'.pdf" height="500px">'.
													'<iframe src="//localhost/Prototype/admin/generateinvoice.php?embedded=true"></iframe>'.
												 '</object>'.
											  '</div>'.
											 ' <div class="modal-footer">'.
												'<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>'.
												'<input type="submit" class="btn btn-primary" name="updateservicetype" value="Submit">'.
											 '</div>'.
											'</div>'.
										  '</div>'.
										'</div>';
										}
									}
								}
								?>
    <script src="js/bootstrap.min.js">
    </script>

    <script src="js/bootstrap-datepicker.js">
    </script>
    <script src="js/custom.js">
    </script>
			<script>
		$(document).ready( function () {
			$('#dataTable').DataTable();
		} );
		</script>
  </body>
</html>