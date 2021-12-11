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

$query = $db->query($selectLogin);
$row = mysqli_num_rows(mysqli_query($db,$selectLogin));

if ($row > 0) {
  # code...
  echo json_encode(array("statusCode" => 200));
  $data = $query -> fetch_assoc();

  $_SESSION['ID'] = $data['Customer_ID'];
  $_SESSION['CName'] = $data['Customer_Name'];
  $_SESSION['CEmail'] = $data['Customer_Email'];
  $_SESSION['login_Sess'] = true;

} else {
  # code...
  echo json_encode(array("statusCode" => 201));
  $_SESSION['login_Sess'] = false;
}


?>