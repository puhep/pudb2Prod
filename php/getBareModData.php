<?php
  require_once("database.php");
  $db = new Database();
  $id = $_GET['id'];

  $sql = "SELECT * FROM bareModule WHERE id=$id";
  $result = $db->db_query($sql);
  $result = $result[0];

  $return = new stdClass;
  $return->name           = $result['name'];
  $return->flipChipBonder = $result['flipChipBonder'];
  $return->processingAt   = $result['processingAt'];
  $return->status         = $result['status'];
  $return->lastEdit       = $result['lastEdit'];

  $json = json_encode($return);
  echo $json;
?>
