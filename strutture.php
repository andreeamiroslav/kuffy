<html>
  <head>
    <title>Strutture - Kuffy</title>
    <!--Import materialize.css-->
    <script type = "text/javascript" src = "Scripts/jquery-2.1.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="materialize/css/materialize.min.css"/>
    <script type = "text/javascript" src = "materialize/js/materialize.js"></script>
    <script type = "text/javascript" src = "materialize/js/materialize.min.js"></script>
    <link type="text/css" rel="stylesheet" href="fogliodistile.css"/>
    <script type="text/javascript" src="Scripts/calStanzeScript.js"></script>
    <script language="javascript" type="text/javascript" src="addStructures.js"></script>
    <script language="javascript" type="text/javascript" src="Scripts/modal.js"></script>

  </head>
  <body onload="getStrutture();">
    <script language="javascript" type="text/javascript" src="Scripts/header.js"></script>
    <script language="javascript" type="text/javascript" src="Scripts/menu.js"></script>
    <script>getStructures();</script>


    <div id="modal1" class="modal modal-footer">
        <div class="modal-content">
          <h4>Nuova struttura</h4>
          <form class="col s12">
            <div class="row">
              <div class="input-field col s6">
                <input id="nome_struttura" name="struttura-name" type="text" class="validate">
                <label for="nome_struttura">Nome struttura</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s6">
                <input id="indirizzo" name="struttura-ind" type="text" class="validate">
                <label for="indirizzo">Indirizzo</label>
              </div>
            </div>
        <div class="modal-footer">
          <a onclick="submitValues('<?php session_start(); echo $_SESSION['utente_id']; ?>');" class="modal-close waves-effect waves-light btn" id="modal-button-1">Aggiungi</a>
        </div>
      </form>
      </div>
    </div>

    <div id="modal2" class="modal modal-footer">
        <div class="modal-content">
          <h4>Modifica struttura</h4>
          <form class="col s12">
            <div class="row">
              <div class="input-field col s6">
                <input id="nome_struttura" type="text" class="validate">
                <label for="nome_struttura">Nome struttura</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s6">
                <input id="indirizzo" type="text" class="validate">
                <label for="indirizzo">Indirizzo</label>
              </div>
            </div>
        <div class="modal-footer">
          <a href="strutture.php" class="modal-close waves-effect waves-light btn" id="modal-button-2">Modifica</a>
        </div>
      </div>
    </div>

    <table>
      <tbody>
        <tr>
          <td>
            <a href="#modal1" style="color: rgb(0,0,0)" id="link-add-structure" class="modal-trigger">
              <div class="card grey lighten-3" id="square-add" align="center">
                <img src="Icone/plus_png_1046150.png" id="plus">
                Aggiungi struttura
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
            </td>
          <td><div class="card grey lighten-3" id="square-empty9"></div>
            <a href="#!" style="color: rgb(0,0,0)" id="linkSquare8"><div class="card grey lighten-3" id="square-edit9" align="center">
            </div></a>
          </td>
        </tr>
      </tbody>
    </table>
    <script language="javascript" type="text/javascript" src="Scripts/footer.js"></script>
  </body>
</html>
