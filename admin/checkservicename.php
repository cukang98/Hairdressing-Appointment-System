<?php include("dataconnection.php") ?>
<?php
if(isset($_GET['service_name']))
{
 $sn1=$_GET['service_name'];

 $checkdata="SELECT * FROM service WHERE service_name ='$sn1' AND is_removed !='1'";
 $result = mysqli_query($conn,$checkdata);
	if(!$result || mysqli_num_rows($result) ==0)
		echo "doesntexist";
	if(mysqli_num_rows($result)>0)
		echo "exist";


}
?>