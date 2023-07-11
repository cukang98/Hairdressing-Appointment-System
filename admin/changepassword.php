<?php
	if(isset($_POST['changepassword']))
	{
		$oldpw = $_POST['oldpw'];
		$newpw = $_POST['password1'];
		$newpw2 = $_POST['password2'];
		if($oldpw!='' && $newpw != '' && $newpw2 !='')
		{
			if($oldpw == $hairdresser_pw)
			{
				if($newpw == $newpw2 && $newpw != "" && $newpw2 !="" )
				{
					$uppercase = preg_match('@[A-Z]@', $newpw);
					$count = strlen($newpw);
					$containnumber = preg_match('@[0-9]@', $newpw);
					$specialc = preg_match('@[^\w]@', $newpw);
					if($uppercase && $count>=8 && $containnumber && $specialc)
					{
						$updatepw = mysqli_query($conn,"UPDATE hairdresser SET hairdresser_pw = '$newpw' WHERE hairdresser_email='$hairdresser_email'");
						if($updatepw)
						{
							echo"
							<script>
							Swal.fire ({
								html: '<b>Password changed successful,</b><br>Please login again!',
								type: 'success'
							});
							</script>";
							session_destroy();
							header("Refresh:1.5 ; URL=//localhost/Prototype/admin/login.php");
						}
					}
					else{
						echo"
							 <script>
							  Swal.fire ({
							  html: '<b>Your password does not fulfill requirement!</b>',
							  type: 'warning'
							  });
							  </script>";
					}
				
				}
				else{
					if($newpw!=$newpw2)
					{
						echo"
						<script>
						Swal.fire ({
							html: '<b>Your new password not match!',
							type: 'error'
						});
						</script>";
					}
					
					echo"
						<script>
						
						$('#profilenav').removeClass('active ');
						$('#profile').removeClass('active ');
						$('#appointmenthistorynav').removeClass('active ');
						$('#history').removeClass('active ');
						$('#editprofilenav').removeClass('active ');
						$('#edit').removeClass('active ');
						$('#changepasswordnav').addClass('active ');
						$('#changepassword').addClass('active ');
						validateOldpw('".$_SESSION['user']['cust_email']."');
						validateNewpw();
						validateNewpw2();
						</script>";
				}
			}
			else{
					if($oldpw == "" || empty($oldpw))
					{
						echo"
						<script>
						Swal.fire ({
							html: '<b>Please enter your old password!',
							type: 'error'
						});
						validateOldpw('".$_SESSION['user']['cust_email']."');
						validateNewpw();
						validateNewpw2();
						$('#profilenav').removeClass('active ');
						$('#profile').removeClass('active ');
						$('#appointmenthistorynav').removeClass('active ');
						$('#history').removeClass('active ');
						$('#editprofilenav').removeClass('active ');
						$('#edit').removeClass('active ');
						$('#changepasswordnav').addClass('active ');
						$('#changepassword').addClass('active ');
						</script>";
					}
					else if($oldpw != $customer_pw)
					{
						echo"
						<script>
						Swal.fire ({
							html: '<b>Your old password is wrong!',
							type: 'error'
						});
						</script>";
					}
					else if($newpw == "" || $newpw2 == "" )
					{
						echo"
						<script>
						Swal.fire ({
							html: '<b>Please enter your new password!',
							type: 'error'
						});
						</script>";
					}

				echo"
						<script>
						validateOldpw('".$_SESSION['user']['cust_email']."');
						validateNewpw();
						validateNewpw2();
						$('#profilenav').removeClass('active ');
						$('#profile').removeClass('active ');
						$('#appointmenthistorynav').removeClass('active ');
						$('#history').removeClass('active ');
						$('#editprofilenav').removeClass('active ');
						$('#edit').removeClass('active ');
						$('#changepasswordnav').addClass('active ');
						$('#changepassword').addClass('active ');
						</script>";
			}
		}
		else{
			echo"
				<script>
				Swal.fire ({
					html: '<b>Please fillup all information!',
					type: 'error'
				});
						validateOldpw('".$hairdresser_email."');
						validateNewpw();
						validateNewpw2();
						$('#profilenav').removeClass('active ');
						$('#profile').removeClass('active ');
						$('#appointmenthistorynav').removeClass('active ');
						$('#history').removeClass('active ');
						$('#editprofilenav').removeClass('active ');
						$('#edit').removeClass('active ');
						$('#changepasswordnav').addClass('active ');
						$('#changepassword').addClass('active ');
				</script>";
		}
	}
?>