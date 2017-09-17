<?php
  require_once("database.php");
  $db = new Database();
  $id = $_GET['id'];

  $sql = "SELECT * FROM assembledModule WHERE id=$id";
  $result = $db->db_query($sql);
  $result = $result[0];

  $return = new stdClass;
  $return->name            = $result['name'];
  $return->currentLocation = $result['currentLocation'];
  $return->location        = $result['location'];
  $return->flipChipBonder  = $result['flipChipBonder'];
  $return->processedAt     = $result['processedAt'];
  $return->status          = $result['status'];
  $return->lastEdit        = $result['lastEdit'];

  $json = json_encode($return);
  echo $json;
?>
