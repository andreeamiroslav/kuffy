var formsNumber;

function submitValues(strutturaid){
  formsNumber = document.forms.length;
  var data = "";
  var xmlhttp = new XMLHttpRequest();
  var i = 0;
  var ok = false;
  var empties = 0;
  var urlStanze = 'stanze.php?strutturaid='+strutturaid;
  for(i; i<formsNumber; i++){
    var errore = false;
    var nome = document.getElementById('name-room'+i).value;
    var postiletto = document.getElementById('beds-room'+i).value;
    var prezzoNotte = document.getElementById('price-room'+i).value;
    var note = document.getElementById('note-room'+i).value;
    if(nome == "" || postiletto == "" || prezzoNotte == ""){
      empties ++;
      errore = true;
      urlStanze = 'stanze.php?strutturaid='+strutturaid + '&msg=error';
    }
    data += 'name'+i+'='+nome+'&beds'+i+'='+postiletto+'&price'+i+'='+prezzoNotte+'&note'+i+'='+note;
    if(i+1!=formsNumber){
      data += '&';
    }
    if(errore == false){
      var url = document.getElementById('addF'+i).action;
      xmlhttp.open("POST", url, true);
      xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
      xmlhttp.send(data);
    }
    if(empties == formsNumber)
      window.location.href = 'stanze.php?strutturaid='+strutturaid + '&msg=error';
  }
  xmlhttp.onreadystatechange = function(){
    if(this.readyState === XMLHttpRequest.DONE && this.status === 200){
      window.location.href = urlStanze;
    }
  }
}
