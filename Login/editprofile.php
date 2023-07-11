<?php include("dataconnection.php");
if(isset($_GET['editprofile']))
{
	$fname = $_GET['fname'];
	$lname = $_GET['lname'];
	$contact = $_GET['contact'];
	
	
	if(!empty($fname) && !empty($lname) && !empty($contact))
	{
		if(1 !== preg_match('~[0-9]~', $fname))
		{
			if(1 !== preg_match('~[0-9]~', $lname))
			{
				if(is_numeric($contact))
				{
					if(strlen($contact)==11 || strlen($contact)==10)
					{
						$update = mysqli_query($conn,"UPDATE customer SET cust_firstname='$fname',cust_lastname = '$lname',cust_contactnum='$contact' WHERE cust_email='$email'");
						if($update)
						{
							echo"
							<script>
							Swal.fire ({
								html: '<b>Profile edit successful!</b>',
								type: 'success'
							});
							</script>";
							header("Refresh:1.5 ; URL=//localhost/Prototype/Login/profile.php");
						}
					}
					else{
						echo"
						<script>
						Swal.fire ({
										html: '<b>Contact number must between 10~11 numbers!',
										type: 'error'
									});
									validateFirstName();
									validateLastName();
									validateContact();
						$('#profilenav').removeClass('active show');
						$('#profile').removeClass('active show');
						$('#appointmenthistorynav').removeClass('active show');
						$('#history').removeClass('active show');
						$('#editprofilenav').addClass('active show');
						$('#edit').addClass('active show');
						$('#changepasswordnav').removeClass('active show');
						$('#changepassword').removeClass('active show');
						</script>
						";
					}
				}
				else{
					echo"
					<script>
					Swal.fire ({
									html: '<b>Please enter a valid contact number!',
									type: 'error'
								});
								validateFirstName();
								validateLastName();
								validateContact();
					$('#profilenav').removeClass('active show');
					$('#profile').removeClass('active show');
					$('#appointmenthistorynav').removeClass('active show');
					$('#history').removeClass('active show');
					$('#editprofilenav').addClass('active show');
					$('#edit').addClass('active show');
					$('#changepasswordnav').removeClass('active show');
					$('#changepassword').removeClass('active show');
					</script>
					";
				}
			}
			else{
				echo"
				<script>
				Swal.fire ({
								html: '<b>Please enter a valid last name!',
								type: 'error'
							});
							validateFirstName();
							validateLastName();
							validateContact();
				$('#profilenav').removeClass('active show');
				$('#profile').removeClass('active show');
				$('#appointmenthistorynav').removeClass('active show');
				$('#history').removeClass('active show');
				$('#editprofilenav').addClass('active show');
				$('#edit').addClass('active show');
				$('#changepasswordnav').removeClass('active show');
				$('#changepassword').removeClass('active show');
				</script>
				";
			}
		}
		else{
			echo"
			<script>
			Swal.fire ({
							html: '<b>Please enter a valid first name!',
							type: 'error'
						});
						validateFirstName();
						validateLastName();
						validateContact();
			$('#profilenav').removeClass('active show');
			$('#profile').removeClass('active show');
			$('#appointmenthistorynav').removeClass('active show');
			$('#history').removeClass('active show');
			$('#editprofilenav').addClass('active show');
			$('#edit').addClass('active show');
			$('#changepasswordnav').removeClass('active show');
			$('#changepassword').removeClass('active show');
			</script>
			";
		}
			
	}
	else {
		echo"
		<script>
		Swal.fire ({
						html: '<b>Please fillup all information!',
						type: 'error'
					});
					validateFirstName();
					validateLastName();
					validateContact();
		$('#profilenav').removeClass('active show');
		$('#profile').removeClass('active show');
		$('#appointmenthistorynav').removeClass('active show');
		$('#history').removeClass('active show');
		$('#editprofilenav').addClass('active show');
		$('#edit').addClass('active show');
		$('#changepasswordnav').removeClass('active show');
		$('#changepassword').removeClass('active show');
		</script>
		";
	}
}
 ?>