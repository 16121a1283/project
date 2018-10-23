<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registration</title>
 <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
    <link href="StyleSheet.css" rel="stylesheet" type="text/css" />

    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!--slider-->
<link href="css/flexslider.css" rel="stylesheet" type="text/css" media="all" />
     <script src="js/jquery-1.11.0.min.js"></script>
	<script src="js/lightbox.min.js"></script>
<script src="js/jquery-1.7.1.min.js" type="text/javascript"></script>
<script src="js/jquery.flexslider.js" type="text/javascript"></script>
  

</head>

<body bgcolor="pink">
<?php include('function.php'); ?>
<div style="background:url(about2.png) no-repeat center center fixed;height:auto;opacity:0.8;background-repeat:no-repeat;z-index:-4;">
<div style="height:600px; width:500px; margin:auto; margin-top:10px; margin-bottom:10px; background-color:powder blue; border:2px solid red; box-shadow:4px 2px 20px red;">
    
	
<form  method="post" enctype="multipart/form-data">
<table cellpadding="0" cellspacing="0" style="margin:auto; width:100%; " >

    
   
<tr><td colspan="2">&nbsp;</td></tr>
   
<tr>
                    <td style="vertical-align:top;padding-top:20px;">
                    <table cellpadding="0" cellspacing="0" style="width:100%; height:400px;">

<tr><td  class="lefttd">User Name:<span class="glyphicon glyphicon-user"></span></td><td><input type="text" name="t1" required="required" pattern="[a-zA-Z _]{4,15}" title="please enter only characters" /></td></tr>


<tr><td class="lefttd">CVV Code:<span class="glyphicon glyphicon-time"></span></td><td><input type="number" name="t2" required="required" pattern="[0-9]{18,49}" title="please enter only  numbers" /></td></tr>
<tr><td class="lefttd">Account No:<span class="glyphicon glyphicon-time"></span></td><td><input type="number" name="t3" required="required" pattern="[0-9]{10,11}" title="please enter only numbers " /></td></tr>
<tr><td class="lefttd"> Blood Group </td><td><select name="t4" required><option value="">Select</option>
<?php
$cn=makeconnection();
$s="select * from bloodgroup";
	$result=mysqli_query($cn,$s);
	$r=mysqli_num_rows($result);
	//echo $r;
	while($data=mysqli_fetch_array($result))
	{
		if(isset($_POST["show"])&& $data[0]==$_POST["s2"])
		{
			echo "<option value=$data[0] selected>$data[1]</option>";
		}
		else
		{
			echo "<option value=$data[0]>$data[1]</option>";
		}
		
		
		
	}
	mysqli_close($cn);

?>

</select></td></tr>

<tr><td>&nbsp;</td><td><input type="submit" value="Pay" name="sbmt" style="border:0px; background:linear-gradient(#7800,#D50000); width:100px; height:30px; border-radius:10px 1px 10px 1px; box-shadow:1px 1px 5px black; color:white; font-weight:bold; font-size:14px; text-shadow:1px 1px 6px black; "></td></tr></table>
</td></tr>
</table>
</form>
</div>
</div>
        
<?php

if(isset($_POST["sbmt"])) 
{
	$cn=makeconnection();
	$s="insert into payment(Username,CVVCode,Accountnumber,b_id) values('" . $_POST["t1"] ."','" . $_POST["t2"] . "','" . $_POST["t3"] . "','" . $_POST["t4"] . "')";
         mysqli_query($cn,$s);
	mysqli_close($cn);
	if($s>0)
	{
	echo "<script>alert('Record Save');</script>";
	}
	else
	{echo "<script>alert('Record Save');</script>";
	}
}
?>	
</body>
</html>