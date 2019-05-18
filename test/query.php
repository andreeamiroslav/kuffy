<?php
  require('init.php');
  $query = "SELECT s.stanza_nome, p.id, p.from_day, p.to_day, p.nome, p.data, str.struttura_nome
            FROM prenotazioni p, stanze s, strutture str
            WHERE p.id_stanza = s.stanza_id AND s.stanza_fkstrutturaid=str.struttura_id
            ORDER BY p.data DESC";
  $result = $link->query($query);
  $i = 0;
  while($row = mysqli_fetch_array($result)){
    $i++;
    $p[$i]['struttura_nome'] = $row['struttura_nome'];
    $p[$i]['stanza_nome'] = $row['stanza_nome'];
    $p[$i]['from_day'] = $row['from_day'];
    $p[$i]['to_day'] = $row['to_day'];
    $p[$i]['nome'] = $row['nome'];
    $p[$i]['data'] = $row['data'];
  }
  $out = json_encode($p);
  echo($out);

?>
