<?php 
include('dataconnection.php');
	$id = $_GET['hairdresserid'];
	$result = mysqli_query($conn,"SELECT * FROM full_appointment_date WHERE hairdresser_id = '$id' ");
	$date=array();
	$i=0;
	while($row = mysqli_fetch_assoc($result)){
		$date['date'][$i] = str_replace('-',',',$row['date']);
		$i++;
	}
	header("Content-Type: application/json");
	echo json_encode($date);

?>