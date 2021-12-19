<?php
require_once 'configs/db.php';
session_start();
$session_id = session_id();

$required = array('uname','uemail','pass', 'StreetAddress', 'houseNo', 'place', 'state', 'zip', 'dob', 'mobileNo');

$error = false;
foreach ($required as $fields) {
    # code...
    if(isset($_POST[$fields])){
        $error = true;
    }
}

if($error)
{
    $uname = $db->real_escape_string($_POST['uname']);
    $uemail = $db->real_escape_string($_POST['uemail']);
    $pass = $db->real_escape_string($_POST['pass']);
    $StreetAddress = $db->real_escape_string($_POST['StreetAddress']);
    $houseNo = $db->real_escape_string($_POST['houseNo']);
    $place = $db->real_escape_string(strtoupper($_POST['place']));
    $state = $db->real_escape_string($_POST['state']);
    $zip = $db->real_escape_string($_POST['zip']);
    $dob = $db->real_escape_string($_POST['dob']);
    $mobileNo = $db->real_escape_string($_POST['mobileNo']);

    $encryptPass = md5($pass);

}


$insertCustDetailsSql = "INSERT INTO customer_registration (`Customer_Name`, `Customer_Email`, `Customer_Password`, `Customer_Street_Address`, `Customer_HouseNo`, `Customer_Place`, `Customer_State`, `Customer_PinCode`, `Date_Of_Birth`, `Mobile_Number`) VALUES (?,?,?,?,?,?,?,?,?,?)";

$pstmtInsert = $db->prepare($insertCustDetailsSql);
$pstmtInsert->bind_param("sssssssisi",$uname, $uemail, $pass, $StreetAddress, $houseNo, $place, $state, $zip, $dob, $mobileNo);


$selectEmailSql = "SELECT * FROM `customer_registration` WHERE Customer_Email = ?";
$pstmtEmail = $db->prepare($selectEmailSql);
$pstmtEmail->bind_param("s",$uemail);
$pstmtEmail->execute();
$pstmtEmail->store_result();
$numEmail = $pstmtEmail->num_rows();
//echo "No: $numEmail";


$selectPassSql = "SELECT * FROM `customer_registration` WHERE Customer_Password = ?";

$pstmtPass = $db->prepare($selectPassSql);
$pstmtPass->bind_param("s", $encryptPass);
$pstmtPass->execute();
$pstmtPass->store_result();
$numPass = $pstmtPass->num_rows();
//echo "No pass: $numPass";



$selectMobileSql = "SELECT * FROM `customer_registration` WHERE Mobile_Number = ?";
$pstmtMobile = $db->prepare($selectMobileSql);
$pstmtMobile->bind_param("i", $mobileNo);
$pstmtMobile->execute();
$pstmtMobile->store_result();
$numMobile = $pstmtMobile->num_rows();

//echo "No mo: $numPass";


//$row = Customer_Password = '$encryptPass'  Mobile_Number

    # code...
    if ($numEmail > 0) {
        echo json_encode(array("statusCode" => 201));
    } else if ($numPass > 0) {
        echo json_encode(array("statusCode" => 202));
    } else if ($numMobile > 0) {
        echo json_encode(array("statusCode" => 203));
    } else if ($pstmtInsert->execute()) {
        # code...else
        echo json_encode(array("statusCode" => 200));
        unset($_SESSION['OTP']);
    } else {
        # code...
        echo $db->error;
        echo var_dump($insertCustDetailsSql);
    }

$pstmtEmail->close();
$pstmtPass->close();
$pstmtMobile->close();


?>