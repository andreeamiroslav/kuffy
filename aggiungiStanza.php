<html lang="it_IT" dir="ltr">
  <head>
    <title>Aggiungi stanza - Kuffy</title>
    <meta charset="utf-8">
    <title>Home - Kuffy</title>
    <script type = "text/javascript" src = "Scripts/jquery-2.1.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="materialize/css/materialize.min.css"/>
    <script type = "text/javascript" src = "materialize/js/materialize.js"></script>
    <script type = "text/javascript" src = "materialize/js/materialize.min.js"></script>
    <link type="text/css" rel="stylesheet" href="fogliodistile.css"/>
    <script type="text/javascript" src="Scripts/addForm.js"></script>

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
    <div class="row" id="create-room">
      <div id="forms">
        <form class="col s12">
          <div class="row" id="name-beds">
            <div class="input-field col s4" id="room-name">
              <input id="name-room" type="text" class="validate">
              <label for="name-room">Nome stanza</label>
            </div>
            <div class="input-field col s4" id="room-beds">
              <input id="beds-room" type="text" class="validate">
              <label for="beds-room">Postiletto</label>
            </div>
          </div>
          <div class="row" id="price-note">
            <div class="input-field col s4" id="room-price">
              <input id="price-room" type="text" class="validate">
              <label for="price-room">Prezzo a notte</label>
            </div>
            <div class="input-field col s4" id="room-note">
              <input id="note-room" type="text" class="validate">
              <label for="note-room">Note</label>
            </div>
          </div>
        </form>
      </div>
      <button id="new-room" class="btn-floating btn-large waves-effect waves-light red" onclick="add();">
        <img src="Icone/plus-md.png" id="plus-client">
      </button>
      <button id="add-room" class="waves-effect waves-light btn-large" onclick="location.href = 'index.php'">AGGIUNGI</button>
    </div>
    <script language="javascript" type="text/javascript" src="Scripts/footer.js"></script>
  </body>
</html>
