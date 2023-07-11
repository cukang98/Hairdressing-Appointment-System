<html>
<head>
</head>
<body>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
</body>
</html>
<?php 
   session_start();
   unset($_SESSION["hairdresser_username"]);
   unset($_SESSION["hairdresser_password"]);
   $_SESSION['hairdresser_valid'] = false;
   $_SESSION['hairdresser_loggedin'] = false;
   echo"
   <script>
   Swal.fire ({
				  html: 'Logout Successful!',
				  type: 'success'
				  })
   </script>";

   header("Refresh:1.5 ; URL=//localhost/Prototype/admin/login.php");
?>