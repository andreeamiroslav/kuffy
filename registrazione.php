<html>
<head>
  <title>Registrazione - Kuffy</title>
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="materialize.min.css"  media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="fogliodistile.css"/>
  <script type="text/javascript" src="materialize.min.js"></script>
</head>
<body>
  <script language="javascript" type="text/javascript" src="Scripts/header.js"></script>
          <div class="row">
            <form action="Queries/addUser.php" method="post" class="col s12">
              <div class="row" id="register">
                <h3>Registrati</h3>
              </div>
              <div class="row" id="name-surname-date">
                <div class="input-field col offset-s1 s3">
                  <input id="name" name="name" type="text" class="validate">
                  <label for="name">Nome <p style="display: inline; color: red;">(*)</p></label>
                </div>
                <div class="input-field col s3">
                  <input id="surname" name="surname" type="text" class="validate">
                  <label for="surname">Cognome <p style="display: inline; color: red;">(*)</p></label>
                </div>
                <div class="input-field col s3">
                  <input name="born" placeholder="aaaa-mm-gg" id="date" type="text" class="validate">
                  <label for="date">Data di nascita <p style="display: inline; color: red;">(*)</p></label>
                </div>
              </div>
              <div class="row" id="email-password">
                <div class="input-field col offset-s1 s3">
                  <input name="email" id="email" type="email" class="validate">
                  <label for="email">Email <p style="display: inline; color: red;">(*)</p></label>
                </div>
                <div class="input-field col s3">
                  <input name="password" id="password" type="password" class="validate">
                  <label for="password">Password <p style="display: inline; color: red;">(*)</p></label>
                </div>
              </div>
              <div class="row" id="user-confirm">
               <?php
                  if(isset($_GET['msg']) && $_GET['msg'] == 'email'){
                    echo '<p style="color: red; margin-left: 8.3rem;">Email già utilizzata</p>';
                    }
             ?>
                <div class="input-field col offset-s1 s3">
                  <input name="username" id="user" type="text" class="validate">
                  <label for="user">Username <p style="display: inline; color: red;">(*)</p></label>
                </div>
                <div class="input-field col s3">
                  <input name="conf-password" id="conf-password" type="password" class="validate">
                  <label for="conf-password">Conferma password <p style="display: inline; color: red;">(*)</p></label>
                </div>
              </div>
               <?php
                  if(isset($_GET['msg']) && $_GET['msg'] == 'username'){
                    echo '<p style="color: red; margin-left: 8.3rem;">Username già utilizzato</p>';
                    }
                  if(isset($_GET['msg']) && $_GET['msg'] == 'password'){
                    echo '<p style="color: red; margin-left: 30rem;">Le password devono corrispondere</p>';
                    }
                  if(isset($_GET['msg']) && $_GET['msg'] == 'campi'){
                    echo '<p style="color: red; margin-left: 8.3rem;">Riempire tutti i campi contrassegnati</p>';
                    }
             ?>
              <button type="submit" class="waves-effect waves-light btn-large" id="register-button" style="width: 20%">REGISTRATI</button>
            </form>
          </div>

  <script language="javascript" type="text/javascript" src="Scripts/footer.js"></script>
</body>
</html>
