<?php
session_start(); 
if(empty($_SESSION['sessionid']) || $_SESSION['sessionid'] == '')
{
 header("Location: index.php");
 die();
}    
$sa=$_GET['pid'];
include('connection.php');
$re="select * from coviddata where id='$sa'";
$res=mysqli_query($con,$re);

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
<tr><td colspan="2"><center><b>PERSONAL DETAILS</b></center></td></tr><br/>
<tr><td colspan="2"><center><b><?php echo $row['1']?></b></center></td></tr> <br/>   
<tr><td><center> <img width="100" height="100" src="photo/<?php echo $row['7'];?>"><img/></center></td>  </tr> <br/> 
<table border="1" cellpadding="5" cellspacing="0" align="center" style="width: auto" bgcolor="<?php echo $color ?>">
<tr> <td style="width: 50%">
<label ><b>Name *</b></label><br />
<input name="name" type="text" style="width:100%;max-width: 260px" id="name" value="<?php echo $row['1']?>"/>
</td><td style="width: 50%">
<label ><b>Email *</b></label><br />
<input name="email" type="text" style="width:100%;max-width: 260px" id="name" value="<?php echo $row['2']?>"/>
</td></tr><tr> <td style="width: 50%">
<label><b>Symptoms *</b></label><br />
<textarea name="symptoms" rows="3" cols="20" style="width:100%;max-width: 535px" id="symptoms"><?php echo $row['9'] ?></textarea>
</td>  <td style="width: 50%">
<label><b>Address *</b></label><br />
<textarea name="address" rows="3" cols="20" style="width:100%;max-width: 535px" id="address"><?php echo $row['4'] ?></textarea>
</td></tr> <tr><td style="width: 50%">
<label><b>Covid+ Date *</b></label><br />
<input name="cdate" type="date" maxlength="50" style="width:100%;max-width: 260px" id="date" value="<?php echo $row['10']?>"/>
</td>  <td style="width: 50%">
<label><b>Aadhar *</b></label><br />
<input name="aadhar" type="text" style="width:100%;max-width: 260px" id="aadhar" value="<?php echo $row['5']?>"/>
</td></tr> <tr><td style="width: 50%">
<label><b>Quarantine Address *</b></label><br />
<textarea name="qaddress" rows="3" cols="20" style="width:100%;max-width: 535px"><?php echo $row['11'] ?></textarea>
</td> <td style="width: 50%">
<label><b>Gender *</b></label><br />
<input name="gender" type="radio" value="male" 
 <?php
 if($gender=="male")
   {
    echo "checked";    
   }
 ?>  /> Male  
    
    
<input name="gender" type="radio" value="female" <?php
 if($gender=="female")
   {
    echo "checked";    
   }
 ?>/> Female     
<input name="gender" type="radio" value="others" <?php
 if($gender=="others")
   {
    echo "checked";    
   }
 ?>/> Others
</td> </tr>  <tr> <td style="width: 50%">
<label><b>Contact Number *</b></label><br />
<input name="phone" type="text"  style="width:100%;max-width: 260px" id="phone" value="<?php echo $row['8']?>"/>
</td> </tr>  
</table>

<?php
}
?>