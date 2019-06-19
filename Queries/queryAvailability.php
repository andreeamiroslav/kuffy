<?php
  require_once('init.php');
  $query = "SELECT s.stanza_id, s.stanza_nome, p.id, p.from_day, p.to_day, p.nome, p.data, str.struttura_nome, str.struttura_id, p.check_in, p.check_out
            FROM prenotazioni p, stanze s, strutture str
            WHERE str.struttura_fkutenteid = '".$_SESSION['utente_id']."' AND p.id_stanza = '".$_GET['stanzaid']."' AND s.stanza_id = '".$_GET['stanzaid']."' AND s.stanza_fkstrutturaid=str.struttura_id
            ORDER BY p.data DESC";
  $result = $link->query($query);
  $i = 0;
  $num_row = mysqli_num_rows($result);

  if($num_row<1){
    $p[1]['struttura_nome'] = "";
    $p[1]['stanza_nome'] = "";
    $p[1]['from_day'] = "";
    $p[1]['to_day'] = "";
    $p[1]['nome'] = "";
    $p[1]['data'] = "";
    $p[1]['check_in'] = "";
    $p[1]['check_out'] = "";
    $p[1]['stanza_id'] = "";
    $p[1]['struttura_id'] = "";
  }else{
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
      $p[$i]['stanza_id'] = $row['stanza_id'];
      $p[$i]['struttura_id'] = $row['struttura_id'];
      $p[$i]['id'] = $row['id'];
    }
  }
  $out = json_encode($p);
  mysqli_close($link);
  echo($out);
?>
