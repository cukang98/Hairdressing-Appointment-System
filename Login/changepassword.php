<?php
	if(isset($_POST['changepassword']))
	{
		$oldpw = $_POST['oldpw'];
		$newpw = $_POST['password1'];
		$newpw2 = $_POST['password2'];
		if($oldpw!='' && $newpw != '' && $newpw2 !='')
		{
			if($oldpw == $customer_pw)
			{
				if($newpw == $newpw2 && $newpw != "" && $newpw2 !="" )
				{
					$uppercase = preg_match('@[A-Z]@', $newpw);
					$letter = preg_match('@[a-z]@', $newpw);
					$containnumber = preg_match('@[0-9]@', $newpw);
					$specialc = preg_match('@[^\w]@', $newpw);
					if($uppercase && $letter && $containnumber && $specialc)
					{
						$updatepw = mysqli_query($conn,"UPDATE customer SET cust_pw = '$newpw' WHERE cust_email='$customer_email'");
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
							header("Refresh:1.5 ; URL=//localhost/Prototype/Login/login.php");
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
						
						$('#profilenav').removeClass('active show');
						$('#profile').removeClass('active show');
						$('#appointmenthistorynav').removeClass('active show');
						$('#history').removeClass('active show');
						$('#editprofilenav').removeClass('active show');
						$('#edit').removeClass('active show');
						$('#changepasswordnav').addClass('active show');
						$('#changepassword').addClass('active show');
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
						$('#profilenav').removeClass('active show');
						$('#profile').removeClass('active show');
						$('#appointmenthistorynav').removeClass('active show');
						$('#history').removeClass('active show');
						$('#editprofilenav').removeClass('active show');
						$('#edit').removeClass('active show');
						$('#changepasswordnav').addClass('active show');
						$('#changepassword').addClass('active show');
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
						$('#profilenav').removeClass('active show');
						$('#profile').removeClass('active show');
						$('#appointmenthistorynav').removeClass('active show');
						$('#history').removeClass('active show');
						$('#editprofilenav').removeClass('active show');
						$('#edit').removeClass('active show');
						$('#changepasswordnav').addClass('active show');
						$('#changepassword').addClass('active show');
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
						validateOldpw('".$_SESSION['user']['cust_email']."');
						validateNewpw();
						validateNewpw2();
						$('#profilenav').removeClass('active show');
						$('#profile').removeClass('active show');
						$('#appointmenthistorynav').removeClass('active show');
						$('#history').removeClass('active show');
						$('#editprofilenav').removeClass('active show');
						$('#edit').removeClass('active show');
						$('#changepasswordnav').addClass('active show');
						$('#changepassword').addClass('active show');
				</script>";
		}
	}
?>