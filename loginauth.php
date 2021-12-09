<?php

require_once 'configs/db.php';

session_start();

if (isset($_POST['uemail']) && isset($_POST['upass'])) {
  # code...
  $uemail = $db->real_escape_string($_POST['uemail']);
  $upass = $db->real_escape_string($_POST['upass']);
}


$encryptPass = md5($upass);

$selectLogin = "SELECT * FROM `customer_registration` WHERE Customer_Email = '$uemail' AND Customer_Password = '$encryptPass' ";


$row = mysqli_num_rows(mysqli_query($db,$selectLogin));

if ($row > 0) {
  # code...
  echo json_encode(array("statusCode" => 200));
} else {
  # code...
  echo json_encode(array("statusCode" => 201));
}


?>