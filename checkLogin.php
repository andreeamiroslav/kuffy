<?php
  require_once('init.php');
  $loginOk = checkLogin($_REQUEST['email'], $_REQUEST['password'], $link);

  if($loginOk){
    $_SESSION['isLogged'] = TRUE;
    $_SESSION['email'] = $_REQUEST['email'];

    header('Location: home.php');
  } else {
    header('Location: index.php?msg=wrong');
  }

  function checkLogin($email, $password, $link){
    $ret = FALSE;

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
      $_SESSION['utente_username'] = $row['utente_username'];
      $_SESSION['utente_email'] = $row['utente_email'];
    }
    mysqli_close($link);

    return $ret;
  }
 ?>
