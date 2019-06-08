<?php
  require_once('init.php');

  if($_REQUEST['cmd']=='del'){
    $query = 'DELETE FROM stanze WHERE stanza_id='.$_REQUEST['stanza_id'];

    if($rs = mysqli_query($link, $query)){
      header('Location: /stanze.php?strutturaid='.$_REQUEST['strutturaid']);
    }
  } else if($_REQUEST['cmd']=='upd'){
      if($_REQUEST['val']==1){
        $query = "UPDATE stanze SET stanza_nome='".$_REQUEST['stanza_nome']."', stanza_des='".$_REQUEST['stanza_note']."',
          stanza_postiletto='".$_REQUEST['stanza_postiletto']."', stanza_prezzonotte='".$_REQUEST['stanza_prezzonotte']."'
          WHERE stanza_id='".$_REQUEST['stanza_id']."'";
      } else {
        $query = "UPDATE stanze SET stanza_nome='".$_REQUEST['stanza_nome']."', stanza_des='".$_REQUEST['stanza_note']."',
          stanza_postiletto='".$_REQUEST['stanza_postiletto']."', stanza_prezzonotte='".$_REQUEST['stanza_prezzonotte']."'
          WHERE stanza_id='".$_REQUEST['stanza_id']."'";
      }

      if($rs = mysqli_query($link, $query) && $_REQUEST['val']==1){
        header('Location: /stanze.php?strutturaid='.$_REQUEST['strutturaid']);
      } else {
        header('Location: /stanza.php?stanzaid='.$_REQUEST['stanza_id']);
      }
  }
 ?>
