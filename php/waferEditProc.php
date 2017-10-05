<?php
  $backmessage = "Please press the back button and try again.<br>";
  require_once("database.php");
  require_once("functions.php");
  $db = new Database();
  $id = $_POST['id'];

  /*
  * Update the misc info if the fields have been filles
  */
  if ($_POST['name'] != "") {
    $sql = "UPDATE wafer SET name=\"".$_POST['name']."\" WHERE id=$id";
    $db->query($sql);
  }

  if ($_POST['status'] != "") {
    $sql = "UPDATE wafer SET status=\"".$_POST['status']."\" WHERE id=$id";
    $db->query($sql);
  }

  if ($_POST['vendor'] != "") {
    $sql = "UPDATE wafer SET vendor=\"".$_POST['vendor']."\" WHERE id=$id";
    $db->query($sql);
  }

  if ($_POST['thickness'] != "") {
    $sql = "UPDATE wafer SET thickness=\"".$_POST['thickness']."\" WHERE id=$id";
    $db->query($sql);
  }

  // This concatenates existing notes, if any, with a new line including the date and the entered note text
  if ($_POST['notes'] != "") {
    $sql = "UPDATE notes SET notetext = CONCAT(IFNULL(notetext,''),DATE_FORMAT(NOW(),'%m-%d-%y %T'),\" ".$_POST['notes']."\",'\n') WHERE part_id=$id AND part_type=\"wafer\"";
    $db->query($sql);
  }

  // If the name of the picture is not blank (i.e. a picture has been slotted to upload), perform several checks and upload
  if ($_FILES['pic']['name'] != "") {
    add_pic("wafer",$id,$_FILES,$_POST['picnotes']);
  }

  // If the name of the file is not blank (i.e. a file has been slotted to upload), attempt to upload
  if ($_FILES['files']['name'][0] != "") {
    add_file("wafer", $id, $_FILES['files']);
  }

  // // Update the lastEdit fields
  $sql = "UPDATE wafer SET lastEdit=\"".$_POST['lastEdit']."\" WHERE id=$id";
  $db->query($sql);

  // Redirect to the summary page with the new information
  header("Location: ../waferSummary.html?id=$id");

?>
