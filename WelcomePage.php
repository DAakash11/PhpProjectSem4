<html>
    <head>
        <title>Welcome</title>
        <style>
   body{ background: linear-gradient(45deg, greenyellow, dodgerblue);}
   </style>
    </head>
    <body>
        <table border=2>
<?php

    session_start();
    echo $_SESSION['USERNAME'];
    $user=$_SESSION['USERNAME'];

?>

<tr>    
    <td> Username </td>
    <td> E-mail </td>
    <td> Password</td>
    <td> Phone number</td>
    <td> First Name </td>
    <td> Last Name </td>
    <td> Gender </td>
    <td> Address </td>
    <td> Date of Birth </td>
    <td> Profile Photos </td>
</tr>

<?php
    
	$myconnection=mysqli_connect("localhost", "root", "", "final");
    $query="SELECT * FROM details WHERE username='$user'";
    $result=mysqli_fetch_assoc(mysqli_query($myconnection, $query));
?>

<tr>    
    <td>
        <?php echo $result['username']; ?>
    </td>
    <td>
        <?php echo $result['Email']; ?>
    </td>
    <td>
        <?php echo $result['pwd']; ?>
    </td>
    <td>
        <?php echo $result['PhNo']; ?>
    </td>

<?php

    $temp=$result['PhNo'];
    $query="SELECT * FROM personal_info WHERE PhNo='$temp'";
    $result=mysqli_fetch_assoc(mysqli_query($myconnection, $query));

    $user=$_SESSION['USERNAME'];
    $password=$_SESSION['PASSWORD'];
    
    $myconnection1=mysqli_connect("localhost", "root", "", "final");
    $query1="SELECT * FROM details WHERE username='$user'";
    $result1=mysqli_fetch_assoc(mysqli_query($myconnection1, $query1));

    if($user == ''){
        header("location: login.php");
    }
    elseif($password == ''){
        header("location: login.php");
    }

    if($result1['pwd'] != $password){
        header("location: login.php");
    }

?>

    <td>
        <?php echo $result['FN']; ?>
    </td>
    <td>
        <?php echo $result['LN']; ?>
    </td>
    <td>
        <?php echo $result['Gender']; ?>
    </td>
    <td>
        <?php echo $result['Adrs']; ?>
    </td>
    <td>
        <?php echo $result['DOB']; ?>
    </td>
    <td>
        <img src="<?php echo $result['Pro_Photo']; ?>" height="100" width="100">
    </td>
</tr>
</table>
<form action="#" method="POST">
    <input type="submit" value="LogOut" name="log">
</form>
<?php
if (isset($_POST['log'])) {
    header("location: login.php");
}
?>
</body>
</html>