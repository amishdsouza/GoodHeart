<?php
session_start();
require_once 'configs/db.php';
if (isset($_GET['id'])) {
  $pid = $_GET['id'];
  $cid = $_SESSION['ID'];
  $status = "Delivered";
  # code...
  $order_query = $db->prepare("INSERT INTO `orders` (`Product_ID`, `Customer_ID`,`Order_Status`) VALUES (?,?,?)");
  $order_query->bind_param('iis', $pid, $cid, $status);

  $update_query = $db->prepare("UPDATE `product_customer_relation` SET `Product_Status` = 'In_Active' WHERE `Product_ID` = ?");
  $update_query->bind_param('i', $pid);

  if ($update_query->execute()) {  
    # code...
    $order_query->execute();

?>
     <script>
        alert('Order Delivered Successfully');
        window.location.href = 'product-listing.php';
//       </script>
    <?php
//     } else {
//       # code...
//    
    
  }
  else {
    echo mysqli_error($db);
    var_dump($order_query);
  }
}


?>