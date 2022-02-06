<?php
require_once 'configs/db.php';

include 'header.php';

function loginStart($db)
{
    $no_of_items = 0;
    $uid = $_SESSION['ID'];
    $query2 = "SELECT COUNT(*) AS `count` FROM `shopping_cart_details` WHERE `Customer_ID` = '$uid'";
    $sql2 = $db->query($query2) or die($db->error);
    $row2 = $sql2->fetch_assoc();

    $no_of_items = $row2['count'];

    return $no_of_items;
}

if (isset($_SESSION['login_Sess'])) {
    # code...
    loginStart($db);
    $id = $_SESSION['ID'];
    $cart_details = "SELECT products.Product_ID,products.Product_Name,products.Product_Description,products.Product_Image_Location,categories.Category_Name,categories.Category_ID,customer_registration.Customer_Name FROM products INNER JOIN category_product_relation ON products.Product_ID = category_product_relation.Product_ID INNER JOIN categories ON categories.Category_ID = category_product_relation.Category_ID INNER JOIN product_customer_relation ON product_customer_relation.Product_ID = products.Product_ID INNER JOIN customer_registration ON customer_registration.Customer_ID =  product_customer_relation.Customer_ID WHERE customer_registration.Customer_ID = '$id' AND product_customer_relation.Product_Status = 'Active'";

    $cart_details2 = "SELECT products.Product_ID,products.Product_Name,products.Product_Description,products.Product_Image_Location,categories.Category_Name,categories.Category_ID,customer_registration.Customer_Name FROM products INNER JOIN category_product_relation ON products.Product_ID = category_product_relation.Product_ID INNER JOIN categories ON categories.Category_ID = category_product_relation.Category_ID INNER JOIN product_customer_relation ON product_customer_relation.Product_ID = products.Product_ID INNER JOIN customer_registration ON customer_registration.Customer_ID =  product_customer_relation.Customer_ID WHERE customer_registration.Customer_ID = '$id' AND product_customer_relation.Product_Status = 'In_Active'";

    $result = $db->query($cart_details);
    $result2 = $db->query($cart_details2);
} else {
    # code... = 0;
    $no_of_items = 0;
    header('location:login.php?source=product-listing.php');
}

$page = "Active";





?>


<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Good Heart | Cart</title>
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
</head>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- preloader -->
    <div id="loader-wrapper">
        <div id="loader"></div>
    </div>



    <!-- header section start -->

    <!-- header section end -->



    <!-- shop body section start -->
    <section class="cart-body mb-90 gray-border-top pt-35">
        <div class="has-breadcrumb-content">
            <div class="container container-1430">
                <div class="breadcrumb-content" style="flex-direction: column;">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb p-0 m-0">
                            <li class="breadcrumb-item"><a href="index2.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Cart</li>
                        </ol>
                    </nav>
                    <h2 class="cart-title mt-40">Your Listings</h2>
                </div>

                <table class="table table-bordered table-striped">
                    <th class="<?php if (!isset($_GET['status']) || $page == 'Active') : echo "active"; ?>

              <?php endif; ?>">
                        <a href="product-listing.php" class="<?php if (!isset($_GET['status']) || $page == 'Active') : echo "active"; ?>

              <?php endif; ?>">Active</a>
                    </th>

                    <th class="<?php if ($page == 'Delivered') : echo "active"; ?>

              <?php endif; ?>">
                        <a href="?status=Sold" class="<?php if ($page == 'Sold') : echo "active"; ?>

              <?php endif; ?>">Sold</a>
                    </th>

                </table>



                <div class="cart-body-content">
                    <div class="row">
                        <div class="col-xl-8">

                            <div class="product-content">
                                <form action="#" method="POST">
                                    <div class="table-responsive">
                                        <table class="table table-2">
                                            <thead>
                                                <tr>
                                                    <th class="product-image"></th>
                                                    <th class="product-title">Product</th>
                                                    <th class="total">Description</th>
                                                    <th class="total">Product Status</th>
                                                    <th class="total">Order Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if (isset($_GET['status'])) {

                                                    $status = $_GET['status'];

                                                    if ($status == "Sold") {
                                                        if (isset($_SESSION['login_Sess'])) {
                                                            if ($result2->num_rows == 0) {
                                                                # code...
                                                ?>

                                                                <p class="title">No Listings</p>

                                                                <?php
                                                            } else {
                                                                while ($row = $result2->fetch_assoc()) { {
                                                                        # code...
                                                                ?>
                                                                        <tr>
                                                                            <td>
                                                                                <div class="table-data">
                                                                                    <img src="<?php echo $row['Product_Image_Location'] ?>" width="80" alt="">
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="table-data">
                                                                                    <h6><a href="single-product-3.html" class="title"><?php echo $row['Product_Name'] ?></a></h6>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="table-data">
                                                                                    <p><?php echo $row['Product_Description'] ?></p>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="table-data">
                                                                                    <a href="remove-prod.php?id=<?php echo $row['Product_ID'] ?>"><button type="button" name="active" class="btn btn-danger">Delete</button></a>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="table-data">
                                                                                    <a href="place-order.php?id=<?php echo $row['Product_ID'] ?>"><button class="btn btn-danger">Mark as Sold</button></a>
                                                                                </div>
                                                                            </td>



                                                                        </tr>


                                                            <?php
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                } else {
                                                    if (isset($_SESSION['login_Sess'])) {
                                                        if ($result->num_rows == 0) {
                                                            # code...
                                                            ?>

                                                            <p class="title">No Listings</p>

                                                            <?php
                                                        } else {
                                                            while ($row = $result->fetch_assoc()) { {
                                                                    # code...
                                                            ?>
                                                                    <tr>
                                                                        <td>
                                                                            <div class="table-data">
                                                                                <img src="<?php echo $row['Product_Image_Location'] ?>" width="80" alt="">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="table-data">
                                                                                <h6><a href="single-product-3.html" class="title"><?php echo $row['Product_Name'] ?></a></h6>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="table-data">
                                                                                <p><?php echo $row['Product_Description'] ?></p>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="table-data">
                                                                                <a href="remove-prod.php?id=<?php echo $row['Product_ID'] ?>"><button type="button" name="active" class="btn btn-danger">Delete</button></a>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="table-data">
                                                                                <a href="place-order.php?id=<?php echo $row['Product_ID'] ?>"><button class="btn btn-danger">Mark as Sold</button></a>
                                                                            </div>
                                                                        </td>



                                                                    </tr>


                                                <?php
                                                                }
                                                            }
                                                        }
                                                    }
                                                }



                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- shop body section end -->





    <!-- footer section start -->
    <section class="footer">
        <div class="footer-top mt-120 pb-120 pt-115" style="background-color: #f5f5f5;">
            <div class="footer-top-wrapper">
                <div class="newsletter ">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6">
                            <h2 class="title m-0">Sign Up For Our Newsletter</h2>
                            <p>Subscribe our newsletter and get discount 20% Off</p>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                            <div class="newsletter-form">
                                <form action="#" method="POST">
                                    <input type="text" placeholder="Search for our newsletter...">
                                    <button type="submit" class="generic-btn red-hover-btn text-uppercase float-right">Subscribe
                                        Now</button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- /.newsletter -->
                <div class="service pt-57 mt-40 gray-border-top">
                    <div class="row justify-content-center">
                        <div class="col-xl-4 col-md-6 service-item">
                            <div class="service-box service-box-2">
                                <div class="service-box-content">
                                    <h4 class="title">Worldwide Shipping</h4>
                                    <p class="service-desc">Duis autem vel eum iriure dolor in hendrerit velit esse
                                        molestie consequat.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-md-6 service-item">
                            <div class="service-box service-box-2">
                                <div class="service-box-content">
                                    <h4 class="title">Online Support 24/7</h4>
                                    <p class="service-desc">Duis autem vel eum iriure dolor in hendrerit velit esse
                                        molestie consequat.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-6 hidden-md service-item">
                            <div class="service-box service-box-2">
                                <div class="service-box-content">
                                    <h4 class="title">Money Return Guarantee</h4>
                                    <p class="service-desc">Duis autem vel eum iriure dolor in hendrerit velit esse
                                        molestie consequat.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /. service -->
                <!-- /. footer bottom -->
            </div>

        </div>
        <!-- footer top -->

        <div class="footer-bottom pt-77" style="background-color: #292929;">
            <div class="container-1180">
                <div class="footer-bottom-wrapper">
                    <div class="footer-bottom-primary pb-60">
                        <div class="row">
                            <div class="col-xl-5 col-lg-5 col-md-9">
                                <div class="footer-item has-desc">
                                    <div class="footer-logo mb-25">
                                        <img src="img/logo/logo2.png" width="120" height="31" alt="">
                                    </div>
                                    <div class="footer-desc">
                                        <p class="mb-10">Mazia store is a premium theme with advanced admin module. It’s
                                            extremely customizable, easy to use and fully responsive and retina ready.
                                        </p>
                                    </div>
                                    <div class="footer-img mt-65">
                                        <img src="img/logo/paypal.png" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-7 col-lg-7 col-md-12">
                                <div class="row">
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-6">
                                        <div class="footer-menu">
                                            <ul>
                                                <li><a href="javascript:void(0)" class="title">MY ACCOUNT</a></li>
                                                <li><a href="login.html">My account</a></li>
                                                <li><a href="checkout.html">Checkout</a></li>
                                                <li><a href="shop2.html">Shop</a></li>
                                                <li><a href="wishlist.html">Wishlist</a></li>
                                                <li><a href="question.html">Frequently</a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-6">
                                        <div class="footer-menu">
                                            <ul>
                                                <li><a href="javascript:void(0)" class="title">Quick Links</a></li>
                                                <li><a href="shop2.html">Special Offers</a></li>
                                                <li><a href="shop2.html">Gift Cards</a></li>
                                                <li><a href="shop2.html">F21 Red</a></li>
                                                <li><a href="about.html">Privacy Policy</a></li>
                                                <li><a href="about.html">Teams of Use</a></li>
                                                <li><a href="portfolio.html">Portfolio</a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 hidden-sm">
                                        <div class="footer-menu">
                                            <ul>
                                                <li><a href="javascript:void(0)" class="title">Company Info</a></li>
                                                <li><a href="about.html">About us</a></li>
                                                <li><a href="blog.html">Careers</a></li>
                                                <li><a href="portfolio2.html">Business With Us</a></li>
                                                <li><a href="shop2.html">Find a Store</a></li>
                                                <li><a href="question.html">Teams of Use</a></li>
                                                <li><a href="portfolio3.html">Press & Talent</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- footer section end -->







    <!-- product popup start -->
    <section id="product-popup">
        <div class="product-popup-overlay"></div>
        <div class="product-popup-container">
            <div class="product-inner w-100">
                <div class="product-inner-content">
                    <div class="quick-close-action"><i class="fal fa-times"></i></div>
                    <div class="row">
                        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-6">
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="product-popup-1">
                                    <div class="product-popup-img">
                                        <img src="img/product/10.jpg" class="w-100" alt="">
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="product-popup-2">
                                    <div class="product-popup-img">
                                        <img src="img/product/11.jpg" class="w-100" alt="">
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="product-popup-3">
                                    <div class="product-popup-img">
                                        <img src="img/product/12.jpg" class="w-100" alt="">
                                    </div>
                                </div>
                            </div>
                            <ul class="nav nav-pills justify-content-center mt-10" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="active" data-toggle="pill" href="#product-popup-1">
                                        <img src="img/product/10.jpg" class="w-100" alt="">
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="" data-toggle="pill" href="#product-popup-2">
                                        <img src="img/product/11.jpg" class="w-100" alt="">
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="" data-toggle="pill" href="#product-popup-3">
                                        <img src="img/product/12.jpg" class="w-100" alt="">
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-xl-7 col-lg-7 col-md-7 col-sm-6">
                            <div class="product-content">
                                <div class="product-title">
                                    <h2>Nari Narwhal Usb...</h2>
                                </div>
                                <div class="price">$<span>44.00</span>–<span>$250.00</span></div>
                                <a href="javascript:void(0)" class="all-feature">See all feature</a>
                                <div class="quick-quantity mt-30">
                                    <form action="#" method="POST">
                                        <input type="number" value="1">
                                        <button type="submit" class="generic-btn red-hover-btn text-capitalize">add to
                                            cart</a>
                                    </form>
                                </div>

                                <div class="product-desc pb-20 mt-25 gray-border-top">
                                    <p class="mb-0">Typi non habent claritatem insitam, est usus legentis in iis qui
                                        facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius
                                        quod ii legunt saepius. Claritas est etiam processus A Capitalize on low hanging
                                        fruit to identify a ballpark value added activity to beta test. Override the
                                        digital...ditional clickthroughs from DevOps. Nanotechnology immersion along the
                                        information highway will close the […]</p>
                                </div>
                                <div class="product-list mt-25">
                                    <ul>
                                        <li>– Light green crewnec...t.</li>
                                        <li>– Hand pockets.</li>
                                        <li>– Relaxed fit.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product popup end -->

    <!-- startup popup start -->
    <section id="startup-popup">
        <div class="product-popup-overlay has-startup" style="opacity: 1;visibility: visible"></div>
        <div class="startup-popup-body">
            <div class="startup-body-content h-100">
                <div class="row justify-content-end h-100">
                    <div class="col-6 h-100">
                        <div class="startup-popup-inner h-100">
                            <div class="close-search-popup">
                                <i class="fal fa-times"></i>
                            </div>
                            <div class="startup-popup-main-content">
                                <h2>Get Our Email Letter</h2>
                                <p class="mb-0">Subscribe to the Mazia store mailing list to receive updates on new
                                    arrivals, special offers
                                    and other discount information.</p>
                                <div class="startup-subscribe-form">
                                    <form action="#" method="POST">
                                        <input type="text" placeholder="Subscribe to our newsletter" class="mb-30">
                                        <button class="generic-btn red-hover-btn text-uppercase">Subscribe now</button>
                                    </form>
                                </div>
                            </div>
                            <div class="startup-popup-sub-content">
                                <div class="popup-warning">
                                    <input type="checkbox" id="startup-popup-hidden">
                                    <label for="startup-popup-hidden">Do not show the popup again</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- startup popup end -->














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
</body>

</html>