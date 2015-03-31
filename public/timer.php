<?php
/**
 * Created by PhpStorm.
 * User: Frank Lekule
 * Date: 3/26/2015
 * Time: 9:31 PM
 */
$start_time = $_SERVER["REQUEST_TIME_FLOAT"];
echo "Execution time : " , microtime(true) - $start_time, "seconds<br/>";
?>