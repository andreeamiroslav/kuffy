var date = new Date();
var actual;
var first;
var v = [];

function getCheckList(){
  var doc = document.getElementById('checkList');
  doc.innerHTML = "";
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
      var v = JSON.parse(this.responseText);
      var i = 0;
      do{
        i++;
        var tempMonth = (date.getMonth()+1).toString();
        var tempDay = date.getDate().toString();
        if(tempMonth.length == 1)
          tempMonth = "0" + tempMonth;
        if(tempDay.length == 1)
          tempDay = "0" + tempDay;

        var tempDate = date.getFullYear() + "-" + tempMonth + "-" + tempDay;
        if(v[i]['from_day'] == tempDate){
          doc.innerHTML += '<p class="selectable" onclick="lineElement(\'inelement'+i+'\')" id="inelement' + i + '"><b><i>' + v[i]['check_in'] + '</b></i> <b>Check-in stanza:</b> "' + v[i]['stanza_nome'] + '" <b>Cliente:</b> "' + v[i]['nome'] + '"</p>';
        }

        if(v[i]['to_day'] == tempDate){
          doc.innerHTML += '<p class="selectable" onclick="lineElement(\'outelement'+i+'\')" id="outelement' + i + '"><b><i>' + v[i]['check_out'] + '</b></i> <b>Check-out stanza:</b> "' + v[i]['stanza_nome'] + '" <b>Cliente:</b> "' + v[i]['nome'] + '"</p>';
        }
      }while(i != Object.keys(v).length);
    }

  };
        xmlhttp.open("GET", "query.php", true);
        xmlhttp.send();
        return true;
}

function lineElement(id){
  var doc = document.getElementById(id);
  if(doc.classList.contains('lined'))
    doc.classList.remove('lined')
  else
    doc.classList.add('lined');
}

function getReservations(){
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
      v = JSON.parse(this.responseText);
      var i = 0;
      do{
        i++;
        var temp = document.getElementById('bodyTable');
        var html ="<tr>\n";

        var doc = document.getElementById('struttura' + i);
        html += '<td id="struttura' + i + '">'+ v[i]['struttura_nome']
        + '\n</td>\n';
        w[i]['struttura_nome'] = v[i][struttura_nome];

        var doc = document.getElementById('stanza' + i);
        html += '<td id="stanza' + i + '">'+ v[i]['stanza_nome']
        + '\n</td>\n';

        var doc = document.getElementById('nome' + i);
        html += '<td id="nome' + i + '">'+ v[i]['nome']
        + '\n</td>\n';

        var doc = document.getElementById('dal' + i);
        html += '<td id="dal' + i + '">'+ v[i]['from_day']
        + '\n</td>\n';

        var doc = document.getElementById('al' + i);
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
  document.addEventListener('DOMContentLoaded', function() {
     var elems = document.querySelectorAll('select');
     var instances = M.FormSelect.init(elems, options);
   });
  var element = document.getElementById('month');

  //If left arrow has been clicked, then set date's month to the previous one
  if(set == "prev")
    date.setMonth(date.getMonth()-1);
    //If right arrow has been clicked, then set date's month to the next one
  if(set == "next")
    date.setMonth(date.getMonth()+1);
  if(set == "next" || set == "prev"){
    if(actual)
      document.getElementById(actual).classList.remove("actual");
  }
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
  first = temp.getDay();
  //If it's sunday (0) set it to 7 (correct number)
  if(first==0)
    first = 7;
  var temp2 = 1;

  //Refill the calendar basing on year and month
  for(i=first; i != getDaysNumber(date.getYear(),date.getMonth()+1)+first; i++){
    document.getElementById(i).innerHTML=temp2;
    temp2++;
  }


}

function selectDate(n){
  if(actual)
    document.getElementById(actual).classList.remove("actual");
  actual = n;
  document.getElementById(actual).classList.add("actual");
  date.setDate(document.getElementById(actual).innerHTML);
  getCheckList();
}

function fillColor(){
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
      var v = JSON.parse(this.responseText);
      var i;
      for(i = first; i !=first+31; i++){
        var tDate = date;
        var tDay;
        var tempMonth = (tDate.getMonth()+1).toString();
        //var tempDay = tDate.getDate().toString();
        if(tempMonth.length == 1)
          tempMonth = "0" + tempMonth;
        if((i-first+1)<10)
          tDay = "0" + (i-first+1).toString();
        else
          tDay = (i-first+1).toString();

        var tempDate = tDate.getFullYear() + "-" + tempMonth + "-" + tDay;
        var temp = i - first;

        var j = 0;
        do{
          j++;
          //console.log(v[j]['from_day'] + "     " +  v[j]['to_day'] + "       " + tempDate);
          if(v[j]['from_day'] == tempDate || v[j]['to_day'] == tempDate){
            document.getElementById(i).style.backgroundColor = "red";
          }else{
            document.getElementById(i).style.backgroundColor = "green";
        }
        }while(j != Object.keys(v).length);
      }
    }
  };
  xmlhttp.open("GET", "query.php", true);
  xmlhttp.send();
  return true;
}

function getStrutture(){
  console.log(w[1]['struttura_nome']);
  var content = '<h7>Nome struttura</h7><br /><br /><img src="Icone/97805.png" id="structure-icon"><br /><br /><a href="#?"><img src="Icone/61456.png" id="structure-edit"></a><a href="#?"><img src="Icone/1214428.png" id="structure-edit"></a>';

}
