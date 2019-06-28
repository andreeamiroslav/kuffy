var stanza_id, strutturaid;
function setstanzaid(temp, tmp){
  stanza_id = temp;
  strutturaid = tmp;
}

function editDel(){
  document.getElementById('delete').href ='Queries/upDelRooms.php?cmd=del&strutturaid='+strutturaid+'&stanza_id='+stanza_id;
}


function setidstanza(temp){
  stanza_id = temp;
}

function submitValues(i){
  var nome = document.getElementById('nome-stanza').value;
  var postiLetto = document.getElementById('posti-letto').value;
  var prezzoNotte = document.getElementById('prezzo-notte').value;
  var note = document.getElementById('note').value;
  var id = stanza_id;

  if(nome == "" || postiLetto == "" || prezzoNotte == "" || isNaN(postiLetto) || isNaN(prezzoNotte))
    window.location.href = 'stanza.php?stanzaid='+ id + '&msg=error1';
  else
    window.location.href = 'Queries/upDelRooms.php?cmd=upd&stanza_nome='+nome+'&stanza_note='+note+'&stanza_postiletto='+postiLetto+'&stanza_prezzonotte='+prezzoNotte+'&stanza_id='+id+'&strutturaid='+strutturaid+'&val='+i;
}
