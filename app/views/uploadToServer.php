<?php
/**
 * Created by PhpStorm.
 * User: Frank Lekule
 * Date: 5/19/2015
 * Time: 12:54 PM
 */

    include 'config.php';

        $file_path = "dlts/files/";
            $file_path = $file_path . basename( $_FILES['uploaded_file']['name']);
            if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $file_path)) {

                $link = mysql_connect("$dbserver", "$dbuser", "$dbpass");
                mysql_query($link, "INSERT INTO images VALUES('".$file_path."')"); /*or trigger_error($link->error."[ $sql]");*/
                mysql_close($link);

            }

            else{
                echo "fail";
            }
   ?>