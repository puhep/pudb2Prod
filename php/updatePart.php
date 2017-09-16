<?php
  /** Requires */
  require_once("database.php");
  $db = new Database();

  /** GET Varibles */
  $id       = $_GET['id'];
  $partType = $_GET['partType'];
  $field    = $_GET['field'];
  $value    = $_GET['value'];

  /** SQL Statement to update */
  $sql = "UPDATE $partType SET $field=\"$value\" WHERE id=$id";
  /** Execute the SQL statement */
  $db->query($sql);
?>
