<?php
require_once 'configs/db.php';
include("header.php");
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
} else {
    # code... = 0;
    //header('location:login.php');
    $no_of_items = 0;
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM `products` WHERE `Product_ID` = '$id'";
    $query2 = "SELECT customer_registration.Mobile_Number,customer_registration.Customer_Email FROM customer_registration INNER JOIN product_customer_relation ON customer_registration.Customer_ID = customer_registration.Customer_ID WHERE product_customer_relation.Product_ID = '$id'";

    $sql2 = $db->query($query2) or die($db->error);
    $row2 = $sql2->fetch_assoc();

    $sql = $db->query($query) or die($db->error);
    $row = $sql->fetch_assoc();
}
?>

<!doctype html>
<html class="no-js" lang="">
<body>

    <!-- preloader -->
    <div id="loader-wrapper">
        <div id="loader"></div>
    </div>

    <section class="single-product mb-90">
        <div class="container-fluid">
            <nav aria-label="breadcrumb" class="mb-40">
                <ol class="breadcrumb p-0 m-0">
                    <li class="breadcrumb-item"><a href="index4.html">Home</a></li>
                    <li class="breadcrumb-item" aria-current="page">Product</li>
                </ol>
            </nav>
            <div class="shop-wrapper">
                <div class="single-product-top">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-4 col-12">
                            <div class="shop-img ">
                                <a href="<?php echo $row['Product_Image_Location'] ?>" class="popup-image"><img src="<?php echo $row['Product_Image_Location'] ?>" class="w-100 mb-30" alt=""></a>

                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-8 col-12">
                            <div class="single-product-sidebar">
                                <div class="product-content">
                                    <div class="single-product-title">
                                        <h2><?php echo $row['Product_Name'] ?></h2>
                                    </div>
                                    <!-- <div class="single-product-price">$<span>44.00</span>–<span>$250.00</span></div> -->
                                    <div class="single-product-desc mb-25">

                                        <div class="product-list single-product-list">

                                        </div>
                                    </div>
                                    <?php if (isset($_SESSION['login_Sess'])) {
                                    ?>
                                        <div class="quick-quantity mt-0">
                                            <form action="#" method="POST">
                                                <a href="https://api.whatsapp.com/send?phone=91<?php echo $row2['Mobile_Number']; ?>&text=Hi There, I'm Interested in buying your product <?php echo $row['Product_Name'] ?>" target="_blank"><button type="button" class="list-add-cart-btn red-hover-btn border-0" style="padding-left: 80px;padding-right: 80px;transition: all .5s;">Chat with Owner on WhatsApp
                                                    </button></a>

                                                <a href="mailto:<?php echo $row2['Customer_Email']; ?>?subject=Hi There, I'm Interested in buying your product <?php echo $row['Product_Name'] ?>&body=Please Write the body!!!" target="_blank"><button type="button" class="list-add-cart-btn red-hover-btn border-0" style="padding-left: 80px;padding-right: 80px;transition: all .5s; margin-top:10px;">Email the owner
                                                    </button></a>

                                            </form>
                                        </div>
                                    <?php
                                    } else {
                                    ?>
                                        <div class="quick-quantity mt-0">
                                            <form action="#" method="POST">
                                                <a href="login.php" target="_blank"><button type="button" class="list-add-cart-btn red-hover-btn border-0" style="padding-left: 80px;padding-right: 80px;transition: all .5s;">Kindly login ot Chat with the owner
                                                    </button></a>
                                            </form>
                                        </div>
                                            <?php
                                        }
                                            ?>


                                            <!-- <div class="single-product-action mt-35">
                                        <ul>
                                            <li><a href="wishlist.html"><i class="fal fa-heart"></i> add to wishlist</a></li>
                                            <li><a href="javascript:void(0)"><i class="fal fa-abacus"></i> add to compare</a></li>
                                        </ul>
                                    </div> -->
                                            <!-- <div class="single-product-category mt-20">
                                        <ul>
                                            <li><a href="javascript:void(0)" class="title">Categories: </a></li>
                                            <li><a href="shop4.html">Chair & Table</a></li>
                                            <li><a href="shop4.html">Chairs</a></li>
                                            <li><a href="shop4.html">Handbeg</a></li>
                                        </ul>
                                    </div> -->
                                            <div class="share-product mt-20">
                                                <ul>
                                                    <li><a href="javascript:void(0)" class="title">Share this product</a></li>
                                                    <li><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="facebook"><i class="fab fa-facebook-f"></i></a></li>
                                                    <li><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="twitter"><i class="fab fa-twitter"></i></a></li>
                                                    <li><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="pinterest"><i class="fab fa-pinterest"></i></a></li>
                                                    <li><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="google +"><i class="fab fa-google-plus-g"></i></a></li>
                                                    <li><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Linkdin"><i class="fab fa-linkedin-in"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="single-product-bottom mt-115">
                        <ul class="nav nav-pills justify-content-center">
                            <li class="nav-item">
                                <a class="active" data-toggle="pill" href="#desc-tab-1">Description</a>
                            </li>
                            <!-- <li class="nav-item">
                            <a class="" data-toggle="pill" href="#desc-tab-2">Reviews (0)</a>
                        </li> -->
                        </ul>
                        <div class="container container-1200">
                            <div class="tab-content mt-60">
                                <div class="tab-pane fade show active" id="desc-tab-1">
                                    <div class="single-product-tab-content">
                                        <h3 class="title mb-30"></h3>
                                        <p><?php echo $row['Product_Description'] ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>


    <?php
    include("footer.php");
    ?>






   
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