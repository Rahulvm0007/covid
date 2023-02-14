<?php
$hide=$_POST['hidden'];
$name=$_POST['name'];
$email=$_POST['email'];
$symptoms=$_POST['symptoms'];
$address=$_POST['address'];
//$cdate=$_POST['cdate'];
$aadhar=$_POST['aadhar'];
$qaddress=$_POST['qaddress'];
$gender=$_POST['gender'];
$phone=$_POST['phone'];
$picname=$_FILES['pic']['name'];
$piccontent=$_FILES['pic']['tmp_name'];
$picsize=$_FILES['pic']['size'];
$dir="photo/";
$path=$dir.$picname;
$updated=date('Y-m-d');
include('connection.php');


if($piccontent != "")
{
$del="select photo from coviddata where id='$hide'";
$res=mysqli_query($con,$del);
$row=mysqli_fetch_array($res);
$del_name=$row['photo'];
unlink($dir.$del_name);
  
    

move_uploaded_file($piccontent,$path);
$covid="update coviddata SET name='$name',email='$email',address='$address',aadhar='$aadhar',gender='$gender',photo='$picname',phone='$phone',symtoms='$symptoms',qaddress='$qaddress',updated='$updated' where id='$hide'";  

}

else
{
    
    $covid="update coviddata SET name='$name',email='$email',address='$address',aadhar='$aadhar',gender='$gender',phone='$phone',symtoms='$symptoms',qaddress='$qaddress',updated='$updated' where id='$hide'"; 
  
    
}

if(mysqli_query($con,$covid))


{
    
header('Location:userview.php');
}

?>