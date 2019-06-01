var stanza_id, strutturaid;
function setstanzaid(temp, tmp){
  stanza_id = temp;
  strutturaid = tmp;
}

function submitValues(){
  var nome = document.getElementById('nome-stanza').value;
  var postiLetto = document.getElementById('posti-letto').value;
  var prezzoNotte = document.getElementById('prezzo-notte').value;
  var note = document.getElementById('note').value;
  var id = stanza_id;

  window.location.href = 'upDelRooms.php?cmd=upd&stanza_nome='+nome+'&stanza_note='+note+'&stanza_postiletto='+postiLetto+'&stanza_prezzonotte='+prezzoNotte+'&stanza_id='+id+'&strutturaid='+strutturaid;
}
