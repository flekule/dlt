<?php
/**
 * Created by PhpStorm.
 * User: Frank Lekule
 * Date: 5/12/2015
 * Time: 10:41 AM
 */
/**
 * File to handle all API requests
 * Accepts GET and POST
 *
 * Each request will be identified by TAG
 * Response will be JSON data

/**
 * check for POST request
 */
if (isset($_POST['tag']) && $_POST['tag'] != '') {
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

            /*$response["user"]["password"] = $user["password"];
            $response["user"]["email"] = $user["email"];
            $response["user"]["created_at"] = $user["created_at"];
            $response["user"]["updated_at"] = $user["updated_at"];*/
            echo json_encode($response);
        } else {
            // user not found
            // echo json with error = 1
            $response["error"] = TRUE;
            $response["error_msg"] = "Incorrect email or password!!";
            echo json_encode($response);
        }
    } else if ($tag == 'register') {
        // Request type is Register new user

        $email = $_POST['email'];
        $password =$_POST['password'];
        $firstname = $_POST['firstname'];
        $surname = $_POST['surname'];
        $imei = $_POST['imei'];

        // check if user is already existed
        if ($db->isUserExisted($email, $password)) {
            // user is already existed - error response
            $response["error"] = TRUE;
            $response["error_msg"] = "User already existed";
            echo json_encode($response);
        } else {
            // store user
            $user = $db->storeUser($firstname, $surname, $email, $password, $imei);
            if ($user) {
                // user stored successfully
                $response["error"] = FALSE;

             /*   $response["user"]["firstname"] = $user["firstname"];
                $response["user"]["surname"] = $user["surname"];
                $response["user"]["email"] = $user["email"];

                $response["user"]["password"] = $user["password"];
                $response["user"]["imei"] = $user["imei"];
                $response["user"]["created_at"] = $user["created_at"];
                $response["user"]["updated_at"] = $user["updated_at"];*/
                echo json_encode($response);
            } else {
                // user failed to store
                $response["error"] = TRUE;
                $response["error_msg"] = "Error occured in Registration";
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
