<?php include("dataconnection.php") ?>
<?php
if(isset($_GET['hairdresser_email']))
{
 $email1=$_GET['hairdresser_email'];

 $checkdata="SELECT * FROM hairdresser WHERE hairdresser_email ='$email1'";
 $result = mysqli_query($conn,$checkdata);
	if(!$result || mysqli_num_rows($result) ==0)
		echo "doesntexist";
	if(mysqli_num_rows($result)>0)
		echo "exist";


}
?>