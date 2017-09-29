/*******************************************
* Calls converts bare module JSON to an array
*******************************************/

var dbJSON; // JSON object that holds all the values from the database
var dbArray; // Array made of select values from dbJSON
var keyArray; // Array to hold the key that matches the dbArray
function JSONtoArray(response) {
  dbJSON = JSON.parse(response);

  dbArray = [
    dbJSON.processedAt,
    dbJSON.currentLocation,
    dbJSON.flipChipBonder,
    dbJSON.status
  ];

  keyArray = [
    'Processed At',
    'Current Location',
    'Flip-Chip Bonder',
    'Status'
  ];

  fieldArray = [
    'processedAt',
    'currentLocation',
    'flipChipBonder',
    'status'
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
    url: 'php/updatePart.php?id=' + id + '&partType=module&field=' + field + '&value=' + val,
  });
  $.ajax({
    url: 'php/updatePart.php?id=' + id + '&partType=module&field=lastEdit&value=' + time,
  });
}

function displaySensor(data) {
  var sensorStr = "<a href=\"sensorSummary.html?id=" + data.fromSensor + "\">" + data.sensorName + "</a>";
  document.getElementById('sensor').innerHTML = document.getElementById('sensor').innerHTML + sensorStr;
}

function displayHDI(data) {
  var hdiStr = "<a href=\"hdiSummary.html?id=" + data.fromHDI + "\">" + data.hdiName + "</a>";
  document.getElementById('HDI').innerHTML = document.getElementById('HDI').innerHTML + hdiStr;
}
