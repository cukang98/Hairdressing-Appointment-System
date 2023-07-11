y7<!DOCTYPE html>
<html>
<?php 
include("dataconnection.php"); 
 ?>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>AerySalon - Service List</title>
        <script src="http://code.jquery.com/jquery-1.11.1.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
		<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
		
		<script src="js/duration-picker.min.js"></script>
		<script src="js/duration-picker.js"></script>
		<script src="js/validation.js"></script>
		<script src="js/jquery.custom-file-input.js"></script>
		<script src="js/custom-file-input.js"></script>
        <link href="css/duration-picker.css" rel="stylesheet">
		<link href="css/bootstrap.css" rel="stylesheet">

		<link href="css/font-awesome.min.css" rel="stylesheet">
		<link href="css/styles.css" rel="stylesheet">
		<link href="css/awesome-bootstrap-checkbox.css" rel="stylesheet">
		<script src="js/validation.js"></script>
		<!--Custom Font-->
		<link href="css/main.css" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
	    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css" rel="stylesheet">
		<script src="https://cdn.ckeditor.com/ckeditor5/12.3.1/classic/ckeditor.js"></script>
		<!-- FOR check box -->
		<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
		<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
		 
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
		$(document).ready(function(){
			
			$('.removeimage').on('click',function(){
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
					window.location = window.location.href+"?removeimageid="+$(this).attr('value');
				  }
				})
		})
		});

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
						<li class="active"> Service List</li>
					</ol>
				</div>
				<div class="row">
				<h1 class="page-header mb-3" align="center">
				<img src="hairdresser.png" class="titleimage"> Service List
				</h1> 
				</div>
				<hr class="mt-1">
				<!--/.row-->
			
				<div class="col-lg-12 col-xs-12 mb-5">
							<table id="dataTable" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th class="cell100 column1">No.</th>
										<th class="cell100 column3">Service Type</th>
										<th class="cell100 column3">Service Name</th>
										<th class="cell100 column3">Estimate Duration</th>
										<th class="cell100 column3">Estimate Fee</th>
										<th class="cell100 column3">Position Service Charge</th>
										<th class="cell100 column6">Action</th>
									</tr>
								</thead>
								<tbody>
								<?php
								$query = "SELECT service.* , service_type.service_type_name FROM service INNER JOIN service_type ON service.service_type_id = service_type.service_type_id WHERE service.is_removed !='1'";
								$hairdresser = mysqli_query($conn,$query);
								if($hairdresser)
								{
									$data = mysqli_num_rows($hairdresser);
									if($data != 0)
									{
										$z=0;
										while($row = mysqli_fetch_assoc($hairdresser))
										{
											$z++;
											$duration = $row['service_estimateduration'];
											$hour = 0;
											while($duration>=60)
											{
												$hour=1 + $hour;
												$duration = $duration - 60;

											}
											echo'
											<tr class="row100 body">
											<td class="cell100 column1">'.$z.'</td>
											<td class="cell100 column3">'.$row['service_type_name'].'</td>
											<td class="cell100 column3">'.$row['service_name'].'</td>';
											if($hour>0)
												echo'<td class="cell100 column3">'.$hour.' Hour '.$duration.' Minute</td>';
											else
												echo'<td class="cell100 column3">'.$duration.' Minute</td>';
											echo '<td class="cell100 column3">'.$row['service_estimatefee'].'</td>';
											if ($row['service_position_charge']=='1')
												echo '<td class="cell100 column3">Yes</td>';
											else
												echo '<td class="cell100 column3">No</td>';
											echo'
											<td class="celll00 column6"><a href="#" data-toggle="modal" data-target="#edit'.$row['service_id'].'" title="Service Details"><img src="view.png"  width="18px" style="margin-top:1px"></img></a> / 
											<a href="#" data-toggle="modal" data-target="#editimage'.$row['service_id'].'" title="Service Image"><img src="viewimage.png" width="18px" style="margin-top:1px"></img></a> / 
											<a class="confirmremove" value="'.$row['service_id'].'" title="Remove"><img src="remove.png" width="18px" style="margin-top:1px"></img></a> 
											</td></tr>';
										}
									}
									
								}
								else {
										echo'
										<tr class="row100 body">
										<td class="cell100 column1">Empty Result</td>
										</tr>
										';
									}
							?> 
							</tbody>
								
							</table>
					</div>
				</div>
							<?php
							  $result = mysqli_query($conn,"SELECT service.*,service_type.service_type_name FROM service INNER JOIN service_type ON service.service_type_id = service_type.service_type_id WHERE service.is_removed ='0'");
								if($result)
								{
									$data = mysqli_num_rows($result);
									if($data != 0)
									{
										while($row = mysqli_fetch_assoc($result))
										{
											echo'
										<div class="modal fade" id="edit'.$row['service_id'].'" tabindex="-1" role="dialog" aria-labelledby="ModalLabel'.$row['service_id'].'" aria-hidden="true">'.
										  '<div class="modal-dialog" role="document">'.
											'<div class="modal-content-1">'.
											  '<div class="modal-header">'.
												'<h5 class="modal-title" id="ModalLabel'.$row['service_id'].'">Edit Service</h5>'.
												'<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position:absolute;top:20px;right:20px;">'.
												  '<span aria-hidden="true">&times;</span>'.
												'</button>'.
											  '</div>'.
											  '<div class="modal-body">'.
												'<form name="updateserviceform" method="get">'.
												  
												  '<div class="form-group">'.
													'<label for="recipient-name" class="col-form-label">Service Type</label>'.
													'<select class="form-control" onkeyup="capitalize(this)" name="new_service_type" value="'.$row['service_type_name'].'">';
														$alltype = mysqli_query($conn,"SELECT * FROM service_type WHERE is_removed ='0'");
														while($rowservicetype = mysqli_fetch_assoc($alltype))
														{
															echo'<option value="'.$rowservicetype['service_type_id'].'"';
															if($row['service_type_id'] == $rowservicetype['service_type_id'])
																echo 'selected';
															echo'>'.$rowservicetype['service_type_name'].'</option>';
														}
													echo'</select>'.
												  '</div>'.
												  '<div class="form-group">'.
													'<label for="recipient-name" class="col-form-label">Service Name</label>'.
													'<input type="text" class="form-control" name="new_service_name" value="'.$row['service_name'].'">'.
												  '</div>'.
												  '<div class="form-group row">'.
												  '<div class="col-lg-12">'.
													'<label for="recipient-name" class="col-form-label">Service Estimate Duration</label>'.
													'<input type="text" class="form-control" id="duration'.$row['service_id'].'" name="new_estimateduration" value="0">'.
													'</div>'.
												  '</div>'.
												  '<div class="form-group">'.
													'<label for="recipient-name" class="col-form-label">Service Estimate Fee</label>'.
													'<input type="text" class="form-control" name="new_estimatefee" onkeyup="validateEstimateFee(this)" value="'.$row['service_estimatefee'].'">'.
													'<div id="service_estimate_fee-validation" class="validation-hint"></div>
													<img class="tick" id="service_estimate_feetick" src="tick.png" width="25px" height="20px">'.
												  '</div>'.
												  '<div class="form-group pb-0">'.
													'<label for="recipient-name" class="col-form-label">Position Charge</label>'.
													'<p>'.
													'<input type="checkbox" name="newpositioncharge" data-toggle="toggle"class="onoffswitch-checkbox" data-on="Yes" data-off="No"';
													if($row['service_position_charge']=='1')
														echo 'checked';
														
													echo'>'.
													'</p>'.
												'</div>'.
												  '<div class="form-group">'.
													'<label for="recipient-name" class="col-form-label">Service Description</label>'.
													'<textarea name="newdescription" id="'.str_replace(' ', '', $row['service_name']).'_description" rows="10" cols="80">'.
													$row['service_description'].
													'</textarea>'.
												  '</div>'.
											 ' <div class="modal-footer">'.
												'<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>'.
												'<input type="submit" class="btn btn-primary" name="updateservice" value="Submit">'.
											 '</div>'.
											 '</form>'.
											'</div>'.
										  '</div>'.
										'</div>
										</div></div>';
										$duration = $row['service_estimateduration'];
										$hour = 0;
											while($duration>=60)
											{
												$hour=1 + $hour;
												$duration = $duration - 60;

											}
										echo '<script>
											var values = {hours:'.$hour.', minutes:'.$duration.'};
										// Change this to use options
										$("#duration'.$row['service_id'].'").durationPicker({
										  hours: {
											label: "Hour",
											min: 0,
											max: 24,
											value: 10
										  },
										  minutes: {
											label: "Minute",
											min: 0,
											max: 60
										  },
										  classname: "form-control",
										  responsive: true
										}).setvalues(values);
										ClassicEditor
										 .create( document.querySelector( "#'.str_replace(' ', '', $row['service_name']).'_description" ) )
										 .then( editor => {
											   console.log( editor );
										  } )
										  .catch( error => {
											   console.error( error );
										  } );
										</script>';
										$id = $row['service_id'];
										$getimage = mysqli_query($conn,"SELECT * FROM service_image WHERE service_id = '$id'");
										echo'<div class="modal fade" id="editimage'.$row['service_id'].'" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel'.$row['service_id'].'" aria-hidden="true">
											  <div class="modal-dialog" role="document">
												<div class="modal-content">
												  <div class="modal-header">
													<h5 class="modal-title" id="imageModalLabel'.$row['service_id'].'">Service Image - '.$row['service_name'].'</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position:absolute;top:20px;right:20px;">
													  <span aria-hidden="true">&times;</span>
													</button>
												  </div>
												  <div class="modal-body">
												  <div id="'.$row['service_id'].'images" class="carousel slide" data-ride="carousel">
												  	
													  <!-- Indicators -->
													  <ol class="carousel-indicators">';
													  $a=0;
													   while(mysqli_num_rows($getimage) > $a)
													   {
														   if($a==0)
														   {
															   echo '<li data-target="#'.$row['service_id'].'images"  data-slide-to="'.$a.'" class="active"></li>';
														   }
														   else{
															   echo'<li data-target="#'.$row['service_id'].'images"  data-slide-to="'.$a.'"></li>';
														   }
														   $a++;
													   }
													   echo'
													  </ol>

													  <!-- Wrapper for slides -->
													  <div class="carousel-inner" role="listbox">';
													  $i=0;
													  while($imagerow = mysqli_fetch_assoc($getimage))
													  {
														  
														  if($i==0)
														  {
															  echo '
														<div class="item active hoverimage">
														  <img src="data:image/jpeg;base64,'.base64_encode($imagerow['image']).'" alt="..." style="width:100%;height:auto" class="image">
														  <div class="middle">
														  <form id="uploadform'.$imagerow['service_image_id'].'" method="post" enctype="multipart/form-data">
															<div class="change" style="cursor:pointer" onclick="chooseimage('.$imagerow['service_image_id'].')">Change Image</div>
															<input type="file" style="display:none" multiple name="updateimage"  accept="image/*" id="updateimage'.$imagerow['service_image_id'].'"  onchange="submit('.$imagerow['service_image_id'].')"/>
															<input type="hidden" name="imageid" value="'.$imagerow['service_image_id'].'" />
															<div class="remove mt-3 removeimage" style="cursor:pointer" value="'.$imagerow['service_image_id'].'">Remove</div>
															</form>
														  </div>
														</div>';
														$i++;
														  }
														  else{
															  echo '
														<div class="item hoverimage">
														  <img src="data:image/jpeg;base64,'.base64_encode($imagerow['image']).'" alt="..." style="width:100%;height:auto" class="image">
														  <div class="middle">
														  <form id="uploadform'.$imagerow['service_image_id'].'" method="post" enctype="multipart/form-data">
															<div class="change" style="cursor:pointer" onclick="chooseimage('.$imagerow['service_image_id'].')">Change Image</div>
															<input type="file" style="display:none" multiple name="updateimage"  accept="image/*" id="updateimage'.$imagerow['service_image_id'].'" onchange="submit('.$imagerow['service_image_id'].')"/>
															<input type="hidden" name="imageid" value="'.$imagerow['service_image_id'].'" />
															<div class="remove mt-3 removeimage" style="cursor:pointer" value="'.$imagerow['service_image_id'].'">Remove</div>
															</form>
														  </div>
														</div>';
														  }
														 
													  }
														
														echo'
													  </div>

													  <!-- Controls -->
													  <a class="left carousel-control" href="#'.$row['service_id'].'images"  role="button" data-slide="prev">
														<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
														<span class="sr-only">Previous</span>
													  </a>
													  <a class="right carousel-control" href="#'.$row['service_id'].'images"  role="button" data-slide="next">
														<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
														<span class="sr-only">Next</span>
													  </a>';
												  
													echo'
												  </div>
												  <div class="modal-footer mt-3">
												 
													<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
													<button type="button" class="btn btn-primary">Save changes</button>
													<button type="button" class="btn btn-primary addbutton" style="float:left"  id="'.$row['service_id'].'">Add New Image</button>
													<form name="addimage" id="addform'.$row['service_id'].'"  method="post" enctype="multipart/form-data">
														<input type="file" style="display:none" name="addimage[]" id="addimage'.$row['service_id'].'" multiple onchange="submitaddform('.$row['service_id'].')"  accept="image/*"/>
														<input type="hidden" name="serviceid" value="'.$row['service_id'].'" />
													</form>
												  </div>
												</div>
											  </div>
											</div></div>';
										}
									}
								}
								?>

	</body>
	<script>
	document.getElementById("servicetab").classList.add("active");
	document.getElementById("hairdressertab").classList.remove("active");
	document.getElementById("customerlist").classList.remove("active");
	$(document).ready( function () {
    $('#dataTable').DataTable();
	} );
	$('.addbutton').on('click', function () {
		var fullid = '#addimage'+$(this).attr('id');
		$(fullid).trigger('click');
	} );
	function chooseimage(id)
	{
		var fullid = '#updateimage'+id;
		$(fullid).trigger('click');
	}
	function submit(a) {
    document.getElementById("uploadform"+a).submit();
	};
	function submitaddform(a) {
    document.getElementById("addform"+a).submit();
	};
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
	
	if(isset($_GET['reset']))
	{
		header("Location: ".$_SERVER['PHP_SELF']);
	}

?>
<?php 
	if(isset($_GET['removeid']) && $_GET['removeid']!=''){
		$id = $_GET['removeid'];
		$remove = mysqli_query($conn,"UPDATE service SET is_removed = '1' WHERE service_id = '$id'");
		
		if($remove)
		{
			echo"<script>
			Swal.fire ({
			html: '<b>Removed Successfully!</b>',
			type: 'success'
			});
			</script>";
			header("Refresh:1 ; URL=//localhost/Prototype/admin/servicelist.php");
		}
	}
?>
<?php 
	if(isset($_GET['removeimageid']) && $_GET['removeimageid']!=''){
		$id = $_GET['removeimageid'];
		$remove = mysqli_query($conn,"DELETE FROM service_image WHERE service_image_id = '$id'");
		
		if($remove)
		{
			echo"<script>
			Swal.fire ({
			html: '<b>Removed Successfully!</b>',
			type: 'success'
			});
			</script>";
			header("Refresh:1 ; URL=//localhost/Prototype/admin/servicelist.php");
		}
	}
?>
<?php 
	if(isset($_GET['updateservice']))
	{
		$id = $_GET['update_service_id'];
		$type = $_GET['new_service_type'];
		$name = $_GET['new_service_name'];
		$duration = explode(",",$_GET['new_estimateduration']);
		$hour = (int) filter_var($duration[0], FILTER_SANITIZE_NUMBER_INT);
		$minute = (int) filter_var($duration[1], FILTER_SANITIZE_NUMBER_INT);
		$duration = ($hour*60) + $minute;
		$fee = $_GET['new_estimatefee'];
		$description = $_GET['newdescription'];
		$description = str_replace('\'', '’', $description);
		if($description=="")
				$description = "<p>No Description</p>";

		if(isset($_GET['newpositioncharge']))
		{
			$query = "UPDATE service SET service_name = '$name', service_type_id='$type', service_estimateduration = '$duration', service_estimatefee = '$fee', service_description = '$description', service_position_charge ='1' WHERE service_id = '$id'";
		}
		else{
			$query = "UPDATE service SET service_name = '$name', service_type_id='$type', service_estimateduration = '$duration', service_estimatefee = '$fee', service_description = '$description', service_position_charge ='0' WHERE service_id = '$id'";
		}
		
		$update = mysqli_query($conn,$query);
		if($update)
		{
			echo"<script>
			Swal.fire ({
			html: '<b>Service Update Successfully!</b>',
			type: 'success'
			});
			</script>";
				
			header("Refresh:1 ; URL=//localhost/Prototype/admin/servicelist.php");
		}
	}
	if(isset($_FILES['updateimage']['name']))
	{
		$imageName = mysqli_real_escape_string($conn,$_FILES['updateimage']['name']);
		$imageData = addslashes(file_get_contents($_FILES['updateimage']['tmp_name']));
		$id = $_POST['imageid'];
		$query = "UPDATE service_image SET image='$imageData' WHERE service_image_id = '$id'";
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
			header("Refresh:1.5 ; URL=//localhost/Prototype/admin/servicelist.php");
		}
	}
	if(isset($_FILES['addimage']['tmp_name']))
	{
		for($i=0;$i<count($_FILES['addimage']['tmp_name']);$i++)
		{
			$id = $_POST['serviceid'];
			$imageName = mysqli_real_escape_string($conn,$_FILES['addimage']['name'][$i]);
			$imageData = addslashes(file_get_contents($_FILES['addimage']['tmp_name'][$i]));
			$query = "INSERT INTO service_image (service_id,image)  VALUES ('$id','$imageData')";
			$update = mysqli_query($conn,$query);			 
		}
		if($update)
		{
			echo"
			<script>
			Swal.fire ({
				  html: '<b>Image Upload Successfully!</b>',
				  type: 'success'
				  });
			</script>";
			header("Refresh:1.5 ; URL=//localhost/Prototype/admin/servicelist.php");
		}
	}
?>
