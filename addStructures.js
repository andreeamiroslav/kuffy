function submitValues(utente_id){
  var nome = document.getElementById('nome_struttura').value;
  var indirizzo = document.getElementById('indirizzo').value;

  window.location.href = 'addStructures.php?struttura_nome='+nome+'&struttura_note='+indirizzo+'&struttura_fkutenteid='+utente_id;

}
