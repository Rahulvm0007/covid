<?php
$print=$_GET['cid'];
include ('connection.php');
$q="select * from coviddata where id='$print'";
$res=mysqli_query($con,$q);
$row=mysqli_fetch_array($res);
$today=date('Y-m-d');
$timestamp = strtotime($today);
$new_date = date("d-m-Y", $timestamp);
$covid_date=$row['10'];
$covid = strtotime($covid_date);
$new_coviddate = date("d-m-Y", $covid);



    
?>

<form  method="post" action="covidedit_action.php" enctype="multipart/form-data"  >
<table border="" cellpadding="" cellspacing="0" align="center" >
<tr><td colspan="2"><center><b><i>CERTIFICATE</i></b></center></td></tr> 
<tr> <td style="width: 50%">
<label><b>NAME *</b></label><br />
<input  type="text"  value="<?php echo strtoupper($row['1']) ?>"/>
</td> <td><center> <img width="100" height="100" src="photo/<?php echo $row['7'];?>"><img/></center></td>
 <tr> <td >
<labe><b>ADDRESS</b></label><br />
<textarea  rows="7" cols="40" style="width:100%;max-width: 535px" ><?php echo strtoupper($row['4']) ?></textarea>
</td>  </tr> <tr> <td>
<label><b>COVID POSSITIVE DATE</b></label><br />
<input  type="text"   value="<?php echo $new_coviddate ?>" />
</td>   </tr><tr> <td>
<label ><b>CERTIFIED DATE</b></label><br />
<input  type="text"  value="<?php echo $new_date ?>" />
</td>   </tr>
    
    <tr><td><center> <img src="https://chart.googleapis.com/chart?chs=150x150&amp;cht=qr&amp;chl=?p=1172" /><img/></center></td>
 <tr> <td ></tr>
     
     
     <tr> <td colspan="2" style="text-align: center;">
<div style="float: right"> <a href="userview.php" id="lnk100" title="back to home">BACK TO HOME</a></div>

<input type="button" onClick="this.style.display='none';window.print();" value="PRINT"/>
</td> </tr>
</table>
