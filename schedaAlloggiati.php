<?php
  require_once('init.php');
  date_default_timezone_set('Europe/Rome');
  
  $xml = simplexml_load_file('scheda.xml');

  $report = $xml->addChild('report');
  $report->addAttribute('id-struttura', $_REQUEST['idstruttura']);
  $report->addAttribute('anno', date("Y"));
  $report->addAttribute('mese', date("m"));
  $report->addAttribute('giorno', date("d"));
  $ri = $report->addChild('riepilogo-giornaliero');

  $query = 'SELECT * FROM prenotazioni, (SELECT stanza_id FROM stanze WHERE stanza_fkstrutturaid='.$_REQUEST['idstruttura'].') as temp WHERE id_stanza = temp.stanza_id';
  $rs = mysqli_query($link, $query);

  $camere = 0;

  while($row = mysqli_fetch_assoc($rs)){
    $now = date("Y-m-d");
    $from =date("Y-m-d", strtotime($row['from_day']));
    $to =  date("Y-m-d", strtotime($row['to_day']));

    if($now >= $from && $now < $to){
      $camere++;
      $riga = $ri->addChild('riga');
      $riga->addAttribute('provenienza', $row['p_provenienza']);
      $riga->addAttribute('partenze', "1");
      $riga->addAttribute('arrivi', "1");

      /*$q = 'SELECT * FROM SELECT * FROM prenotazioni, (SELECT stanza_id FROM stanze WHERE stanza_fkstrutturaid='.$_REQUEST['idstruttura'].') as temp WHERE id_stanza = temp.stanza_id) as temp
            WHERE p_provenienza=temp.p_provenienza AND temp.to_day='.date('Y-m-d');
      $res = mysqli_query($link, $q);
      $partenze = mysqli_num_rows($res);*/
      $q = 'SELECT * FROM ospiti WHERE o_prenotazioneid='.$row['id'];
      $res = mysqli_query($link, $q);
      $comp = mysqli_num_rows($res);
      $tipo = "";

      if($comp==0){
        $comp++;
        $tipo = "SoggettoSingolo";
      } else {
        $comp++;
        $tipo = "CapoFamiglia";
        while($r = mysqli_fetch_assoc($res)){
          $anag = $riga->addChild('anag-visitatore');
          $anag->addChild('sesso', $r['o_sesso']);
          $anag->addChild('data-nascita', $r['o_nascita']);
          $anag->addChild('professione', $r['o_professione']);
          $anag->addChild('tipo-soggetto', "Familiare-MembroGruppo");
          $anag->addChild('numero-componenti', $comp);
          $anag->addChild('motivo-visita', "ND");
          $anag->addChild('prossima-visita', "ND");
        }
      }

      $anag = $riga->addChild('anag-visitatore');
      $anag->addChild('sesso', $row['p_sesso']);
      $anag->addChild('data-nascita', $row['p_nascita']);
      $anag->addChild('professione', $row['p_professione']);
      $anag->addChild('tipo-soggetto', $tipo);
      $anag->addChild('numero-componenti', $comp);
      $anag->addChild('motivo-visita', "ND");
      $anag->addChild('prossima-visita', "ND");
    }
  }

  $query = 'SELECT * FROM stanze WHERE stanza_fkstrutturaid='.$_REQUEST['idstruttura'];
  $rs = mysqli_query($link, $query);
  $letti = 0;
  while($row = mysqli_fetch_assoc($rs)){
    $letti += $row['stanza_postiletto'];
  }

  $camDisp = mysqli_num_rows($rs);

  $cap = $ri->addChild('capacita-giornaliera');
  $cap->addChild('n-letti-disponibili', $letti);
  $cap->addChild('n-camere-disponibili', $camDisp );
  $cap->addChild('n-camere-occupate', $camere);

  $capM = $report->addChild('capacita-mensile');
  $capM->addChild('n-letti-disponibili', $letti);
  $capM->addChild('n-camere-disponibili', $camDisp);
  $capM->addChild('n-bagni', $camDisp);
  $capM->addChild('n-giorni-apertura', date('t'));

  $credenziali = $xml->addChild('credenziali');
  $credenziali->addChild('id-struttura', $_REQUEST['idstruttura']);
  $credenziali->addChild('chiave', "[password presente nella sezione profilo struttura]");

  header('Content-Type: text/xml');
  echo $xml->asXML();
 ?>
