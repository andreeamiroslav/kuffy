document.write('<ul id="dropdown2" class="dropdown-content"></ul><nav id="mobileNav"><div class="con"> <a href="#" data-target="slide-out" class="show-on-large sidenav-trigger"><img class="menuIcon" src="/Icone/Mobile/hamburgerMenu.png" /></a> <a href="index.php" id="navName">KUFFY</a></div></nav><div id="navbarText"><ul id="slide-out" class="sidenav"><li><a href="strutture.php" class = "dropdown-trigger" data-target="dropdown2">Strutture</a></li><li><a href="aggiungiPrenotazione.php">Aggiungi prenotazione</a></li></ul></div><ul id="nav-mobile" class = "right hide-on-med-and-down"><li ><a href="" id="utente" class = "dropdown-trigger" data-target="dropdown1" >Utente     <img src="Icone/user.png" id="user-icon"/></a></li></ul> ');

function getStructures(){
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
      var v = JSON.parse(this.responseText);
      var html="";
      var i = 0;
      var temp = document.getElementById('dropdown2');
      while(i != Object.keys(v).length){
        i++;
        html += '<li><a href="stanze.php?strutturaid=' + v[i]['struttura_id'] +'">' + v[i]['struttura_nome'] +'</a></li>';
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
/*
<nav> <div class="nav-wrapper" id="menu">
  <ul id="nav-mobile" class="left hide-on-med-and-down">
    <li><a href="home.php"><img src="/Icone/home.png" id="home-icon"/></a></li>
    <li><a href="strutture.php" class = "dropdown-trigger" data-target="dropdown2">Strutture</a></li>
    <li><a href="aggiungiPrenotazione.php">Aggiungi prenotazione</a></li>
  </ul>
  <ul id="nav-mobile" class = "right hide-on-med-and-down">
    <li ><a href="" id="utente" class = "dropdown-trigger" data-target="dropdown1" >Utente     <img src="Icone/user.png" id="user-icon"/></a></li>
  </ul>
</div> </nav>

  <ul id="slide-out" class="sidenav">
    <li><div class="user-view">
      <div class="background">
        <img src="images/office.jpg">
      </div>
      <a href="#user"><img class="circle" src="images/yuna.jpg"></a>
      <a href="#name"><span class="white-text name">John Doe</span></a>
      <a href="#email"><span class="white-text email">jdandturk@gmail.com</span></a>
    </div></li>
    <li><a href="#!"><i class="material-icons">cloud</i>First Link With Icon</a></li>
    <li><a href="#!">Second Link</a></li>
    <li><div class="divider"></div></li>
    <li><a class="subheader">Subheader</a></li>
    <li><a class="waves-effect" href="#!">Third Link With Waves</a></li>
  </ul>
  <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
*/
