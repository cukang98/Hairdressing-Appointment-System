<!DOCTYPE html>
<html>
<?php include("dataconnection.php"); ?>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>AerySalon - Hairdressers List</title>
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
	$(document).ready( function () {
    $('#dataTable').DataTable();
} );
		</script>
	</head>

	<body>
	<?php include("is_login-hairdresser.php"); ?>
		<?php include("topsidebar-hairdresser.php");?>
			<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
				<div class="row">
					<ol class="breadcrumb">
						<li>
							<a href="#"> <em class="fa fa-home"></em> </a>
						</li>
						<li class="active"> Customer List</li>
					</ol>
				</div>
				<div class="row">
				<h1 class="page-header mb-3" align="center">
				<img src="hairdresser.png" class="titleimage"> Customer List
				</h1> 
				</div>
				<hr class="mt-1">
				<!--/.row-->

				<div class="col-lg-12 col-xs-12 mb-5">
					<table id="dataTable"  class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>ID</th>
								<th>Name</th>
								<th>Email</th>
								<th>Contact Number</th>
								<th>Register Date</th>
								<th>Account Status</th>
								<th>Action</th>
							</tr>
							</thead>
							<tbody>
								<?php
								$hid = $_SESSION['hairdresser_id'];
								$query = "SELECT * FROM appointment WHERE hairdresser_id = '$hid' GROUP BY cust_id";
								$customer = mysqli_query($conn,$query);
								if($customer)
								{
									$data = mysqli_num_rows($customer);
									if($data != 0)
									{
										$i=0;
										while($row = mysqli_fetch_assoc($customer))
										{
											$id = $row['cust_id'];
											$c = mysqli_query($conn,"SELECT * FROM customer WHERE cust_id = '$id'");
											while($row = mysqli_fetch_assoc($c))
											{
												$i++;
												echo'
												<tr>
												<td>'.$i.'</td>
												<td>'.$row['cust_firstname'].' '.$row['cust_lastname'].'</td>
												<td>'.$row['cust_email'].'</td>
												<td>'.$row['cust_contactnum'].'</td>
												<td>'.$row['register_date'].'</td>';
												if($row['is_activated'] =='1')
													echo '<td style="color:#62c938">Verified</td>';
												else
													echo '<td style="color:red">Unverified</td>';
												echo'
												<td><a href=\'//localhost/Prototype/admin/viewcustomerprofile-hairdresser.php?custid='.$row["cust_id"].'\' title="View Profile"><img src="view.png" width="18px" style="margin-top:1px"></img></a> 
												
												</td>
												</tr>';
												
											}
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
			</div>
	</body>
    <script src="js/chart.min.js"></script>
    <script src="js/chart-data.js"></script>
    <script src="js/easypiechart.js"></script>
    <script src="js/easypiechart-data.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/custom.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script>
	document.getElementById("servicetab").classList.remove("active");
	document.getElementById("hairdressertab").classList.remove("active");
	document.getElementById("customerlist").classList.add("active");

	</script>

</html>
<?php 
	
	if(isset($_GET['reset']))
	{
		header("Location: ".$_SERVER['PHP_SELF']);
	}

?>
<?php 
	if(isset($_GET['removeid']) && $_GET['removeid']!=''){
		$id = $_GET['removeid'];
		$remove = mysqli_query($conn,"UPDATE hairdresser SET is_removed = '1' WHERE hairdresser_id = '$id'");
		if($remove)
		{
			echo"<script>
			Swal.fire ({
			html: '<b>Removed Successfully!</b>',
			type: 'success'
			});
			</script>";
			header("Refresh:1 ; URL=//localhost/Prototype/admin/hairdresserlist.php");
		}
	}
?>
