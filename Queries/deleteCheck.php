<?php
  require_once('init.php');

    $query = "UPDATE prenotazioni SET en_check_".$_GET['type']."=".$_GET['value']."
      WHERE id=".$_GET['reservationid'];

      if($rs = mysqli_query($link, $query)){
        header('Location: /home.php');
      }
 ?>
