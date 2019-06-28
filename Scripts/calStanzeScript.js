var date = new Date();
var actual;
var first;
var idInRow;


function getReservations(){
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
      var v = JSON.parse(this.responseText);
      var i = 0;
      do{
        i++;
        var html ="<tr>\n";
        var temp = document.getElementById('bodyTable');
        if(i == 1)
          temp.innerHTML = "";

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
  xmlhttp.open("GET", "Queries/query.php", true);
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

function fillColor(passedID){
  for(i=1; i != 40; i++){
    document.getElementById(i).style.backgroundColor = null;
    document.getElementById(i).style.background = null;
    document.getElementById(i).classList = "day";
    document.getElementById(i).title="";
  }
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
      var v = JSON.parse(this.responseText);
      var i;
      var inRow = 0;
      for(i = first; i !=first+31; i++){
        var tDate = date;
        var tDay;
        var tempMonth = (tDate.getMonth()+1).toString();
        if(tempMonth.length == 1)
          tempMonth = "0" + tempMonth;
        if((i-first+1)<10)
          tDay = "0" + (i-first+1).toString();
        else
          tDay = (i-first+1).toString();

        var tempDate = tDate.getFullYear() + "-" + tempMonth + "-" + tDay;
        var temp = i - first;
        var j = 0;
        var done = 0;
        do{
          j++;
          if(done == 0){
            if(v[j]['to_day'] == tempDate){
              document.getElementById(i).style.background = "linear-gradient(90deg, #f08080 50%, #56b556 50%)";
              document.getElementById(i).classList.add(v[j]['id']);
              document.getElementById(i).title="Giorno con check-out";
              if(inRow == 0){
                var t = i;
                do{
                  t--;
                  document.getElementById(t).style.backgroundColor = "#f08080";
                  if(window.location.pathname.match(/stanza.php.*/))
                    document.getElementById(t).title="Clicca per visualizzare le informazioni sulla prenotazione";
                  else
                    document.getElementById(t).title= "Giorno occupato";
                  document.getElementById(t).classList.add(idInRow);
                }while(t != first);
              }
              inRow = 0;
            }else if(v[j]['from_day'] == tempDate){
              document.getElementById(i).style.background = null;
              document.getElementById(i).style.backgroundColor = "#f08080";
              document.getElementById(i).classList.add(v[j]['id']);
              if(window.location.pathname.match(/stanza.php.*/))
                document.getElementById(i).title="Clicca per visualizzare le informazioni sulla prenotazione";
              else
                document.getElementById(i).title= "Giorno occupato";
              inRow = 1;
              idInRow = v[j]['id'];
              done = 1;
            }else{
              if(document.getElementById(i).classList == "day"){
                document.getElementById(i).style.backgroundColor = "#56b556";
                document.getElementById(i).title="Giorno libero";
              }
            }

            if(inRow == 1){
              document.getElementById(i).style.backgroundColor = "#f08080";
              if(window.location.pathname.match(/stanza.php.*/))
                document.getElementById(i).title="Clicca per visualizzare le informazioni sulla prenotazione";
              else
                document.getElementById(i).title= "Giorno occupato";
              document.getElementById(i).classList.add(idInRow);
            }
          }
          if(i == 3)
          console.log(document.getElementById(i).title + "    " + v[j]['nome']);
          if(document.getElementById(i).innerHTML == "")
                document.getElementById(i).style.backgroundColor = null;
        }while(j != Object.keys(v).length);
      }
    }
  };

  var element = document.getElementById("selectRoom");
  if(passedID == null && element.options[element.selectedIndex].value != null){
    passedID = element.options[element.selectedIndex].value;
  }else if(passedID == null)
    passedID = element.options[0].value;
  xmlhttp.open("GET", "Queries/queryAvailability.php?stanzaid="+passedID, true);
  xmlhttp.send();
  return true;
}

function getStrutture(){
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
      v = JSON.parse(this.responseText);
      var i = 0;
      do{
        i++;
        var t = i-1;
        doc = document.getElementById('square-edit'+i);
        var content = '<a style="color: rgb(0,0,0)" href="stanze.php?strutturaid='+v[i]['struttura_id']+'"><h7>' + v[i]['struttura_nome'] +'</h7></a><br /><br /><a href="stanze.php?strutturaid='+v[i]['struttura_id']+'"><img src="Icone/97805.png" id="structure-icon"></a><br /><br /><a href="#modal2" class="modal-trigger" onclick="setidstruttura('+v[i]['struttura_id']+')"><img src="Icone/61456.png" id="structure-edit-btn" class="'+v[i]['struttura_id']+'"></a><a data-target="modal3" class="modal-trigger" onclick="setidstruttura('+v[i]['struttura_id']+'), editDel();"><img src="Icone/1214428.png" id="structure-edit" ></a>';
        doc.style.display = "block";
        document.getElementById('square-empty'+i).style.display="none";
        document.getElementById('linkSquare'+t).name = v[i]['struttura_id'];
        doc.innerHTML = content;
      }while(i != Object.keys(v).length); //Returns the length of an associative array
    }

  };
  xmlhttp.open("GET", "Queries/queryStructures.php", true);
  xmlhttp.send();
  return true;

}

function getStanze(strutturaid){
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
      v = JSON.parse(this.responseText);
      var i = 0;
      do{
        i++;
        doc = document.getElementById('square-edit'+i);
        var content = '<a style="color: rgb(0,0,0)" href="stanza.php?stanzaid='+v[i]['stanza_id']+'"><h7>' + v[i]['stanza_nome'] +'</h7></a><br /><br /><a href="stanza.php?stanzaid='+v[i]['stanza_id']+'"><img src="Icone/6716149901547464129-128.png" id="structure-icon"></a><br /><br /><a href="#modal1" class="modal-trigger" onclick="setstanzaid('+v[i]['stanza_id']+', '+strutturaid+')"><img src="Icone/61456.png" id="structure-edit"></a><a class="modal-trigger" data-target="modal2" onclick="setstanzaid('+v[i]['stanza_id']+', '+strutturaid+'), editDel();"><img src="Icone/1214428.png" id="structure-edit"></a>';
        doc.style.display = "block";
        document.getElementById('square-empty'+i).style.display="none";
        var t = i-1;
        doc.innerHTML = content;
      }while(i != Object.keys(v).length); //Returns the length of an associative array
    }

  };
  xmlhttp.open("GET", "Queries/queryRooms.php?strutturaid="+strutturaid, true);
  xmlhttp.send();
  return true;

}

function getStanza(stanzaid){
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
      v = JSON.parse(this.responseText);
      var i = 0;
      do{
        i++;
        document.getElementById('name-room').innerHTML += "<b>" + v[i]['stanza_nome'] + "</b>";
        document.getElementById('nPosti').innerHTML = v[i]['stanza_postiletto'];
        document.getElementById('prezzoNotte').innerHTML = v[i]['stanza_prezzonotte'];
        document.getElementById('desc').innerHTML = v[i]['stanza_des'];
      }while(i != Object.keys(v).length); //Returns the length of an associative array
    }

  };
  xmlhttp.open("GET", "Queries/queryRoom.php?stanzaid="+stanzaid, true);
  xmlhttp.send();
  return true;

}

function getRoomReservations(stanzaid){
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
      var v = JSON.parse(this.responseText);
      var i = 0;
      do{
        i++;
        var doc = document.getElementById('room-booking-tbody');
        var html = "";
        html += '<tr class="room-booking-tbody-tr '+ v[i]["id"]+'" id="resRow' + i + '" title="Clicca per visualizzare le informazioni sulla prenotazione" onclick="showReservationFromList(\'res'+ v[i]["id"]+'\')">';
        html += '<td>' + v[i]['nome'] + ' ' + v[i]['p_cognome'] + '</td>';
        html += '<td>' + v[i]['from_day'] + '</td>';
        html += '<td>' + v[i]['to_day'] + '</td>';
        html += '</tr>';
        doc.innerHTML += html;
      }while(i != Object.keys(v).length); //Returns the length of an associative array
    }

  };
  xmlhttp.open("GET", "Queries/queryRoomReservations.php?stanzaid="+stanzaid, true);
  xmlhttp.send();
  return true;
}

function getRooms(id){
  //First remove all the options
  var select = document.getElementById("selectRoom");
  var length = select.options.length;
  $("select").material_select();
  for (j = 0; j < length; j++) {
    select.options[0] = null;
  }

  //Update the select to view changes
  $("select").material_select();
   var xmlhttp = new XMLHttpRequest();
   xmlhttp.onreadystatechange = function(){
     if(this.readyState == 4 && this.status == 200){
       var v = JSON.parse(this.responseText);
       var i = 0;
       do{
         i++;
         var element = document.getElementById('selectStructure');
         if(parseInt(v[i]['struttura_id'], 10) == parseInt(element.options[element.selectedIndex].value, 10)){
          //Get reference to select element
          var sel = document.getElementById('selectRoom');

          //Create new option element
          var opt = document.createElement('option');

          opt.id = "room" + v[i]['stanza_id'];

          //Create text node to add to option element (opt)
          opt.appendChild(document.createTextNode(v[i]['stanza_nome']) );

          //Set value property of opt
          opt.value = v[i]['stanza_id'];
          if(i == 1)
            opt.selected = 'selected';

          //Add opt to end of select box (sel)
          sel.appendChild(opt);

          //Update the select to view changes
          $("select").material_select();
        }
       }while(i != Object.keys(v).length); //Returns the length of an associative array
       if(window.location.pathname.match(/modificaPrenotazione.php.*/))
        initReservation(id);
       console.log(document.getElementById('selectRoom').value);
       fillColor(document.getElementById('selectRoom').value);
     }

   };
  xmlhttp.open("GET", "Queries/queryRoomsAndStructures.php", true);
  xmlhttp.send();
  return true;

}

function showReservation(resID){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function(){
      if(this.readyState == 4 && this.status == 200){
        var v = JSON.parse(this.responseText);
        var i = 0;
        do{
          i++;
          if(document.getElementById(resID).classList.contains(v[i]['id'])){
            document.getElementById('nome').innerHTML = v[i]['nome'] + ' ' + v[i]['p_cognome'];
            document.getElementById('dal').innerHTML = v[i]['from_day'];
            document.getElementById('al').innerHTML = v[i]['to_day'];
            document.getElementById('in').innerHTML = v[i]['check_in'];
            document.getElementById('out').innerHTML = v[i]['check_out'];
            document.getElementById('provenienza').innerHTML = v[i]['p_provenienza'];
            document.getElementById('nascita').innerHTML = v[i]['p_nascita'];
            document.getElementById('professione').innerHTML = v[i]['p_professione'];
            document.getElementById('nPersone').innerHTML = v[i]['nOspiti'];
            var ospitiHTML = '<ol>';
            if(v[i]['nOspiti']-1 > -1){
            var j = -1;
              do{
                j++;
                ospitiHTML += "<li>";
                ospitiHTML += "<b>Nome:</b> " + v[i][j]['o_nome'] + " " + v[i][j]['o_cognome'];
                ospitiHTML += "<br /><b>Sesso:</b> " + v[i][j]['o_sesso'];
                ospitiHTML += "<br /><b>Provenienza:</b> " + v[i][j]['o_provenienza'];
                ospitiHTML += "<br /><b>Data di nascita:</b> " + v[i][j]['o_nascita'];
                ospitiHTML += "<br /><b>Professione:</b> " + v[i][j]['o_professione'];
                ospitiHTML += "</li>";
              }while(j != v[i]['nOspiti']-1);
            }
            ospitiHTML += '</ol>';
            document.getElementById('ospiti').innerHTML = ospitiHTML;
            document.getElementById('prezzo').innerHTML = "€" + parseInt(v[i]['stanza_prezzonotte'], 10) * parseInt(v[i]['days'], 10) ;
            document.getElementById('editLink').href = "modificaPrenotazione.php?id=" + v[i]['id'] + "&stanzaid=" + v[i]['stanza_id'];
            document.getElementById('delete').href = "Queries/updateReservation.php?action=del&id=" + v[i]['id'] + "&stanzaid=" + v[i]['stanza_id'];
          }
        }while(i != Object.keys(v).length);
      }

    };
          xmlhttp.open("GET", "Queries/query.php", true);
          xmlhttp.send();
          return true;
}

function showReservationFromList(resID){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function(){
      if(this.readyState == 4 && this.status == 200){
        var v = JSON.parse(this.responseText);
        var i = 0;
        do{
          i++;
          if(resID == 'res'+v[i]['id']){
            document.getElementById('nome').innerHTML = v[i]['nome'] + ' ' + v[i]['p_cognome'];
            document.getElementById('dal').innerHTML = v[i]['from_day'];
            document.getElementById('al').innerHTML = v[i]['to_day'];
            document.getElementById('in').innerHTML = v[i]['check_in'];
            document.getElementById('out').innerHTML = v[i]['check_out'];
            document.getElementById('provenienza').innerHTML = v[i]['p_provenienza'];
            document.getElementById('nascita').innerHTML = v[i]['p_nascita'];
            document.getElementById('professione').innerHTML = v[i]['p_professione'];
            document.getElementById('nPersone').innerHTML = v[i]['nOspiti'];
            var ospitiHTML = '<ol>';
            if(v[i]['nOspiti']-1 > -1){
            var j = -1;
              do{
                j++;
                ospitiHTML += "<li>";
                ospitiHTML += "<b>Nome:</b> " + v[i][j]['o_nome'] + " " + v[i][j]['o_cognome'];
                ospitiHTML += "<br /><b>Sesso:</b> " + v[i][j]['o_sesso'];
                ospitiHTML += "<br /><b>Provenienza:</b> " + v[i][j]['o_provenienza'];
                ospitiHTML += "<br /><b>Data di nascita:</b> " + v[i][j]['o_nascita'];
                ospitiHTML += "<br /><b>Professione:</b> " + v[i][j]['o_professione'];
                ospitiHTML += "</li>";
              }while(j != v[i]['nOspiti']-1);
            }
            ospitiHTML += '</ol>';
            document.getElementById('ospiti').innerHTML = ospitiHTML;
            document.getElementById('prezzo').innerHTML = "€" + parseInt(v[i]['stanza_prezzonotte'], 10) * parseInt(v[i]['days'], 10) ;
            document.getElementById('editLink').href = "modificaPrenotazione.php?id=" + v[i]['id'] + "&stanzaid=" + v[i]['stanza_id'];
            document.getElementById('delete').href = "Queries/updateReservation.php?action=del&id=" + v[i]['id'] + "&stanzaid=" + v[i]['stanza_id'];
          }
        }while(i != Object.keys(v).length);
      }

    };
          xmlhttp.open("GET", "Queries/query.php", true);
          xmlhttp.send();
          return true;
}
