<?php
  require_once("database.php");
  $db = new Database();
  $id = $_GET['id'];

  $sql    = "SELECT * FROM module WHERE id =$id";
  $result = $db->db_query($sql);
  $result = $result[0];

  $sql     = "SELECT id, name FROM hdi";
  $possHDI = $db->db_query($sql);

  $sql        = "SELECT id, name FROM sensor";
  $possSensor =  $db->db_query($sql);

  $sql   = "SELECT notetext FROM notes WHERE part_id=$id and part_type=\"module\"";
  $notes = $db->db_query($sql);

  $sensorName = "";
  if ($result['fromSensor'] != "") {
    $sql = "SELECT name FROM sensor WHERE id =".$result['fromSensor'];
    $sensor = $db->db_query($sql);
    $sensorName = $sensor[0]['name'];
  }

  $hdiName = "";
  if ($result['fromHDI'] != "") {
    $sql = "SELECT name FROM hdi WHERE id =".$result['fromHDI'];
    $hdi = $db->db_query($sql);
    $hdiName = $hdi[0]['name'];
  }

  $return = new stdClass;
  $return->name            = $result['name'];
  $return->currentLocation = $result['currentLocation'];
  $return->flipChipBonder  = $result['flipChipBonder'];
  $return->processedAt     = $result['processedAt'];
  $return->status          = $result['status'];
  $return->fromHDI         = $result['fromHDI'];
  $return->fromSensor      = $result['fromSensor'];
  $return->isAssembled     = $result['isAssembled'];
  $return->lastEdit        = $result['lastEdit'];
  $return->possibleHDI     = $possHDI;
  $return->possibleSensor  = $possSensor;
  $return->hdiName         = $hdiName;
  $return->sensorName      = $sensorName;
  $return->notes           = $notes;

  $json = json_encode($return);
  echo $json;
?>
