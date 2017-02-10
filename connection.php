<?php
    error_reporting(E_ALL ^ E_DEPRECATED);

    $user = "ravi";
    $pass = "ravi123";
    $db = "student";
    $host = "localhost";

    $con = mysql_connect($host, $user, $pass);
    mysql_select_db($db);

    if(!$con)
    {
        echo "Error in database connectivity..!!";
        die();
    }
?>