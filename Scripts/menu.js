document.write('<ul id="dropdown1" class="dropdown-content"><li><a href="modificaProfiloUtente.php">Modifica utente</a></li><li><a href="modificaPassword.php">Modifica password</a></li><li class="divider"></li><li><a href="logout.php">Logout</a></li></ul> <ul id="dropdown2" class="dropdown-content"></ul><nav style="height: 50px;"> <div class="nav-wrapper" id="menu"><ul id="nav-mobile" class="left hide-on-med-and-down"><li><a href="home.php"><img src="/Icone/home.png" id="home-icon"/></a></li><li><a href="strutture.php" class = "dropdown-trigger" data-target="dropdown2">Strutture</a></li><li><a href="aggiungiPrenotazione.php">Aggiungi prenotazione</a></li></ul><ul id="nav-mobile" class = "right hide-on-med-and-down"><li ><a href="" id="utente" class = "dropdown-trigger" data-target="dropdown1" >Utente     <img src="Icone/user.png" id="user-icon"/></a></li>  </ul></div></nav>');

function getStructures(){
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
      var v = JSON.parse(this.responseText);
      var html="";
      var i = 0;
      var temp = document.getElementById('dropdown2');
      while(i != Object.keys(v).length){
        if(v[i]['struttura_id'] != null){
          i++;
          html += '<li><a href="stanze.php?strutturaid=' + v[i]['struttura_id'] +'">' + v[i]['struttura_nome'] +'</a></li>';
      }
      }
      document.getElementById('utente').innerHTML = v[1]['nome_utente'] + '     <img src="/Icone/user.png" id="user-icon"/></a></li>';
      temp.innerHTML = html;
    }
  };
  xmlhttp.open("GET", "Queries/queryStructures.php", true);
  xmlhttp.send();
  return true;
}

document.addEventListener('DOMContentLoaded', function() {
   var elems = document.querySelectorAll('.dropdown-trigger');
   var instances = M.Dropdown.init(elems, {hover: true});
});


/*<nav style="height: 50px;">
<div class="nav-wrapper" id="menu">
  <ul id="nav-mobile" class="left hide-on-med-and-down">
    <li><a href="home.php"><img src="/Icone/home.png" id="home-icon"/></a></li>
    <li><a href="strutture.php" class = "dropdown-trigger" data-target="dropdown2">Strutture</a></li>
    <li><a href="aggiungiPrenotazione.php">Aggiungi prenotazione</a></li>
  </ul>
  <ul id="nav-mobile" class = "right hide-on-med-and-down">
    <li ><a href="" id="utente" class = "dropdown-trigger" data-target="dropdown1" >Utente     <img src="Icone/user.png" id="user-icon"/></a></li>
  </ul>
</div>
</nav>*/
/*<ul id="dropdown1" class="dropdown-content">
  <li><a href="modificaProfiloUtente.php">Modifica utente</a></li>
  <li><a href="modificaPassword.php">Modifica password</a></li>
  <li class="divider"></li>
  <li><a href="logout.php">Logout</a></li>
</ul>*/

/*<ul id="dropdown2" class="dropdown-content">
 <?php
   $query = "SELECT str.struttura_nome, str.struttura_id
             FROM strutture str
             WHERE str.struttura_fkutenteid = '".$_SESSION['utente_id']."'";
   $result = $link->query($query);
   $i = 0;
   while($row = mysqli_fetch_array($result)){
     $i++;
     echo '<li><a href="stanze.php?strutturaid='.$row['struttura_id'].'">' . $row['struttura_nome'] . '</a></li>';
   }
 ?>
</ul>*/
