<?php
if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Username']))
{
    ?>

    <h1>Member Area</h1>
    <pThanks for logging in! You are <code><?=$_SESSION['Firstname']?></code> and your email address is <code><?=$_SESSION['EmailAddress']?></code>.</p>

     <?php
}
elseif(!empty($_POST['email']) && !empty($_POST['password']))
{
    $email = mysql_real_escape_string($_POST['email']);
    $password = mysql_real_escape_string($_POST['password']);

    $checklogin = mysql_query("SELECT * FROM users WHERE email = '".$username."' AND Password = '".$password."'");

    if(mysql_num_rows($checklogin) == 1)
    {
        $row = mysql_fetch_array($checklogin);
        $email = $row['EmailAddress'];

        $_SESSION['Username'] = $username;
        $_SESSION['EmailAddress'] = $email;
        $_SESSION['LoggedIn'] = 1;

        echo "<h1>Success</h1>";
        echo "<p>We are now redirecting you to the member area.</p>";
        echo "<meta http-equiv='refresh' content='=2;indexWeb.php' />";
    }
    else
    {
        echo "<h1>Error</h1>";
        echo "<p>Sorry, your account could not be found. Please <a href=\"indexWeb.php\">click here to try again</a>.</p>";
    }
}
else
{
    ?>

    <h1>Member Login</h1>

    <p>Thanks for visiting! Please either login below, or <a href="register.php">click here to register</a>.</p>

    <form method="post" action="indexWeb.php.php" name="loginform" id="loginform">
        <fieldset>
            <label for="username">Username:</label><input type="text" name="username" id="username" /><br />
            <label for="password">Password:</label><input type="password" name="password" id="password" /><br />
            <input type="submit" name="login" id="login" value="Login" />
        </fieldset>
    </form>

<?php
}
?>

</div>
</body>
</html>