<?php
  require_once('init.php');
  $num = $_REQUEST['num'];

  $q = 'SELECT id FROM prenotazioni ORDER BY id DESC LIMIT 1';
  $rs= mysqli_query($link, $q);
  $row = mysqli_fetch_assoc($rs);
  $last_id = $row['id'];

 for($i=0; $i<=$num; $i++){
   $query = 'INSERT INTO ospiti '.'(o_prenotazioneid, o_provenienza, o_sesso, o_nascita, o_professione, o_nome, o_cognome) VALUES ("'.
       $last_id.'", "'.
       $_REQUEST['provenienza'.$i].'", "'.
       $_REQUEST['gender'.$i].'", "'.
       $_REQUEST['nascita'.$i].'", "'.
       $_REQUEST['professione'.$i].'", "'.
       $_REQUEST['name'.$i].'", "'.
       $_REQUEST['surname'.$i].'");';
       $rs = mysqli_query($link, $query);
     }
 ?>
