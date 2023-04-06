<html>
<head>
<title>Sign-Up Page</title>
<style>
   body{ background: linear-gradient(45deg, greenyellow, dodgerblue);}
   table{
    background: white;
    padding:15px;
    border-radius: 15px;
    font-size: 20;
    line-height: 1.7;
   }
   .input{
    width:180px;
    
   }
   
</style>
</head>
<body>
<center><h1><b>Fill The Registration Form</b></h1></center>
<form action="" method="POST" enctype="multipart/form-data">
<table align="center">
<tr>
<td>First Name</td>
<td> : </td>
<td><input type="text" name="FN" class="input"></td>
</tr>
<tr>
<td>Last Name</td>
<td> : </td>
<td><input type="text" name="LN" class="input"></td>
</tr>
<tr>
<td>Gender</td>
<td> : </td>
<td>
<input type="radio" name="gender" value="Male">Male
<input type="radio" name="gender" value="Female">Female
</td>
</tr>
<tr>
<td>Date of Birth</td>
<td> : </td>
<td><input type="date" name="DOB"  class="input"></td>
</tr>
<tr>
<td valign="top">Address</td>
<td valign="top"> : </td>
<td><textarea rows="3" cols="25" name="adrs" class="input"></textarea></td>
</tr>
<tr>
<td>Profile Photo</td>
<td> : </td>
<td><input type="file" name="Pro_Photo" class="input"></td>
</tr>
<tr>
<td>City</td>
<td> : </td>
<td>
<select name="CT" class="input">
<option>Rajkot</option>
<option>Dwarka</option>
<option>Surat</option>
<option>Gandhinagar</option>
<option>Barora</option>
<option>Jamnagar</option>
</select>
</td>
</tr>
<tr>
<td>Username</td>
<td> : </td>
<td><input  class="input" type="text" name="unm"></td>
</tr>         
<tr>
<td>E-Mail Address</td>
<td> : </td>
<td><input type="email" class="input" name="email"></td>
</tr>
<tr>
<td>Password</td>
<td> : </td>
<td><input type="password" name="pwd" class="input"></td>
</tr>
<tr>
<td>Re confirm</td>
<td> : </td>
<td><input  class="input" type="password" name="rpwd"></td>
</tr>
<tr>
<td>Phone No</td>
<td> : </td>
<td><input type="text" name="PhNo"  class="input" maxlength="10"></td>
</tr>
<tr>
<td>Captcha Code <img src="Captcha.php"></td>
<td> : </td>
<td><input type="text" name="code" class="input" maxlength="5"></td>
</tr>
<tr>
<td colspan=3 align=center><input type="submit" name="submit"></td>
</tr>
</table>
</form>
</body>
</html>

<?php

//@$pic=$_POST['Pro_Photo'];
@$target_path="./Profile_Photo/";
@$target_path=$target_path.basename($_FILES['Pro_Photo']['name']);
@$img_nam = $target_path;

if(move_uploaded_file($_FILES['Pro_Photo']['tmp_name'],$target_path))
{
    echo "file uploaded";
}
else
{
    echo "file not uploaded";
}

@$FN=$_POST['FN'];
@$LN=$_POST['LN'];
@$gender=$_POST['gender'];
@$DOB=$_POST['DOB'];
@$adrs=$_POST['adrs'];
// @$Pro_Photo=$_POST['Pro_Photo'];
@$CT=$_POST['CT'];
@$unm=$_POST['unm'];
@$email=$_POST['email'];
@$pwd=$_POST['pwd'];
@$rpwd=$_POST['rpwd'];
@$PhNo=$_POST['PhNo'];
@$code=$_POST['code'];

$cn=mysqli_connect("localhost","root","","final");
if(mysqli_connect_errno())
{
    ?>
    <script>
        alert("Error conencting");
    </script>
    <?php
}
else
{
    ?>
    <script>
        alert("DataBase Conencted");
    </script>
    <?php
}
$uquery="Select * from details where username='$unm'";
$query=mysqli_query($cn,$uquery);
$numcount = mysqli_fetch_row($query);
if($numcount>0)
{
    echo "Username already exists";
}
$numquery="Select *  from personal_info where PhNo='$PhNo'";
$query=mysqli_query($cn,$numquery);	          
$numcount = mysqli_fetch_row($query);
if($numcount>0)
{
    echo "Number already exists";
}
$i="insert into personal_info values('$FN','$LN','$gender','$adrs','$DOB','$img_nam','$PhNo')";
if(mysqli_query($cn,$i))
{
    echo "inserted";
}
if(isset($_POST['submit']))
{
    $i="insert into details values('$unm','$email','$rpwd','$PhNo')";
    if(mysqli_query($cn,$i))
    {
        echo "inserted";
    }
    else
    {
        echo "Error inserting record";
    }
}

if (isset($_POST['submit'])) {
    header("location: login.php");
}

?>

