<?php include("dataconnection.php");  ?>
<?php 
	$date = $_GET['date'];
	$hid = $_GET['hairdresserid'];
	$result = mysqli_query($conn,"SELECT * FROM appointment WHERE status !='Cancelled' AND date_appointment = '$date' AND hairdresser_id = '$hid'");
	$ts['starttime'] = array();
	$ts['endtime'] = array();
	$i=0;
	while($row = mysqli_fetch_assoc($result))
	{
		$ts['starttime'][$i] = $row['start_time'];
		$ts['endtime'][$i] = $row['end_time'];
		$ts['estimate'][$i] = $row['total_estimate_duration'];
		$i++;
	}
	header("Content-Type: application/json");
	echo json_encode($ts);
?>