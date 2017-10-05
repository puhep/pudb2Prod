<?php
  require_once("database.php");
  $db = new Database();
  $id = $_GET['id'];

  $sql    = "SELECT * FROM wafer WHERE id=$id";
  $result = $db->db_query($sql);
  $result = $result[0];

  $sql  = "SELECT id, name FROM sensor WHERE fromWafer=$id";
  $resp = $db->db_query($sql);

  $sql   = "SELECT notetext FROM notes WHERE part_id=$id and part_type=\"wafer\"";
  $notes = $db->db_query($sql);

  $return = new stdClass;
  $return->name      = $result['name'];
  $return->status    = $result['status'];
  $return->vendor    = $result['vendor'];
  $return->thickness = $result['thickness'];
  $return->lastEdit  = $result['lastEdit'];
  $return->sensors   = $resp;
  $return->notes     = $notes;

  $json = json_encode($return);
  echo $json;
?>
