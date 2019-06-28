function initReservation(id){
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
      var v = JSON.parse(this.responseText);
      var i = 0;
      do{
        i++;
        if(v[i]['id'] == id){
          document.getElementById('selectStructure').value = v[i]['struttura_id'];
          document.getElementById('selectRoom').value = v[i]['stanza_id'];
          document.getElementById('name').value = v[i]['nome'];
          document.getElementById('surname').value = v[i]['p_cognome'];
          document.getElementById('selectGender').value = v[i]['p_sesso'];
          document.getElementById('provenienza').value = v[i]['p_provenienza'];
          document.getElementById('nascita').value = v[i]['p_nascita'];
          document.getElementById('professione').value = v[i]['p_professione'];
          document.getElementById('from').value = v[i]['from_day'];
          document.getElementById('to').value = v[i]['to_day'];
          document.getElementById('checkin').value = v[i]['check_in'];
          document.getElementById('checkout').value = v[i]['check_out'];
          var ospitiHTML = '<ol>';
          if(v[i]['nOspiti']-1 > -1){
          var j = -1;
            do{
              j++;
              var number = j+1;
              document.getElementById("formNumber").classList = "";
              document.getElementById("formNumber").classList.add(number.toString());
              setJ();
              var temp = document.getElementById('forms');
              temp.innerHTML += '<form id="addF'+j+'" method="post" action="/Queries/addGuests.php?num='+j+'"><div class="row" id="name-surname"><div class="input-field col offset-s1 s4">  <input placeholder="Nome" id="name'+j+'" type="text" class="validate"> </div>  <div class="input-field col s4"><input placeholder="Cognome" id="surname'+j+'" type="text" class="validate"> </div><div class="input-field col s3"><select id="selectGender'+j+'"><option value="m">M</option><option value="f">F</option></select></div></div><div class="row" id="name-surname"><div class="input-field col offset-s1 s4"><input placeholder="Provenienza" id="provenienza'+j+'" type="text" class="validate"></div><div class="input-field col s4"><input placeholder="Data di nascita" id="nascita'+j+'" type="text" class="validate"></div><div class="input-field col s3"><input placeholder="Professione" id="professione'+j+'" type="text" class="validate"></div></div> </form>';
              document.getElementById('name'+j).value = v[i][j]['o_nome'];
              document.getElementById('surname'+j).value = v[i][j]['o_cognome'];
              document.getElementById('selectGender'+j).value = v[i][j]['o_sesso'];
              document.getElementById('provenienza'+j).value = v[i][j]['o_provenienza'];
              document.getElementById('nascita'+j).value = v[i][j]['o_nascita'];
              document.getElementById('professione'+j).value = v[i][j]['o_professione'];
            }while(j != v[i]['nOspiti']-1);
          }}
          $("select").material_select();
          fillColor(document.getElementById('selectRoom').value);
      }while(i != Object.keys(v).length);
    }

  };
        xmlhttp.open("GET", "Queries/query.php", true);
        xmlhttp.send();
        return true;
}

function deleteReservation(id){
  var stanzaid = document.getElementById('selectRoom').value;
  window.location.href = '/Queries/updateReservation.php?action=del&id=' + id + '&stanzaid=' + stanzaid;
}
