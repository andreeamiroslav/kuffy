<html>
  <head>
    <title>Stanze - Kuffy</title>
    <!--Import materialize.css-->
    <script type = "text/javascript" src = "Scripts/jquery-2.1.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="materialize/css/materialize.min.css"/>
    <script type = "text/javascript" src = "materialize/js/materialize.js"></script>
    <script type = "text/javascript" src = "materialize/js/materialize.min.js"></script>
    <link type="text/css" rel="stylesheet" href="fogliodistile.css"/>
    <script type="text/javascript" src="Scripts/calStanzeScript.js"></script>
    <script language="javascript" type="text/javascript" src="Scripts/modal.js"></script>
    <script language="javascript" type="text/javascript" src="Scripts/updateRoom.js"></script>
  </head>
  <body onload="getStanze(<?php echo $_GET['strutturaid'] ?>);">
    <script language="javascript" type="text/javascript" src="Scripts/header.js"></script>
    <script language="javascript" type="text/javascript" src="Scripts/menustruttura.js"></script>
    <script>getStructures();</script>

    <div id="modal1" class="modal modal-footer">
        <div class="modal-content">
          <h4>Modifica stanza</h4>
          <form class="col s12">
            <div class="row">
              <div class="input-field col s6">
                <input id="nome-stanza" type="text" class="validate">
                <label for="nome-stanza">Nome stanza <p style="display: inline; color: red;">(*)</p></label>
              </div>
              <div class="input-field col s6">
                <input id="posti-letto" type="text" class="validate">
                <label for="posti-letto">Posti letto <p style="display: inline; color: red;">(*)</p></label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s6">
                <input id="prezzo-notte" type="text" class="validate">
                <label for="prezzo-notte">Prezzo a notte <p style="display: inline; color: red;">(*)</p></label>
              </div>
              <div class="input-field col s6">
                <input id="note" type="text" class="validate">
                <label for="note">Note</label>
              </div>
            </div>
        <div class="modal-footer">
          <a onclick="submitValues(1);" class="modal-close waves-effect waves-light btn" id="modal-button-1">Modifica</a>
        </div>
      </div>
    </div>

    <table>
      <thead>
       <?php
          if(isset($_GET['msg'])){
            if($_GET['msg'] == "error")
              echo '<p style="color: red;" align="center">Non tutte le stanze sono state aggiunte, si prega di compilare i campi segnati</p>';
          }
     ?>
      </thead>
      <tbody>
        <tr>
          <td style="width: 237px;">
            <div class="card grey lighten-3" id="square-add" align="center">
              <a href="aggiungiStanza.php?struttura_id=<?php echo $_REQUEST['strutturaid']; ?>" style="color: rgb(0,0,0)" id="link-add-room">
                <img src="Icone/plus_png_1046150.png" id="plus">
                Aggiungi stanza
              </a>
            </div>
          </td>
          <td style="width: 237px;">
            <div class="card grey lighten-3" id="square-empty1"></div>
            <a style="color: rgb(0,0,0)" id="linkSquare0"><div class="card grey lighten-3" id="square-edit1" align="center">
            </div></a>
          </td>
          <td style="width: 237px;">
            <div class="card grey lighten-3" id="square-empty2"></div>
            <a style="color: rgb(0,0,0)" id="linkSquare1"><div class="card grey lighten-3" id="square-edit2" align="center">
            </div></a>
          </td>
          <td style="width: 237px;">
            <div class="card grey lighten-3" id="square-empty3"></div>
            <a style="color: rgb(0,0,0)" id="linkSquare2"><div class="card grey lighten-3" id="square-edit3" align="center">
              </div></a>
          </td>
          <td style="width: 237px;">
            <div class="card grey lighten-3" id="square-empty4"></div>
            <a style="color: rgb(0,0,0)" id="linkSquare3"><div class="card grey lighten-3" id="square-edit4" align="center">
            </div></a>
          </td>
        </tr>
        <tr>
          <td style="width: 237px;">
            <div class="card grey lighten-3" id="square-empty5"></div>
            <a style="color: rgb(0,0,0)" id="linkSquare4"><div class="card grey lighten-3" id="square-edit5" align="center">
            </div></a>
          </td>
          <td style="width: 237px;">
            <div class="card grey lighten-3" id="square-empty6"></div>
            <a style="color: rgb(0,0,0)" id="linkSquare5"><div class="card grey lighten-3" id="square-edit6" align="center">
            </div></a>
          </td>
          <td style="width: 237px;">
            <div class="card grey lighten-3" id="square-empty7"></div>
            <a style="color: rgb(0,0,0)" id="linkSquare6"><div class="card grey lighten-3" id="square-edit7" align="center">
            </div></a>
          </td>
          <td style="width: 237px;">
            <div class="card grey lighten-3" id="square-empty8"></div>
            <a style="color: rgb(0,0,0)" id="linkSquare7"><div class="card grey lighten-3" id="square-edit8" align="center">
            </div></a>
          </td>
          <td style="width: 237px;">
            <div class="card grey lighten-3" id="square-empty9"></div>
            <a style="color: rgb(0,0,0)" id="linkSquare8"><div class="card grey lighten-3" id="square-edit9" align="center">
            </div></a>
          </td>
        </tr>
      </tbody>
    </table>
    <script language="javascript" type="text/javascript" src="Scripts/footer.js"></script>
  </body>
</html>
