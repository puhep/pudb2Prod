/*******************************************
* Calls converts sensor JSON to an array
*******************************************/

var dbJSON; // JSON object that holds all the values from the database
var dbArray; // Array made of select values from dbJSON
var keyArray; // Array to hold the key that matches the dbArray
function JSONtoArray(response) {
  dbJSON = JSON.parse(response);

  dbArray = [
    
  ];

  keyArray = [

  ];

  fieldArray = [

  ];
}

function updatePart(id, field, val) {
  var time = new Date();
  var h = time.getHours();
  var m = time.getMinutes();
  var s = time.getSeconds();
  var dd = time.getDate();
  var mm = time.getMonth() + 1;
  var yyyy = time.getFullYear();
  if (dd < 10) dd = '0' + dd;
  if (mm < 10) mm = '0' + mm;
  time = mm + '-' + dd + '-' + yyyy + ' ' + h + ':' + m + ':' + s;
  $.ajax({
    url: 'php/updatePart.php?id=' + id + '&partType=sensor&field=' + field + '&value=' + val,
  });
  $.ajax({
    url: 'php/updatePart.php?id=' + id + '&partType=sensor&field=lastEdit&value=' + time,
  });
}

function displayWafer(data) {
  var waferStr = "<a href=\"waferSummary.html?id=" + data.fromWafer + "\">" + data.waferName + "</a>";
  document.getElementById('wafer').innerHTML = document.getElementById('wafer').innerHTML + waferStr;
  // document.getElementById('possWaf').innerHTML = createFromWaferString(data);
}

function createFromWaferString (data) {
  console.log(data);
  var waferStr = "";
  for (var i = 0; i < data.possibleWafers.length; i++) {
    waferStr += "<option value=\"" + data.possibleWafers[0].id+ "\">" + data.possibleWafers[i].name + "</option>"
  }
  return waferStr;
}
