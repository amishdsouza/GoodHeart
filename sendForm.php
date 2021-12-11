<?php

require_once 'configs/db.php';

session_start();

$required = array('fname', 'femail', 'fmessage', 'fsubject');

$error = false;
foreach ($required as $fields) {
  # code...
  if (isset($_POST[$fields])) {
    $error = true;
  }
}

if ($error) {
  # code...
  $fname = $mysqli->real_escape_string($_POST['fname']);
  $femail = $mysqli->real_escape_string($_POST['femail']);
  $fmessage = $mysqli->real_escape_string($_POST['fmessage']);
  $fsubject = $mysqli->real_escape_string($_POST['fsubject']);
}

?>