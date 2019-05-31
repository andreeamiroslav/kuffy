var idstruttura;
function setidstruttura(temp){
  idstruttura = temp;
}

function submitValues(utente_id, a){
  if(a==1){
    var nome = document.getElementById('nome_struttura').value;
    var indirizzo = document.getElementById('indirizzo').value;
    window.location.href = 'addStructures.php?struttura_nome='+nome+'&struttura_note='+indirizzo+'&struttura_fkutenteid='+utente_id;
  } else {
    var nome = document.getElementById('nome_struttura1').value;
    var indirizzo = document.getElementById('indirizzo1').value;
    var id = idstruttura;
    window.location.href = 'upDelStructures.php?cmd=upd&struttura_nome='+nome+'&struttura_note='+indirizzo+'&strutturaid='+id;
  }
}
