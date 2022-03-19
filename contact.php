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
    } else {
      # code... = 0;
      $no_of_items = 0;
    }

?>

<!doctype html>
<html class="no-js" lang="">

<head>
    <style>
        .error {
            color: red !important;
        }
    </style>
</head>

<body>
    <!-- preloader -->
    <div id="loader-wrapper">
        <div id="loader"></div>
    </div>


    <!-- contact-area start -->
    <section class="contact-area pb-30" data-background="assets/img/bg/bg-map.png">
        <div class="has-breadcrumb-bg mb-120" style="background-image: url('img/banner/how-to-give-feedback-header@2x.png');">
            <div class="breadcrumb-content d-flex justify-content-center align-items-center" style="flex-direction: column;">
                <h2 class="title text-white">Feedback</h2>
            </div>
        </div>
      
    </section>
    <!-- contact-area end -->

    <!-- contact-form-area start -->
    <section class="contact-form-area grey-bg pt-50 pb-50">
        <div class="container container-1430">
            <div class="form-wrapper">
                <div class="row align-items-center">
                    <div class="col-xl-8 col-lg-8">
                        <div class="section-title mb-55">
                            <h1>Anything On your Mind</h1>
                        </div>
                    </div>
                </div>
                <div class="contact-form">
                    <form id="contact-form" method="POST">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-box user-icon mb-30">
                                    <input type="text" name="fname" id="fname" placeholder="Your Name" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-box email-icon mb-30">
                                    <input type="email" name="femail" id="femail" placeholder="Your Email" required>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-box subject-icon mb-30">
                                    <input type="text" name="fsubject" id="fsubject" placeholder="Your Subject" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-box message-icon mb-30">
                                    <textarea name="fmessage" id="fmessage" cols="30" rows="10" placeholder="Your Message" required></textarea>
                                </div>
                                <div class="contact-btn text-center">
                                    <button class="btn theme-btn" id="fsubmit" name="fsubmit" type="button">get action</button>
                                </div>
                                <br>
                                <div class="alert alert-success alert-dismissible fade show" role="alert" id="msgSuccess" style="display: none;">
                                    <strong id="msgSent"></strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.js"></script>
    <script src="http://cdn.jsdelivr.net/jquery.mixitup/latest/jquery.mixitup.min.js"></script>

    <script>
        //$('#contact-form').validate();

        $('#fsubmit').click(function() {
            if (!$('#contact-form').valid()) {
                return false;
            } else {
                $.ajax({
                    type: "POST",
                    url: "sendForm.php",
                    data: $('#contact-form').serialize(),
                    success: function(dataResult) {
                        var dataResult = JSON.parse(dataResult);

                        if (dataResult.statusCode == 200) {
                            $('#msgSuccess').show();
                            $('#msgSent').text("Thank You For Your Feedback");
                            $("#contact-form")[0].reset();
                        } else {
                            $('#msgSuccess').show();
                            $('#msgSent').text("Feedback Not Sent");
                            $("#contact-form")[0].reset();
                        }
                    }
                });
            }



        });
    </script>
</body>

</html>