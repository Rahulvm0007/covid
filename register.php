<script type="text/javascript">

function validate()
{
    
  var entername = /^[a-zA-Z]+$/;
  var name = document.getElementById('1').value;
  
  if(!entername.test(name))
   
  {
     alert("Invalid name given");
     
  }
    
   
    
    
    var s = document.getElementById('2').value;
  if (s=="")
  {
    alert("Email must be filled out");
    return false;
  }

    
    
    
    
    
    
    var pass=document.getElementById('3').value;
		if(pass=="")
	{
		alert("Please enter your Password");
		return false;
	}
	var confirm=document.getElementById('cp3').value;
		if(confirm=="")
	{
		alert("Please Confirm your Password");
		return false;
	}
	if(pass!=confirm)
	{
		alert("Please enter Correct Password");
		return false;
		
	}	
    
    
    
    
    
    
    

  
    
  var s = document.getElementById('4').value;
  if (s=="")
  {
    alert("Symtoms must be filled out");
    return false;
  }
    
  
    
  var s = document.getElementById('5').value;
  if (s=="")
  {
    alert("Address must be filled out");
    return false;
  }
     
  var s = document.getElementById('6').value;
  if (s=="")
  {
    alert("Covid Possitive date must be filled out");
    return false;
  } 
    
    var ph= /^\d{12}$/;
   var val = document.getElementById('7').value;
   if (!ph.test(val)) 
   {
    alert("Invalid Adhar number; must be twelve digits");
    return false;
   }
    
  
  var s = document.getElementById('8').value;
  if (s=="")
  {
    alert("Your Quarantine Address must be filled out");
    return false;
  }
    
    var gender=document.getElementById('9').value;
    if (( covidform.gender[0].checked==false)&& (covidform.gender[1].checked==false)&& (covidform.gender[2].checked==false))
	{
		alert("please select your gender");
		return false;
	}
  
  
    
    
    
    var fileInput = document.getElementById('10');
              
    var filePath = fileInput.value;
          
            
    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
              
    if(!allowedExtensions.exec(filePath)) 
   
         
     {
                alert('Invalid file type');
                fileInput.value = '';
                return false;
    } 
           
    
    
   var ph= /^\d{10}$/;
   var val = document.getElementById('11').value;
   if (!ph.test(val)) 
   {
    alert("Invalid number; must be ten digits");
    
    return false;
   }
    
   
   

}

</script>




<form name="covidform" method="post" action="regaction.php" enctype="multipart/form-data" onsubmit="return validate()" >
<table border="1" cellpadding="5" cellspacing="0" align="center" style="width: auto">
<tr><td colspan="2"><center><b>REGISTRATION</b></center></td></tr>     
<tr><td ><center><b>PERSONAL DETAILS</b></center></td>  <td ><center><b>More Info</b></center></td></tr> 
<tr> <td style="width: 50%">
<label ><b>Name *</b></label><br />
<input name="name" type="text" style="width:100%;max-width: 260px" id="1"/>
</td><td style="width: 50%">
<label ><b>email *</b></label><br />
<input name="email" type="text" style="width:100%;max-width: 260px" id="2"/>
</td></tr><tr><td style="width: 50%">
<label ><b>Password *</b></label><br />
<input name="password" type="password" style="width:100%;max-width: 260px" id="3"/>
</td><td style="width: 50%">
<label ><b>Confirm Password *</b></label><br />
<input name="confirmpassword" type="password" style="width:100%;max-width: 260px" id="cp3"/>
</td></tr><tr> <td style="width: 50%">
<label><b>Symptoms *</b></label><br />
<textarea name="symptoms" rows="3" cols="20" style="width:100%;max-width: 535px" id="4"></textarea>
</td> <td style="width: 50%">
<label><b>Address *</b></label><br />
<textarea name="address" rows="3" cols="20" style="width:100%;max-width: 535px" id="5"></textarea>
</td></tr><tr><td style="width: 50%">
<label><b>Covid+ Date *</b></label><br />
<input name="cdate" type="date" maxlength="50" style="width:100%;max-width: 260px" id="6"/>
</td>  <td style="width: 50%">
<label><b>Aadhar *</b></label><br />
<input name="aadhar" type="text" style="width:100%;max-width: 260px" id="7"/>
</td></tr><tr><td style="width: 50%">
<label><b>Quarantine Address *</b></label><br />
<textarea name="qaddress" rows="3" cols="20" style="width:100%;max-width: 535px" id="8"></textarea>
</td>  <td style="width: 50%">
<label><b>Gender *</b></label><br />
<input name="gender" type="radio" value="male"  id="9"/> Male      
<input name="gender" type="radio" value="female" id="9"/> Female      
<input name="gender" type="radio" value="others" id="9"/> Others
</td> </tr> <tr> <td style="width: 50%">
<label><b>Photo *</b></label><br />
<input name="pic" type="file" maxlength="50" style="width:100%;max-width: 260px" id="10"/>
</td> </tr> <tr> <td style="width: 50%">
<label><b>Contact Number *</b></label><br />
<input name="phone" type="text"  style="width:100%;max-width: 260px" id="11" />
</td> </tr>  <tr> <td colspan="2" style="text-align: center;">


<input type="submit" value="Submit" />
<div style="float: right"> <a href="index.php" id="" title="Register">Login?</a></div>    
</td> </tr>
</table>
</form>