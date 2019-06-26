<?php
    require_once('init.php');
    if($_POST['conf-password'] == $_POST['password']){
      $query = 'SELECT DISTINCT * FROM utenti WHERE utente_email="'.$_POST['email'].'"';
      $rs = mysqli_query($link, $query);
      if(!$rs == mysqli_query($link, $query)){
        echo "errore";
        exit;
      }

      $num_row = mysqli_num_rows($rs);

      if($num_row==1){
        mysqli_close($link);
        header('Location: /registrazione.php?msg=email');
    }else{
      $query = 'SELECT DISTINCT * FROM utenti WHERE utente_username="'.$_POST['username'].'"';
      $rs = mysqli_query($link, $query);
      if(!$rs == mysqli_query($link, $query)){
        echo "errore";
        exit;
      }

      $num_row = mysqli_num_rows($rs);

      if($num_row==1){
        mysqli_close($link);
        header('Location: /registrazione.php?msg=username');
      }else{
      $query = 'INSERT INTO utenti '.'(`utente_id`, `utente_email`, `utente_password`, `utente_nome`, `utente_cognome`, `utente_username`, `utente_nascita`) VALUES (NULL,"'.
          $_REQUEST['email'].'", "'.
          $_REQUEST['password'].'", "'.
          $_REQUEST['name'].'", "'.
          $_REQUEST['surname'].'", "'.
          $_REQUEST['username'].'","'.
          $_REQUEST['born'].'");';
          //echo '<br>Questa è la query: '.$query;
          $rs = mysqli_query($link, $query);
          mysqli_close($link);
          header('Location: /index.php');
        }
      }
      }else{
          mysqli_close($link);
          header('Location: /registrazione.php?msg=password');
        }
 ?>
