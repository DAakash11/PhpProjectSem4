<html>
    <head>
        <title>First Page of our web-site</title>
    </head>
    <style>
        body{
            background: linear-gradient(45deg, greenyellow, dodgerblue);
            vertical-align: top;
        }
        input{
            padding:10px;
            width:80px;
            background-color: rgb(247, 255, 247);
            cursor:pointer;
        }
        input:hover{
            width:100px;
            padding:12px;
            border-radius: 4px;
            transition: scale(5);
            
        }
    </style>
    <body>
        <form action="" method="POST">

            <h1><center><b>Welcome To Our Web-Site</b></center></h1>
            <h4><center>LogIn With Your Web-Site Account</center></h4>

            <center><input type="submit" name="login" value="Log In">&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="submit" name="signup" value="Sign Up"></center>
        </form>
    </body>
</html>
<?php

    if(isset($_POST['login']))
    {
        header("location:login.php");
    }
    if(isset($_POST['signup']))
    {
        header("location:signup.php");
    }
?>