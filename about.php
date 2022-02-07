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

//session_start();
if (isset($_SESSION['login_Sess'])) {
    # code...
    loginStart($db);
} else {
    # code... = 0;
    $no_of_items = 0;
}
?>
<!doctype html>
<html class="no-js" lang="">


<body>
    <!-- preloader -->
    <div id="loader-wrapper">
        <div id="loader"></div>
    </div>
    <!-- about start -->
    <section class="about-body mb-90">
        <div class="has-breadcrumb-bg mb-120" data-background="img/banner/about-us.jpg">
            <div class="breadcrumb-content d-flex justify-content-center align-items-center" style="flex-direction: column;">
            </div>
        </div>
        <div class="container container-1430">
            <div class="store-desc">
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="store-left-desc pr-130">
                            <div class="generic-title">
                                <strong class="red-color">Welcome to Good Heart</strong>
                                <h2 class="mb-50">Our Success And Company History.</h2>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
                            

        <div class="container container-1430">
            <div class="store-desc">
                <div class="row">
                    <div class="col-xl-5 col-lg-6">
                        <div class="store-banner">
                            <img src="img/banner/mohit.png" class="w-100" width="700" height="530" alt="">
                        </div>
                    </div>

                    <div class="col-xl-7 col-lg-6">
                        <div class="store-left-desc pr-130">
                            <div class="store-content mt-50">
                                <p class="simple-text mb-15-important">
                                    I'm from a small town in Goa named Curchorem. Getting inspired from several entrepreneurs. I want to become one aspiring entrepreneur. 
                                </p>
                                <p class="simple-text mb-15-important">My Goal is solve real life problems with Efficient and Effective solutions.
                                </p>
                                <p class="simple-text mb-15-important">My vision is make India affordable by manufacturing the products at very less cost that every Indian should be able afford it.</p>
                                <div class="founder-name mt-35">
                                    <h5 class="mb-0"><span class="red-color">MOHIT KAMAT</span> – Co Founder
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    





    <section class="about-body mb-90">
        <div class="container container-1430">
            <div class="store-desc">
                <div class="row">
                    <div class="col-xl-7 col-lg-6">
                        <div class="store-left-desc pr-130">
                            <div class="store-content mt-50">
                                <p class="simple-text mb-15-important">
                                    Donec vehicula cursus vestibulum lectus, sit eros integer varius cum turpis et quam
                                    congue nisl accumsan.
                                </p>
                                <p class="simple-text mb-15-important">Ac bibendum ac in erat. Donec posuere
                                    consectetuer volutpat rutrum ac, sollicitudin quam quisque, at interdum dignissim,
                                    fringilla elit risus lorem eu condimentum eros mollis. Nam liber tempor cum soluta
                                    nobis eleifend option congue nihil</p>
                                <p class="simple-text mb-15-important">doming id quod mazim placerat facer possim assum
                                    typi non habent claritatem insitam. Nam liber tempor cum soluta nobis eleifend
                                    option congue nihil. doming id quod mazim placerat facer possim assum typi non
                                    habent claritatem insitam…</p>
                                <div class="founder-name mt-35">
                                    <h5 class="mb-0"><span class="red-color">AMISH DICKSON DSOUZA</span> – CO Founder</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-6">
                        <div class="store-banner">
                            <img src="img/banner/20211030_091713.jpg" class="w-100"  width="700" height="700" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

   


    


    <?php
    include("footer.php");
    ?>

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
                                <a href="single-product-4.html" class="all-feature">See all feature</a>
                                <div class="quick-quantity mt-30">
                                    <form action="#" method="POST">
                                        <input type="number" value="1">
                                        <button type="submit" class="generic-btn red-hover-btn text-capitalize">add to
                                            cart</button>
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
    <script src="js/mixitup.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/imagesloaded.pkgd.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
</body>

</html>