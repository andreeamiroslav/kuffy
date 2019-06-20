var i=0;
var j=0;

function add(strutturaid){
  i++;
  var temp = document.getElementById('forms');
  temp.innerHTML += '<form id="addF'+i+'" class="col s12" method="post" action="/Queries/addRoom.php?id='+strutturaid+'&num='+i+'"><div class="row" id="name-beds"><div class="input-field col s4" id="room-name">  <input id="name-room'+i+'" type="text" class="validate" name="name'+i+'">    <label for="name-room'+i+'">Nome stanza <p style="display: inline; color: red;">(*)</p></label>  </div>  <div class="input-field col s4" id="room-beds">    <input id="beds-room'+i+'" type="text" class="validate" name="beds'+i+'">    <label for="beds-room'+i+'">Postiletto <p style="display: inline; color: red;">(*)</p></label>  </div></div><div class="row" id="price-note">  <div class="input-field col s4" id="room-price">    <input id="price-room'+i+'" type="text" class="validate" name="price'+i+'">  <label for="price-room'+i+'">Prezzo a notte <p style="display: inline; color: red;">(*)</p></label>  </div>    <div class="input-field col s4" id="room-note">      <input id="note-room'+i+'" type="text" class="validate" name="note'+i+'">      <label for="note-room'+i+'">Note</label>    </div>  </div>  </form>';
}

function addForm(){
  var temp = document.getElementById('forms');
  temp.innerHTML += '<form><div class="row" id="name-surname"><div class="input-field col offset-s1 s4">  <input id="name'+j+'" type="text" class="validate"><label for="name'+j+'">Nome</label>  </div>  <div class="input-field col s4"><input id="surname'+j+'" type="text" class="validate">  <label for="surname'+j+'">Cognome</label></div><div class="input-field col s3"><select id="selectGender'+j+'"><option value="m">M</option><option value="f">F</option></select></div></div><div class="row" id="name-surname"><div class="input-field col offset-s1 s4"><input id="provenienza'+j+'" type="text" class="validate">  <label for="provenienza'+j+'">Provenienza</label></div><div class="input-field col s4"><input id="nascita'+j+'" type="text" class="validate"><label for="nascita'+j+'">Data di nascita</label>  </div><div class="input-field col s3"><input id="professione'+j+'" type="text" class="validate"><label for="professione'+j+'">Professione</label>  </div></div> </form>';
  j++;
}

function initSelect(){
  $(document).ready(function() {
    $('select').material_select();
  });
}

function destroySelect(){
  $(document).ready(function() {
    $('select').material_select('destroy');
  });
}


/*
<form>
  <div class="row" id="name-surname">
    <div class="input-field col offset-s1 s4">
      <input id="name" type="text" class="validate">
      <label for="name">Nome</label>
    </div>
    <div class="input-field col s4">
      <input id="surname" type="text" class="validate">
      <label for="surname">Cognome</label>
    </div>
    <div class="input-field col s3">
      <select id="selectGender">
        <option value="m">M</option>
        <option value="f">F</option>
      </select>
    </div>
  </div>
  <div class="row" id="name-surname">
    <div class="input-field col offset-s1 s4">
      <input id="provenienza" type="text" class="validate">
      <label for="provenienza">Provenienza</label>
    </div>
    <div class="input-field col s4">
      <input id="nascita" type="text" class="validate">
      <label for="nascita">Data di nascita</label>
    </div>
    <div class="input-field col s3">
      <input id="professione" type="text" class="validate">
      <label for="professione">Professione</label>
    </div>
  </div>
  </form>*/
