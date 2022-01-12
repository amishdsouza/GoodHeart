<?php

require_once 'configs/db.php';

$cart_id = $_GET['cid'];

$remove_cart = "DELETE FROM `shopping_cart_details` WHERE Cart_Details_ID = $cart_id";
$res = $db->query($remove_cart);
if ($res) {
  # code...
  header('location:cart.php');
} else {
  # code...
  echo $db->error;
}



?>