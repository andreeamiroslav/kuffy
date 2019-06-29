<html>
<head>
  <title>Kuffy</title>
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="materialize.min.css"  media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="fogliodistile.css"/>
  <script type="text/javascript" src="materialize.min.js"></script>
  <script type="text/javascript" src="script.js"></script>
</head>
<body>
  <script language="javascript" type="text/javascript" src="Scripts/header.js"></script>
  <div class="vl"></div>
  <div class="row">
    <div class="col s6" align="center">
      <div id="login-buttons">
        <h3>Benvenuto nel tuo gestore di Bed&Breakfast</h3>
        <br /><button class="waves-effect waves-light btn-large" onclick="loginOn();" style="width: 20%">LOGIN</button>
        <br /><br /><button class="waves-effect waves-light btn-large" onclick="location.href = 'registrazione.php'"style="width: 20%">REGISTRATI</button>
        <?php if(isset($_GET['registrazione']))
          echo '<p style="color: green; font-size: 16px;">Registrazione effettuata con successo! Effettua il login per accedere alla tua dashboard</p>';
          ?>
      </div>
      <div id="login-fields">
      <div>
        <div class="row valign-wrapper">
          <div class="col s1">
            <a href="#!" onclick="loginOff();"><img src="Icone/av8a49a4f81c3318dc69d.png" id="login-back-icon"></a>
          </div>
          <div class="col s11">
          <h3 >Effettua il log-in</h3>
        </div>
        </div>
      </div>

        <div class="valign-wrapper">
          <div class="input-field col offset-s3 s6">
                <form action="checkLogin.php" method="post" id="login">
                  <div class="input-field">
                    <input type="email" name="email" id="email">
                    <label for="email">Email</label>
                  </div>
                  <div class="input-field">
                    <input type="password" name="password" id="pass">
                    <label for="pass">Password</label>
                  </div>
                  <?php
                    if(isset($_GET['msg'])){
                      echo '<p style="color: red">Credenziali errate</p>';
                      }
               ?>
                  <button type="submit" class="btn waves-effect waves-light">Login</button>
                </form>
          </div>
        </div>
      </div>

    </div>
    <?php
      if(isset($_GET['msg']) && $_GET['msg'] == "wrong"){
    ?>
    <script>loginOn();</script>
  <?php }
    ?>

    <div class="col s5,5">
      <div id="right-text">
        <div id="login-text" align="center">
          <h3>Gestisci il tuo B&B ovunque ti trovi!</h3>
        </div>
        <div id="site-info">
          <h4>Cosa puoi fare con Kuffy:</h4>
          <ul>
            <li>
              <div id="info1">
                Tutte le tue strutture dove e quando vuoi.
              </div>
            </li>
            <li>
              <div id="info2">
                Aggiungi, modifica ed elimina le tue prenotazioni in modo semplice e veloce.
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
<script language="javascript" type="text/javascript" src="Scripts/footer.js"></script>
</body>
</html>
