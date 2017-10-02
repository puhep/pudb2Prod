<?php
  require_once("database.php");
  $db = new Database();
  $id = $_GET['id'];

  $sql = "SELECT * FROM hdi WHERE id=$id";
  $result = $db->db_query($sql);
  $result = $result[0];

  $sql    = "SELECT id, name FROM module WHERE fromHDI =$id";
  $module = $db->db_query($sql);

  $return = new stdClass;
  $return->name     = $result['name'];
  $return->status   = $result['status'];
  $return->location = $result['location'];
  $return->lastEdit = $result['lastEdit'];
  $return->module   = $module[0];

  $json = json_encode($return);
  echo $json;
?>
