<?php
  require_once 'database.php';
  $db = new Database();
  $wafer   = $db->db_query("SELECT id, name FROM wafer");
  $sensor  = $db->db_query("SELECT id, name FROM sensor");
  $hdi     = $db->db_query("SELECT id, name FROM hdi");
  $bareMod = $db->db_query("SELECT id, name FROM module WHERE isAssembled=\"false\"");
  $assMod  = $db->db_query("SELECT id, name FROM module WHERE isAssembled=\"true\"");

  $return = new stdClass;
  $return->wafer   = $wafer;
  $return->sensor  = $sensor;
  $return->hdi     = $hdi;
  $return->bareMod = $bareMod;
  $return->assMod  = $assMod;
  $json = json_encode($return);
  echo $json;
?>
