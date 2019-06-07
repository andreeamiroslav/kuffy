<html>
  <head>
    <title>Stanza - Kuffy</title>
    <!--Import materialize.css-->
    <script type = "text/javascript" src = "Scripts/jquery-2.1.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="materialize/css/materialize.min.css"/>
    <script type = "text/javascript" src = "materialize/js/materialize.js"></script>
    <script type = "text/javascript" src = "materialize/js/materialize.min.js"></script>
    <link type="text/css" rel="stylesheet" href="fogliodistile.css"/>
    <link type="text/css" rel="stylesheet" href="calStanze.css"/>
    <script type="text/javascript" src="Scripts/calStanzeScript.js"></script>
    <script type="text/javascript" src="Scripts/modal.js"></script>
    <script type="text/javascript" src="Scripts/updateRoom.js"></script>
  </head>

    <body onload="initDate(); getReservations('<?php echo $_GET['stanzaid'] ?>'); fillColor('<?php echo $_GET['stanzaid'] ?>'); getStanza('<?php echo $_GET['stanzaid'] ?>'); getRoomReservations('<?php echo $_GET['stanzaid'] ?>');">
    <script language="javascript" type="text/javascript" src="Scripts/header.js"></script>
    <script language="javascript" type="text/javascript" src="Scripts/menu.js"></script>
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
          <a onclick="submitValues(0);" class="modal-close waves-effect waves-light btn" id="modal-button-1">Modifica</a>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col s3" id="name-info-room">
        <div id="name-room" align="center">
          <a id="edit-room" data-target="modal1" class="modal-trigger" onclick="setidstanza('<?php echo $_GET['stanzaid']; ?>')">
          <img id="edit-room-icon" src="Icone\61456.png">
        </a>
        </div>
        <div id="info-room">
          <br /><b>Numero posti letto:</b> <p style="display:inline" id="nPosti"></p>
          <br /><b>Prezzo a notte:</b> €<p style="display:inline" id="prezzoNotte"></p>
          <br /><b>Note:</b> <p style="display:inline" id="desc"></p>
        </div>
      </div>
      <div class="col s6" id="calendar">
        <div class="calendar row" align="center">
          <div class="valign-wrapper">
            <div class="col s3 right-align">
              <p class="arrowButton" id="leftButton" onclick="initDate('prev'); fillColor('<?php echo $_GET['stanzaid'] ?>');"> < </p>
            </div>
            <div class="col s6">
              <p id="month">Gennaio</p>
            </div>
            <div class="col s3 left-align">
              <p class="arrowButton" id="rightButton" onclick="initDate('next'); fillColor('<?php echo $_GET['stanzaid'] ?>');"> > </p>
            </div>
          </div>
          <table id="calTable" class="striped" border="1">
            <tr class="dayRow">
              <th class="dayNames">Lun</th>
              <th class="dayNames">Mar</th>
              <th class="dayNames">Mer</th>
              <th class="dayNames">Gio</th>
              <th class="dayNames">Ven</th>
              <th class="dayNames">Sab</th>
              <th class="dayNames">Dom</th>
            </tr>
            <tr>
              <td id="1" class="day" onclick="showReservation(1)">1</td>
              <td id="2" class="day" onclick="showReservation(2)">2</td>
              <td id="3" class="day" onclick="showReservation(3)">3</td>
              <td id="4" class="day" onclick="showReservation(4)">4</td>
              <td id="5" class="day" onclick="showReservation(5)">5</td>
              <td id="6" class="day" onclick="showReservation(6)">6</td>
              <td id="7" class="day" onclick="showReservation(7)">7</td>
            </tr>
            <tr>
              <td id="8" class="day" onclick="showReservation(8)">8</td>
              <td id="9" class="day" onclick="showReservation(9)">9</td>
              <td id="10" class="day" onclick="showReservation(10)">10</td>
              <td id="11" class="day" onclick="showReservation(11)">11</td>
              <td id="12" class="day" onclick="showReservation(12)">12</td>
              <td id="13" class="day" onclick="showReservation(13)">13</td>
              <td id="14" class="day" onclick="showReservation(14)">14</td>
            </tr>
            <tr>
              <td id="15" class="day" onclick="showReservation(15)">15</td>
              <td id="16" class="day" onclick="showReservation(16)">16</td>
              <td id="17" class="day" onclick="showReservation(17)">17</td>
              <td id="18" class="day" onclick="showReservation(18)">18</td>
              <td id="19" class="day" onclick="showReservation(19)">19</td>
              <td id="20" class="day" onclick="showReservation(20)">20</td>
              <td id="21" class="day" onclick="showReservation(21)">21</td>
            </tr>
            <tr>
              <td id="22" class="day" onclick="showReservation(22)">22</td>
              <td id="23" class="day" onclick="showReservation(23)">23</td>
              <td id="24" class="day" onclick="showReservation(24)">24</td>
              <td id="25" class="day" onclick="showReservation(25)">25</td>
              <td id="26" class="day" onclick="showReservation(26)">26</td>
              <td id="27" class="day" onclick="showReservation(27)">27</td>
              <td id="28" class="day" onclick="showReservation(28)">28</td>
            </tr>
            <tr>
              <td id="29" class="day" onclick="showReservation(29)">29</td>
              <td id="30" class="day" onclick="showReservation(30)">30</td>
              <td id="31" class="day" onclick="showReservation(31)">31</td>
              <td id="32" class="day" onclick="showReservation(32)"></td>
              <td id="33" class="day" onclick="showReservation(33)"></td>
              <td id="34" class="day" onclick="showReservation(34)"></td>
              <td id="35" class="day" onclick="showReservation(35)"></td>
            </tr>
            <tr>
              <td id="36" class="day" onclick="showReservation(36)"></td>
              <td id="37" class="day" onclick="showReservation(37)"></td>
              <td id="38" class="day" onclick="showReservation(38)"></td>
              <td id="39" class="day" onclick="showReservation(39)"></td>
              <td id="40" class="day" onclick="showReservation(40)"></td>
              <td id="41" class="day" onclick="showReservation(41)"></td>
              <td id="42" class="day" onclick="showReservation(42)"></td>
            </tr>
          </table>
        </div>
      </div>
      <div class="col s3" id="room-bookings">
        <div  id="room-booking">
          <table class="bordered">
            <thead id="room-booking-thead">
              <tr>
                <th>Nome</th>
                <th>Dal</th>
                <th>Al</th>
              </tr>
            </thead>
            <tbody id="room-booking-tbody">
            </tbody>
          </table>
        </div>
        <br /><div class="card grey lighten-3">
          <span class="black-text">
            <b>Nome: </b> <p style="display:inline" id="nome"></p>
            <br /><b>Dal:</b> <p style="display:inline" id="dal"></p> <b>Al:</b> <p style="display:inline" id="al"></p>
            <br /><b>Persone paganti:</b> <p style="display:inline" id="nPersone"></p>
            <br /><b>Prezzo totale:</b> <p style="display:inline" id="prezzo"></p>
            <a id="editLink" href=""><img src="Icone/61456.png" id="modify-booking"></a>
            <a id="deleteLink" href=""><img src="Icone/1214428.png" id="delete-booking"></a>
          </span>
        </div>
      </div>
    </div>
    <script language="javascript" type="text/javascript" src="Scripts/footer.js"></script>
  </body>
</html>
