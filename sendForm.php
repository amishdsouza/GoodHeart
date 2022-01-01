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
  $fname = $db->real_escape_string($_POST['fname']);
  $femail = $db->real_escape_string($_POST['femail']);
  $fmessage = $db->real_escape_string($_POST['fmessage']);
  $fsubject = $db->real_escape_string($_POST['fsubject']);
}

$insertFeedback = "INSERT INTO `feedback`(`Feedback_Name`, `Feedback_Email`, `Feedback_Subject`, `Feedback_Message`) VALUES (?,?,?,?)";

$pstmtFeedback = $db->prepare($insertFeedback);
$pstmtFeedback->bind_param("ssss",$fname,$femail,$fmessage,$fsubject);
 if ($pstmtFeedback->execute()) {
  # code...
  echo json_encode(array("statusCode" => 200));
 } else {
  # code...
  echo json_encode(array("statusCode" => 201));
 }
 

?>