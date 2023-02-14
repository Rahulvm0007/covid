<?php
include('connection.php');
$email=$_POST['email'];
$password=$_POST['password'];


$sql="select * from coviddata where email='$email' and password='$password'";
$res=mysqli_query($con,$sql);
$count=mysqli_num_rows($res);
if($count==1)
{
	
 session_start();
 
 $row=mysqli_fetch_array($res);
 $_SESSION['sessionid']=$row['0'];
 header('location:userview.php');    
}
 
else
{
	?>
	<script>
	alert("Please Enter Your Correct Email And Password");
	window.location.href='index.php';
    </script>
    <?php
	
}
?>