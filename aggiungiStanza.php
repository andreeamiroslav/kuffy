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
    <script type="text/javascript" src="Scripts/addRoom.js"></script>

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
        <form id="addF0" method="post" action="addRoom.php?id=<?php echo $_REQUEST['struttura_id']; ?>&num=0" class="col s12">
          <div class="row" id="name-beds">
            <div class="input-field col s4" id="room-name">
              <input id="name-room0" type="text" class="validate" name="name0">
              <label for="name-room0">Nome stanza</label>
            </div>
            <div class="input-field col s4" id="room-beds">
              <input id="beds-room0" type="text" class="validate" name="beds0">
              <label for="beds-room0">Postiletto</label>
            </div>
          </div>
          <div class="row" id="price-note">
            <div class="input-field col s4" id="room-price">
              <input id="price-room0" type="text" class="validate" name="price0">
              <label for="price-room0">Prezzo a notte</label>
            </div>
            <div class="input-field col s4" id="room-note">
              <input id="note-room0" type="text" class="validate" name="note0">
              <label for="note-room0">Note</label>
            </div>
          </div>
        </form>
      </div>
      <button id="new-room" class="btn-floating btn-large waves-effect waves-light red" onclick="add(<?php echo $_REQUEST['struttura_id']; ?>);">
        <img src="Icone/plus-md.png" id="plus-client">
      </button>
      <button id="add-room" class="waves-effect waves-light btn-large" onclick="submitValues(<?php echo $_REQUEST['struttura_id']; ?>)">AGGIUNGI</button>
    </div>
    <script language="javascript" type="text/javascript" src="Scripts/footer.js"></script>
  </body>
</html>
