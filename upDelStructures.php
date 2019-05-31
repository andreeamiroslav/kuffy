<?php
  require_once('Queries/init.php');

  if($_REQUEST['cmd']=='del'){
    $query = 'DELETE FROM strutture WHERE struttura_id='.$_REQUEST['strutturaid'];

    if($rs = mysqli_query($link, $query)){
      header('Location: strutture.php');
    }
  } else if($_REQUEST['cmd']=='upd'){
    $query = "UPDATE strutture SET struttura_nome='".$_REQUEST['struttura_nome']."', struttura_note='".$_REQUEST['struttura_note']."'
      WHERE struttura_id='".$_REQUEST['strutturaid']."'";

      if($rs = mysqli_query($link, $query)){
        header('Location: strutture.php');
      }
  }
 ?>
