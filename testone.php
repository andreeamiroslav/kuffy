<?php
require_once("config.php");
$link = mysqli_connect(DBMS_HOST, DBMS_USER, DBMS_PASSWORD, DBMS_DB );
echo "ciao";
if (!$link) {
  exit;
}

$query = "SELECT * FROM utenti";

$rs = mysqli_query($link, $query);

if(!$rs == mysqli_query($link, $query)){
  echo "errore";
  exit;
}

$num_row = mysqli_num_rows($rs);

if($num_row==1){
  echo "ciao";
}
mysqli_close($link);

 ?>
