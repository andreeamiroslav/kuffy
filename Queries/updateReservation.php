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
      mysqli_close($link);
  } else if($_REQUEST['action']=='edit'){
    $query = "UPDATE strutture SET struttura_nome='".$_REQUEST['struttura_nome']."', struttura_note='".$_REQUEST['struttura_note']."'
      WHERE struttura_id='".$_REQUEST['strutturaid']."'";

      if($rs = mysqli_query($link, $query)){
        mysqli_close($link);
        header('Location: strutture.php');
      }
  }
 ?>
