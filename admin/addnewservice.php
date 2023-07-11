<!DOCTYPE html>
<?php include("dataconnection.php"); ?>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>AerySalon - Add New Service</title>
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <script src="http://code.jquery.com/jquery-1.11.1.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
		<script src="js/duration-picker.min.js"></script>
		<script src="js/duration-picker.js"></script>
        <link href="css/duration-picker.css" rel="stylesheet">
		<link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/datepicker3.css" rel="stylesheet">
        <link href="css/styles.css" rel="stylesheet">
        <!--Custom Font-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
        <script src="js/validation.js"></script>
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
                        <li class="active">Add New Service</li>
                    </ol>
                </div>
                <div class="row">
				<h1 class="page-header mb-3" align="center">
				<img src="hairdresser.png" class="titleimage"> Add New Service
				</h1> 
				</div>
                <hr class="mt-1">
                <!--/.row-->
                <form name="addnewserviceform" action="" method="post"  enctype="multipart/form-data">
                    <div class="container">

                        <fieldset class="fieldset">
                            <div class="form-group row">
                                <label class="col-md-2  col-sm-3 col-xs-12 control-label">Service Type</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <select name="service_type" class="form-control" onchange="validateServiceType()" id="service_type">
                                        <?php $selectedposition = $_POST['service_type'] ? $_POST['service_type'] : 'empty'; 
												$servicetype = mysqli_query($conn,"SELECT * FROM service_type WHERE is_removed ='0'");
												if($servicetype){
													while($row = mysqli_fetch_assoc($servicetype))
													{
														echo"<option value='".$row['service_type_name']."'>".$row['service_type_name']."</option>";
													}
												}
                                            ?>
                                    </select>
									<div id="service_type-validation" class="validation-hint"></div>
                                    <img class="tick" id="service_typetick" src="tick.png" width="25px" height="20px">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2  col-sm-3 col-xs-12 control-label">Service Name</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <input type="text" name="service_name" class="form-control" placeholder="Digital Perm" onchange="validateServiceName()" id="service_name" value="<?php echo isset($_POST["service_name"])?$_POST["service_name"]:""; ?>" onkeyup="capitalize(this);">
                                    <div id="service_name-validation" class="validation-hint"></div>
                                    <img class="tick" id="service_nametick" src="tick.png" width="25px" height="20px">
                                </div>
                            </div>
							<div class="form-group row">
                                <label class="col-md-2  col-sm-3 col-xs-12 control-label">Service Image</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <input type="file" name="service_image[]" class="form-control" multiple="multiple"  accept="image/*">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2  col-sm-3 col-xs-12 control-label">Service Estimate Fee (RM)</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <input type="text" name="service_estimate_fee" class="form-control" placeholder="89" onchange="validateEstimateFee()" id="service_estimate_fee" value="<?php echo isset($_POST["service_estimate_fee"])?$_POST["service_estimate_fee"]:""; ?>">
                                    <div id="service_estimate_fee-validation" class="validation-hint"></div>
                                    <img class="tick" id="service_estimate_feetick" src="tick.png" width="25px" height="20px">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2  col-sm-3 col-xs-12 control-label">Service Estimate Duration</label>
                                <div class="col-md-3 col-sm-9 col-xs-12 mt-3">
									
                                    <input type="text" name="service_estimate_duration" class="form-control mt-3" placeholder="30" id="duration" onchange="validateEstimateDuration()" value="<?php echo isset($_POST["service_estimate_duration"])?$_POST["service_estimate_duration"]:""; ?>">
                                    <div id="service_estimate_duration-validation" class="validation-hint"></div>
                                    <img class="tick" id="service_estimate_durationtick" src="tick.png" width="25px" height="20px">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2  col-sm-3 col-xs-12 control-label">Position Charge</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <div class="onoffswitch mt-2">
										<input type="checkbox" name="position_charge" data-toggle="toggle" data-on="Yes" data-off="No">
									
									</div>
                                    <div id="contact-validation" class="validation-hint"></div>
                                    <img class="tick" id="contacttick" src="tick.png" width="25px" height="20px">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2  col-sm-3 col-xs-12 control-label">Service Description</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <textarea name="service_description" id="service_description" rows="10" cols="80">..
									</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2  col-sm-3 col-xs-12 control-label"></label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <button type="reset" class="btn btn-error" name="reset">Reset</button>
                                    <input class="btn btn-primary" type="submit" name="submitnewservice" value="Submit">
                                </div>
                            </div>
							

                    </div>
                </form>

    </body>
    <script>
	document.getElementById("servicetab").classList.add("active");
	document.getElementById("hairdressertab").classList.remove("active");
	document.getElementById("customerlist").classList.remove("active");
	var input = $("#duration");
	var button = $("#button");
	var values = {hours:2, minutes:30};
	// Change this to use options
	$("#duration").durationPicker({
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
	  classname: 'form-control',
	  responsive: true
	}).setvalues(values);
		

    </script>
       <script src="js/chart.min.js"></script>
    <script src="js/chart-data.js"></script>
    <script src="js/easypiechart.js"></script>
    <script src="js/easypiechart-data.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/custom.js"></script>
	<script src="js/bootstrap.min.js"></script>

			<script>
            ClassicEditor
                 .create( document.querySelector( '#service_description' ) )
                 .then( editor => {
                       console.log( editor );
                  } )
                  .catch( error => {
                       console.error( error );
                  } );
           </script>

    </html>
    <?php 
	if(isset($_POST['submitnewservice']))
	{
		if(!empty($_POST['service_type']) && !empty($_POST['service_name']) && !empty($_POST['service_estimate_fee']) && !empty($_POST['service_estimate_duration']))
		{
			$service_type = $_POST['service_type'];
			$service_name = $_POST['service_name'];
			$service_estimate_fee = $_POST['service_estimate_fee'];
			$service_estimate_duration = explode(",",$_POST['service_estimate_duration']);
			$hour = (int) filter_var($service_estimate_duration[0], FILTER_SANITIZE_NUMBER_INT);
			$minute = (int) filter_var($service_estimate_duration[1], FILTER_SANITIZE_NUMBER_INT);
			$service_estimate_duration = ($hour*60) + $minute;
			$service_description = $_POST['service_description'];
			$service_description = str_replace('\'', '’', $service_description);
			if($service_description=="")
				$service_description = "<p>No Description</p>";
			$getid = mysqli_query($conn,"SELECT * FROM service_type WHERE service_type_name = '$service_type'");
			$getdupname = mysqli_query($conn,"SELECT * FROM service WHERE service_name = '$service_name' AND is_removed !='1'");
			$repeat = false;
			if($getdupname)
			while($row = mysqli_fetch_assoc($getdupname))
			{
				if($row)
					$repeat = true;
				else
					$repeat = false;
			}
			if(!$repeat)
			{
				while($row = mysqli_fetch_assoc($getid))
				{
					$service_type_id = $row['service_type_id'];
				}
				if(is_numeric($service_estimate_fee) && $service_estimate_fee>0 )
				{
					if(is_numeric($service_estimate_duration) && $service_estimate_duration>0)
					{
						if(isset($_POST['position_charge']))
						{
							$ischarge = 1;
						}
						else{
							$ischarge = 0;
						}
						$insert = mysqli_query($conn,"INSERT INTO service (service_name,service_description,service_estimatefee,service_type_id,service_estimateduration,service_position_charge) VALUES ('$service_name','$service_description','$service_estimate_fee','$service_type_id','$service_estimate_duration','$ischarge')");
						if(isset($_FILES['service_image']['tmp_name']))
						{
							$idresult = mysqli_query($conn,"SELECT * FROM service WHERE service_name = '$service_name' AND  is_removed='0'");
							if($idresult)
							{
								while($row = mysqli_fetch_assoc($idresult))
								{
									$currid = $row['service_id'];
								}
							}
							for($i=0;$i<count($_FILES['service_image']['tmp_name']);$i++)
							{
								
								$imageName = mysqli_real_escape_string($conn,$_FILES['service_image']['name'][$i]);
								$imageData = addslashes(file_get_contents($_FILES['service_image']['tmp_name'][$i]));
								$query = "INSERT INTO service_image (service_id,image)  VALUES ('$currid','$imageData')";
								$insertimage = mysqli_query($conn,$query);
								 
							}
						}
						if($insert)
						{
							echo"
							<script>
							Swal.fire ({
							html: '<b>New service added succuessfully!</b>',
							type: 'success'
							});
							</script>";
							header("Refresh:1.5 ; URL=//localhost/Prototype/admin/servicelist.php");
						}
					}
					else{
						echo"
							<script>
							Swal.fire ({
							html: '<b>Please enter valid number for service estimate duration!</b>',
							type: 'warning'
							});
							</script>";
						}
						
				}
				else{
					echo"
						<script>
						Swal.fire ({
						html: '<b>Please enter valid number for service estimate fee!</b>',
						type: 'warning'
						});
						</script>";
				}
			}
			else{
				echo"
						<script>
						Swal.fire ({
						html: '<b>Service name already exists!</b>',
						type: 'warning'
						});
						</script>";
			}
		}
		else{
			echo"
					<script>
					Swal.fire ({
					html: '<b>Please enter service name!</b>',
					type: 'warning'
					});
					</script>";
					header("Refresh:1.5 ; URL=//localhost/Prototype/admin/addnewservice.php");
					return;
		}

	}
?>
