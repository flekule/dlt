@extends('users.layouts.default')
<!doctype html>
<html lang="en">
<head>
@include('users.includes.head')
    <meta charset="UTF-8">
    <title>Signup page</title>

    <style>

    </style>
</head>
<body>

<div class="navbar-header">
<ul class="nav navbar-nav">
</ul>
    </div>


    </div>
@section('content')
<form method="POST" action="{{{ URL::to('users') }}}" accept-charset="UTF-8">
<?php

    $dbhost = "localhost"; // this will ususally be 'localhost', but can sometimes differ
    $dbname = "cdcol"; // the name of the database that you are going to use for this project
    $dbuser = "root"; // the username that you created, or were given, to access your database
    $dbpass = "Xerxes641602"; // the password that you created, or were given, to access your database

    mysql_connect($dbhost, $dbuser, $dbpass) or die("MySQL Error: " . mysql_error());
    mysql_select_db($dbname) or die("MySQL Error: " . mysql_error());
    if(!empty($_POST['username']) && !empty($_POST['password']))
    {
        $username = mysql_real_escape_string($_POST['username']);
        $password = mysql_real_escape_string($_POST['password']);
        $email = mysql_real_escape_string($_POST['email']);

        $checkusername = mysql_query("SELECT * FROM users WHERE firstname = '".$username."'");

        if(mysql_num_rows($checkusername) == 1)
        {
            echo "<h1>Error</h1>";
            echo "<p>Sorry, that username is taken. Please go back and try again.</p>";
        }
        else
        {
            $registerquery = mysql_query("INSERT INTO users (firstname, Password, email) VALUES('".$username."', '".$password."', '".$email."')");
            if($registerquery)
            {
                echo "<h1>Success</h1>";
               // echo "<p>Your account was successfully created. Please <a href=\"indexWeb.php\">click here to login</a>.</p>";
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

    <fieldset>

    </fieldset>
</form>
@stop
</body>
</html>