<html>
  <head>
    <title>Modifica password - Kuffy</title>
    <!--Import materialize.css-->
    <script type = "text/javascript" src = "Scripts/jquery-2.1.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="materialize/css/materialize.min.css"/>
    <script type = "text/javascript" src = "materialize/js/materialize.js"></script>
    <script type = "text/javascript" src = "materialize/js/materialize.min.js"></script>
    <link type="text/css" rel="stylesheet" href="fogliodistile.css"/>
    <link type="text/css" rel="stylesheet" href="calStanze.css"/>
    <script type="text/javascript" src="Scripts/calStanzeScript.js"></script>
  </head>
  <body onload="initDate(); getReservations(); fillColor();">
    <script language="javascript" type="text/javascript" src="Scripts/header.js"></script>
    <script language="javascript" type="text/javascript" src="Scripts/menu.js"></script>
    <script>getStructures();</script>
    <div id="change-password" align="center">
      <h4>Modifica la tua password</h4>
    </div>
    <div class="row">
      <div class="col s12">
        <br /><br />
        <?php
          if(isset($_GET['msg'])){
            if($_GET['msg'] == "disuguali")
                echo '<p style="color: red;" align="center">La password nuova e la sua conferma devono coincidere</p>';
            if($_GET['msg'] == "errata")
                echo '<p style="color: red;" align="center">La password attuale è errata</p>';
           }
      ?>
        <form action="Queries/editPassword.php" method="post">
          <div class="row" id="email-user-now">
            <div class="input-field col offset-s4 s4">
              <input name="password-now" id="password-now" type="password" class="validate">
              <label for="password-now">Password corrente</label>
            </div>
            <br /><div class="input-field col offset-s4 s4">
              <input name="password-new" id="password-new" type="password" class="validate">
              <label for="password-new">Nuova password</label>
            </div>
            <br /><div class="input-field col offset-s4 s4">
              <input name="password-confirm" id="password-confirm" type="password" class="validate">
              <label for="password-confirm">Conferma nuova password</label>
            </div>
            <br /><div class="row col" id="modify-cancel-password">
              <button class="waves-effect waves-light btn-large" id="cancel-button">ANNULLA</button>
              <button class="waves-effect waves-light btn-large" id="modify-button" type="submit">MODIFICA</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <script language="javascript" type="text/javascript" src="Scripts/footer.js"></script>
  </body>
</html>
