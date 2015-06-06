<?php
/**
 * Created by PhpStorm.
 * User: Frank Lekule
 * Date: 5/6/2015
 * Time: 11:10 AM
 */

$dbname            ='cdcol'; //Name of the database
$dbuser            ='root'; //Username for the db
$dbpass            ='Xerxes641602'; //Password for the db
$dbserver        ='localhost'; //Name of the mysql server

$dbcnx = mysql_connect ("$dbserver", "$dbuser", "$dbpass");
mysql_select_db("$dbname") or die(mysql_error());
?>

