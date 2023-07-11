<?php include("dataconnection.php") ?>
<?php
if(isset($_GET['user_email']))
{
 $email1=$_GET['user_email'];
 $checkdata="SELECT * FROM customer WHERE cust_email ='$email1'";
 $result = mysqli_query($conn,$checkdata);
	if(!$result || mysqli_num_rows($result) ==0)
		echo "doesntexist";
	if(mysqli_num_rows($result)>0)
		echo "exist";


}
?>