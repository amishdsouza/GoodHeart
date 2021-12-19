<?php
include_once '../../../../php/config.php';
require '../../vendor/autoload.php';
require 'credentials.php';
session_start();

$oid = $_GET['q'];
$pid = $_GET['r'];
$quant = $_GET['p'];
$uid = $_GET['o'];
$sql = "UPDATE `total_orders` SET `Order_Status`= 'Dispatched',`Date_OF_Purchase`= CURRENT_TIMESTAMP WHERE `Order_No` = '$oid'";

$fetch_order = mysqli_query($con, "SELECT * FROM `total_orders` WHERE `Order_No` = '$oid'");

$array_order = mysqli_fetch_assoc($fetch_order);

$pname = $array_order['Product_Name'];
$pq = $array_order['Quantity'];
$tp = $array_order['Total_Price'];

$final_query = mysqli_query($con, $sql);

$sql2 = "UPDATE `inventory` SET `Stock_Items`= ABS(Stock_Items + $quant) WHERE `Product_ID` = $pid";
$final_query2 = mysqli_query($con, $sql2);

$user = mysqli_query($con, "SELECT * FROM `user_info` WHERE `User_ID` = '$uid'");

$user_data = mysqli_fetch_assoc($user);

$_SESSION['u_fullname'] = $user_data['First_Name'] . " " . $user_data['Last_Name'];

$_SESSION['u_email'] = $user_data['Email'];

$email = new \SendGrid\Mail\Mail();
$email->setFrom("mohitkamat99@gmail.com", "Gricee Grocery");
$email->setSubject("Order Dispatched");
$email->addTo($_SESSION['u_email'], $_SESSION['u_fullname']);
$email->addContent(
  "text/html",
  '<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <div class="full">
      <div class="row" style="background-color:#86c5da;padding-left:15%;">
        <h1 style="color:white;font-family:Adobe Gothic Std;">Thank You For Shopping</h1>
      </div>

        <div class="col" style="padding-left:10%;background-color:#82ae46;">

            <img src="https://i.ibb.co/3vpXJzq/Gricee-Groceryfinal.png" alt="Gricee-Groceryfinal" border="0">

        </div>

      <hr>
      <div class="col">
        <h4>Your Order Has Been Dispatched.</h4>
        <br>
        <h4>Order Details</h4>
        <br>
        <h4>Order No: ' . $oid . '</h4>
        <br>
        <h4>Product Name: ' . $pname . '</h4>
        <br>
        <h4>Quantity: ' . $pq . '</h4>
        <br>
        <h4>Total: ' . $tp . ' </h4>
      </div>
    </div>'
);
$sendgrid = new \SendGrid($apiKey);



if ($final_query) {
  # code...
  if ($final_query2) {
    # code...
    try {
      $response = $sendgrid->send($email);
      //print $response->statusCode() . "\n";
      //print_r($response->headers());
      //print $response->body() . "\n";
    } catch (Exception $e) {
      echo 'Caught exception: ' .  $e->getMessage() . "\n";
      //var_dump(openssl_get_cert_locations());
    }

    header('location:orders-list.php');
?>
    <script>
      alert('Order Dispatched');
    </script>

<?php

  }
}



?>