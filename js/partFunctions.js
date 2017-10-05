function getTime() {
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
  return time;
}

function displayFiles(resp) {
  fileData = JSON.parse(resp);
  document.getElementById('files').innerHTML = fileData.fileStr;
  document.getElementById('pics').innerHTML  = fileData.picStr;
}

function printNotes(notes) {
  console.log(notes);
  var temp = notes;
  var notesDOM = document.getElementById('notes');
  if (notes == "" || notes == null) notesDOM.innerHTML = "<p>No notes found</p>";
  while (temp != "" && temp.indexOf("\n") != -1) {
    notesDOM.innerHTML = notesDOM.innerHTML + "<p>" + temp.substring(0, temp.indexOf("\n")) + "</p>";
    temp = temp.substring(temp.indexOf("\n") + 1);
  }
}
