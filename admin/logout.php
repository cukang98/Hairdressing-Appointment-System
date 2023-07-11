<html>
<head>
</head>
<body>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
</body>
</html>
<?php 
   session_start();
   unset($_SESSION["admin_username"]);
   unset($_SESSION["admin_password"]);
   $_SESSION['admin_valid'] = false;
   $_SESSION['admin_loggedin'] = false;
   echo"
   <script>
   Swal.fire ({
				  html: '<b>Logout Successful!</b>',
				  type: 'success'
				  })
   </script>";

   header("Refresh:1.5 ; URL=//localhost/Prototype/admin/login.php");
?>