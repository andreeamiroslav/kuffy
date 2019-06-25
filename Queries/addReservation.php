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
           $query = "DELETE FROM prenotazioni
                     WHERE id in (SELECT * FROM (SELECT p.id
                     FROM prenotazioni p, stanze s, strutture str
                     WHERE str.struttura_fkutenteid = '".$_SESSION['utente_id']."' AND s.stanza_fkstrutturaid=str.struttura_id
                           AND p.id_stanza = s.stanza_id AND p.id = ".$_GET['resID'].") as t)";
           $rs = mysqli_query($link, $query);

             $query = "DELETE FROM ospiti
                       WHERE o_prenotazioneid in
                        (SELECT * FROM (SELECT o_prenotazioneid
                         FROM ospiti o, prenotazioni p, stanze s, strutture str
                         WHERE str.struttura_fkutenteid = '".$_SESSION['utente_id']."' AND s.stanza_fkstrutturaid=str.struttura_id
                             AND p.id_stanza = s.stanza_id AND p.id = ".$_GET['id']." AND o_id = p.id) as t)";
             $rs = mysqli_query($link, $query);
             mysqli_close($link);
         }
 ?>
