<html lang="it_IT" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Modifica profilo utente - Kuffy</title>
    <script type = "text/javascript" src = "Scripts/jquery-2.1.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="materialize/css/materialize.min.css"/>
    <script type = "text/javascript" src = "materialize/js/materialize.js"></script>
    <script type = "text/javascript" src = "materialize/js/materialize.min.js"></script>
    <link type="text/css" rel="stylesheet" href="fogliodistile.css"/>
    <script type="text/javascript" src="calendarScript.js"></script>

    <link rel="stylesheet" type="text/css" href="cal.css">

    <script>
       $(document).ready(function() {
          $('select').material_select();
       });
    </script>
  </head>
  <body>
    <script language="javascript" type="text/javascript" src="Scripts/header.js"></script>
    <script language="javascript" type="text/javascript" src="Scripts/menu.js"></script>
    <script>getStructures();</script>
    <div id="change-credentials" align="center">
      <h4>Modifica le tue credenziali</h4>
    </div>
    <div class="row centered">
      <div class="col s12">
        <?php

            if(isset($_GET['mail']))
                echo '<p style="color: red;" align="center">Indirizzo email errato</p>';
            if(isset($_GET['username']))
                echo '<p style="color: red;" align="center">Nome utente errato</p>';
            if(isset($_GET['mailesistente']))
                echo '<p style="color: red;" align="center">Indirizzo email già utilizzato</p>';
            if(isset($_GET['usernamesistente']))
                echo '<p style="color: red;" align="center">Nome utente già utilizzato</p>';

      ?>
        <form action="Queries/editUsernameEmail.php" method="post">
          <div class="row" id="email-user-now">
            <div class="input-field col offset-s1 s4">
              <input name="email-old" id="email-now" type="email" class="validate">
              <label for="email-now">Email corrente</label>
            </div>
            <div class="input-field col offset-s1 s4">
              <input name="user-old" id="user-now" type="text" class="validate">
              <label for="user-now">Username corrente</label>
            </div>
          </div>
          <div class="row" id="email-user-new">
            <div class="input-field col offset-s1 s4">
              <input name="email-new" id="email-new" type="email" class="validate">
              <label for="email-new">Nuova email</label>
            </div>
            <div class="input-field col offset-s1 s4">
              <input name="user-new" id="user-new" type="text" class="validate">
              <label for="user-new">Nuovo username</label>
            </div>
          </div>
          <div class="row" id="modify-cancel">
            <button class="waves-effect waves-light btn-large" type="button" id="cancel-button" onclick="location.href='/home.php';">ANNULLA</button>
            <button class="waves-effect waves-light btn-large" id="modify-button">MODIFICA</button>
          </div>
        </form>
      </div>
    </div>
    <script language="javascript" type="text/javascript" src="Scripts/footer.js"></script>
  </body>
</html>
