/*******************************************
* Calls converts HDI JSON to an array
*******************************************/

var dbJSON; // JSON object that holds all the values from the database
var dbArray; // Array made of select values from dbJSON
var keyArray; // Array to hold the key that matches the dbArray
function JSONtoArray(response) {
  dbJSON = JSON.parse(response);

  dbArray = [
    dbJSON.location,
    dbJSON.status
  ];

  keyArray = [
    'Location',
    'Status'
  ];

  fieldArray = [
    'location',
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
    url: 'php/updatePart.php?id=' + id + '&partType=hdi&field=' + field + '&value=' + val,
  });
  $.ajax({
    url: 'php/updatePart.php?id=' + id + '&partType=hdi&field=lastEdit&value=' + time,
  });
}

function displayModule(data) {
  console.log(data);
  if (data.module == null || data.module.name == "" || data.module.name == null || data.module.id == "" || data.module.id == null) return;
  var moduleStr = "<a href=\"moduleSummary.html?id=" + data.module.id + "\">" + data.module.name + "</a>";
  document.getElementById('module').innerHTML = document.getElementById('module').innerHTML + moduleStr;
}
