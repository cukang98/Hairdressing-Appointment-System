<?php include('dataconnection.php'); ?>
<?php 
	$id = $_GET['hairdresserid'];
	$date = $_GET['date'];
	
	$result = mysqli_query($conn,"SELECT * FROM appointment WHERE status != 'Cancelled' AND hairdresser_id = '$id' AND date_appointment='$date' ORDER BY start_time");
	$starttime = array();
	$endtime = array();
	$date = '';
	$isfull = false;
	$nofull = true;
	$i=0;
	while($row = mysqli_fetch_assoc($result))
	{
		
		$starttime[$i] = $row['start_time'];
		$endtime[$i] = $row['end_time'];
		$endh = (int)substr($endtime[$i],0,2);
		$endm = (int)substr($endtime[$i],2);
		if($endm==45)
		{
			$endm = "00";
			$endh+=1;
		}
		if($endm==15)
		{
			$endm = "30";
		}
		if($endm==0)
			$endm = "00";
		$endtime[$i] = $endh.$endm;
		$date = $row['date_appointment'];
		

		$i++;
	}
	if($starttime[0]=='1000' && $endtime[$i-1]=='2030')
	{
		for($a=0;$i-1>$a;$a++){
			if($endtime[$a] == $starttime[$a+1])
				$isfull = true;
			else
				$nofull = false;
		}
	}
	if($isfull && $nofull)
	{
		$insert = mysqli_query($conn,"INSERT INTO full_appointment_date (hairdresser_id,date) VALUES ('$id','$date')");
	}
	else{
		$remove = mysqli_query($conn,"DELETE FROM full_appointment_date WHERE hairdresser_id='$id' AND date='$date'");
	}
?>