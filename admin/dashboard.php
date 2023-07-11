<!DOCTYPE html>
<html>
<?php include("dataconnection.php"); ?>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>AerySalon - Admin Dashboard</title>
		<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
        <script src="http://code.jquery.com/jquery-1.11.1.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
		<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
		<link href="css/bootstrap.css" rel="stylesheet">
		
		<link href="css/font-awesome.min.css" rel="stylesheet">
		<link href="css/styles.css" rel="stylesheet">
		<link href="css/styles-d.css" rel="stylesheet">
		
		<link href="css/awesome-bootstrap-checkbox.css" rel="stylesheet">
		<!--Custom Font-->
		<link href="css/main.css" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
	    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css" rel="stylesheet">
		
		<style>
		#container3 {
	min-width: 310px;
	max-width: 100%;
	height: 400px;
	margin: 0 auto
}
		</style>
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
		<?php include("is_login.php"); ?>
		<?php include("topsidebar.php");?>
		
			<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
				<div class="row">
					<ol class="breadcrumb">
						<li>
							<a href="#"> <em class="fa fa-home"></em> </a>
						</li>
						<li class="active">Admin Dashboard</li>
					</ol>
				</div>
		<div class="panel panel-container">
			<div class="row">
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-teal panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-calendar color-blue"></em>
							<div class="large">
							<?php
								$result = mysqli_query($conn,"SELECT * FROM appointment");
								if($result)
									echo mysqli_num_rows($result);
							?>
							</div>
							<div class="text-muted">Total Appointment</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-blue panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-calendar-check-o  color-orange"></em>
							<div class="large">
							<?php
								$result = mysqli_query($conn,"SELECT * FROM appointment WHERE status='Completed'");
								if($result)
									echo mysqli_num_rows($result);
							?>
							</div>
							<div class="text-muted">Appointment Completed</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-orange panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-users color-teal"></em>
							<div class="large">
							<?php
								$result = mysqli_query($conn,"SELECT * FROM customer");
								if($result)
									echo mysqli_num_rows($result);
							?>
							</div>
							<div class="text-muted">Customer Registered</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-red panel-widget ">
						<div class="row no-padding"><em class="fa fa-xl  fa-users color-red"></em>
							<div class="large">
							<?php
								$result = mysqli_query($conn,"SELECT * FROM hairdresser WHERE is_removed='0' AND is_admin = '0'");
								if($result)
									echo mysqli_num_rows($result);
							?>
							</div>
							<div class="text-muted">Hairdresser</div>
						</div>
					</div>
				</div>
			</div><!--/.row-->
		</div>
			<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Site Traffic Overview
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div id="container3"></div>
				</div>
			</div>
		</div><!--/.row-->


	</body>
	<script src="js/bootstrap.min.js"></script>
	<script>
	document.getElementById("servicetab").classList.remove("active");
	document.getElementById("hairdressertab").classList.remove("active");
	document.getElementById("customerlist").classList.remove("active");
	document.getElementById("dashboardtab").classList.add("active");

	</script>
		
    <script src="js/chart.min.js"></script>
    <script src="js/chart-data.js"></script>
    <script src="js/easypiechart.js"></script>
    <script src="js/easypiechart-data.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/custom.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script>
		window.onload = function () {
	var chart1 = document.getElementById("line-chart").getContext("2d");
	window.myLine = new Chart(chart1).Line(lineChartData, {
	responsive: true,
	scaleLineColor: "rgba(0,0,0,.2)",
	scaleGridLineColor: "rgba(0,0,0,.05)",
	scaleFontColor: "#c5c7cc"
	});
};
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
		<script>
Highcharts.chart('container3', {
  chart: {
    type: 'line'
  },
  title: {
    text: ' '
  },
  xAxis: {
    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
  },
  yAxis: {
    title: {
      text: 'Total Appointment Completed'
    }
  },
  plotOptions: {
    line: {
      dataLabels: {
        enabled: true
      },
      enableMouseTracking: true
    }
  },
  series: [
  <?php 
  $result = mysqli_query($conn,"SELECT * FROM hairdresser WHERE is_removed ='0' AND is_admin = '0'");
  while($row = mysqli_fetch_assoc($result))
  {
	  $name = $row['hairdresser_firstname']." ".$row['hairdresser_lastname'];
	  $id = $row['hairdresser_id'];
	  echo '{name : "'.$name.'", data : [';
	  $month1 = mysqli_query($conn,"SELECT count(*) AS num FROM appointment WHERE status ='Completed' AND MONTH(date_appointment) = '1' AND hairdresser_id ='$id'");
	  while($month1count = mysqli_fetch_assoc($month1))
	  {
		  echo $month1count['num'].',';
	  }
	  $month2 = mysqli_query($conn,"SELECT count(*) AS num FROM appointment WHERE status ='Completed' AND MONTH(date_appointment) = '2' AND hairdresser_id ='$id'");
	  while($month2count = mysqli_fetch_assoc($month2))
	  {
		  echo $month2count['num'].',';
	  }
	  $month3 = mysqli_query($conn,"SELECT count(*) AS num FROM appointment WHERE status ='Completed' AND MONTH(date_appointment) = '3' AND hairdresser_id ='$id'");
	  while($month3count = mysqli_fetch_assoc($month3))
	  {
		  echo $month3count['num'].',';
	  }
	  $month4 = mysqli_query($conn,"SELECT count(*) AS num FROM appointment WHERE status ='Completed' AND MONTH(date_appointment) = '4' AND hairdresser_id ='$id'");
	  while($month4count = mysqli_fetch_assoc($month4))
	  {
		  echo $month4count['num'].',';
	  }
	  $month5 = mysqli_query($conn,"SELECT count(*) AS num FROM appointment WHERE status ='Completed' AND MONTH(date_appointment) = '5' AND hairdresser_id ='$id'");
	  while($month5count = mysqli_fetch_assoc($month5))
	  {
		  echo $month5count['num'].',';
	  }
	  $month6 = mysqli_query($conn,"SELECT count(*) AS num FROM appointment WHERE status ='Completed' AND MONTH(date_appointment) = '6' AND hairdresser_id ='$id'");
	  while($month6count = mysqli_fetch_assoc($month6))
	  {
		  echo $month6count['num'].',';
	  }
	  $month7 = mysqli_query($conn,"SELECT count(*) AS num FROM appointment WHERE status ='Completed' AND MONTH(date_appointment) = '7' AND hairdresser_id ='$id'");
	  while($month7count = mysqli_fetch_assoc($month7))
	  {
		  echo $month7count['num'].',';
	  }
	  $month8 = mysqli_query($conn,"SELECT count(*) AS num FROM appointment WHERE status ='Completed' AND MONTH(date_appointment) = '8' AND hairdresser_id ='$id'");
	  while($month8count = mysqli_fetch_assoc($month8))
	  {
		  echo $month8count['num'].',';
	  }
	  $month9 = mysqli_query($conn,"SELECT count(*) AS num FROM appointment WHERE status ='Completed' AND MONTH(date_appointment) = '9' AND hairdresser_id ='$id'");
	  while($month9count = mysqli_fetch_assoc($month9))
	  {
		  echo $month9count['num'].',';
	  }
	  $month10 = mysqli_query($conn,"SELECT count(*) AS num FROM appointment WHERE status ='Completed' AND MONTH(date_appointment) = '10' AND hairdresser_id ='$id'");
	  while($month10count = mysqli_fetch_assoc($month10))
	  {
		  echo $month10count['num'].',';
	  }
	  $month11 = mysqli_query($conn,"SELECT count(*) AS num FROM appointment WHERE status ='Completed' AND MONTH(date_appointment) = '11' AND hairdresser_id ='$id'");
	  while($month11count = mysqli_fetch_assoc($month11))
	  {
		  echo $month11count['num'].',';
	  }$month12 = mysqli_query($conn,"SELECT count(*) AS num FROM appointment WHERE status ='Completed' AND MONTH(date_appointment) = '12' AND hairdresser_id ='$id'");
	  while($month12count = mysqli_fetch_assoc($month12))
	  {
		  echo $month12count['num'];
	  }
	  echo']},';
	  
	  
	  
  }
  ?>

  ]
});
</script>