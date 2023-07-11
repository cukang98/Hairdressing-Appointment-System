<!DOCTYPE html>
<html>

<?php include("dataconnection.php");  ?>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>AerySalon - Customer List</title>
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
			$('.confirmremove').on('click',function(){
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
		<?php include("is_login.php"); ?>
		<?php include("topsidebar.php");?>
			<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
				<div class="row">
					<ol class="breadcrumb">
						<li>
							<a href="#"> <em class="fa fa-home"></em> </a>
						</li>
						<li class="active"> Hairdresser List</li>
					</ol>
				</div>
				<div class="row">
				<h1 class="page-header mb-3" align="center">
				<img src="hairdresser.png" class="titleimage"> Hairdresser List
				</h1> 
				</div>
				<hr class="mt-1">
				<!--/.row-->

				<div class="col-lg-12 col-xs-12 mb-5">
					<table id="dataTable"  class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>No.</th>
								<th>Name</th>
								<th>Email</th>
								<th>Contact Number</th>
								<th>Register Date</th>
								<th>Position</th>
								<th class="cell100 column6">Action</th>
							</tr>
							</thead>
							<tbody>
								<?php
								$query = "SELECT hairdresser.*, position.position_name FROM hairdresser INNER JOIN position ON hairdresser.position_id = position.position_id WHERE hairdresser.is_admin = '0' AND hairdresser.is_removed = '0'";
								$hairdresser = mysqli_query($conn,$query);
								if($hairdresser)
								{
									$data = mysqli_num_rows($hairdresser);
									if($data != 0)
									{
										$i=1;
										while($row = mysqli_fetch_assoc($hairdresser))
										{
											echo'
											<tr>
											<td>'.$i.'</td>
											<td>'.$row['hairdresser_firstname'].' '.$row['hairdresser_lastname'].'</td>
											<td>'.$row['hairdresser_email'].'</td>
											<td>'.$row['hairdresser_contactnum'].'</td>
											<td>'.$row['join_date'].'</td>
											<td>'.$row['position_name'].'</td>
											<td class="celll00 column6"><a href=\'//localhost/Prototype/admin/viewhairdresserprofile.php?hairdresserid='.$row["hairdresser_id"].'\' title="View Profile"><img src="view.png" width="18px" style="margin-top:1px"></img></a> / 
											<a class="confirmremove" style="cursor:pointer"value="'.$row['hairdresser_id'].'" title="Remove"><img src="remove.png" width="18px"></img></a>
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
	document.getElementById("hairdressertab").classList.toggle("active");
	document.getElementById("customerlist").classList.remove("active");

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