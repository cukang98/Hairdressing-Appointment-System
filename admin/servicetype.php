<!DOCTYPE html>
<?php include("dataconnection.php"); ?>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>AerySalon - Service Type</title>
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
        <script src="js/validation.js"></script>
        <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
      <![endif]-->
        <style>
            .validation-hint {
                background-image: url("validation.png");
                background-repeat: no-repeat;
                background-size: 22px 18px;
                font-size: 10px;
                color: red;
                height: 17px;
                padding-top: 2px;
				margin-top:5px;
                padding-left: 25px;
                display: none;
            }
        </style>
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
                            <a href="#">
                                <em class="fa fa-home"></em>
                            </a>
                        </li>
                        <li class="active"> Service Type</li>
                    </ol>
                </div>
                <div class="row">
				<h1 class="page-header mb-3" align="center">
				<img src="hairdresser.png" class="titleimage"> Service Type
				</h1> 
				</div>
                <hr class="mt-1">
                <!--/.row-->
				<div class="col-lg-10 col-xs-12 mb-5">
							<table id="dataTable" class="table table-striped table-bordered">
								<thead>
									<tr class="head">
										<th class="col-lg-2">No.</th>
										<th class="col-lg-8">Service Type Name</th>
										<th class="col-lg-2">Action</th>
									</tr>
								</thead>
								<tbody>
								<?php
								$result = mysqli_query($conn,"SELECT * FROM service_type WHERE is_removed='0'");
								if($result)
								{
									$i=0;
									$data = mysqli_num_rows($result);
									if($data != 0)
									{
										while($row = mysqli_fetch_assoc($result))
										{
											$i++;
											echo'
											<tr>
											<td class=" col-lg-2">'.$i.'</td>
											<td class="  col-lg-8">'.$row['service_type_name'].'</td>
											<td class="  col-lg-2"><a data-toggle="modal" data-target="#edit'.$row['service_type_id'].'"href=\'//localhost/Prototype/admin/viewhairdresserprofile.php?hairdresserid='.$row["service_type_id"].'\' title="Edit Service Type"><img src="edit.png" width="18px" style="margin-top:1px"></img></a> / <a class="confirmremove" value="'.$row['service_type_id'].'"><img src="remove.png" width="18px" style="margin-top:1px"></img></a>
											</td>';
										}
									}
									else {
										echo'
										<tr class="row100 body">
										<td class="cell100 column1">Empty Result</td>
										</tr>
										';
									}
								}
							?> </tbody>
								
							</table>
						</div>
				<div class="panel panel-primary col-lg-2 pl-0 pr-0">
				<div class="panel-heading">Add Service Type</div>
					<div class="panel-body">
						<form method="get" name="addservicetypeform">
							<div class="form-group row">
								<label class="col-md-12  col-sm-12 col-xs-12 control-label"> Service Type Name</label>
									<div class="col-md-12 col-sm-9 col-xs-12">
										<input type="text" name="servicetypename" class="form-control" onkeyup="capitalize(this)">
										<br>
									</div>
									<div class="col-lg-12">
										<input class="btn btn-primary" name="submitform"type="submit" value="Submit">
									</div>
							</div>
						</form>
					</div>
				</div>
<!-- Modal content-->
							  <?php
							  $result = mysqli_query($conn,"SELECT * FROM service_type WHERE is_removed ='0'");
								if($result)
								{
									$data = mysqli_num_rows($result);
									if($data != 0)
									{
										while($row = mysqli_fetch_assoc($result))
										{
											echo'
											  <div class="modal fade" id="edit'.$row['service_type_id'].'" tabindex="-1" role="dialog" aria-labelledby="ModalLabel'.$row['service_type_id'].'" aria-hidden="true">'.
										  '<div class="modal-dialog" role="document">'.
											'<div class="modal-content-1">'.
											  '<div class="modal-header">'.
												'<h5 class="modal-title" id="ModalLabel'.$row['service_type_id'].'">Edit Service Type</h5>'.
												'<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position:absolute;top:20px;right:20px;">'.
												  '<span aria-hidden="true">&times;</span>'.
												'</button>'.
											  '</div>'.
											  '<div class="modal-body">'.
												'<form name="updatepositionform" method="get">'.
													'<input type="hidden" class="form-control" name="update_service_type_id" value="'.$row['service_type_id'].'" readonly>'.
												  '<div class="form-group">'.
													'<label for="recipient-name" class="col-form-label">Position Name</label>'.
													'<input type="text" class="form-control" onkeyup="capitalize(this)" name="new_service_type_name" value="'.$row['service_type_name'].'">'.
												  '</div>'.
											  '</div>'.
											 ' <div class="modal-footer">'.
												'<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>'.
												'<input type="submit" class="btn btn-primary" name="updateservicetype" value="Submit">'.
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
    <script>
	document.getElementById("servicetab").classList.add("active");
	document.getElementById("hairdressertab").classList.remove("active");
	document.getElementById("customerlist").classList.remove("active");
    </script>

    <script src="js/chart.min.js"></script>
    <script src="js/chart-data.js"></script>
    <script src="js/easypiechart.js"></script>
    <script src="js/easypiechart-data.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/custom.js"></script>
	<script src="js/bootstrap.min.js"></script>

    </html>
	<?php
		if(isset($_GET['submitform']))
		{
			if(isset($_GET['servicetypename']) && $_GET['servicetypename']!='')
			{
				
				$servtypename = $_GET['servicetypename'];
				$duptype = mysqli_query($conn,"SELECT * FROM service_type WHERE service_type_name = '$servtypename' AND is_removed ='0'");
				if($duptype)
				{
					
					if(mysqli_num_rows($duptype)>0)
					{
						echo"<script>
							Swal.fire ({
							html: '<b>Service Type Name Already Exist!</b>',
							type: 'warning'
							});
							</script>";
					}
					else{
						$insert = mysqli_query($conn,"INSERT INTO service_type (service_type_name) VALUES ('$servtypename')");
						echo"<script>
							Swal.fire ({
							html: '<b>Service Type Added Successfully!</b>',
							type: 'success'
							});
							</script>";
							header("Refresh:1; URL= ".$_SERVER['PHP_SELF']);
					}
				}
					
			}
			else{
				echo"<script>
					Swal.fire ({
					html: '<b>Please enter service type name!</b>',
					type: 'error'
					});
					</script>";
			}
		}
	?>
	<?php 
	if(isset($_GET['removeid'])){
		$removeid = $_GET['removeid'];
		$remove = mysqli_query($conn,"UPDATE service_type SET is_removed ='1' WHERE service_type_id = '$removeid'");
		if($remove)
		{
			echo"<script>
			Swal.fire ({
			html: '<b>Removed Successfully!</b>',
			type: 'success'
			});
			</script>";
			header("Refresh:1 ; URL= ".$_SERVER['PHP_SELF']);
		}
	}
	if(isset($_GET['updateservicetype']))
	{
		if(!empty($_GET['new_service_type_name']) )
		{
			$id = $_GET['update_service_type_id'];
			$newname = $_GET['new_service_type_name'];
			$dupnewname = mysqli_query($conn,"SELECT * FROM service_type WHERE service_type_name = '$newname' AND is_removed='0'");
			$dup = false;
			while($row = mysqli_fetch_assoc($dupnewname))
			{
				if($row['service_type_id'] != $id)
					$dup = true;
				else
					$dup = false;
			}
			if(!$dup)
			{
				$update = mysqli_query($conn,"UPDATE service_type SET service_type_name = '$newname' WHERE service_type_id = '$id'");
				if ($update)
				{
					echo"
					<script>
					Swal.fire ({
					html: '<b>Service type update successfully!</b>',
					type: 'success'
					});
					</script>";
					header("Refresh:1.5;url= ".$_SERVER['PHP_SELF']);
				}
			}
			else{
					echo"
					<script>
					Swal.fire ({
					html: '<b>Position name already exists!</b>',
					type: 'warning'
					});
					</script>";
			}
		}
	}
	?>
 