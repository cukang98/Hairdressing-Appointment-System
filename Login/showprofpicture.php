 <?php
	include('dataconnection.php');
				$email = $_SESSION['user']['cust_email'];
				$userimage = mysqli_query($conn,"SELECT cust_profpic FROM customer WHERE cust_email='$email'");
				while($row=mysqli_fetch_assoc($userimage)){
					$userimageData = $row['cust_profpic'];
				}
				header('content-type:image/jpeg');
				echo $userimageData;
?>