<?php
/**
 * Created by PhpStorm.
 * User: Frank Lekule
 * Date: 3/30/2015
 * Time: 9:44 PM
 */
/**
 * File to handle all API requests
 * Accepts GET and POST
 *
 * Each request will be identified by TAG
 * Response will be JSON data

/**
 * check for POST request   && $_GET['tag'] != '')
 */

$con=mysqli_connect("localhost","root","Xerxes641602","cdcol");

if (isset($_POST['tag'])&& $_POST['tag'] != '')  {
    // get tag
    $tag = $_POST['tag'];

    // include db handler
    require_once 'include/DB_Functions.php';
    $db = new DB_Functions();

    // response Array
     $response = array("tag" => $tag, "error" => FALSE);

    // check for tag type
    if ($tag == 'login') {
        // Request type is check Login

        $email = $_POST['email'];
        $password = $_POST['password'];

        // check for user
        $user = $db->getUserByEmailAndPassword($email, $password);
        if ($user != false) {
            // user found
            $response["error"] = FALSE;
            $response["uid"] = $user["unique_id"];
            $response["user"]["firstname"] = $user["firstname"];
            $response["user"]["surname"] = $user["surname"];
            $response["user"]["email"] = $user["email"];
            $response["user"]["IMEI"] = $user["IMEI"];
            $response["user"]["created_at"] = $user["created_at"];
            $response["user"]["updated_at"] = $user["updated_at"];
            echo json_encode($response);
        } else {
            // user not found
            // echo json with error = 1
            $response["error"] = TRUE;
            $response["error_msg"] = "Incorrect email or password!";
            echo json_encode($response);
        }
    } else if ($tag == 'register') {
        // Request type is Register new user
        $firstname = $_POST['firstname'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $IMEI = $_POST['imei'];

        // check if user is already existed
        if ($db->isUserExisted($email,$password)) {
            // user is already existed - error response
            $response["error"] = TRUE;
            $response["error_msg"] = "User already exists";
            echo json_encode($response);
        } else {
            // store user
            $user = $db->storeUser($firstname, $surname, $email, $password , $IMEI);
            if ($user) {
                // user stored successfully
                $response["error"] = FALSE;
                $response["uid"] = $user["unique_id"];
                $response["user"]["firstname"] = $user["firstname"];
                $response["user"]["surname"] = $user["surname"];
                $response["user"]["IMEI"] = $user["IMEI"];
                $response["user"]["email"] = $user["email"];
                $response["user"]["created_at"] = $user["created_at"];
                $response["user"]["updated_at"] = $user["updated_at"];
                echo json_encode($response);
            } else {
                // user failed to store
                $response["error"] = TRUE;
                $response["error_msg"] = "Error occured in Registartion";
                echo json_encode($response);
            }
        }
    } else {
        // user failed to store
        $response["error"] = TRUE;
        $response["error_msg"] = "Unknown 'tag' value. It should be either 'login' or 'register'";
        echo json_encode($response);
    }
} else {
    $response["error"] = TRUE;
    $response["error_msg"] = "Required parameter 'tag' is missing!";
    echo json_encode($response);
}
?>
