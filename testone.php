<?php
require_once("config.php");
$link = mysqli_connect(DBMS_HOST, DBMS_USER, DBMS_PASSWORD, DBMS_DB );

if (!$link) {
  exit;
}

$query = "SELECT * FROM utenti WHERE utente_email='".$email."' AND utente_password='".$password."';";

$rs = mysqli_query($link, $query);

if(!$rs == mysqli_query($link, $query)){
  echo "errore";
  exit;
}

$num_row = mysqli_num_rows($rs);

if($num_row==1){
  $ret = TRUE;
  $row = mysqli_fetch_assoc($rs);
  $_SESSION['utente_id'] = $row['utente_id'];
}
mysqli_close($link);

 ?>
