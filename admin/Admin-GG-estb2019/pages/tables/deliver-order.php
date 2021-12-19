<?php
include_once '../../../../php/config.php';
require '../../vendor/autoload.php';
require 'credentials.php';
session_start();
use Dompdf\Dompdf;



$oid = $_GET['q'];
$pid = $_GET['r'];
$quant = $_GET['p'];
$uid = $_GET['o'];

$select_or = mysqli_query($con,"SELECT *,DATE(Date_OF_Purchase) as Date_Delivered FROM `total_orders` WHERE `Order_No` = '$oid'");

$order_data = mysqli_fetch_assoc($select_or);

$Pro_name = $order_data['Product_Name'];
$Pro_qty = $order_data['Quantity'];
$Pro_tprice = $order_data['Total_Price'];
$Pro_deli = $order_data['Date_Delivered'];



$user = mysqli_query($con,"SELECT * FROM `user_info` WHERE `User_ID` = '$uid'");

$user_data = mysqli_fetch_assoc($user);

$_SESSION['u_fname'] = $user_data['First_Name'];
$_SESSION['u_lname'] = $user_data['Last_Name'];
$_SESSION['u_land'] = $user_data['Landmark'] ;
$_SESSION['u_hno'] = $user_data['House_No_Name'];
$_SESSION['u_place'] = $user_data['Place'];
$_SESSION['u_taluka'] = $user_data['Taluka'];
$_SESSION['u_district'] = $user_data['District'] ;
$_SESSION['u_state'] = $user_data['State'];
$_SESSION['u_pin'] = $user_data['Pin_Code'];
$_SESSION['u_mob'] = $user_data['Mobile_Number'];
$_SESSION['u_email'] = $user_data['Email'];

$_SESSION['add1'] = $user_data['Landmark'].",".$user_data['House_No_Name'];
$_SESSION['add2'] = $user_data['Place'].",".$user_data['Taluka'];
$_SESSION['add3'] = $user_data['State']."-".$user_data['Pin_Code'];

$_SESSION['u_fullname'] = $user_data['First_Name']." ". $user_data['Last_Name'];

$dompdf = new Dompdf();

$html = '<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <meta charset="utf-8">
    <title></title>
    <style>
        #invoice{
    padding: 30px;
}

.invoice {
    position: relative;
    background-color: #FFF;
    min-height: 680px;
    padding: 15px
}

.invoice header {
    padding: 10px 0;
    margin-bottom: 20px;
    border-bottom: 1px solid #3989c6
}

.invoice .company-details {
    text-align: right
}

.invoice .company-details .name {
    margin-top: -50px;
    margin-bottom: 0
}

.invoice .contacts {
    margin-bottom: 20px
}

.invoice .invoice-to {
    text-align: left
}

.invoice .invoice-to .to {
    margin-top: 0;
    margin-bottom: 0
}

.invoice .invoice-details {
    text-align: right
}

.invoice .invoice-details .invoice-id {
    margin-top: 0;
    color: #3989c6
}

.invoice main {
    padding-bottom: 50px
}

.invoice main .thanks {
    margin-top: -100px;
    font-size: 2em;
    margin-bottom: 50px
}

.invoice main .notices {
    padding-left: 6px;
    border-left: 6px solid #3989c6
}

.invoice main .notices .notice {
    font-size: 1.2em
}

.invoice table {
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;
    margin-bottom: 20px
}

.invoice table td,.invoice table th {
    padding: 15px;
    background: #eee;
    border-bottom: 1px solid #fff
}

.invoice table th {
    white-space: nowrap;
    font-weight: 400;
    font-size: 16px
}

.invoice table td h3 {
    margin: 0;
    font-weight: 400;
    color: #3989c6;
    font-size: 1.2em
}

.invoice table .qty,.invoice table .total,.invoice table .unit {
    text-align: right;
    font-size: 1.2em
}

.invoice table .no {
    color: #fff;
    font-size: 1.6em;
    background: #3989c6
}

.invoice table .unit {
    background: #ddd
}

.invoice table .total {
    background: #3989c6;
    color: #fff
}

.invoice table tbody tr:last-child td {
    border: none
}

.invoice table tfoot td {
    background: 0 0;
    border-bottom: none;
    white-space: nowrap;
    text-align: right;
    padding: 10px 20px;
    font-size: 1.2em;
    border-top: 1px solid #aaa
}

.invoice table tfoot tr:first-child td {
    border-top: none
}

.invoice table tfoot tr:last-child td {
    color: #3989c6;
    font-size: 1.4em;
    border-top: 1px solid #3989c6
}

.invoice table tfoot tr td:first-child {
    border: none
}

.invoice footer {
    width: 100%;
    text-align: center;
    color: #777;
    border-top: 1px solid #aaa;
    padding: 8px 0
}

@media print {
    .invoice {
        font-size: 11px!important;
        overflow: hidden!important
    }

    .invoice footer {
        position: absolute;
        bottom: 10px;
        page-break-after: always
    }

    .invoice>div:last-child {
        page-break-before: always
    }
}


    </style>
  </head>
  <body>

      <div id="invoice">

        <div class="invoice overflow-auto">
          <div style="min-width: 600px">
            <header>
              <div class="row">
                <div class="col">

                    <img src="..\..\..\..\images/GriceeGroceryfinal.png" data-holder-rendered="true" height=180px; weight=360px;"/>

                </div>
                <div class="col company-details">
                  <h2 class="name">
                      Gricee Grocery
                  </h2>
                  <div>Bldg No:6, Cacoda Plaza, Curchorem, Goa</div>
                  <div>(+91) 9637350999</div>
                  <div>mohitkamat99@gmail.com</div>
                </div>
              </div>
            </header>
            <main>
              <div class="row contacts">
                <div class="col invoice-to">
                  <div class="text-gray-light">INVOICE TO:</div>
                  <h2 class="to">'.$_SESSION['u_fullname'].'</h2>
                  <div class="address">'.$_SESSION['add1'].'</div>
                  <div class="address">'.$_SESSION['add2'].'</div>
                  <div class="address">'.$_SESSION['add3'].'</div>
                  <div class="email">'.$_SESSION['u_email'].'</div>
                  <div class="email">'.$_SESSION['u_mob'].'</div>
                </div>
                <hr>
                <div class="col invoice-details">
                  <h1 class="invoice-id">INVOICE '.$oid.'(Order Number)</h1>
                  <div class="date">Date of Invoice: '.$Pro_deli.'</div>
                </div>
              </div>
              <table border="0" cellspacing="0" cellpadding="0">
                <thead>
                  <tr>
                    <th>#</th>
                    <th class="text-left">Product Name</th>
                    <th class="text-right">Quantity</th>
                    <th class="text-right">Total Price</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="no">'.$pid.'</td>
                    <td class="text-left">
                      <h3>

                          '.$Pro_name.'

                      </h3>

                    </td>
                    <td class="qty">'.$Pro_qty.'</td>
                    <td class="total">Rs.'.$Pro_tprice.'</td>
                  </tr>
                <tfoot>

                  <tr>
                    <td colspan="1"></td>
                    <td colspan="2">GRAND TOTAL</td>
                    <td>Rs.'.$Pro_tprice.'</td>
                  </tr>
                </tfoot>
              </table>
            </main>
            <footer>
              Invoice was created on a computer and is valid without the signature and seal.
            </footer>
          </div>
          <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
          <div></div>
        </div>
      </div>



  </body>
</html>';

$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'Portrait');
$dompdf->render();


$file = $dompdf->output();
$file_name = 'invoice_No.'.$oid.'.pdf';
file_put_contents($file_name,$file);

//$dompdf->stream();

$email = new \SendGrid\Mail\Mail();
$email->setFrom("mohitkamat99@gmail.com", "Gricee Grocery");
$email->setSubject("Order Delivered");
$email->addTo($_SESSION['u_email'], $_SESSION['u_fullname']);
$email->addContent(
    "text/html", '<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <div class="full">
      <div class="row" style="background-color:#86c5da;padding-left:15%;">
        <h1 style="color:white;font-family:Adobe Gothic Std;">Thank You For Shopping</h1>
      </div>

        <div class="col" style="padding-left:10%;background-color:#82ae46;">

            <img src="https://i.ibb.co/3vpXJzq/Gricee-Groceryfinal.png" alt="Gricee-Groceryfinal" border="0">

        </div>

      <hr>
      <div class="col">
        <h4>Your Order Has Been Successfully Delivered. You Can Download The Invoice Below.</h4>
      </div>
    </div>'
);
$file_encoded = base64_encode(file_get_contents($file_name));
$email->addAttachment(
    $file_encoded,
    "application/pdf",
    "invoice_no.".$oid.".pdf",
    "attachment"
);

$sendgrid = new \SendGrid($apiKey);





$sql = "UPDATE `total_orders` SET `Order_Status`='Delivered',`Payment_Status`='Paid',`Date_OF_Purchase`= CURRENT_TIMESTAMP WHERE `Order_No` = '$oid'";

$final_query = mysqli_query($con, $sql);

// //$sql2 = "UPDATE `inventory` SET `Stock_Items`= ABS(Stock_Items + $quant) WHERE `Product_ID` = $pid";
// //$final_query2 = mysqli_query($con, $sql2);
//
//
if ($final_query) {
        # code...
       // if ($final_query2) {
                # code...
                try {
                    $response = $sendgrid->send($email);
                    //print $response->statusCode() . "\n";
                    //print_r($response->headers());
                    //print $response->body() . "\n";
                } catch (Exception $e) {
                    echo 'Caught exception: '.  $e->getMessage(). "\n";
                    //var_dump(openssl_get_cert_locations());
                }
?>
                <script>
                        alert('Order Cancelled');
                </script>

<?php

        //}
      header('location:orders-list.php');

}



?>
