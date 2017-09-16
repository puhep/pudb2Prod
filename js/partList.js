function showParts(resp) {
  data = JSON.parse(resp);

  var waferHTML = "";
  for (var i = 0; i < data.wafer.length; i++) {
    waferHTML += "<tr><td><a href=\"waferSummary.html?id= " + data.wafer[i].id + "\">" + data.wafer[i].name + "</a></td></tr>";
  }
  if (waferHTML != "" && waferHTML != null) {
    document.getElementById("waferList").innerHTML = waferHTML;
  }

  var sensorHTML = "";
  for (var i = 0; i < data.sensor.length; i++) {
    sensorHTML += "<tr><td><a href=\"sensorSummary.html?id= " + data.sensor[i].id + "\">" + data.sensor[i].name + "</a></td></tr>";
  }
  if (sensorHTML != "" && sensorHTML != null) {
    document.getElementById("sensorList").innerHTML = sensorHTML;
  }

  var hdiHTML = "";
  for (var i = 0; i < data.hdi.length; i++) {
    hdiHTML += "<tr><td><a href=\"hdiSummary.html?id= " + data.hdi[i].id + "\">" + data.hdi[i].name + "</a></td></tr>";
  }
  if (hdiHTML != "" && hdiHTML != null) {
    document.getElementById("hdiList").innerHTML = hdiHTML;
  }

  var bareModHTML = "";
  for (var i = 0; i < data.bareMode.length; i++) {
    bareModHTML += "<tr><td><a href=\"bareModSummary.html?id= " + data.bareMod[i].id + "\">" + data.bareMod[i].name + "</a></td></tr>";
  }
  if (bareModHTML != "" && bareModHTML != null) {
    document.getElementById("bareModList").innerHTML = bareModHTML;
  }

  var assModHTML = "";
  for (var i = 0; i < data.assMod.length; i++) {
    assModHTML += "<tr><td><a href=\"assModSummary.html?id= " + data.assMod[i].id + "\">" + data.assMod[i].name + "</a></td></tr>";
  }
  if (assModHTML != "" && assModHTML != null) {
    document.getElementById("assModList").innerHTML = assModHTML;
  }
}