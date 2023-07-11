<!DOCTYPE html>
<?php include("dataconnection.php"); ?>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>AerySalon - Add New Position</title>
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
                        <li class="active">Add New Position</li>
                    </ol>
                </div>
                <div class="row">
				<h1 class="page-header mb-3" align="center">
				<img src="hairdresser.png" class="titleimage"> Add New Position
				</h1> 
				</div>
                <hr class="mt-1">
                <!--/.row-->

				<div class="col-lg-9 col-xs-12 mb-5">
					<table id="dataTable" class="table table-striped table-bordered">
						<thead>
							<tr class="row100 head">
								<th class="cell100 column1">No.</th>
								<th class="cell100 column3">Name</th>
								<th class="cell100 column3">Position Service Charge</th>
								<th class="cell100 column6">Action</th>
							</tr>
						</thead>
						<tbody>
								<?php
								$result = mysqli_query($conn,"SELECT * FROM position WHERE is_removed !='1'");
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
											<tr class="row100 body">
											<td class="cell100 column1">'.$i.'</td>
											<td class="cell100 column3">'.$row['position_name'].'</td>
											<td class="cell100 column3"> RM'.$row['position_charge'].'</td>
											<td class="celll00 column6"><a href=\'//localhost/Prototype/admin/viewhairdresserprofile.php?hairdresserid='.$row["position_name"].'\' data-toggle="modal" data-target="#edit'.$row['position_id'].'" title="Edit Hairdresser Position"><img src="edit.png" width="18px" style="margin-top:1px"></img></a> / 
											<a class="confirmremove" style="cursor:pointer" value="'.$row['position_id'].'" title="Remove"><img src="remove.png" width="18px" style="margin-top:1px"></img></a>
											</td>
											</tr>';
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
							?> 
							</tbody>
							</table>
						</div>
			<div class="panel panel-primary col-lg-3 col-sm-3 col-xs-12 pl-0 pr-0">
				<div class="panel-heading" >
				<span class="glyphicon glyphicon-object-align-bottom pr-3"></span>
				Add New Position
				</div>
				<div class="panel-body" id="positionform">
				<form method="get" name="addnewpositionform" >
                   <label class="col-md-12  col-sm-3 col-xs-12 control-label">Position Name</label>
                      <div class="col-md-12 col-sm-9 col-xs-12">
                         <input type="text" name="position_name" class="form-control" placeholder="Position Name" onchange="validatePositionName()" id="positionname" value="<?php echo isset($_GET["position_name"])?$_GET["position_name"]:""; ?>" onkeyup="capitalize(this);">
                        <div id="positionname-validation" class="validation-hint"></div>
                        <img class="tick" id="positionnametick" src="tick.png" width="25px" height="20px">
                      </div>
                   <label class="col-md-12  col-sm-3 col-xs-12 control-label">Position Service Charge(RM)</label>
                      <div class="col-md-12 col-sm-9 col-xs-12">
                         <input type="text" name="position_servicecharge" class="form-control" placeholder="Position Service Charge" onkeyup="validateServiceCharge()" id="positionservicecharge" value="<?php echo isset($_GET["position_servicecharge"])?$_GET["position_servicecharge"]:""; ?>">
                        <div id="positionservicecharge-validation" class="validation-hint"></div>
                        <img class="tick" id="positionservicechargetick" src="tick.png" width="25px" height="20px">
                      </div>
                    <div class="col-md-12 col-sm-9 col-xs-12 pt-3">
                           <button type="reset" class="btn btn-default" name="reset">Reset</button>
                           <input class="btn btn-primary" type="submit" name="submitnewposition" value="Submit">
					</div>
               
				</form>
				</div>
			</div>
			</div>
			

    
      <!-- Modal content-->
							  <?php
							  $result = mysqli_query($conn,"SELECT * FROM position WHERE is_removed ='0'");
								if($result)
								{
									$data = mysqli_num_rows($result);
									if($data != 0)
									{
										while($row = mysqli_fetch_assoc($result))
										{
											echo'
											  <div class="modal fade" id="edit'.$row['position_id'].'" tabindex="-1" role="dialog" aria-labelledby="ModalLabel'.$row['position_id'].'" aria-hidden="true">'.
										  '<div class="modal-dialog" role="document">'.
											'<div class="modal-content-1">'.
											  '<div class="modal-header">'.
												'<h5 class="modal-title" id="ModalLabel'.$row['position_id'].'">Edit Hairdresser Position</h5>'.
												'<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position:absolute;top:20px;right:20px;">'.
												  '<span aria-hidden="true">&times;</span>'.
												'</button>'.
											  '</div>'.
											  '<div class="modal-body">'.
												'<form name="updatepositionform" method="get">'.
													'<input type="hidden" class="form-control" name="update_position_id" value="'.$row['position_id'].'" >'.
												  '<div class="form-group">'.
													'<label for="recipient-name" class="col-form-label">Position Name</label>'.
													'<input type="text" class="form-control" onkeyup="capitalize(this)" name="new_position_name" value="'.$row['position_name'].'">'.
												  '</div>'.
												  '<div class="form-group">'.
													'<label for="recipient-name" class="col-form-label">Position Service Charge</label>'.
													'<input type="text" class="form-control" name="new_position_service_charge" value="'.$row['position_charge'].'">'.
												  '</div>'.
											  '</div>'.
											 ' <div class="modal-footer">'.
												'<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>'.
												'<input type="submit" class="btn btn-primary" name="updateposition" value="Submit">'.
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
	document.getElementById("servicetab").classList.remove("active");
	document.getElementById("hairdressertab").classList.add("active");
	document.getElementById("customerlist").classList.remove("active");
	document.getElementById("addnewposition").classList.remove("active");
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
	if(isset($_GET['submitnewposition'])){
		if(isset($_GET['position_servicecharge']) && isset($_GET['position_name']) && ($_GET['position_servicecharge'])!='' && ($_GET['position_name'])!='')
		{
			$positionname = $_GET['position_name'];
			$positioncharge = $_GET['position_servicecharge'];
			$duplicatename = mysqli_query($conn,"SELECT * FROM position WHERE position_name = '$positionname' AND is_removed = '0'");
			if($duplicatename)
			{
				if($positioncharge >=0)
				{
					if(mysqli_num_rows($duplicatename) == 0)
					{
						$insertname = mysqli_query($conn,"INSERT INTO position (position_name) VALUES ('$positionname')");
						$positionid = mysqli_query($conn,"SELECT * FROM position WHERE position_name = '$positionname'");
						while($row = mysqli_fetch_assoc($positionid))
						{
							$id=$row['position_id'];
							if($positioncharge == 0)
							$insertcharge = mysqli_query($conn,"INSERT INTO service_position_charge (position_charge,position_id) VALUES ('$positioncharge','$id')");
						}
								echo"
								<script>
								Swal.fire ({
								html: '<b>Position Added Successfully!</b>',
								type: 'success'
								});
								</script>";
								header("Refresh:1.5;url= ".$_SERVER['PHP_SELF']);
							
						
					}
					else{
						echo"
					<script>
					Swal.fire ({
					html: '<b>Hairdresser position name already exists!</b>',
					type: 'warning'
					});
					</script>";
					}
				}
				else{
					echo"
					<script>
					Swal.fire ({
					html: '<b>Position charge ca or negative value!</b>',
					type: 'warning'
					});
					</script>";
				}
				
			}
		}
		else{
			echo"
				<script>
				Swal.fire ({
				html: '<b>Please fill up all information</b>',
				type: 'warning'
				});
				</script>";
		}
	}
	?>
	<?php 
	if(isset($_GET['updateposition']))
	{
		if(!empty($_GET['new_position_name']) && !empty($_GET['new_position_service_charge']))
		{
			$id = $_GET['update_position_id'];
			$newname = $_GET['new_position_name'];
			$newcharge = $_GET['new_position_service_charge'];
			$dupnewname = mysqli_query($conn,"SELECT * FROM position WHERE position_name = '$newname' AND is_removed='0'");
			$dup = false;
			while($row = mysqli_fetch_assoc($dupnewname))
			{
				if($row['position_id'] != $id)
					$dup = true;
				else
					$dup = false;
			}
			if(!$dup)
			{
				if(is_numeric($newcharge))
				{
					$update = mysqli_query($conn,"UPDATE position SET position_name = '$newname', position_charge = '$newcharge' WHERE position_id = '$id'");
					if ($update)
					{
						echo"
						<script>
						Swal.fire ({
						html: '<b>Position update successfully!</b>',
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
					html: '<b>Please enter number only for position charge!</b>',
					type: 'warning'
					});
					</script>";
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
	if(isset($_GET['removeid']) && $_GET['removeid']!=''){
		$id = $_GET['removeid'];
		$remove = mysqli_query($conn,"UPDATE position SET is_removed = '1' WHERE position_id = '$id'");
		if($remove)
		{
			echo"<script>
			Swal.fire ({
			html: '<b>Removed Successfully!</b>',
			type: 'success'
			});
			</script>";
			header("Refresh:1 ; URL=//localhost/Prototype/admin/addnewposition.php");
		}
	}
	?>
