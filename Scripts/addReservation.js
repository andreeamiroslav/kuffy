function submitGuestsValues(){
  var formsNumber = document.forms.length;
  var data = "";
  var xmlhttp = new XMLHttpRequest();
  var i = 0;
  var errors = 0;
  formsNumber -= 1;

  for(i; i<formsNumber; i++){
      errors = 0;
      var nome = document.getElementById('name'+i).value;
      var cognome = document.getElementById('surname'+i).value;
      var sesso = document.getElementById('selectGender'+i).value;
      var provenienza = document.getElementById('provenienza'+i).value;
      var nascita = document.getElementById('nascita'+i).value;
      var professione = document.getElementById('professione'+i).value;

      data += 'name'+i+'='+nome+'&surname'+i+'='+cognome+'&gender'+i+'='+sesso+'&provenienza'+i+'='+provenienza+'&nascita'+i+'='+nascita+'&professione'+i+'='+professione;

      if(i+1!=formsNumber){
        data += '&';
      }
      var url = document.getElementById('addF'+i).action;
      xmlhttp.open("POST", url);
      xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
      if(errors == 0)
        xmlhttp.send(data);
  }
  if(errors != 0)
    window.location.href = 'home.php';

  xmlhttp.onreadystatechange = function(){
    if(this.readyState === XMLHttpRequest.DONE && this.status === 200)
    window.location.href = 'home.php';
  }
}

function submitResValues(id){
  var data = "";
  var xmlhttp = new XMLHttpRequest();

  var from = document.getElementById('from').value;
  var to = document.getElementById('to').value;
  var days = DaysBetween(from, to);
  var pax = document.forms.length;
  var name = document.getElementById('name').value;
  var surname = document.getElementById('surname').value;
  var gender = document.getElementById('selectGender').value;
  var idstanza = document.getElementById('selectRoom').value;
  var checkin = document.getElementById('checkin').value;
  var checkout = document.getElementById('checkout').value;
  var provenienza = document.getElementById('provenienza').value;
  var nascita = document.getElementById('nascita').value;
  var professione = document.getElementById('professione').value;


  if(from == "" || to == "" || days == "" || pax == "" || name == "" || surname == "" || gender == "" || idstanza == ""   || checkin == "" || checkout == "" || provenienza == "" || nascita == "" || professione == ""){
    data = 'from='+from+'&to='+to+'&days='+days+'&pax='+pax+'&name='+name+'&surname='+surname+'&gender='+gender+'&idstanza='+idstanza+'&checkin='+checkin+'&checkout='+checkout+'&provenienza='+provenienza+'&nascita='+nascita+'&professione='+professione+'&stanzaidd='+idstanza;
  }else{
    var fdate = new Date(from);
    var tdate = new Date(to);
    if(fdate >= tdate)
      window.location.href = 'aggiungiPrenotazione.php?msg=data';
    else{
      data = 'from='+from+'&to='+to+'&days='+days+'&pax='+pax+'&name='+name+'&surname='+surname+'&gender='+gender+'&idstanza='+idstanza+'&checkin='+checkin+'&checkout='+checkout+'&provenienza='+provenienza+'&nascita='+nascita+'&professione='+professione+'&stanzaidd='+idstanza;
      if(id != null)
        data += '&resID='+id;
      var url = document.getElementById('firstForm').action;
      xmlhttp.open("POST", url);
      xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
      xmlhttp.send(data);

      xmlhttp.onreadystatechange = function(){
        if(this.readyState === XMLHttpRequest.DONE && this.status === 200)
          if(document.forms.length==1){
            window.location.href = 'home.php';
          }
        }
      }
  }
}


function DaysBetween(from, to) {
  const oneDay = 1000 * 60 * 60 * 24;

  var StartDate = new Date(from);
  var EndDate = new Date(to);

  var start = Date.UTC(EndDate.getFullYear(), EndDate.getMonth(), EndDate.getDate());
  var end = Date.UTC(StartDate.getFullYear(), StartDate.getMonth(), StartDate.getDate());

  return (start - end) / oneDay;
}
