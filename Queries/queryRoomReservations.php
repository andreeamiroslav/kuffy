<?php
  require_once('init.php');
  $query = "SELECT p.id, p.from_day, p.to_day, p.nome, p.data
            FROM prenotazioni p, stanze s, strutture str
            WHERE str.struttura_fkutenteid = '".$_SESSION['utente_id']."' AND s.stanza_fkstrutturaid=str.struttura_id
                  AND s.stanza_id = '".$_GET['stanzaid']."' AND p.id_stanza = s.stanza_id
            ORDER BY p.data DESC";
  $result = $link->query($query);
  $i = 0;
  while($row = mysqli_fetch_array($result)){
    $i++;
    $p[$i]['from_day'] = $row['from_day'];
    $p[$i]['to_day'] = $row['to_day'];
    $p[$i]['nome'] = $row['nome'];
    $p[$i]['data'] = $row['data'];
    $p[$i]['from_day'] = $row['from_day'];
    $p[$i]['to_day'] = $row['to_day'];
  }
  $out = json_encode($p);
  echo($out);

?>
