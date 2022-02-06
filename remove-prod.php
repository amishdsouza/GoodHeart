<?php
require_once 'configs/db.php';
if (isset($_GET['id'])) {
  # code...
  $id = $_GET['id'];
  $del_query = $db->query("DELETE FROM `product_customer_relation` WHERE `Product_ID` = '$id'");
  $del_query2 = $db->query("DELETE FROM `products` WHERE `Product_ID` = '$id'");
  if ($del_query && $del_query2) {
    # code...
?>
    <script>
      alert('Product Deleted Successfully');
      window.location.href = 'product-listing.php';
    </script>
  <?php
  } else {
    # code...
  ?>
    <script>
      alert('Product Deletion Failed');
      window.location.href = 'product-listing.php';
    </script>
<?php
  }
}

?>