<?php
    require_once('init.php');
    if($_POST['conf-password'] == $_POST['password']){
      $query = 'INSERT INTO utenti '.'(`utente_id`, `utente_email`, `utente_password`, `utente_nome`, `utente_cognome`, `utente_username`, `utente_nascita`) VALUES (NULL,"'.
          $_REQUEST['email'].'", "'.
          $_REQUEST['password'].'", "'.
          $_REQUEST['name'].'", "'.
          $_REQUEST['surname'].'", "'.
          $_REQUEST['username'].'","'.
          $_REQUEST['born'].'");';
          //echo '<br>Questa è la query: '.$query;
          $rs = mysqli_query($link, $query);
          header('Location: /index.php');
        }
 ?>
