<?php
  require_once('init.php');
  if(isset($_POST['email-old']) && isset($_POST['email-new'])){
    $query = "SELECT * FROM utenti WHERE utente_email='".$_POST['email-old']."';";
    $rs = mysqli_query($link, $query);
    if(!$rs == mysqli_query($link, $query)){
      echo "errore";
      exit;
    }

    $num_row = mysqli_num_rows($rs);
    $row = mysqli_fetch_array($rs);
    if($num_row==1 && $row['utente_id'] == $_SESSION['utente_id']){
      $query = "UPDATE utenti SET utente_email='".$_POST['email-new']."' WHERE utente_id='".$_SESSION['utente_id']."'";
      $rs = mysqli_query($link, $query);
      mysqli_close($link);
      header('Location: /home.php');
    }else{
      mysqli_close($link);
          //email già utilizzata
  }
}

  if(isset($_POST['user-old']) && isset($_POST['user-new'])){
    $query = "SELECT * FROM utenti WHERE utente_username='".$_POST['user-old']."';";
    $rs = mysqli_query($link, $query);
    if(!$rs == mysqli_query($link, $query)){
      echo "errore";
      exit;
    }

    $num_row = mysqli_num_rows($rs);
    $row = mysqli_fetch_array($rs);
    if($num_row==1 && $row['utente_id'] == $_SESSION['utente_id']){
      $query = "UPDATE utenti SET utente_username='".$_POST['user-new']."' WHERE utente_id='".$_SESSION['utente_id']."'";
      $rs = mysqli_query($link, $query);
      header('Location: /home.php');
    }else{
          //email già utilizzata
  }
}








/*

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
    }
  }*/
?>
