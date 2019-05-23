<html lang="it_IT" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Modifica profilo utente - Kuffy</title>
    <link rel="stylesheet" type="text/css" href="materialize.min.css">
    <script type = "text/javascript"
       src = "Scripts/jquery-2.1.1.min.js"></script>
    <script src = "materialize/js/materialize.min.js">
    </script>
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
    <div class="row">
      <div class="col s12">
        <div class="row" id="email-user-now">
          <div class="input-field col offset-s1 s4">
            <input id="email-now" type="text" class="validate">
            <label for="email-now">Email corrente</label>
          </div>
          <div class="input-field col offset-s1 s4">
            <input id="user-now" type="text" class="validate">
            <label for="user-now">Username corrente</label>
          </div>
        </div>
        <div class="row" id="email-user-new">
          <div class="input-field col offset-s1 s4">
            <input id="email-new" type="text" class="validate">
            <label for="email-new">Nuova email</label>
          </div>
          <div class="input-field col offset-s1 s4">
            <input id="user-new" type="text" class="validate">
            <label for="user-new">Nuovo username</label>
          </div>
        </div>
        <div class="row" id="modify-cancel">
          <button class="waves-effect waves-light btn-large" id="cancel-button">ANNULLA</button>
          <button class="waves-effect waves-light btn-large" id="modify-button">MODIFICA</button>
        </div>
      </div>
    </div>
    <script language="javascript" type="text/javascript" src="Scripts/footer.js"></script>
  </body>
</html>
