<?php
echo "ciao";
require_once("config.php");
echo "lol";
$link = mysqli_connect('127.0.0.1', 'utentetest', 'passwordtest', 'test');

if ($link->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
 ?>
