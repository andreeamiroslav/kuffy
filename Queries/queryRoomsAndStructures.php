<?php
  require_once('init.php');

  $query = "SELECT DISTINCT s.stanza_id, s.stanza_nome, str.struttura_id, str.struttura_nome
            FROM stanze s, strutture str, utenti u
            WHERE s.stanza_fkstrutturaid = str.struttura_id AND struttura_fkutenteid='".$_SESSION['utente_id']."'";

  $result = $link->query($query);
  $i = 0;
  while($row = mysqli_fetch_array($result)){
    $i++;
    $p[$i]['stanza_nome'] = $row['stanza_nome'];
    $p[$i]['stanza_id'] = $row['stanza_id'];
    $p[$i]['struttura_nome'] = $row['struttura_nome'];
    $p[$i]['struttura_id'] = $row['struttura_id'];
  }
  $out = json_encode($p);
echo($out);

?>
