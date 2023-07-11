 <?php
	include('dataconnection.php')
				
	if(isset($_GET['email']))
	{
		$email = $_GET['email'] ;
		$userimage = mysqli_query($conn,"SELECT cust_profpic FROM customer WHERE cust_email='$email'");
		while($row=mysqli_fetch_assoc($userimage)){
			$userimageData = $row['cust_profpic'];
		}
		header('content-type:image/jpeg');
		echo $userimageData;
	}
?>