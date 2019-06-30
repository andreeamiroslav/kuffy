<?php
  require_once('init.php');
  $query = "SELECT s.stanza_prezzonotte, s.stanza_id, s.stanza_nome, p.id, p.from_day, p.to_day, p.nome, p.p_cognome, p.data, p.days,
   str.struttura_nome, str.struttura_id, DATE_FORMAT(p.check_in, '%H:%i') AS check_in, DATE_FORMAT(p.check_out, '%H:%i') AS check_out, p.en_check_in, p.en_check_out, p.p_provenienza,
   p.p_sesso, p.p_nascita, p.p_professione
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
    $p[$i]['p_cognome'] = $row['p_cognome'];
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
    $p[$i]['p_provenienza'] = $row['p_provenienza'];
    $p[$i]['p_professione'] = $row['p_professione'];
    $p[$i]['p_sesso'] = $row['p_sesso'];
    $p[$i]['p_nascita'] = $row['p_nascita'];

    $query = "SELECT * FROM ospiti o WHERE o.o_prenotazioneid = '".$row['id']."'";
    $rs = $link->query($query);
    $j = -1;
    while($r = mysqli_fetch_array($rs)){
      $j++;
      $p[$i][$j]['o_nome'] = $r['o_nome'];
      $p[$i][$j]['o_cognome'] = $r['o_cognome'];
      $p[$i][$j]['o_provenienza'] = $r['o_provenienza'];
      $p[$i][$j]['o_professione'] = $r['o_professione'];
      $p[$i][$j]['o_sesso'] = $r['o_sesso'];
      $p[$i][$j]['o_nascita'] = $r['o_nascita'];
    }
    $p[$i]['nOspiti'] = $j+1;
  }

  if(isset($p))
    $out = json_encode($p);
  mysqli_close($link);
  if(isset($p))
    echo($out);

?>
