<?php
echo "ciao";
require_once("config.php");
echo "lol";
echo var_dump(function_exists('mysqli_connect'));
echo "lol";
if ($link->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
 ?>
