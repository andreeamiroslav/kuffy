<?php
  require_once('init.php');
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
        mysqli_close($link);
        header('Location: /modificaProfiloUtente.php?msg=mailesistente');
      }else{
        $query = "UPDATE utenti SET utente_email='".$_POST['email-new']."' WHERE utente_id='".$_SESSION['utente_id']."'";
        $rs = mysqli_query($link, $query);
        $_SESSION['utente_email'] = $_POST['email-new'];
      }
    }else{
      $rs = mysqli_query($link, $query);
      mysqli_close($link);
      header('Location: /modificaProfiloUtente.php?msg=mail');
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
        mysqli_close($link);
        header('Location: /modificaProfiloUtente.php?msg=usernameesistente');
      }else{
      $query = "UPDATE utenti SET utente_username='".$_POST['user-new']."' WHERE utente_id='".$_SESSION['utente_id']."'";
      $rs = mysqli_query($link, $query);
      $_SESSION['utente_username'] = $_POST['user-new'];
      header('Location: /home.php');
    }
    }else{
      $rs = mysqli_query($link, $query);
      mysqli_close($link);
      header('Location: /modificaProfiloUtente.php?msg=username');
  }
}

mysqli_close($link);
header('Location: /home.php');






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
