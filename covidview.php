<table  border="0" cellpadding="5" cellspacing="3" align="center" width="1000">
    
<h1><center>PERSONAL DETAILS</center></h1>   
    
<?php 

include ('connection.php');
$rahul="select * from coviddata";
$s=mysqli_query($con,$rahul);
$date= date('Y-m-d'); 
$start = strtotime($date);   
    
while ($row=mysqli_fetch_array($s)) 
{
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
     echo "<td><a href='certificate.php?cid=".$row['0']."'><input type='button' name='certificate' value='print'/></a></td>";
     
    }
    else
    {
        $color="yellow";
    } 
?>
   
    <tr bgcolor="<?php echo $color ?>"><td align="center" > <img width="100" height="100" src="photo/<?php echo $row['7'];?>"><img/></td><td><b><label>NAME &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label><?php echo $row['1'];?></b><br/><b><label>ADDRESS &nbsp;:</label><?php echo $row['4'];?></b><td><b><label>PHONE :&nbsp;&nbsp;&nbsp;</label><?php echo $row['8'];?></b><br/><br/><div style="float: right"> <a href="viewmore.php?pid=<?php echo $row['0'];?>" id="" title="View More">VIEW MORE</a></div><a href="covidedit.php?eid=<?php echo $row['0'];?>"><input type="button" value="Edit"/></a></td></tr>
<?php

}
?>
</table>