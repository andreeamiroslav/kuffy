<?php
  require_once('init.php');

  if($_REQUEST['action']=='del'){
    $query = "DELETE FROM prenotazioni
              WHERE id in (SELECT * FROM (SELECT p.id
              FROM prenotazioni p, stanze s, strutture str
              WHERE str.struttura_fkutenteid = '".$_SESSION['utente_id']."' AND s.stanza_fkstrutturaid=str.struttura_id
                    AND p.id_stanza = s.stanza_id AND p.id = ".$_GET['id'].") as t)";
    if($rs = mysqli_query($link, $query)){
        header('Location: /stanza.php?stanzaid='.$_GET['stanzaid']);
      }

      $query = "DELETE FROM ospiti
                WHERE o_prenotazioneid in
                 (SELECT * FROM (SELECT o_prenotazioneid
                  FROM ospiti o, prenotazioni p, stanze s, strutture str
                  WHERE str.struttura_fkutenteid = '".$_SESSION['utente_id']."' AND s.stanza_fkstrutturaid=str.struttura_id
                      AND p.id_stanza = s.stanza_id AND p.id = ".$_GET['id']." AND o_id = p.id) as t)";
      if($rs = mysqli_query($link, $query)){
          header('Location: /stanza.php?stanzaid='.$_GET['stanzaid']);
        }
      mysqli_close($link);
  }
 ?>
