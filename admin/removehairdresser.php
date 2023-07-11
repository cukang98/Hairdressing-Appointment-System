<?php 
	if(isset($_GET['removeid']) && $_GET['removeid']!=''){
		$id = $_GET['removeid'];
		$remove = mysqli_query($conn,"UPDATE hairdresser SET is_removed = '1' WHERE hairdresser_id = '$id'");
		if($remove)
		{
			echo true;
		}
	}
?>