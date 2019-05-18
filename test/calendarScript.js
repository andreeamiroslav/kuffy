var date = new Date();
var actual = date.getDate();

function getReservations(){
  var xmlhttp = new XMLHttpRequest();

  xmlhttp.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
      var v = JSON.parse(this.responseText);
      var i = 0;
      do{
        i++;
        var temp = document.getElementById('bodyTable');
        var html ="<tr>\n";

        var doc = document.getElementById('struttura' + i);
        //doc.innerHTML = v[i]['struttura_nome'];
        html += '<td id="struttura' + i + '">'+ v[i]['struttura_nome']
        + '\n</td>\n';

        var doc = document.getElementById('stanza' + i);
        //doc.innerHTML = v[i]['stanza_nome'];
        html += '<td id="stanza' + i + '">'+ v[i]['stanza_nome']
        + '\n</td>\n';

        var doc = document.getElementById('nome' + i);
        //doc.innerHTML = v[i]['nome'];
        html += '<td id="nome' + i + '">'+ v[i]['nome']
        + '\n</td>\n';

        var doc = document.getElementById('dal' + i);
        //doc.innerHTML = v[i]['from_day'];
        html += '<td id="dal' + i + '">'+ v[i]['from_day']
        + '\n</td>\n';

        var doc = document.getElementById('al' + i);
        //doc.innerHTML = v[i]['to_day'];
        html += '<td id="al' + i + '">'+ v[i]['to_day']
        + '\n</td>\n';

        temp.innerHTML += html;
      }while(i != Object.keys(v).length); //Returns the length of an associative array
    }

  };

  xmlhttp.open("GET", "query.php", true);
  xmlhttp.send();
  return true;
}

function getDaysNumber(year, month){
  return new Date(year, month, 0).getDate();
}

function initDate(set){
  var element = document.getElementById('month');

  //If left arrow has been clicked, then set date's month to the previous one
  if(set == "prev")
    date.setMonth(date.getMonth()-1);
    //If right arrow has been clicked, then set date's month to the next one
  if(set == "next")
    date.setMonth(date.getMonth()+1);
  var m = "";
  switch(date.getMonth()){
    case 1:
      m = "Febbraio";
      break;
    case 2:
      m = "Marzo";
      break;
    case 3:
      m = "Aprile";
      break;
    case 4:
      m = "Maggio";
      break;
    case 5:
      m = "Giugno";
      break;
    case 6:
      m = "Luglio";
      break;
    case 7:
      m = "Agosto";
      break;
    case 8:
      m = "Settembre";
      break;
    case 9:
      m = "Ottobre";
      break;
    case 10:
      m = "Novembre";
      break;
    case 11:
      m = "Dicembre";
      break;
    default:
    m = "Gennaio";
    break;
  }

  //Set the month text to the correct month name
  element.innerHTML = m + " - " + date.getFullYear();

  //Empty the calendar
  for(i=1; i != 40; i++){
    document.getElementById(i).innerHTML="";
  }

  //Check which is the day's name of the first day of the year
  var temp = new Date();
  temp.setDate(1);
  temp.setFullYear(date.getFullYear());
  temp.setMonth(date.getMonth());
  var first = temp.getDay();
  //If it's sunday (0) set it to 7 (correct number)
  if(first==0)
    first = 7;
  var temp2 = 1;

  //Refill the calendar basing on year and month
  for(i=first; i != getDaysNumber(date.getYear(),date.getMonth()+1)+first; i++){
    document.getElementById(i).innerHTML=temp2;
    temp2++;
  }

  //To do: day selection, this auto-selects the current day
  if(set!="prev" && set!="next"){
    var nID = date.getDate();
    document.getElementById(nID).classList.add("actual");
  }
}

function selectDate(n){
  document.getElementById(actual).classList.remove("actual");
  actual = n;
  document.getElementById(actual).classList.add("actual");
}
