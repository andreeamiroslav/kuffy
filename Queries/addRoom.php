<?php
    require_once('init.php');
    $num = $_REQUEST['num'];

    for($i=0; $i<=$num; $i++){
      if(isset($_REQUEST['name'.$i]) && isset($_REQUEST['beds'.$i]) && isset($_REQUEST['price'.$i])){
        $query = 'INSERT INTO stanze '.'(stanza_fkstrutturaid, stanza_nome, stanza_postiletto, stanza_prezzonotte, stanza_des) VALUES ("'.
            $_REQUEST['id'].'", "'.
            $_REQUEST['name'.$i].'", "'.
            $_REQUEST['beds'.$i].'", "'.
            $_REQUEST['price'.$i].'", "'.
            $_REQUEST['note'.$i].'");';
            $rs = mysqli_query($link, $query);
      }
  }
    mysqli_close($link);

 ?>
