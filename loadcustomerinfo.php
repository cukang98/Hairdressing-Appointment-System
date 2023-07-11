<?php 

	if(!empty($_SESSION['cust_email']))
	{
		$custemail = $_SESSION['cust_email'];
		$customerinfo = mysqli_query($conn,"SELECT * FROM customer WHERE cust_email='$custemail'");
		if($customerinfo && isset($_SESSION))
		{
			
			while($row = mysqli_fetch_assoc($customerinfo))
			{
				$customer_email = $row['cust_email'];
				$customer_name = $row['cust_firstname']." ".$row['cust_lastname'];
				$customer_pw = $row['cust_pw'];
				$customer_gender = $row['cust_gender'];
				$customer_contact = $row['cust_contactnum'];
			}
		}
	}
?>