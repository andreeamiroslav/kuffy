<?php
  require_once('init.php');
  $redirectLink = "Location: /modificaProfiloUtente.php?";
  if($_POST['email-old'] != "" && $_POST['email-new'] != ""){
    $query = "SELECT * FROM utenti WHERE utente_email='".$_POST['email-old']."';";
    $rs = mysqli_query($link, $query);
    if(!$rs == mysqli_query($link, $query)){
      echo "errore";
      exit;
    }

    $num_row = mysqli_num_rows($rs);
    $row = mysqli_fetch_array($rs);
    if($num_row==1 && $row['utente_id'] == $_SESSION['utente_id']){
      $query = "SELECT * FROM utenti WHERE utente_email='".$_POST['email-new']."';";
      $rs = mysqli_query($link, $query);
      if(!$rs == mysqli_query($link, $query)){
        echo "errore";
        exit;
      }

      $num_row = mysqli_num_rows($rs);
      $row = mysqli_fetch_array($rs);
      if($num_row>0){
        $redirectLink .= "&mailesistente=1";
      }else{
        $query = "UPDATE utenti SET utente_email='".$_POST['email-new']."' WHERE utente_id='".$_SESSION['utente_id']."'";
        $rs = mysqli_query($link, $query);
        $_SESSION['utente_email'] = $_POST['email-new'];
      }
    }else{
      $rs = mysqli_query($link, $query);
      $redirectLink .= "&mail=1";
  }
}



  if($_POST['user-old'] != "" && $_POST['user-new'] != ""){
    $query = "SELECT * FROM utenti WHERE utente_username='".$_POST['user-old']."';";
    $rs = mysqli_query($link, $query);
    if(!$rs == mysqli_query($link, $query)){
      echo "errore";
      exit;
    }

    $num_row = mysqli_num_rows($rs);
    $row = mysqli_fetch_array($rs);
    if($num_row==1 && $row['utente_id'] == $_SESSION['utente_id']){
      $query = "SELECT * FROM utenti WHERE utente_username='".$_POST['user-new']."';";
      $rs = mysqli_query($link, $query);
      if(!$rs == mysqli_query($link, $query)){
        echo "errore";
        exit;
      }

      $num_row = mysqli_num_rows($rs);
      $row = mysqli_fetch_array($rs);
      if($num_row>0){
        $redirectLink .= "&usernamesistente=1";
      }else{
      $query = "UPDATE utenti SET utente_username='".$_POST['user-new']."' WHERE utente_id='".$_SESSION['utente_id']."'";
      $rs = mysqli_query($link, $query);
      $_SESSION['utente_username'] = $_POST['user-new'];
      //header('Location: /home.php');
    }
    }else{
      $rs = mysqli_query($link, $query);
      $redirectLink .= "&username=1";
  }
}

mysqli_close($link);
if($redirectLink == "Location: /modificaProfiloUtente.php?")
  header('Location: /home.php');
else
  header($redirectLink);







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
      $rs = mysqli_query($redirectLink, $query);
      header('Location: /home.php');
    }
  }*/
?>
