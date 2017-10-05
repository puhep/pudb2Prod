<?php
  require_once("database.php");
  require_once("functions.php");
  $db = new Database();
  $sql = "INSERT INTO sensor (name) VALUES (\"".$_POST['name']."\")";
  $db->query($sql);
  $sql = "SELECT MAX(id) FROM sensor";
  $db->query($sql);
  $db->singleRecord();
  $id = $db->Record['MAX(id)'];
  $sql = "INSERT INTO notes (part_type,part_id) VALUES (\"sensor\",$id)";
  $db->query($sql);

  ### this concatenates existing notes, if any, with a new line including the date and the entered note text
  if ($_POST['notes'] != ""){
      $sql = "UPDATE notes SET notetext= CONCAT(IFNULL(notetext,''),DATE_FORMAT(NOW(),'%m-%d-%y %T'),\" ".$_POST['notes']."\",'\n') WHERE part_id=$id AND part_type=\"sensor\"";
      $db -> query($sql);
  }

  $time = date('m-d-y H:i:s');
  $sql = "UPDATE sensor SET lastEdit=\"$time\" WHERE id=$id";
  $db->query($sql);

  ### if the name of the picture is not blank (i.e. a picture has been slotted to upload), perform several checks and upload
  if ($_FILES['pic']['name'] != "") {
    add_pic("sensor",$id,$_FILES,$_POST['picnotes']);
  }

  ### if the name of the file is not blank (i.e. a file has been slotted to upload), attempt to upload
  if ($_FILES['files']['name'][0] != "") {
    add_file("sensor",$id,$_FILES['files']);
  }

  ### redirect to the summary page with the new information
  header("Location: ../sensorSummary.html?id=$id")
?>
