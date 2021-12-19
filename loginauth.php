<?php

require_once 'configs/db.php';

session_start();

$required = array('uemail', 'upass');

$error = false;
foreach ($required as $fields) {
  # code...
  if (isset($_POST[$fields])) {
    $error = true;
  }
}

if ($error) {
  # code...
  $uemail = $db->real_escape_string($_POST['uemail']);
  $upass = $db->real_escape_string($_POST['upass']);
}


$encryptPass = md5($upass);


$selectLogin = "SELECT `Customer_ID`, `Customer_Name`, `Customer_Email` FROM `customer_registration` WHERE Customer_Email = ? AND Customer_Password = ?";

$pstmtLogin = $db->prepare($selectLogin);
$pstmtLogin->bind_param("ss",$uemail,$encryptPass);
$pstmtLogin->execute();
$pstmtLogin->store_result();
$row = $pstmtLogin->num_rows();
$pstmtLogin->bind_result($cid,$cname,$cemail);
//var_dump($row_data);

if ($row > 0) {
  # code...
  echo json_encode(array("statusCode" => 200));

  //$data = $row_data->fetch_assoc() or die($db->error);
  //$data = $row_data->fetch_assoc();
  while ($pstmtLogin->fetch()) {
    $_SESSION['ID'] = $cid;
    $_SESSION['CName'] = $cname;
    $_SESSION['CEmail'] = $cemail;
  }


  $_SESSION['login_Sess'] = true;
} else {
  # code...
  echo json_encode(array("statusCode" => 201));
  $_SESSION['login_Sess'] = false;
}


?>