<?php
echo "ciao";
require_once("config.php");
echo "lol";

if (mysqli_connect(DBMS_HOST, DBMS_USER, DBMS_PASSWORD, DBMS_DB)->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
 ?>
