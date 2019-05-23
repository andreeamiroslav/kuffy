<?php
  require('init.php');

  $query = "SELECT s.stanza_id, s.stanza_nome
            FROM stanze s
            WHERE s.stanza_fkstrutturaid = '".$_GET['strutturaid']."'";
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
