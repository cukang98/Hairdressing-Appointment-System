<?php include("dataconnection.php") ?>
<?php 

		$id = $_GET['sid'];
		$result = mysqli_query($conn,"SELECT * FROM service WHERE service_id = '$id'");
		while($row = mysqli_fetch_assoc($result))
		{
			$i=0;
			$curid = $row['service_id'];
			$service = array("name"=>$row['service_name'],
							 "estimatefee"=>$row['service_estimatefee'],
							 "estimateduration"=>$row['service_estimateduration'],
							 );
		}
		header("Content-Type: application/json");
		echo json_encode($service);
	
?>