<?php
/**
 * Created by PhpStorm.
 * User: Frank Lekule
 * Date: 3/30/2015
 * Time: 9:33 PM
 */
class DB_Connect {

    // constructor
    function __construct() {

    }

    // destructor
    function __destruct() {
        // $this->close();
    }

    // Connecting to database
    public function connect() {
        require_once 'include/Config.php';
        // connecting to mysql
        $con = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
        //testing if connection failed
        if (mysqli_connect_errno()){
            die(mysql_error("connection failed"));
        }
        // selecting database
        mysql_select_db(DB_DATABASE) or die(mysql_error("connection failed"));

        // return database handler
        return $con;
    }

    // Closing database connection
    public function close() {
        mysql_close();
    }

}

?>
