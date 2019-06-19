<?php
    require_once('init.php');
    $num = $_REQUEST['num'];

    for($i=0; $i<=$num; $i++){
      $query = 'INSERT INTO stanze '.'(stanza_fkstrutturaid, stanza_nome, stanza_postiletto, stanza_prezzonotte, stanza_des) VALUES ("'.
          $_REQUEST['id'].'", "'.
          $_REQUEST['name'.$i].'", "'.
          $_REQUEST['beds'.$i].'", "'.
          $_REQUEST['price'.$i].'", "'.
          $_REQUEST['note'.$i].'");';
          //echo '<br>Questa è la query: '.$query;
          $rs = mysqli_query($link, $query);
          mysqli_close($link);
    }

 ?>
