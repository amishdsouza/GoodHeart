<?php
require_once 'configs/db.php';
session_start();

$uname = $mysqli->real_escape_string($_POST['uname']);
$uemail = $mysqli->real_escape_string($_POST['uemail']);
$pass = $mysqli->real_escape_string($_POST['pass']);
$StreetAddress = $mysqli->real_escape_string($_POST['StreetAddress']);
$houseNo = $mysqli->real_escape_string($_POST['houseNo']);
$place = $mysqli->real_escape_string(strtoupper($_POST['place']));
$state = $mysqli->real_escape_string($_POST['state']);
$zip = $mysqli->real_escape_string($_POST['zip']);
$dob = $mysqli->real_escape_string($_POST['dob']);
$mobileNo = $mysqli->real_escape_string($_POST['mobileNo']);

$encryptPass = md5($pass);




$insertCustDetailsSql = "INSERT INTO customer_registration (`Customer_Name`, `Customer_Email`, `Customer_Password`, `Customer_Street_Address`, `Customer_HouseNo`, `Customer_Place`, `Customer_State`, `Customer_PinCode`, `Date_Of_Birth`, `Mobile_Number`) VALUES ('" . $uname . "','" . $uemail . "','" . $encryptPass  . "','" . $StreetAddress . "','" . $houseNo . "','" . $place . "','" . $state . "','" . $zip . "','" . $dob . "','" . $mobileNo . "')";



$selectEmailSql = "SELECT * FROM `customer_registration` WHERE Customer_Email = '$uemail'";

$sql1 = mysqli_num_rows(mysqli_query($db, $selectEmailSql));

$selectPassSql = "SELECT * FROM `customer_registration` WHERE Customer_Password = '$encryptPass' ";

$sql2 = mysqli_num_rows(mysqli_query($db, $selectPassSql));

$selectMobileSql = "SELECT * FROM `customer_registration` WHERE Mobile_Number = ' $mobileNo ' ";
$sql3 = mysqli_num_rows(mysqli_query($db, $selectMobileSql));
//$row = Customer_Password = '$encryptPass'  Mobile_Number

    # code...
    if ($sql1 > 0) {
        echo json_encode(array("statusCode" => 201));
    } else if ($sql2 > 0) {
        echo json_encode(array("statusCode" => 202));
    } else if ($sql3 > 0) {
        echo json_encode(array("statusCode" => 203));
    } else if ($db->query($insertCustDetailsSql) == TRUE) {
        # code...else
        echo json_encode(array("statusCode" => 200));
    } else {
        # code...
        //echo $db->error;
        //echo var_dump($insertCustDetailsSql);
    }
 





?>