<html lang="it_IT" dir="ltr">
  <head>
    <title>Aggiungi prenotazione - Kuffy</title>
    <meta charset="utf-8">
    <title>Home - Kuffy</title>
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
    <div class="row" id="booking">
      <form class="col s7">
        <div class="row" id="structure-from">
          <div class="input-field col offset-s1 s5" id="structure">
            <select id="selectStructure">
              <option value="" disabled selected>Seleziona la struttura</option>
            </select>
            <label>Strutture</label>
          </div>
          <div class="input-field col s3">
            <input placeholder="gg/mm/aaaa" id="from" type="text" class="validate">
            <label for="name">Dal</label>
          </div>
        </div>
        <div class="row" id="room-to">
          <div class="input-field col offset-s1 s5" id="room">
            <select id="selectRoom">
              <option value="" disabled selected>Seleziona la stanza</option>
            </select>
            <label>Strutture</label>
          </div>
          <div class="input-field col s3">
            <input placeholder="gg/mm/aaaa" id="to" type="text" class="validate">
            <label for="name">Al</label>
          </div>
        </div>
        <div id="client">
          <h5>Nominativo cliente</h5>
          <div class="row" id="name-surname">
            <div class="input-field col offset-s1 s5">
              <input id="name" type="text" class="validate">
              <label for="name">Nome</label>
            </div>
            <div class="input-field col s5">
              <input id="surname" type="text" class="validate">
              <label for="surname">Cognome</label>
            </div>
          </div>
        </div>
        <div id="other-client">
          <h5>Altri clienti</h5>
          <button id="add-client" class="btn-floating btn-large waves-effect waves-light red">
            <img src="Icone/plus-md.png" id="plus-client">
          </button>
        </div>
      </form>
      <div class="col s5">
        <div class="row" id="structure-from">
          <div class="input-field col s5" id="calendar">
            Qui ce va er calendario!
          </div>
        </div>
      </div>
      <button id="add-booking" class="waves-effect waves-light btn" onclick="location.href = 'index.php'">INSERISCI</button>
    </div>
    <script language="javascript" type="text/javascript" src="Scripts/footer.js"></script>
  </body>
</html>
