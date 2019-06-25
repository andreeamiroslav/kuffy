<?php
    require_once('init.php');

      $query = 'INSERT INTO prenotazioni '.'(from_day, to_day, days, pax, nome, p_cognome, id_stanza, check_in, check_out, p_provenienza, p_sesso, p_nascita, p_professione) VALUES ("'.
          $_REQUEST['from'].'", "'.
          $_REQUEST['to'].'", "'.
          $_REQUEST['days'].'", "'.
          $_REQUEST['pax'].'", "'.
          $_REQUEST['name'].'", "'.
          $_REQUEST['surname'].'", "'.
          $_REQUEST['idstanza'].'", "'.
          $_REQUEST['checkin'].'", "'.
          $_REQUEST['checkout'].'", "'.
          $_REQUEST['provenienza'].'", "'.
          $_REQUEST['gender'].'", "'.
          $_REQUEST['nascita'].'", "'.
          $_REQUEST['professione'].'");';
         $rs = mysqli_query($link, $query);
         if(isset($_GET['resID']) && isset($_GET['stanzaidd'])){
           header('Location: /Queries/updateReservation.php?action=del&id='.$_GET['resID'].'&stanzaid='.$_GET['stanzaidd']);
         }else{
           header('Location: /index.php');
         }
 ?>
