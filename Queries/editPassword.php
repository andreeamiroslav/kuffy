<?php
  require_once('init.php');
  if($_POST['password-new'] == $_POST['password-confirm']){
    $query = "SELECT * FROM utenti WHERE utente_id='".$_SESSION['utente_id']."' AND utente_password='".$_POST['password-now']."';";

    $rs = mysqli_query($link, $query);

    if(!$rs == mysqli_query($link, $query)){
      echo "errore";
      exit;
    }

    $num_row = mysqli_num_rows($rs);

    if($num_row==1){
      $query = "UPDATE utenti SET utente_password='".$_POST['password-new']."' WHERE utente_id='".$_SESSION['utente_id']."'";
      $rs = mysqli_query($link, $query);
      header('Location: /home.php');
      mysqli_close($link);
    }
    mysqli_close($link);
  }
  mysqli_close($link);
?>
