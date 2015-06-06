
<?php
/**
 * Created by PhpStorm.
 * User: Frank Lekule
 * Date: 4/9/2015
 * Time: 10:46 AM
 */
// error_reporting(E_ALL ^ E_NOTICE);
$con=mysqli_connect("localhost","root","Xerxes641602","cdcol");

if (mysqli_connect_error($con))
{
    echo "Failed to connect to MySQL: " . mysqli_connect_errno();_connect_error();
}
if (isset($_POST['lat'], $_POST['lon'], $_POST['email'])) {

    $latitude = $_POST['lat'];
    $longitude = $_POST['lon'];
    $user_id = $_POST['email'];


    $sql = "INSERT INTO locations (latitude, longitude, email) VALUES($latitude, $longitude, $user_id)";

    $result = mysqli_query($con, $sql);


//$row = mysqli_fetch_array($result);
//$data = $row[1];
    if ($result) {
        echo $result;
    } else {
        die(" db query failed" . mysqli_error($con));
    }
    mysqli_close($con);
}
?>