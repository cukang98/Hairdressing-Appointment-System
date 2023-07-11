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
	  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
	  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
      <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
      <link rel="stylesheet" type="text/css" href="css/util.css">
      <link rel="stylesheet" type="text/css" href="css/main1.css">
	  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
      <link rel="stylesheet" href="fonts/icomoon/style.css">
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" href="css/aos.css">
      <link rel="stylesheet" href="css/style.css">
	  <link rel="stylesheet" href="css/main.css">
	  <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css" rel="stylesheet">
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
		#dataTable_filter{
			float:right;
		}
		#dataTable_length{
			float:left
		}
		#dataTable_length > label>select{
			margin: 0px 5px 0px 5px;
		}
		table{
			font-size:14px;
		}
	  </style>
</head>

<script>
$(document).ready( function () {
    $('#dataTable').DataTable();
} );
$(document).ready(function(){
	$('#upload').click(function(){
		var image_name = $('#image1').val();
		if(image_name == '')
		{
			 Swal.fire ({
				html: '<b>Please Select An Image!</b>',
				type: 'error'
				});
				return false;
		}
		else{
			var ext = $('#image1').val().substr((image_name.lastIndexOf('.')+1) );
			if(jQuery.inArray(ext,['gif','png','jpg','jpeg'])==-1)
			{
				Swal.fire ({
				  html: '<b>Invalid Image File!</b>',
				  type: 'error'
				  });
				  $('#image1').val();
				  return false;
			}
		}
	})
});
function submit() {
    document.getElementById("uploadimage").submit();
};
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
</script>
<body>
<?php include ("$_SERVER[DOCUMENT_ROOT]/Prototype/header.php"); ?>
<div class="page-wrapper bg-gra-01">
<div class="container p-t-100 p-b-100 " >
    <div class="row my-2  p-t-50 p-b-100" style="border:1px solid silver; background-color:white;">
        <div class="col-lg-9 order-lg-2" >
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a href="" data-target="#profile" data-toggle="tab" class="nav-link active" id="profilenav">Profile</a>
                </li>
                <li class="nav-item">
                    <a href="" data-target="#history" data-toggle="tab" class="nav-link" id="appointmenthistorynav">Appointment History</a>
                </li>
                <li class="nav-item">
                    <a href="" data-target="#edit" data-toggle="tab" class="nav-link" id="editprofilenav">Edit Profile</a>
                </li>
				<li class="nav-item">
                    <a href="" data-target="#changepassword" data-toggle="tab" class="nav-link" id="changepasswordnav">Change Password</a>
                </li>
            </ul>
            <div class="tab-content py-4">
                <div class="tab-pane active" id="profile">
                    <h5 class="mb-3">User Profile</h5>
					<hr>
                    <div class="row">
                        <div class="col-md-6">
                            <h6>Full Name</h6>
                            <p>
                                <?php 
									echo strtoupper($customer_name);
								?>
                            </p>
                            <h6>Email</h6>
                            <p>
                                <?php 
									echo $customer_email;
								?>
                            </p>
							<h6>Contact Number</h6>
                            <p>
                                <?php 
									echo $customer_contact;
								?>
                            </p>
                        </div>
                        <div class="col-md-6">
							<h6>Register Date</h6>
                            <p>
                                <?php 
									echo $registerdate;
								?>
                            </p>
                        </div>
						
                        <div class="col-md-12 m-t-50">
						<hr>
                            <h5 class="mt-2"><span class="fa fa-clock-o ion-clock float-right"></span> Recent Activity</h5>
                            <table class="table table-sm table-hover table-striped">
                                <tbody>   
									<?php 
									$id = $_SESSION['cust_id'];
									  $result = mysqli_query($conn,"SELECT appointment.*, hairdresser.* FROM appointment INNER JOIN hairdresser ON appointment.hairdresser_id = hairdresser.hairdresser_id WHERE cust_id = '$id' ORDER BY appointment.update_date DESC");
									// $result = mysqli_query($conn,"SELECT * FROM appointment WHERE cust_id = '$id'");
									$i=0;
									while($row = mysqli_fetch_assoc($result))
									{
										$c = $row['hairdresser_id'];
										$position = mysqli_query($conn,"SELECT hairdresser.*, position.position_name FROM hairdresser INNER JOIN position ON hairdresser.position_id = position.position_id WHERE hairdresser.hairdresser_id = '$c'");
										while($z = mysqli_fetch_assoc($position))
										{
											$pname = $z['position_name'];
										}
										
										if($i<5)
										{
											if($row['cancelled_by_self']=='0' && $row['status']!='Pending')
											{
												echo'<tr>';
												echo'<td>Our '.$pname.', <strong>'.$row['hairdresser_firstname']." ".$row['hairdresser_lastname'].'</strong> just '.strtolower($row['status']." your appointment that made on ".date('Y-m-d', strtotime($row['update_date']))."<span style='float:right;font-style: italic;'>".date('Y-m-d h:i A', strtotime($row['update_date'])).'</span>');
												echo'</tr>';
											}
											else if($row['status'] =='Pending')
												{
												echo'<tr>';
												echo'<td><strong>You </strong> just make appointment on '.$row['date_appointment']."<span style='float:right;font-style: italic;'>".date('Y-m-d h:i A', strtotime($row['update_date'])).'</span>';
												echo'</tr>';
											}
											else{
												echo'<tr>';
												echo'<td><strong>You </strong> have just '.strtolower($row['status']." your appointment that made on ".$row['date_appointment_made']."<span style='float:right;font-style: italic;'>".date('Y-m-d h:i A', strtotime($row['update_date'])).'</span>');
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
                   <div class="col-lg-12 col-xs-12 mb-5">
					<table id="dataTable"  class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>No.</th>
								
								<th>Appointment Made On</th>
								<th>Appointment Date</th>
								<th>Time Slot</th>
								<th>Status</th>
								<th>Hairdresser Full Name</th>
								<th class="cell100 column6">Action</th>
							</tr>
							</thead>
							<tbody>
								<?php
								$id =  $_SESSION['user']['cust_id'];
								$query = "SELECT * FROM appointment WHERE cust_id = '$id'";
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
											$hid = $row['hairdresser_id'];
											$h = mysqli_query($conn,"SELECT * FROM hairdresser WHERE hairdresser_id = '$hid'");
											while($r=mysqli_fetch_assoc($h))
											{
												$custname = $r['hairdresser_firstname']." ".$r['hairdresser_lastname'];
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
											if($status=="Pending")
											{
												echo' / <a style="cursor:pointer" onclick="cancelappointment('.$row['appointment_id'].')" title="Cancel Appointment"><img src="cancel.jpg" width="20px" style="margin-top:1px;"></a>';
											}
											if($status=="Completed")
												echo ' / <a style="cursor:pointer" data-toggle="modal" data-target="#receipt'.$row['appointment_id'].'" title="Receipt"><img src="remark.png" width="18px" style="margin-top:1px;"></a>';
											
											
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
                <div class="tab-pane" id="edit">
                    <form role="form" name="editprofileform" method="get">
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">First Name</label>
                            <div class="col-lg-3">
                                <input class="form-control" type="text" id="fname" name="fname" value="<?php if (isset($_GET['fname'])) echo $_GET['fname']; else echo $customer_firstname ?>" onchange="validateFirstName();">
								<div id="fname-validation" class="validation-hint"></div>
                            </div>
							<label class="col-lg-2 col-form-label form-control-label">Last Name</label>
                            <div class="col-lg-4">
                                <input class="form-control" type="text" id="lname" name="lname" value="<?php if (isset($_GET['lname'])) echo $_GET['lname']; else echo $customer_lastname ?>" onchange="validateLastName();">
								<div id="lname-validation" class="validation-hint"></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Email</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" name="email" value="<?php echo$customer_email ?>" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Contact Number</label>
                            <div class="col-lg-9">
                                <input class="form-control validatecontact" type="text" id="contact" name="contact" value="<?php if (isset($_GET['contact'])) echo $_GET['contact']; else  echo $customer_contact ?>" onchange="validateContact()" >
							<div id="contact-validation" class="validation-hint"></div>
                            </div>
							
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label"></label>
                            <div class="col-lg-9">
                                <input type="reset" class="login100-form-btn" value="Cancel">
                                <input type="submit" name="editprofile" class="login100-form-btn" value="Save Changes">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane" id="changepassword">
                    <form role="form" name="changepasswordform" method="post">
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Old Password</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="password" name="oldpw" id="oldpw" onkeyup="validateOldpw('<?php echo $_SESSION['user']['cust_email'];?>');" value="<?php if (isset($_GET['oldpw'])) echo $_GET['oldpw']; else echo'';?>">
								<div id="oldpw-validation" class="validation-hint"></div>
								<img class="tick" id="oldpwtick" src="tick.png" width="25px" height="20px">
                            </div>
                        </div>
						<div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">New password</label>
                            <div class="col-lg-9">
                                <input class="form-control validate" type="password" name="password1" id="password1" onchange="validateNewpw();" value="<?php if (isset($_GET['password1'])) echo $_GET['password1']; else echo'';?>">
								<div id="newpw-validation" class="validation-hint"></div>
								<img class="tick" id="newpwtick" src="tick.png" width="25px" height="20px">
                            </div>
                        </div>
						<div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Confirm new password</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="password" name="password2" id="password2" onchange="validateNewpw2();" value="<?php if (isset($_GET['password2'])) echo $_GET['password2']; else echo'';?>">
								<div id="newpw2-validation" class="validation-hint"></div>
								<img class="tick" id="newpw2tick" src="tick.png" width="25px" height="20px">
                            </div>
                        </div>
						
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label"></label>
                            <div class="col-lg-9">
                                <input type="reset" class="login100-form-btn"  value="Cancel">
                                <input type="submit" class="login100-form-btn" name="changepassword" value="Save Changes">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-3 order-lg-1 text-center">
		<h5>Profile Image</h5>
		<hr>
		<form name="uploadimage" method="POST" enctype="multipart/form-data" id="uploadimage">
            <?php
				$email = $_SESSION['user']['cust_email'];
				$userimage = mysqli_query($conn,"SELECT cust_profpic FROM customer WHERE cust_email='$email'");
				while($row = mysqli_fetch_assoc($userimage))
				{
					$defimg ="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAMFBMVEXFxcX////CwsLGxsb7+/vT09PJycn19fXq6urb29vOzs7w8PDe3t7n5+f5+fnt7e2uCwolAAAFHUlEQVR4nO2dC5qqMAyFMTwUFNz/bq+VYYrKKJCkOfXmXwHna5uTpA+KwnEcx3Ecx3Ecx3Ecx3Ecx3Ecx3Ecx3Ecx3EcA2iO9cdIc5PUdO2l78+BU39p66b4HplE3eU6VIcnqmNfl1+gksr6+iIucr50WYukor7+re6Hoe1y1UhNO3zUd+fUFRmKpOa0Tt6dY5ubRCouG/QFzk1WGmnt/JxzykcjdZ/jyxJDLlOV2l36AtcsJJb9boG3YcR3DuqODIE3LtYKPkDdmwRmpUToUaSaq++AvRgZMWbOubQW8hdCAm8ZDugoikzREdCJ2okJPBx6azFLNOwoOgcxojJ98JkaTSJxMpklKrCAKhZGI0drTY/wU5lXoJYibannV9NYy4oozNEAkPHTjop+DTDxVGkIgYJNoyQQJtiIW+EMjGAjm649AjGIaqswcEZQKJ2QPlJbqytki6ZXAAZRJ52J2McaUowzAfs+uFzrYhnzaapphiPWdaJWShqxjqa6kTTQ205TVbsfMa6htL0iYOsXpJrQjHSmCkv1QGPtiHqlYcQ21Gj7fcDU8xOEUuNgSltPzexh+HqFlanCBHZ4OLhCV+gK/3OF6vWvucLv98MUOY2pwu/PS/+D2qJU7pYGbOvDFDW+bbON9p3o3oRxn0bfLgZTgSn6pSfrtr56qLHemtHPTK2319SzGvtjQ9qeb39Wgc66Cm073nd0U1PzDdJCO3Gzn6TKpl9Zq7ujGWsQhlA3NwWIMwG9zM08Y/tBrR9VWeczv5CSQuuUNKIUTk23ZJ5RKfVhjnkXotfWIlgX2BSCDYbZR+QTcLhb3dKZDUY2M0d4KWItwhHRah/zsrOgKw4wycwjcgEVcgQDQo23CqSiWEJkFAfod2oE1uIZdA1OsCPqFXYNTjCfb8Ez+iX2x5sKLlVbhtqdDcar9ZevhnbZxoBUD35k23t0d304LYs1ELVbnfFaZ/REJJX9niP8Q19moZGo3m8XR/yBvOnjFftncI2c8ZuNo7WMP5HQh6yRGrlmFOJTnyTcT+zRlqPUBI2gTVWNUzUna1ERgecgF4GpNBQ38jGqxVLzQA1A31Rrhk6Yz9QEh/WND0GnuG9huhiTXJkxfAizTHLr6cbJKN6UCU6x/2DTRE1xEeEXi3O0ZUqBN4nJRzHhFB1JPlFTBZlI2kQ8zc3KJ1Le8DIRmFJiknuVS6RK4Ej/JtBfJErDSzOBiY4wJHX6Z1I4v1GUmdCPNirnLLeg3oJLcbX5PcpHNbRvOa1A956QmRPOUXVF+zkaUJynpkYR0bOMJH2nNej1pqyV/aKkz9jr5yj5vrXXz1F5SQLACiMapmierj2ikLyleKdlA/I/2oFxiglxx9B+mHwz0lf34IZQfhDRhlD6bhvgEAoPYooHkTczSIZTLC+cEExsoNKZiGBiY9cCfo/Y/SjIOBMQizWWTe73CMUasJx7jlD+DdKdWUKoY4PRYFtGpO0G1Lx4RaadgTtJhf4fiGqGIwKWCGuGIwKWqP+7IxYCzygjR9IAO5pC7Da9g70TBVpWRNgFBlgT8RV2WxHbKwJMv4BOaEaYaU2K16yZMN/qgV+G7IWIvwyZCxHeDQMsR8wg0DBDDXB5H2EV+hkEGmaoySHQsEJNFoGGFWrAq98JRhUMX1iMMMqLLEIpK5jCbd4vw9nSt/72lewXiN6jmdjfq8Hdknlk92ZwJnbIMMRM7JBhiFlUFoHd1UWaP1QKsPsHA5mkNB+Smn9r+138jGzYzgAAAABJRU5ErkJggg==";
					if(!empty ($row['cust_profpic']) || $row['cust_profpic']!=null)
						echo '<img src="data:image/jpeg;base64,'.base64_encode($row['cust_profpic']).'" class="mx-auto img-thumbnail  d-block">';
					else
						echo '<img src='.$defimg.'  class="mx-auto img-thumbnail  d-block" alt="avatar">';
				}
			?>
            <h6 class="mt-2">Upload a different photo</h6>
            <label class="custom-file">
                <input type="file" id="image1" name="image" class="custom-file-input" style="display:none" accept="image/*"onchange="submit()" />
                <span class="login100-form-btn" id="choose" style="line-height:43px">Choose Image</span>
            </label>
			<hr>
		</form>
        </div>
    </div>
</div>
</div>
<!-- Modal content-->
							  <?php
							  $result = mysqli_query($conn,"SELECT * FROM appointment WHERE status ='Completed' AND cust_id = '$id'");
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
<?php
include ("$_SERVER[DOCUMENT_ROOT]/Prototype/footer.php"); ?>
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
      <script src="js/jquery-ui.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/aos.js"></script>
      <script src="js/main.js"></script>
	   <!-- Modal content-->
							<?php
							  $result = mysqli_query($conn,"SELECT * FROM appointment WHERE cust_id = '$id'");
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
											$serv = mysqli_query($conn,$query);$servname = '';
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
											  <div class="modal fade" id="a'.$row['appointment_id'].'" tabindex="-1" role="dialog" aria-labelledby="ModalLabel'.$row['appointment_id'].'" aria-hidden="true" >'.
										  '<div class="modal-dialog" role="document">'.
											'<div class="modal-content-1" style="width:700px;margin-left:-80px">'.
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
													'<input type="text" class="form-control" name="" value="'.$row['status'].'" readonly>'.
												  '</div>';
												  if($row['status']=="Completed")
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
</body>
</html>

<?php 

		$email = $_SESSION['user']['cust_email'];
			if(isset($_FILES['image']['name']))
			{
				$imageName = mysqli_real_escape_string($conn,$_FILES['image']['name']);
				$imageData = addslashes(file_get_contents($_FILES['image']['tmp_name']));
				$query = "UPDATE customer SET cust_profpic='$imageData' WHERE cust_email = '$email'";
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
					header("Refresh:1.5 ; URL=//localhost/Prototype/Login/profile.php");
				}
			}
	  include('changepassword.php');
	  include ("editprofile.php");
	  
?>
<?php 
	if(isset($_GET['aid']) && $_GET['status']!=''){
		$aid = $_GET['aid'];
		$status1= $_GET['status'];
		
		$appinfo = mysqli_query($conn,"SELECT * FROM appointment WHERE appointment_id = '$aid'");
		while($row = mysqli_fetch_assoc($appinfo))
		{

			$cid = $row['cust_id'];
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
		}
		if($status1 == 'Cancelled')
		{
			$getcustinfo = mysqli_query($conn,"SELECT * FROM customer WHERE cust_id = '$cid'");
			while($row = mysqli_fetch_assoc($getcustinfo))
			{
				$custemail = $row['cust_email'];

				$fullname =$_SESSION['hairdresser_username'];
				$custname = $row['cust_firstname']." ".$row['cust_lastname']; 
				
			}
				$template = file_get_contents("cancelappointmenttemplate.php");
				$template = str_replace('{{cust_fullname}}',$custname,$template);
				$template = str_replace('{{hairdressername}}',$fullname,$template);
				$template = str_replace('{{appointment_date}}',$adate,$template);
				$template = str_replace('{{appointment_starttime}}',$timetotime,$template);
				ini_set('sendmail_from', 'cukang98@gmail.com');
				$to = $custemail;
				$subject = "AerySalon - Appointment Cancelled By Customer";
				$message = $template;
				$headers =  'MIME-Version: 1.0' . "\r\n"; 
				$headers .= 'From: AerySalon <cukang98@gmail.com>' . "\r\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
				mail($to, $subject, $message, $headers);
		$updatedate = date('Y-m-d h:i:sa');
		$update = mysqli_query($conn,"UPDATE appointment SET status = '$status1', update_date='$updatedate',removed_by_self='1' WHERE appointment_id = '$aid'");
		if($update)
		{
			echo"<script>
			Swal.fire ({
			html: '<b>Appointment Update Successfully!</b>',
			type: 'success'
			});
			</script>";
			header("Refresh:1 ; URL=//localhost/Prototype/Login/profile.php");
		}
		}
	}
	
	
?>