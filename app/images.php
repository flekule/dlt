<?php
/**
 * Created by PhpStorm.
 * User: Frank Lekule
 * Date: 3/31/2015
 * Time: 11:20 PM
 */
$file_path = "uploads/";

$file_path = $file_path . basename( $_FILES['uploaded_file']['name']);
if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $file_path)) {
    // replace $host,$username,$password,$dbname with real info
    $link=mysqli_connect('localhost','root','Xerxes641602','cdcol');
    mysqli_query($link,"INSERT INTO `images` (filename,path) VALUES ('".$_FILES['uploaded_file']['tmp_name']."','".$file_path."')") or trigger_error($link->error."[ $sql]");
    mysqli_close($link);

} else{
    echo "fail";}