<?php
    require_once('Queries/init.php');

        $query = 'INSERT INTO strutture '.'(struttura_fkutenteid, struttura_nome, struttura_note, struttura_en) VALUES ("'.
            $_REQUEST['struttura_fkutenteid'].'", "'.
            $_REQUEST['struttura_nome'].'", "'.
            $_REQUEST['struttura_note'].'", '.
            '"1");';
            //echo '<br>Questa è la query: '.$query;
            if($rs = mysqli_query($link, $query)){
              $last_id = mysqli_insert_id($link);
              header('Location: aggiungiStanza.php?struttura_id='.$last_id);
            }

 ?>
