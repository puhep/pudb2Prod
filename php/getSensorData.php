<?php
  require_once("database.php");
  $db = new Database();
  $id = $_GET['id'];

  // get the sensors data
  $sql    = "SELECT * FROM sensor WHERE id =$id";
  $result = $db->db_query($sql);
  $result = $result[0];

  // get what wafer the sensor is from
  $waferName = "";
  if ($result['fromWafer'] != "") {
    $sql   = "SELECT name FROM wafer WHERE id =".$result['fromWafer'];
    $wafer = $db->db_query($sql);
    $waferName = $wafer[0]['name'];
  } else {
    $waferName = "";
  }

  // get all the wafers so the user can change between all of them
  $sql     = "SELECT id, name FROM wafer";
  $possWaf = $db->db_query($sql);

  $sql = "SELECT id, name FROM module WHERE fromSensor=$id";
  $module = $db->db_query($sql);

  $return = new stdClass;
  $return->name           = $result['name'];
  $return->lastEdit       = $result['lastEdit'];
  $return->fromWafer     = $result['fromWafer'];
  $return->waferName      = $waferName;
  $return->possibleWafers = $possWaf;
  $return->module         = $module[0];

  $json = json_encode($return);
  echo $json;
?>
