<?php

session_start(); 
if(empty($_SESSION['sessionid']) || $_SESSION['sessionid'] == '')
{
 header("Location: index.php");
 die();
}    


$raj=$_GET['eid'];
include ('connection.php');
$q="select * from coviddata where id='$raj'";
$res=mysqli_query($con,$q);





$date= date('Y-m-d'); 
$start = strtotime($date);   
    
while ($row=mysqli_fetch_array($res)) 
{
 $gender=$row['gender'];   
$create=$row['coviddate'];    

$end = strtotime($create);
$count = ceil(abs($end - $start) / 86400); 
 
    if ($count <=7)        
    {
        $color="Red";
    }
 else if($count >14)
    {
     $color="#green";
    
     
    }
    else
    {
        $color="yellow";
    } 






    
?>

<form name="covidform" method="post" action="covidedit_action.php" enctype="multipart/form-data" onsubmit="return validate()" >
<table border="1" cellpadding="5" cellspacing="0" align="center" style="width: auto" bgcolor="<?php echo $color ?>">
<tr><td colspan="2"><center><b>PERSONAL DETAILS</b></center></td></tr>     
<tr><td><center> <img width="100" height="100" src="photo/<?php echo $row['7'];?>"><img/></center></td><td style="width: 50%">

<input name="pic" type="file" maxlength="50" style="width:100%;max-width: 260px" id="8"/>
</td></tr> 
<tr> <td style="width: 50%">
<label ><b>Name *</b></label><br />
<input name="name" type="text" style="width:100%;max-width: 260px" id="1" value="<?php echo $row['1'] ?>"/>
</td> <td style="width: 50%">
<label ><b>Email *</b></label><br />
<input name="email" type="text" style="width:100%;max-width: 260px" id="1" value="<?php echo $row['2'] ?>"/>
</td></tr> <tr> <td style="width: 50%">
<label><b>Symptoms *</b></label><br />
<textarea name="symptoms" rows="3" cols="20" style="width:100%;max-width: 535px" id="2" ><?php echo $row['9'] ?></textarea>
</td>  <td style="width: 50%">
<label><b>Address *</b></label><br />
<textarea name="address" rows="3" cols="20" style="width:100%;max-width: 535px" id="3" ><?php echo $row['4'] ?></textarea>
</td></tr> <tr><td style="width: 50%">
<label><b>Covid+ Date *</b></label><br />
<input name="cdate" type="date" maxlength="50" style="width:100%;max-width: 260px" id="4" value="<?php echo $row['10'] ?>" disabled />
</td>  <td style="width: 50%">
<label><b>Aadhar *</b></label><br />
<input name="aadhar" type="text" style="width:100%;max-width: 260px" id="5" value="<?php echo $row['5'] ?>" />
</td></tr> <tr><td style="width: 50%">
<label><b>Quarantine Address *</b></label><br />
<textarea name="qaddress" rows="3" cols="20" style="width:100%;max-width: 535px" id="6" ><?php echo $row['11'] ?></textarea>
</td>  <td style="width: 50%">

<label><b>Gender *</b></label><br />
<input name="gender" type="radio" value="male"  id="7"
<?php
    
    if($gender=="male")
   {
    echo "checked";    
   }
?>/> Male      
<input name="gender" type="radio" value="female" id="7"
       <?php
    
    if($gender=="female")
   {
    echo "checked";    
   }
?>/> Female      
<input name="gender" type="radio" value="others" id="7" 
<?php
    
    if($gender=="others")
   {
    echo "checked";    
   }
?>/> Others
</td> </tr> 

    
 <tr> <td style="width: 50%">   
    
<label><b>Photo *</b></label><br />

</td> </tr> <tr> <td style="width: 50%">
<label><b>Contact Number *</b></label><br />
<input name="phone" type="text"  style="width:100%;max-width: 260px" id="9" value="<?php echo $row['8'] ?>" />
</td> </tr>  <tr> <td colspan="2" style="text-align: center;">

<input type="hidden" name="hidden" value="<?php echo $row['0']?>" />
<input type="submit" value="UPDATE" />
</td> </tr>
</table>
</form>
<?php
}
?>