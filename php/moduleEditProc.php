<?php
  $backmessage = "Please press the back button and try again.";
  require_once("database.php");
  require_once("functions.php");
  $db = new Database();
  $id = $_POST['id'];

  /**
  * Update the misc info if the fields have been filed in
  */
  if ($_POST['name'] != "") {
    $sql = "UPDATE module SET name=\"".$_POST['name']."\" WHERE id=$id";
    $db->query($sql);
  }

  if ($_POST['processedAt'] != "") {
    $sql = "UPDATE module SET processedAt=\"".$_POST['processedAt']."\" WHERE id=$id";
    $db->query($sql);
  }

  if ($_POST['flipChipBonder'] != "") {
    $sql = "UPDATE module SET flipChipBonder=\"".$_POST['flipChipBonder']."\" WHERE id=$id";
    $db->query($sql);
  }

  if ($_POST['status'] != "") {
    $sql = "UPDATE module SET status=\"".$_POST['status']."\" WHERE id=$id";
    $db->query($sql);
  }

  if ($_POST['currentLocation'] != "") {
    $sql = "UPDATE module SET currentLocation=\"".$_POST['currentLocation']."\" WHERE id=$id";
    $db->query($sql);
  }

  if ($_POST['fromSensor'] != "" && $_POST['fromSensor'] != "none") {
    $sql = "UPDATE module SET fromSensor=\"".$_POST['fromSensor']."\" WHERE id=$id";
    $db->query($sql);
  }

  if ($_POST['fromHDI'] != "" && $_POST['fromHDI'] != "none") {
    $sql = "UPDATE module SET fromHDI=\"".$_POST['fromHDI']."\" WHERE id=$id";
    $db->query($sql);
  }

  // This concatenates existing notes, if any, with a new line including the date and the entered note text
  if ($_POST['notes'] != "") {
    $sql = "UPDATE notes SET notetext= CONCAT(IFNULL(notetext,''),DATE_FORMAT(NOW(),'%m-%d-%y %T'),\" ".$_POST['notes']."\",'\n') WHERE part_id=$id AND part_type=\"sensor\"";
    echo $sql;
    // $db -> query($sql);
  }

  // If the name of the picture is not blank (i.e. a picture has been slotted to upload), perform several checks and upload
  if ($_FILES['pic']['name'] != "") {
    add_pic("module",$id,$_FILES,$_POST['picnotes']);
  }

  // If the name of the file is not blank (i.e. a file has been slotted to upload), attempt to upload
  if ($_FILES['files']['name'][0] != "") {
    add_file("module", $id, $_FILES['files']);
  }

  // // Update the lastEdit fields
  $sql = "UPDATE module SET lastEdit=\"".$_POST['lastEdit']."\" WHERE id=$id";
  $db->query($sql);

  // Redirect to the summary page with the new information
  header("Location: ../moduleSummary.html?id=$id");

?>
