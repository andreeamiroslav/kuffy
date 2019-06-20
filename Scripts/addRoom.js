var formsNumber;

function submitValues(strutturaid){
  formsNumber = document.forms.length;
  var data = "";
  var xmlhttp = new XMLHttpRequest();
  var i = 0;
  var ok = false;
  var errore = false;

  for(i; i<formsNumber; i++){
    var nome = document.getElementById('name-room'+i).value;
    var postiletto = document.getElementById('beds-room'+i).value;
    var prezzoNotte = document.getElementById('price-room'+i).value;
    var note = document.getElementById('note-room'+i).value;
    if(nome == "" || postiletto == null || prezzoNotte == null)
      errore = true;
    data += 'name'+i+'='+nome+'&beds'+i+'='+postiletto+'&price'+i+'='+prezzoNotte+'&note'+i+'='+note;
    if(i+1!=formsNumber){
      data += '&';
    }
    var url = document.getElementById('addF'+i).action;
    xmlhttp.open("POST", url, true);
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    console.log(data);
    xmlhttp.send(data);
  }
  xmlhttp.onreadystatechange = function(){
    if(this.readyState === XMLHttpRequest.DONE && this.status === 200){
      if(errore)
        window.location.href = 'stanze.php?strutturaid='+strutturaid + '&msg=error';
      else
        window.location.href = 'stanze.php?strutturaid='+strutturaid;
    }
  }
}
