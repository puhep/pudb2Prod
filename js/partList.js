function showParts(resp) {
  data = JSON.parse(resp);

  var waferHTML = "";
  if (data.wafer !== null) {
    for (var i = 0; i < data.wafer.length; i++) {
      waferHTML += "<tr><td><a href=\"waferSummary.html?id=" + data.wafer[i].id + "\">" + data.wafer[i].name + "</a></td></tr>";
    }
  }
  if (waferHTML !== "" && waferHTML !== null) {
    document.getElementById("waferList").innerHTML = waferHTML;
  }

  var sensorHTML = "";
  if (data.sensor !== null) {
    for (var i = 0; i < data.sensor.length; i++) {
      sensorHTML += "<tr><td><a href=\"sensorSummary.html?id=" + data.sensor[i].id + "\">" + data.sensor[i].name + "</a></td></tr>";
    }
  }
  if (sensorHTML !== "" && sensorHTML !== null) {
    document.getElementById("sensorList").innerHTML = sensorHTML;
  }

  var hdiHTML = "";
  if (data.hdi !== null) {
    for (var i = 0; i < data.hdi.length; i++) {
      hdiHTML += "<tr><td><a href=\"hdiSummary.html?id=" + data.hdi[i].id + "\">" + data.hdi[i].name + "</a></td></tr>";
    }
  }
  if (hdiHTML !== "" && hdiHTML !== null) {
    document.getElementById("hdiList").innerHTML = hdiHTML;
  }

  var bareModHTML = "";
  if (data.bareMod !== null) {
    for (var i = 0; i < data.bareMod.length; i++) {
      bareModHTML += "<tr><td><a href=\"moduleSummary.html?id=" + data.bareMod[i].id + "\">" + data.bareMod[i].name + "</a></td></tr>";
    }
  }
  if (bareModHTML !== "" && bareModHTML !== null) {
    document.getElementById("bareModList").innerHTML = bareModHTML;
  }

  var assModHTML = "";
  if (data.assMod !== null) {
    for (var i = 0; i < data.assMod.length; i++) {
      assModHTML += "<tr><td><a href=\"moduleSummary.html?id=" + data.assMod[i].id + "\">" + data.assMod[i].name + "</a></td></tr>";
    }
  }
  if (assModHTML !== "" && assModHTML !== null) {
    document.getElementById("assModList").innerHTML = assModHTML;
  }

  var miscPartHTML = "";
  if (data.miscPart !== null) {
    for (var i = 0; i < data.miscPart.length; i++) {
      miscPartHTML += "<tr><td><a href=\"miscPartSummary.html?id=" + data.miscPart[i].id + "\">" + data.miscPart[i] + "</a></td></tr>";
    }
  }
  if (miscPartHTML !== "" && miscPartHTML !== null) {
    document.getElementById('miscPartList').innerHTML = miscPartHTML;
  }
  if (data.miscPart !== "hello") console.log('hello');
  if (data.miscPart == null) console.log('world');
}
