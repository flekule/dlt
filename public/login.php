<?php
/**
 * Created by PhpStorm.
 * User: Frank Lekule
 * Date: 5/8/2015
 * Time: 9:09 PM
 */
mysql_connect("localhost","root","Xerxes641602");
$db= mysql_select_db("cdcol");
$password=$_POST["password"];
$email=$_POST["email"];
if (!empty($_POST)) { if (empty($_POST['email']) || empty($_POST['password']))
{
    // Create some data that will be the JSON response
    $response["success"] = 0; $response["message"] = "One or both of the fields are empty .";
     //die is used to kill the page, will not let the code below to be executed. It will also //display the parameter, that is the json data which our android application will parse to be //shown to the users
    die(json_encode($response));
}
    $query = " SELECT * FROM users WHERE email = '$email'and password='$password'";
    $sql1=mysql_query($query);
    $row = mysql_fetch_array($sql1);
    if (!empty($row)) { $response["success"] = 1;
        $response["message"] = "You have been sucessfully login";
        die(json_encode($response)); } else{ $response["success"] = 0;
        $response["message"] = "invalid email or password "; die(json_encode($response));
    }
} else{
    $response["success"] = 0;
    $response["message"] = " One or both of the fields are empty ";
    die(json_encode($response));
}
mysql_close();
?>

