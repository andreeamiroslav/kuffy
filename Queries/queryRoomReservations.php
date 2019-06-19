<?php
  require_once('init.php');
  $query = "SELECT p.id, p.from_day, p.to_day, p.nome, p.p_cognome, p.data
            FROM prenotazioni p, stanze s, strutture str
            WHERE str.struttura_fkutenteid = '".$_SESSION['utente_id']."' AND s.stanza_fkstrutturaid=str.struttura_id
                  AND s.stanza_id = '".$_GET['stanzaid']."' AND p.id_stanza = s.stanza_id
            ORDER BY p.data DESC";
  $result = $link->query($query);
  $i = 0;
  $num_row = mysqli_num_rows($result);

  if($num_row<1){
    $p[1]['from_day'] = "";
    $p[1]['to_day'] = "";
    $p[1]['nome'] = "";
    $p[1]['p_cognome'] = "";
    $p[1]['data'] = "";
  }else{
    while($row = mysqli_fetch_array($result)){
      $i++;
      $p[$i]['nome'] = $row['nome'];
      $p[$i]['p_cognome'] = $row['p_cognome'];
      $p[$i]['data'] = $row['data'];
      $p[$i]['from_day'] = $row['from_day'];
      $p[$i]['to_day'] = $row['to_day'];
      $p[$i]['id'] = $row['id'];
    }
  }
  $out = json_encode($p);
  mysqli_close($link);
  echo($out);

?>
