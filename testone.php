<?php
require_once("config.php");
echo "lol";
$link = mysqli_connect(DBMS_HOST, DBMS_USER, DBMS_PASSWORD, DBMS_DB );
echo "xd";
if (!$link) {
  exit;
}

$query = "SELECT * FROM utenti";

$rs = mysqli_query($link, $query);
echo $rs['utente_id'];
if(!$rs == mysqli_query($link, $query)){
  echo "errore";
  exit;
}

$num_row = mysqli_num_rows($rs);

if($num_row==1){
  echo "fatta";
  $ret = TRUE;
  $row = mysqli_fetch_assoc($rs);
  $_SESSION['utente_id'] = $row['utente_id'];
}
mysqli_close($link);

 ?>
