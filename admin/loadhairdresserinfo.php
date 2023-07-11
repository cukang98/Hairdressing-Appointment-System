<?php 

	if(!empty($_SESSION['hairdresser_email']) && isset($_SESSION['hairdresser_email']))
	{

		$hairdresseremail = $_SESSION['hairdresser_email'];
		$hairdresserinfo = mysqli_query($conn,"SELECT *,position.position_name FROM hairdresser INNER JOIN position ON hairdresser.position_id = position.position_id WHERE hairdresser.hairdresser_email='$hairdresseremail'");
		if($hairdresserinfo && isset($_SESSION['hairdresser_loggedin']))
		{
			
			while($row = mysqli_fetch_assoc($hairdresserinfo))
			{
				$hairdresser_email = $row['hairdresser_email'];
				$hairdresser_firstname = $row['hairdresser_firstname'];
				$hairdresser_lastname = $row['hairdresser_lastname'];
				$hairdresser_pw = $row['hairdresser_pw'];
				$hairdresser_gender = $row['hairdresser_gender'];
				$hairdresser_postcode = $row['hairdresser_postcode'];
				$hairdresser_address = $row['hairdresser_address'];
				$hairdresser_state = $row['hairdresser_state'];
				$hairdresser_contact = $row['hairdresser_contactnum'];
				$hairdresser_registerdate = $row['join_date'];
				
				$hairdresser_position = $row['position_name'];
			}
		}
	}
?>