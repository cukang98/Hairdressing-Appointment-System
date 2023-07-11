<?php include("dataconnection.php") ?>
<?php
if(isset($_GET['hairdresserid']))
{
	$id = $_GET['hairdresserid'];
	$result = mysqli_query($conn,"SELECT hairdresser.*,position.position_name,position.position_charge FROM hairdresser 
	INNER JOIN position ON hairdresser.position_id = position.position_id 
	WHERE hairdresser.hairdresser_id = '$id'");
	
	while($row = mysqli_fetch_assoc($result))
	{
		$hairdresser = array("name"=>$row['hairdresser_firstname'].' '.$row['hairdresser_lastname'],
							 "position"=>$row['position_name'],
							 "position_charge"=>$row['position_charge'],
							 "id"=>$id,
							 "image"=>base64_encode($row['hairdresser_profpic']),
							 );
	}
	$hairdresser['offday'] = array();
	$offday = mysqli_query($conn,"SELECT * FROM offday WHERE hairdresser_id = '$id'");
	$i = 0;
	while($offdayrow = mysqli_fetch_assoc($offday))
	{
		$hairdresser['offday'][$i] = $offdayrow['offday_date'];
		$i++;
	}
	$a=0;
	$service = mysqli_query($conn,"SELECT * FROM service WHERE is_removed ='0'");
	while($servicerow = mysqli_fetch_assoc($service))
	{
		$hairdresser['service'][$a] = $servicerow['service_name'];
		$a++;
	}
	header("Content-Type: application/json");
	echo json_encode($hairdresser);
}
?>