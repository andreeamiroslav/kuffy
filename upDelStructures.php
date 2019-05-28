<?php
  require_once('Queries/init.php');

  if($_REQUEST['cmd']=='del'){
    $query = 'DELETE FROM strutture WHERE struttura_id='.$_REQUEST['strutturaid'];

    if($rs = mysqli_query($link, $query)){
      header('Location: strutture.php');
    }
  }
 ?>
