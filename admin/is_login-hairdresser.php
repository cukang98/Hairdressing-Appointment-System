<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<?php 
	session_start();
	if($_SESSION['hairdresser_loggedin']==false || !isset($_SESSION['hairdresser_loggedin']) || empty($_SESSION['hairdresser_loggedin']))
	{
		echo"<script>
			Swal.fire ({
			html: '<b>Please login first!',
			type: 'warning'
			});
			</script>";
		header("Refresh:1.5; URL=//localhost/Prototype/admin/login.php");
	}
	else{
		include("loadhairdresserinfo.php");
	}

?>