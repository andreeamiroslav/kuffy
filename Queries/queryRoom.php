<?php
  require('init.php');

  $query = "SELECT DISTINCT s.stanza_id, s.stanza_nome, s.stanza_des, s.stanza_postiletto, s.stanza_prezzonotte
            FROM stanze s, strutture str, utenti u
            WHERE s.stanza_id = '".$_GET['stanzaid']."' AND s.stanza_fkstrutturaid = str.struttura_id AND struttura_fkutenteid='".$_SESSION['utente_id']."'";

  $result = $link->query($query);
  $i = 0;
  while($row = mysqli_fetch_array($result)){
    $i++;
    $p[$i]['stanza_nome'] = $row['stanza_nome'];
    $p[$i]['stanza_id'] = $row['stanza_id'];
  }
  $out = json_encode($p);
echo($out);

?>
