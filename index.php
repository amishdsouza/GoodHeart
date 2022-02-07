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
<html lang="en">

<body>
    <!-- preloader -->
    <div id="loader-wrapper">
        <div id="loader"></div>

    </div>
    <!-- slider section start -->
    <section class="slider">
        <div class="slider-active">
            <div class="single-slider d-flex align-items-center h-950" data-background="img/banner/pexels-cottonbro-6591155.jpg">
                <div class="container">
                    <div class="single-slider-inner d-flex align-items-center justify-content-start">
                        <div class="single-slider-content text-left light-content">
                            <div class="slider-heading">
                                <h2 class="mb-0 text-white " data-animation="fadeInUp" data-delay=".2s">Small Effort</h2>
                                <h2 class="mb-0 text-white " data-animation="fadeInUp" data-delay=".4s">Big Change</h2>
                            </div>
                            <div class="slider-link" data-animation="fadeInUp" data-delay=".8s">
                                <a href="shop.php" class="generic-btn mt-70 red-hover-btn text-uppercase">Discover
                                    now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="single-slider d-flex align-items-center h-950" data-background="img/banner/ben-white-170529-unsplash-1.jpg">
                <div class="container">
                    <div class="single-slider-inner d-flex align-items-center justify-content-start">
                        <div class="single-slider-content text-left light-content">
                            <div class="slider-heading">
                                <h2 class="mb-0 text-white" data-animation="fadeInUp" data-delay=".2s">Extend A Helping Hand;</h2>
                                <h2 class="mb-0 text-white" data-animation="fadeInUp" data-delay=".4s"> Give Hope.</h2>
                            </div>
                            <div class="slider-link" data-animation="fadeInUp" data-delay=".8s">
                                <a href="shop.php" class="generic-btn mt-70 red-hover-btn text-uppercase">Discover
                                    now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="single-slider d-flex align-items-center h-950" data-background="img/banner/v991-a-22.jpg">
                <div class="container">
                    <div class="single-slider-inner d-flex align-items-center justify-content-start">
                        <div class="single-slider-content text-left light-content">
                            <div class="slider-heading">
                                <h2 class="mb-0 text-dark" data-animation="fadeInUp" data-delay=".2s">Extend A Helping Hand
                                    <a href="shop.php" class="generic-btn mt-70 red-hover-btn text-uppercase">
                                        Discover now
                                    </a>
                                </h2>
                                <h2 class="mb-0 text-dark" data-animation="fadeInUp" data-delay=".2s"></h2>
                                <h2 class="mb-0 text-dark" data-animation="fadeInUp" data-delay=".2s">.</h2>
                                <h2 class="mb-0 text-dark" data-animation="fadeInUp" data-delay=".2s">.</h2>
                                <h2 class="mb-0 text-dark" data-animation="fadeInUp" data-delay=".2s">.</h2>
                                <h2 class="mb-0 text-dark" data-animation="fadeInUp" data-delay=".2s">.</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="single-slider d-flex align-items-center h-950" data-background="img/banner/donate.jpg">
                <div class="container">
                    <div class="single-slider-inner d-flex align-items-center justify-content-start">
                        <div class="single-slider-content text-left light-content">
                            <div class="slider-link" data-animation="fadeInUp" data-delay=".8s">
                                <a href="shop.php" class="generic-btn mt-70 red-hover-btn text-uppercase">Discover
                                    now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>
    <!-- slider section end -->

    <?php
    include("footer.php");
    ?>



    <script src="js/main.js"></script>
</body>

</html>