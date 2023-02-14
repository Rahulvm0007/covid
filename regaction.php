<?php

$name=$_POST['name'];
$email=$_POST['email'];
$pass=$_POST['password'];
$symptoms=$_POST['symptoms'];
$address=$_POST['address'];
$cdate=$_POST['cdate'];
$aadhar=$_POST['aadhar'];
$qaddress=$_POST['qaddress'];
$gender=$_POST['gender'];
$phone=$_POST['phone'];
$picname=$_FILES['pic']['name'];
$piccontent=$_FILES['pic']['tmp_name'];
$picsize=$_FILES['pic']['size'];
$dir="photo/";
$path=$dir.$picname;
move_uploaded_file($piccontent,$path);
$created=date('Y-m-d');
include('connection.php');
$covid="insert into coviddata(name,email,password,address,aadhar,gender,photo,phone,symtoms,coviddate,qaddress,created)values('$name','$email','$pass','$address','$aadhar','$gender','$picname','$phone','$symptoms','$cdate','$qaddress','$created')";
if(mysqli_query($con,$covid))
{
header('Location:index.php');
}

?>