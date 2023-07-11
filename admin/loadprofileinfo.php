<?php 
	if(isset($_GET['custid']))
	{
		$result = mysqli_query($conn,"SELECT * FROM customer WHERE cust_id = '".$_GET['custid']."'");
		while($row = mysqli_fetch_assoc($result)){
			$custname = $row['cust_firstname']." ".$row['cust_lastname'];
			$custemail = $row['cust_email'];
			$custcontactnum = $row['cust_contactnum'];
			$custregisterdate = $row['register_date'];
			$custpw = $row['cust_pw'];
			$custprofpic = $row['cust_profpic'];
			$isacativated = $row['is_activated'];
			if($isacativated == "1")
			{
				$isactivated = "Verified";
			}
			else{
				$isactivated = "Unverified";
			}
		}
	}
	 if(isset($_SESSION['hairdresser_id']) || isset($_GET['hairdresserid']) || isset($_SESSION['admin_id']))
	{

		if (isset($_SESSION['hairdresser_id']))
			$id = $_SESSION['hairdresser_id'];
		else if (isset($_SESSION['admin_id']))
			$id = $_SESSION['admin_id'];
		else
		{
			$id = $_GET['hairdresserid'];
		}
		$result = mysqli_query($conn,"SELECT hairdresser.*, position.position_name FROM hairdresser INNER JOIN position ON hairdresser.position_id = position.position_id WHERE hairdresser_id = '$id'");
		while($row = mysqli_fetch_assoc($result)){
			$hairdressername = $row['hairdresser_firstname']." ".$row['hairdresser_lastname'];
			$hairdresseremail = $row['hairdresser_email'];
			$hairdressercontactnum = $row['hairdresser_contactnum'];
			$hairdresserpw = $row['hairdresser_pw'];
			$hairdresserposition = $row['position_name'];
			$hairdresserregisterdate = $row['join_date'];
			$hairdresserpic = $row['hairdresser_profpic'];
			if(isset($_GET['hairdresserid']))
				$hairdresserposition = $row['position_name'];
			else
				$hairdresserposition = 'Admin';
		}
	}
	else{
		header("Refresh:1.5 ; URL=//localhost/Prototype/admin/login.php");
	}
?>