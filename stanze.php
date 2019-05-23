<html>
  <head>
    <title>Stanze - Kuff</title>
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="materialize.min.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="fogliodistile.css"/>
    <script type="text/javascript" src="materialize.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
    <script type="text/javascript" src="Scripts/calStanzeScript.js"></script>
  </head>
  <body onload="getStanze('<?php echo $_GET['strutturaid'] ?>');">
    <script language="javascript" type="text/javascript" src="Scripts/header.js"></script>
    <script language="javascript" type="text/javascript" src="Scripts/menu.js"></script>
    <table>
      <tbody>
        <tr>
          <td>
            <button id="add-structure-button" onclick="location.href = 'index.html'">
            <img src="Icone/plus_png_1046150.png" id="plus">
            Aggiungi stanza
            </button>
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
