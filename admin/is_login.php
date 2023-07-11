<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<?php 
	session_start();
	if($_SESSION['admin_loggedin']==false || !isset($_SESSION['admin_loggedin']) || empty($_SESSION['admin_loggedin']))
	{
		echo"<script>
			Swal.fire ({
			html: '<b>Please login first!',
			type: 'warning'
			});
			</script>";
		header("Refresh:1.5; url=//localhost/Prototype/admin/login.php");
	}
	else{
		include("loadadmininfo.php");
	}

?>