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
    $no_of_items = 0;
}


?>

<!doctype html>
<html class="no-js" lang="">

<head>
    <style>
        #acart {
            pointer-events: none;
            cursor: default;
        }
    </style>
</head>

<body>
    <div id="loader-wrapper">
        <div id="loader"></div>
    </div>



    <section>
        <div class="shop-body mb-90">
            <div class="container-fluid">
                <div class="shop-wrapper">
                    <div class="row">
                        <div class="col-12">
                            <!-- /. filter heading -->
                            <div class="filter-content">
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="shop-tab-1">
                                        <div class="product-wrapper mt-55">
                                            <div class="row show_data"></div>
                                                <header class="header pt-85 pb-30  header-static"></header>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mr-20" id="pagination"></div>   
                </div>
            </div>
        </div>
    <section>
  
        <?php
        include("footer.php");
        ?>


        <script src="js/main.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                load_data();

                function load_data(page) {
                    $.ajax({
                        url: "ajax/load_data.php",
                        method: "POST",
                        data: {
                            page: page
                        },
                        dataType: "JSON",
                        success: function(data) {
                            $(".show_data").html(data.output);
                            $("#pagination").html(data.pagination);
                        }
                    });
                }

                $(document).on("click", ".pagination a", function(event) {
                    event.preventDefault();
                    var id = $(this).attr("id");
                    load_data(id);
                });


                function show_mycart() {
                    $.ajax({
                        url: "ajax/show_mycart.php",
                        method: "POST",
                        dataType: "JSON",
                        success: function(data) {
                            $("#cart").text(data.da);
                        }
                    });
                }
            });

            $(document).on("click", ".add_cart", function(event) {
                event.preventDefault();
                var id = $(this).attr("id");
                var name = $("#name" + id + "").val();
                var price = $("#description" + id + "").val();
                var action = "add";
                $.ajax({
                    url: "ajax/cart_action.php",
                    method: "POST",
                    dataType: "JSON",
                    data: {
                        id: id,
                        name: name,
                        description: description,
                        action: action
                    },
                    success: function(data) {}
                });
            });
        </script>
</body>
</html>