<html>
  <head>
    <title>Stanze - Kuff</title>
    <!--Import materialize.css-->
    <script type = "text/javascript" src = "Scripts/jquery-2.1.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="materialize/css/materialize.min.css"/>
    <script type = "text/javascript" src = "materialize/js/materialize.js"></script>
    <script type = "text/javascript" src = "materialize/js/materialize.min.js"></script>
    <link type="text/css" rel="stylesheet" href="fogliodistile.css"/>
    <script type="text/javascript" src="Scripts/calStanzeScript.js"></script>
    <script language="javascript" type="text/javascript" src="Scripts/modal.js"></script>
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
                <label for="nome_struttura">Nome stanza</label>
              </div>
              <div class="input-field col s6">
                <input id="posti-letto" type="text" class="validate">
                <label for="posti-letto">Posti letto</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s6">
                <input id="prezzo-notte" type="text" class="validate">
                <label for="prezzo-notte">Prezzo a notte</label>
              </div>
              <div class="input-field col s6">
                <input id="note" type="text" class="validate">
                <label for="note">Note</label>
              </div>
            </div>
        <div class="modal-footer">
          <a href="stanza.php" class="modal-close waves-effect waves-light btn" id="modal-button-1">Modifica</a>
        </div>
      </div>
    </div>

    <table>
      <tbody>
        <tr>
          <td>
            <a href="aggiungiStanza.php" style="color: rgb(0,0,0)" id="link-add-room">
              <div class="card grey lighten-3" id="square-add" align="center">
                <img src="Icone/plus_png_1046150.png" id="plus">
                Aggiungi stanza
              </div>
            </a>
          </td>
          <td>
            <div class="card grey lighten-3" id="square-empty1"></div>
            <a href="#!" style="color: rgb(0,0,0)" id="linkSquare0"><div class="card grey lighten-3" id="square-edit1" align="center">
            </div></a>
          </td>
          <td><div class="card grey lighten-3" id="square-empty2"></div>
            <a href="#!" style="color: rgb(0,0,0)" id="linkSquare1"><div class="card grey lighten-3" id="square-edit2" align="center">
            </div></a>
          </td>
          <td><div class="card grey lighten-3" id="square-empty3"></div>
            <a href="#!" style="color: rgb(0,0,0)" id="linkSquare2"><div class="card grey lighten-3" id="square-edit3" align="center">
              </div></a>
          </td>
          <td><div class="card grey lighten-3" id="square-empty4"></div>
            <a href="#!" style="color: rgb(0,0,0)" id="linkSquare3"><div class="card grey lighten-3" id="square-edit4" align="center">
            </div></a>
          </td>
        </tr>
        <tr>
          <td><div class="card grey lighten-3" id="square-empty5"></div>
            <a href="#!" style="color: rgb(0,0,0)" id="linkSquare4"><div class="card grey lighten-3" id="square-edit5" align="center">
            </div></a>
          </td>
          <td><div class="card grey lighten-3" id="square-empty6"></div>
            <a href="#!" style="color: rgb(0,0,0)" id="linkSquare5"><div class="card grey lighten-3" id="square-edit6" align="center">
            </div></a>
          </td>
          <td><div class="card grey lighten-3" id="square-empty7"></div>
            <a href="#!" style="color: rgb(0,0,0)" id="linkSquare6"><div class="card grey lighten-3" id="square-edit7" align="center">
            </div></a>
          </td>
          <td><div class="card grey lighten-3" id="square-empty8"></div>
            <a href="#!" style="color: rgb(0,0,0)" id="linkSquare7"><div class="card grey lighten-3" id="square-edit8" align="center">
              <a href="#?"><img src="Icone/1214428.png" id="structure-edit"></a>
            </div></a>
          </td>
          <td><div class="card grey lighten-3" id="square-empty9"></div>
            <a href="#!" style="color: rgb(0,0,0)" id="linkSquare8"><div class="card grey lighten-3" id="square-edit9" align="center">
              <a href="#?"><img src="Icone/1214428.png" id="structure-edit"></a>
            </div></a>
          </td>
        </tr>
      </tbody>
    </table>
    <script language="javascript" type="text/javascript" src="Scripts/footer.js"></script>
  </body>
</html>
