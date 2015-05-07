<?php
/**
 * Created by PhpStorm.
 * User: Frank Lekule
 * Date: 3/26/2015
 * Time: 10:47 AM
 */
$hostname_localhost ="localhost";
$database_localhost ="cdcol";
$username_localhost ="root";
$password_localhost ="Xerxes641602";
$localhost = mysql_connect($hostname_localhost, $username_localhost,$password_localhost)
or
trigger_error(mysql_error(),E_USER_ERROR);

mysql_select_db($database_localhost, $localhost);

$email = "nonstopfrale@yahoo.com";
$password = "Xerxes641602";
$email = isset($_POST['email'])?$_POST['email']:
$password = isset($_POST['password'])?$_POST['password']:
$query_search = "select * from users where email = '".$email."' AND password = '".$password. "'";
$query_exec = mysql_query($query_search) or die(mysql_error());
$rows = mysql_num_rows($query_exec);
echo $rows;
if($rows == 0) {
   echo "No Such User Found";
}
else  {
    echo "User Found";
}
?>
