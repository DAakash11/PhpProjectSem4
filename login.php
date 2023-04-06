<?php

    session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Log in</title>
	<link rel="stylesheet" href="marucss.css">
</head>
<body>
	<form action="#" method="POST">
		<div class="center">
			<h1>Log in</h1>
			<div class="inputbox">
				<input type="text" placeholder="Username" name="uname">
			</div>
			<div class="inputbox">
				<input type="password" placeholder="Password" name="pwd">
			</div>
			<div>
				<input type="checkbox" name="remember_me">Remember me
			</div>
			<div align=center style="padding:5%;">
				<input type="submit" name="submit" class="button button1" value="Log in">
			</div>
		</div>
	</form>
</body>
</html>

<?php

	@$user=$_POST['uname'];
	@$pwd=$_POST['pwd'];

	$myconnection=mysqli_connect("localhost", "root", "", "final");
    $query="SELECT username, pwd FROM details";
    $result=mysqli_query($myconnection, $query);
    
    if (mysqli_num_rows($result) > 0) {
        // OUTPUT DATA OF EACH ROW
        while($row = mysqli_fetch_assoc($result)) {
            if ($row["username"]==$user) {
                $_SESSION['USERNAME']=$user;
                $_SESSION['PASSWORD']=$pwd;
                break;
            }
        }
    }
    
    if (mysqli_num_rows($result) > 0) {
        // OUTPUT DATA OF EACH ROW
        while($row = mysqli_fetch_assoc($result)) {
            if ($row["username"] != $user) {
				echo "Username not found..";
	?>
	
	Click here to <a href="signup.php">Sign Up</a>

	<?php
            }
        }
    }

    if (isset($_POST['remember_me'])) {
        setcookie("USERNAME", "$user", time()+24*30*60*60);
        setcookie("PASSWORD", "$pwd", time()+24*30*60*60);
    }

    if ($user === $_COOKIE['USERNAME'])
        echo "Your id is " . $_COOKIE['USERNAME'] . "and password is " . $_COOKIE['PASSWORD'];

    if (isset($_POST['submit']))
        header("location: WelcomePage.php");

?>