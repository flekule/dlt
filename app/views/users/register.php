<?php ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>User Management System (Tom Cameron for NetTuts)</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
<div id="main">
    <?php
    session_start();

    $dbhost = "localhost"; // this will ususally be 'localhost', but can sometimes differ
    $dbname = "cdcol"; // the name of the database that you are going to use for this project
    $dbuser = "root"; // the username that you created, or were given, to access your database
    $dbpass = "Xerxes641602"; // the password that you created, or were given, to access your database

    mysql_connect($dbhost, $dbuser, $dbpass) or die("MySQL Error: " . mysql_error());
    mysql_select_db($dbname) or die("MySQL Error: " . mysql_error());
    if(!empty($_POST['email']) && !empty($_POST['password']))
    {
        $firstname = mysql_real_escape_string($_POST['firstname']);
        $password = mysql_real_escape_string($_POST['password']);
        $email = mysql_real_escape_string($_POST['email']);

        $checkusername = mysql_query("SELECT * FROM users WHERE email = '".$email."'");

        if(mysql_num_rows($checkusername) == 1)
        {
            echo "<h1>Error</h1>";
            echo "<p>Sorry, that username is taken. Please go back and try again.</p>";
        }
        else
        {
            $registerquery = mysql_query("INSERT INTO users (firstname, Password, email) VALUES('".$firstname."', '".$password."', '".$email."')");
            if($registerquery)
            {
                echo "<h1>Success</h1>";
                echo "<p>Your account was successfully created. Please <a href=\"index.php\">click here to login</a>.</p>";
            }
            else
            {
                echo "<h1>Error</h1>";
                echo "<p>Sorry, your registration failed. Please go back and try again.</p>";
            }
        }
    }
    else
    {
        ?>

        <h1>Register</h1>

        <p>Please enter your details below to register.</p>

        <form method="post" action="register.php" name="registerform" id="registerform">
            <fieldset>
                <label for="username">Username:</label><input type="text" name="username" id="username" /><br />
                <label for="password">Password:</label><input type="password" name="password" id="password" /><br />
                <label for="email">Email Address:</label><input type="text" name="email" id="email" /><br />
                <input type="submit" name="register" id="register" value="Register" />
            </fieldset>
        </form>

    <?php
    }
    ?>

</div>
</body>
</html>