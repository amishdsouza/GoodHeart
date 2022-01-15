<?php
require_once 'configs/db.php';
ob_start();
session_start();
if (isset($_SESSION['login_Sess'])) {
   # code...

   $id = $_SESSION['ID'];
   $cart_details = "SELECT shopping_cart_details.Cart_Details_ID,products.Product_ID, products.Product_Name, products.Product_Description,products.Product_Image_Location,shopping_cart_details.Item_Date_Added FROM products LEFT JOIN shopping_cart_details ON products.Product_ID = shopping_cart_details.Product_ID WHERE shopping_cart_details.Customer_ID = $id ";

   $result = $db->query($cart_details);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta http-equiv="x-ua-compatible" content="ie=edge">
   <title>GoodHeart</title>
   <meta name="description" content="">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <link rel="manifest" href="site.webmanifest">
   <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
   <!-- Place favicon.ico in the root directory -->

   <!-- CSS here -->
   <link rel="stylesheet" href="css/bootstrap.min.css">
   <link rel="stylesheet" href="css/owl.carousel.min.css">
   <link rel="stylesheet" href="css/fontawesome.min.css">
   <link rel="stylesheet" href="css/jquery-ui.css">
   <link rel="stylesheet" href="css/animate.min.css">
   <link rel="stylesheet" href="css/magnific-popup.css">
   <link rel="stylesheet" href="css/fontawesome-all.min.css">
   <link rel="stylesheet" href="css/meanmenu.css">
   <link rel="stylesheet" href="css/slick.css">
   <link rel="stylesheet" href="css/default.css">
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/responsive.css">

   <!-- AJAX here -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.js"></script>

   <!-- JS here -->
   <script src="js/vendor/jquery-1.12.4.min.js"></script>
   <script src="js/popper.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <script src="js/owl.carousel.min.js"></script>
   <script src="js/isotope.pkgd.min.js"></script>
   <script src="js/one-page-nav-min.js"></script>
   <script src="js/slick.min.js"></script>
   <script src="js/jquery.meanmenu.min.js"></script>
   <script src="js/ajax-form.js"></script>
   <script src="js/fontawesome.min.js"></script>
   <script src="js/wow.min.js"></script>
   <script src="js/jquery-ui.js"></script>
   <script src="js/jquery.scrollUp.min.js"></script>
   <script src="js/imagesloaded.pkgd.min.js"></script>
   <script src="js/jquery.magnific-popup.min.js"></script>
   <script src="js/plugins.js"></script>
   <script src="js/main.js"></script>
   <script type="text/javascript">
      $(document).ready(function() {

         show_mycart();

         function show_mycart() {
            $.ajax({
               url: "ajax/show_mycart.php",
               method: "POST",
               dataType: "JSON",
               success: function(data) {
                  $(".get_cart").html(data.out);
                  $("#cart").text(data.da);
               }
            });
         }
         setInterval(show_mycart, 1000);
      });
   </script>
</head>

<body>
   <!-- header section start -->
   <header class="header pt-10 pb-10  header-static">
      <div class="container-fluid">
         <div class="header-nav position-relative">
            <div class="row align-items-center">
               <div class="col-xl-2 col-lg-1 col-md-6 col-sm-6 col-3">
                  <div class="logo">
                     <a href="index.php"><img src="img/banner/good_heart_new_trans.png" alt=""></a>
                  </div>
               </div>

               <div class="col-xl-6 col-lg-8 hidden-md position-static">
                  <div class="header-nav">
                     <nav>
                        <ul>
                           <li><a href="index.php" class="<?php if (basename($_SERVER['PHP_SELF']) == "index.php") {
                                                               echo "active";
                                                            } else {
                                                               echo "";
                                                            } ?>"><span>Home </span></a>

                           </li>
                           <li class="position-static"><a href="shop.php" class="<?php if (basename($_SERVER['PHP_SELF']) == "shop.php") {
                                                                                    echo "active";
                                                                                 } else {
                                                                                    echo "";
                                                                                 } ?>"><span>Shop</span></a>

                           </li>
                           <!-- <li><a href="javascript:void(0)"><span>Blog <i class="fal fa-angle-down"></i></span>
                              </a>
                              <ul class="submenu">
                                 <li><a href="blog.php">Grid layout</a></li>
                                 <li><a href="blog2.php">Large image</a></li>
                                 <li><a href="blog3.php">Left Sidebar</a></li>
                                 <li><a href="blog4.php">Right Sidebar</a></li>
                                 <li><a href="blog5.php">No sidebar</a></li>
                              </ul>
                           </li> -->
                           <!--                            
                           <li><a href="javascript:void(0)"><span>Portfolio <i class="fal fa-angle-down"></i></span> </a>
                              <ul class="submenu">
                                 <li><a href="portfolio.php">Single project</a></li>
                                 <li><a href="portfolio2.php">Two Columns</a></li>
                                 <li><a href="portfolio3.php">Three Columns</a></li>
                              </ul>
                           </li> -->
                           <li><a href="about.php" class="<?php if (basename($_SERVER['PHP_SELF']) == "about.php") {
                                                               echo "active";
                                                            } else {
                                                               echo "";
                                                            } ?>"><span>About us</span> </a>

                           </li>
                           <li><a href="contact.php" class="<?php if (basename($_SERVER['PHP_SELF']) == "contact.php") {
                                                               echo "active";
                                                            } else {
                                                               echo "";
                                                            } ?>"><span>Contact</span></a></li>
                        </ul>
                     </nav>
                  </div>
               </div>

               <div class="col-xl-4 col-lg-3 col-6 col-md-6 col-sm-6 col-9">
                  <div class="header-right">
                     <ul class="text-right">

                        <li>
                           <?php
                           if (isset($_SESSION['login_Sess'])) {
                           ?>
                              <a href="giveaway.php" class="account"> <i class="fas fa-gift"> </i><?php echo "GIVEAWAY" ?></a>
                           <?php
                           }
                           ?>

                        </li>


                        <li><a href="javascript:void(0)"><i class="fal fa-search"></i></a>

                           <!-- search popup -->
                           <div id="search-popup">
                              <div class="close-search-popup">
                                 <i class="fal fa-times"></i>
                              </div>
                              <div class="search-popup-inner mt-135">
                                 <div class="search-title text-center">
                                    <h2>Search</h2>
                                 </div>

                                 <div class="search-content pt-55">
                                    <ul class="text-center">
                                       <li><a href="javascript:void(0)" class="active">All categories</a>
                                       </li>
                                       <li><a href="javascript:void(0)">Clothing</a></li>
                                       <li><a href="javascript:void(0)">Books</a></li>
                                       <li><a href="javascript:void(0)">Kids</a></li>
                                       <li><a href="javascript:void(0)">Shoes</a></li>
                                    </ul>

                                    <div class="search-form mt-35">
                                       <form action="#" method="post">
                                          <input type="text" placeholder="Search Products...">
                                          <button type="submit"><i class="fal fa-search"></i></button>
                                       </form>
                                    </div>

                                    <!-- <div class="search-result-list">
                                       <ul class="text-left">
                                         
                                       </ul>
                                    </div> -->
                                 </div>


                              </div>
                           </div>
                        </li>
                        <li>
                           <a href="wishlist.php" data-toggle="tooltip" data-placement="bottom" title="view wishlist">
                              <i class="fal fa-heart"><span>0</span></i>
                           </a>
                        </li>

                        <li><a href="javascript:void(0)"><i class="fal fa-shopping-bag">
                                 <span>
                                    <?php
                                    if (isset($_SESSION['login_Sess'])) {
                                       echo loginStart($db);
                                    } else {
                                       echo "0";
                                    }
                                    ?>
                                 </span>
                              </i></a>
                           <div class="minicart">
                              <div class="minicart-body">
                                 <div class="minicart-content">
                                    <ul class="text-left">

                                       <?php
                                       if (isset($_SESSION['login_Sess'])) {
                                          if ($noCart = $result->num_rows == 0) {
                                       ?>
                                             <p class="title">Cart is Empty</p>
                                          <?php

                                          } else {
                                             while ($row = $result->fetch_assoc()) { 
                                          ?>
                                             <li>
                                                <div class="minicart-img">
                                                   <a href="single-product-3.php" class="p-0"><img src="<?php echo $row['Product_Image_Location'] ?>" class="w-100" alt=""></a>
                                                </div>
                                                <div class="minicart-desc">
                                                   <a href="" class="p-0"><?php echo $row['Product_Name'] ?></a>
                                                   <strong><?php echo $row['Product_Description'] ?></strong>
                                                </div>
                                                <div class="remove">
                                                   <i class="fal fa-times"></i>
                                                </div>
                                             </li>
                                       <?php
                                             }
                                          }
                                       }

                                       ?>

                                       <!-- <li>
                                          <div class="minicart-img">
                                             <a href="single-product-3.php" class="p-0"><img src="img/product/1.jpg" class="w-100" alt=""></a>
                                          </div>
                                          <div class="minicart-desc">
                                             <a href="single-product-3.php" class="p-0">Capitalize on low hanging fruit
                                                t</a>
                                             <strong>1 × $250.00</strong>
                                          </div>
                                          <div class="remove">
                                             <i class="fal fa-times"></i>
                                          </div>
                                       </li> -->

                                    </ul>
                                 </div>
                              </div>
                              <div class="minicart-checkout">
                                 <div class="minicart-checkout-heading mt-8 mb-25 overflow-hidden">
                                    <!-- <strong class="float-left">Subtotal:</strong>
                                    <span class="price float-right">503.00</span> -->
                                 </div>
                                 <div class="minicart-checkout-links">
                                    <a href="cart.php" class="generic-btn black-hover-btn text-uppercase w-100 mb-20">View
                                       cart</a>
                                    <!-- <a href="checkout.php" class="generic-btn black-hover-btn text-uppercase w-100 mb-20">Checkout</a> -->
                                 </div>
                              </div>
                           </div>
                        </li>

                        <li>
                           <?php
                           if (isset($_SESSION['login_Sess'])) {
                              # code...
                           ?>
                              <a href="" class="account"><i class="fal fa-user-friends"></i>
                                 <article class="account-registar d-inline-block">
                                    <?php echo $_SESSION['CName']; ?>
                                 </article>
                              </a>
                              <ul class="submenu text-right">
                                 <li><a href="">My Account</a></li>
                                 <li><a href="shop.php">Shop</a></li>
                                 <li><a href="wishlist.php">Wishlist</a></li>
                                 <li><a href="logout.php">Log Out</a></li>
                              </ul>
                           <?php
                           } else {

                           ?>
                              <a href="register.php" class="account"><i class="fal fa-user-friends"></i>
                                 <article class="account-registar d-inline-block">
                                    Register/Login
                                 </article>
                              </a>
                           <?php
                           }
                           ?>

                        </li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
         <div class="mobile-menu visible-sm">
            <div id="mobile-menu">
               <ul>
                  <li><a class="pl-3" href="index.php">Home</a></li>
                  <li><a class="pl-3" href="javascript:void(0)">Shop</a>
                     <ul>
                        <li><a href="shop.php">Shop Layout</a></li>
                        <li><a href="shop4.php">Masonry – Grid</a></li>
                        <li><a href="shop3.php">Pagination</a></li>
                        <li><a href="shop2.php">Ajax Load More</a></li>
                        <li><a href="shop2.php">Infinite Scroll</a></li>
                        <li><a href="shop2.php">Sidebar Right</a></li>
                        <li><a href="shop.php">Sidebar Left</a></li>
                        <li><a href="shop.php">Shop Pages</a></li>
                        <li><a href="shop2.php">List View</a></li>
                        <li><a href="shop3.php">Small Products</a></li>
                        <li><a href="shop2.php">Large Products</a></li>
                        <li><a href="shop3.php">Shop — 3 Items</a></li>
                        <li><a href="shop3.php">Shop — 4 Items</a></li>
                        <li><a href="shop4.php">Shop — 5 Items</a></li>
                        <li><a href="single-product-2.php">Product Layout</a></li>
                        <li><a href="single-product.php">Description Sticky</a></li>
                        <li><a href="single-product-2.php">Product Carousels</a></li>
                        <li><a href="single-product-3.php">Gallery Modern</a></li>
                        <li><a href="single-product-4.php">Thumbnail Left</a></li>
                        <li><a href="single-product-5.php">Thumbnail Right</a></li>
                        <li><a href="single-product-6.php">Thumbnail Botttom</a></li>
                     </ul>
                  </li>
                  <li><a href="javascript:void(0)">Blog</a>
                     <ul>
                        <li><a href="blog.php">Grid layout</a></li>
                        <li><a href="blog2.php">Large image</a></li>
                        <li><a href="blog3.php">Left Sidebar</a></li>
                        <li><a href="blog4.php">Right Sidebar</a></li>
                        <li><a href="blog5.php">No sidebar</a></li>
                     </ul>
                  </li>
                  <li><a href="javascript:void(0)">Portfolio</a>
                     <ul>
                        <li><a href="portfolio.php">Single project</a></li>
                        <li><a href="portfolio2.php">Two Columns</a></li>
                        <li><a href="portfolio3.php">Three Columns</a></li>
                     </ul>
                  </li>
                  <li><a href="contact.php">Contact</a></li>
               </ul>
            </div>
         </div>
         <!-- /. mobile nav -->
      </div>
   </header>
   <!-- header section end -->
   
</body>

</html>