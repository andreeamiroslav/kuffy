<?php
  require_once('init.php');
  $query = "SELECT s.stanza_prezzonotte, s.stanza_id, s.stanza_nome, p.id, p.from_day, p.to_day, p.nome, p.data, p.days, str.struttura_nome, str.struttura_id, p.check_in, p.check_out, p.en_check_in, p.en_check_out
            FROM prenotazioni p, stanze s, strutture str
            WHERE str.struttura_fkutenteid = '".$_SESSION['utente_id']."' AND p.id_stanza = s.stanza_id AND s.stanza_fkstrutturaid=str.struttura_id
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
    $p[$i]['check_in'] = $row['check_in'];
    $p[$i]['check_out'] = $row['check_out'];
    $p[$i]['en_check_in'] = $row['en_check_in'];
    $p[$i]['en_check_out'] = $row['en_check_out'];
    $p[$i]['stanza_id'] = $row['stanza_id'];
    $p[$i]['struttura_id'] = $row['struttura_id'];
    $p[$i]['id'] = $row['id'];
    $p[$i]['stanza_prezzonotte'] = $row['stanza_prezzonotte'];
    $p[$i]['days'] = $row['days'];
  }
  $out = json_encode($p);
  echo($out);

?>
