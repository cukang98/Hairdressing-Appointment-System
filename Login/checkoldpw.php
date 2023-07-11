<?php include("dataconnection.php") ?>
<?php
if(isset($_GET['user_pw']))
{
 $pw=$_GET['user_pw'];
 $email=$_GET['user_email'];
 $checkdata="SELECT * FROM customer WHERE cust_email ='$email'";
 $result = mysqli_query($conn,$checkdata);
while($row = mysqli_fetch_assoc($result))
{
	if($row['cust_pw'] != $pw)
	{
		echo'match';
	}
	else{
		echo 'doesntmatch';
	}
}

}
?>