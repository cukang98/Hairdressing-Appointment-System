<!DOCTYPE html>
<html>

<?php include("dataconnection.php");  ?>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>AerySalon - Appointment List</title>
        <script src="http://code.jquery.com/jquery-1.11.1.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
		<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/font-awesome.min.css" rel="stylesheet">
		<link href="css/styles.css" rel="stylesheet">
		<link href="css/awesome-bootstrap-checkbox.css" rel="stylesheet">
		<!--Custom Font-->
		<link href="css/main.css" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
	    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
      <![endif]-->
		<script>
		function cancelappointment(id){
				Swal.fire({
				  title: 'Would you like to cancel this appointment?',
				  text: "You won't be able to change the status of this appointment afterwards!",
				  type: 'warning',
				  showCancelButton: true,
				  confirmButtonColor: '#3085d6',
				  cancelButtonColor: '#d33',
				  confirmButtonText: 'Yes, Cancel now!'
				}).then((result) => {
				  if (result.value) {
					window.location = window.location.href+"?aid="+id+"&status=Cancelled";
				  }
				})
		}
		function completeappointment(id){
				Swal.fire({
				  title: 'Appointment Complete?',
				  text: "You won't be able to change the status of this appointment afterwards!",
				  type: 'warning',
				  showCancelButton: true,
				  confirmButtonColor: '#3085d6',
				  cancelButtonColor: '#d33',
				  confirmButtonText: 'Yes, Completed!'
				}).then((result) => {
				  if (result.value) {
					window.location = window.location.href+"?aid="+id+"&status=Completed";
				  }
				})
		}
		function confirmappointment(id){
				Swal.fire({
				  title: 'Confirm Appointment?',
				  text: "You won't be able to cancel this appointment afterwards!",
				  type: 'warning',
				  showCancelButton: true,
				  confirmButtonColor: '#3085d6',
				  cancelButtonColor: '#d33',
				  confirmButtonText: 'Yes, Confirm!'
				}).then((result) => {
				  if (result.value) {
					window.location = window.location.href+"?aid="+id+"&status=Confirmed";
				  }
				})
		}
	$(document).ready( function () {
    $('#dataTable').DataTable();
} );
		</script>
	</head>

	<body>
		<?php include("is_login.php"); ?>
		<?php include("topsidebar.php");?>
			<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
				<div class="row">
					<ol class="breadcrumb">
						<li>
							<a href="#"> <em class="fa fa-home"></em> </a>
						</li>
						<li class="active"> Appointment List</li>
					</ol>
				</div>
				<div class="row">
				<h1 class="page-header mb-3" align="center">
				<img src="hairdresser.png" class="titleimage"> Appointment List
				</h1> 
				</div>
				<hr class="mt-1">
				<!--/.row-->

				<div class="col-lg-12 col-xs-12 mb-5">
					<table id="dataTable"  class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>No.</th>
								<th>Customer Full Name</th>
								<th>Appointment Made On</th>
								<th>Appointment Date</th>
								<th>Time Slot</th>
								<th>Status</th>
								<th class="cell100 column6">Action</th>
							</tr>
							</thead>
							<tbody>
								<?php
								$id = $_SESSION['admin_id'];
								$query = "SELECT appointment_service.*, appointment.* FROM appointment_service 
								INNER JOIN appointment ON appointment.appointment_id = appointment_service.appointment_id WHERE hairdresser_id = '$id'";
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
											$custid = $row['cust_id'];
											$cust = mysqli_query($conn,"SELECT * FROM customer WHERE cust_id = '$custid'");
											while($r=mysqli_fetch_assoc($cust))
											{
												$custname = $r['cust_firstname']." ".$r['cust_lastname'];
											}
											echo'
											<td>'.$custname.'</td>
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
											echo'
											<td class="celll00 column6"><a href=\'//localhost/Prototype/admin/viewhairdresserprofile.php?hairdresserid='.$row["hairdresser_id"].'\' title="View / Update Appointment" data-toggle="modal" data-target="#a'.$row['appointment_id'].'"><img src="view.png" width="18px" style="margin-top:1px"></img></a>';
											if($status=="Pending")
											{
												echo' / <a style="cursor:pointer" onclick="confirmappointment('.$row['appointment_id'].')"title="Confirm Appointment"><img src="complete.png" width="18px" style="margin-top:1px;"></a>';
												echo' / <a style="cursor:pointer" onclick="cancelappointment('.$row['appointment_id'].')" title="Cancel Appointment"><img src="cancel.jpg" width="20px" style="margin-top:1px;"></a>';
											}
											if($status=="Confirmed")
												echo ' / <a style="cursor:pointer" onclick="completeappointment('.$row['appointment_id'].')"title="Appointment Complete"><img src="complete.png" width="18px" style="margin-top:1px;"></a>';
											
											echo'
											</td>
											</tr>';
											$i++;
											
										}
									}
									else {
										echo'
										<tr>
										<td class="cell100 column1">Empty Result</td>
										</tr>
										';
									}
								}
							?>
						</tbody>
						</table>
					</div>
				</div>
	</body>
	 <!-- Modal content-->
							<?php
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
											if($cus)
											while($r = mysqli_fetch_assoc($cus))
											{
												$custname = $r['cust_firstname']." ".$r['cust_lastname'];
											}
											$query = "SELECT appointment_service.* FROM appointment_service WHERE appointment_service.appointment_id = '$aid'";
											$serv = mysqli_query($conn,$query);
											if($serv)
											while($s = mysqli_fetch_assoc($serv))
											{
												$cursid = $s['service_id'];
												$sname = mysqli_query($conn,"SELECT service_name FROM service WHERE service_id ='$cursid'");
												$servname = '';
												while($sn = mysqli_fetch_assoc($sname))
												{
													$servname .= $sn['service_name'];
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
												'<h5 class="modal-title" id="ModalLabel'.$row['appointment_id'].'">Update Appointment</h5>'.
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
													'<textarea type="text" class="form-control" name="remark" value="'.$row['remark'].'"></textarea>'.
												  '</div>'.
												  '<div class="form-group" >'.
													'<label for="recipient-name" class="col-form-label">Final Payment (RM)</label>'.
													'<input type="text" class="form-control" name="final_payment" value="'.$row['final_payment'].'">'.
												  '</div>';
												  echo
											  '</div>'.
											 ' <div class="modal-footer">'.
												'<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>'.
												'<input type="submit" class="btn btn-primary" name="updateappointment" value="Submit">'.
											 '</div>'.
											 '</form>'.
											'</div>'.
										  '</div>'.
										'</div>';
										}
									}
								}
								?>
    <script src="js/chart.min.js"></script>
    <script src="js/chart-data.js"></script>
    <script src="js/easypiechart.js"></script>
    <script src="js/easypiechart-data.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/custom.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script>
	document.getElementById("servicetab").classList.remove("active");
	document.getElementById("hairdressertab").classList.toggle("active");
	document.getElementById("customerlist").classList.remove("active");

	</script>
<?php //include('generateinvoice.php'); ?>
</html>
<?php 
	
	if(isset($_GET['reset']))
	{
		header("Location: ".$_SERVER['PHP_SELF']);
	}

?>
<?php 
	if(isset($_GET['aid']) && $_GET['status']!=''){
		$aid = $_GET['aid'];
		$status = $_GET['status'];
		date_default_timezone_set("Asia/Kuala_Lumpur");
		$updatedate = date('Y-m-d H:i:sa ');
		$update = mysqli_query($conn,"UPDATE appointment SET status = '$status',update_date ='$updatedate' WHERE appointment_id = '$aid'");
		if($update)
		{
			echo"<script>
			Swal.fire ({
			html: '<b>Appointment Update Successfully!</b>',
			type: 'success'
			});
			</script>";
			header("Refresh:1 ; URL=//localhost/Prototype/admin/appointmentlist.php");
		}
	}
	if(isset($_GET['updateappointment']))
	{
		if($_GET['final_payment']!="" && isset($_GET['final_payment']))
		{
			if(is_numeric($_GET['final_payment']))
			{
				$finalpayment = $_GET['final_payment'];
				if($finalpayment >0)
				{
					$remark = $_GET['remark'];
					$aid = $_GET['aid'];
					$insert = mysqli_query($conn,"UPDATE appointment SET remark ='$remark', final_payment = '$finalpayment' WHERE appointment_id = '$aid'");
					echo"<script>
					Swal.fire ({
					html: '<b>Appointment Update Successfully!</b>',
					type: 'success'
					});
					</script>";
					header("Refresh:1 ; URL=//localhost/Prototype/admin/appointmentlist.php");
				}
				else{
					echo"<script>
					Swal.fire ({
					html: '<b>Final payment cannot less than or equal 0!</b>',
					type: 'error'
					});
					</script>";
					header("Refresh:1 ; URL=//localhost/Prototype/admin/appointmentlist.php");
				}
			}
			else{
				echo"<script>
				Swal.fire ({
				html: '<b>Final payment only can be number!</b>',
				type: 'error'
				});
				</script>";
				header("Refresh:1 ; URL=//localhost/Prototype/admin/appointmentlist.php");
			}
		}
		else{
			echo"<script>
			Swal.fire ({
			html: '<b>Final payment cannot be empty!</b>',
			type: 'error'
			});
			</script>";
			header("Refresh:1 ; URL=//localhost/Prototype/admin/appointmentlist.php");
		}
	}
?>