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
   $(document).ready(function(){
         
         show_mycart();
         function show_mycart(){
            $.ajax({
            url: "ajax/show_mycart.php",
            method:"POST",
            dataType:"JSON",
            success:function(data){
               $(".get_cart").html(data.out);
               $("#cart").text(data.da);
            }
         });
         }
      setInterval(show_mycart,1000);
   });
   </script>
</body>
</html>