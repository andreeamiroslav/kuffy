<?php
  require('init.php');
  $query = "SELECT str.struttura_nome, str.struttura_id
            FROM strutture str
            WHERE str.struttura_fkutenteid = '".$_SESSION['utente_id']."'";
  $result = $link->query($query);
  $i = 0;
  while($row = mysqli_fetch_array($result)){
    $i++;
    $p[$i]['struttura_nome'] = $row['struttura_nome'];
    $p[$i]['struttura_id'] = $row['struttura_id'];
  }
  $p[1]['nome_utente'] = $_SESSION['utente_username'];
  $out = json_encode($p);
  mysqli_close($link);
  echo($out);

?>
