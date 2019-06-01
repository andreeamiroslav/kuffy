var i=0;

function add(strutturaid){
  i++;
  var temp = document.getElementById('forms');
  temp.innerHTML += '<form id="addF'+i+'" class="col s12" method="post" action="addRoom.php?id='+strutturaid+'&num='+i+'"><div class="row" id="name-beds"><div class="input-field col s4" id="room-name">  <input id="name-room'+i+'" type="text" class="validate" name="name'+i+'">    <label for="name-room'+i+'">Nome stanza</label>  </div>  <div class="input-field col s4" id="room-beds">    <input id="beds-room'+i+'" type="text" class="validate" name="beds'+i+'">    <label for="beds-room'+i+'">Postiletto</label>  </div></div><div class="row" id="price-note">  <div class="input-field col s4" id="room-price">    <input id="price-room'+i+'" type="text" class="validate" name="price'+i+'">  <label for="price-room'+i+'">Prezzo a notte</label>  </div>    <div class="input-field col s4" id="room-note">      <input id="note-room'+i+'" type="text" class="validate" name="note'+i+'">      <label for="note-room'+i+'">Note</label>    </div>  </div>  </form>';
}
