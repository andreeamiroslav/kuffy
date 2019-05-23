<html>
  <head>
    <title>Modifica password - Kuffy</title>
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="materialize.min.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="fogliodistile.css"/>
    <link type="text/css" rel="stylesheet" href="calStanze.css"/>
    <script type="text/javascript" src="materialize.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
    <script type="text/javascript" src="Scripts/calStanzeScript.js"></script>
  </head>
  <body onload="initDate(); getReservations(); fillColor();">
    <script language="javascript" type="text/javascript" src="Scripts/header.js"></script>
    <script language="javascript" type="text/javascript" src="Scripts/menu.js"></script>
    <div class="row">
      <div class="col s12">
        <div class="row" id="email-user-now">
          <div class="input-field col offset-s4 s4">
            <input id="password-now" type="password" class="validate">
            <label for="password-now">Password corrente</label>
          </div>
          <div class="input-field col offset-s4 s4">
            <input id="password-new" type="password" class="validate">
            <label for="password-new">Nuova password</label>
          </div>
          <div class="input-field col offset-s4 s4">
            <input id="password-confirm" type="password" class="validate">
            <label for="password-confirm">Conferma nuova password</label>
          </div>
        </div>
      </div>
    </div>
    <div class="row" id="modify-cancel-password">
      <button class="waves-effect waves-light btn-large" id="cancel-button">ANNULLA</button>
      <button class="waves-effect waves-light btn-large" id="modify-button">MODIFICA</button>
    </div>
    <script language="javascript" type="text/javascript" src="Scripts/footer.js"></script>
  </body>
</html>
