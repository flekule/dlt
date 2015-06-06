<?php
/**
 * Created by PhpStorm.
 * User: Frank Lekule
 * Date: 3/30/2015
 * Time: 9:35 PM
 */
class DB_Functions {

    private $db;

    //put your code here
    // constructor
    function __construct() {
        require_once 'DB_Connect.php';
        // connecting to database
        $this->db = new DB_Connect();
        $this->db->connect();
    }

    // destructor
    function __destruct() {

    }

    /**
     * Storing new user
     * returns user details
     */
    public function storeUser($firstname, $surname, $email, $password, $IMEI) {
        $uuid = uniqid('', true);
     //   $hash = $this->hashSSHA($password);
      /*  $encrypted_password = $hash["encrypted"]; // encrypted password
        $salt = $hash["salt"]; // salt*/
        $result = mysql_query("INSERT INTO users(firstname, surname,  imei, email, password,  created_at) VALUES( '$firstname', '$surname' , '$IMEI' , '$email', '$password',  NOW())");
        // check for successful store
        if ($result) {
            // get user details
            $uid = mysql_insert_id(); // last inserted id
            $result = mysql_query("SELECT * FROM users WHERE uid = $uid");
            // return user details
            return mysql_fetch_array($result);
        } else {
            return false;
        }
    }

    /**
     * Get user by email and password
     */
    public function getUserByEmailAndPassword($email, $password) {
        $result = mysql_query("SELECT * FROM users WHERE email = '$email' AND password = '$password'") or die(mysql_error());
        // check for result
        $no_of_rows = mysql_num_rows($result);
        if ($no_of_rows > 0) {
            $result = mysql_fetch_array($result);
            /* $salt = $result['salt'];
             $encrypted_password = $result['encrypted_password'];
             $hash = $this->checkhashSSHA($salt, $password);*/
             // check for password equality
           /*  if ($result == $password) {
                 // user authentication details are correct*/
                 return $result;

            return $result;
        } else {
            // user not found
            return false;
        }
    }

    /**
     * Check user is existed or not
     */
    public function isUserExisted($email, $password) {
        $result = mysql_query("SELECT email from users WHERE email = '$email' AND password = '$password'");
        $no_of_rows = mysql_num_rows($result);
        if ($no_of_rows > 0) {
            // user existed
            return true;
        } else {
            // user not existed
            return false;
        }
    }

    /**
     * Encrypting password
     * @param password
     * returns salt and encrypted password
     */
    public function hashSSHA($password) {

        $salt = sha1(rand());
        $salt = substr($salt, 0, 10);
        $encrypted = base64_encode(sha1($password . $salt, true) . $salt);
        $hash = array("salt" => $salt, "encrypted" => $encrypted);
        return $hash;
    }

    /**
     * Decrypting password
     * @param salt, password
     * returns hash string
     */
    public function checkhashSSHA($salt, $password) {

        $hash = base64_encode(sha1($password . $salt, true) . $salt);

        return $hash;
    }

}

?>
