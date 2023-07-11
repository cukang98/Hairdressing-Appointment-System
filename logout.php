<html>
<head>
</head>
<body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 <script src="http://code.jquery.com/jquery-1.11.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
</body>
</html>
<?php 
   session_start();
   unset($_SESSION["username"]);
   unset($_SESSION["password"]);
   $_SESSION['valid'] = false;
   $_SESSION['loggedin'] = false;
   ?>
   	  
   <script>
   Swal.fire ({
				  html: '<b>Logout Successful!',
				  type: 'success'
				  })
   </script>
   <?php
   header("Refresh:1.5 ; URL=//localhost/Prototype/Homepage/hairsal/index.php");
?>