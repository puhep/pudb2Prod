/*******************************************
* Calls converts wafer JSON to an array
*******************************************/

var dbJSON; // JSON object that holds all the values from the database
var dbArray; // Array made of select values from dbJSON
var keyArray; // Array to hold the key that matches the dbArray
function JSONtoArray(response) {
  dbJSON = JSON.parse(response);

  dbArray = [
    dbJSON.status,
    dbJSON.vendor,
    dbJSON.thickness
  ];

  keyArray = [
    'Status',
    'Vendor',
    'thickness'
  ];

  fieldArray = [
    'status',
    'vendor',
    'thickness'
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
    url: 'php/updatePart.php?id=' + id + '&partType=wafer&field=' + field + '&value=' + val,
  });
  $.ajax({
    url: 'php/updatePart.php?id=' + id + '&partType=wafer&field=lastEdit&value=' + time,
  });
}

function displaySensors(data) {
  if (data.sensors == null || data.sensors.length == 0) return;
  var sens = document.getElementById('sensor');
  for (var i = 0; i < data.sensors.length; i++) {
    sens.innerHTML += "<a href=\"sensorSummary.html?id=" + data.sensors[i].id + "\">" + data.sensors[i].name + "</a>";
  }
}
