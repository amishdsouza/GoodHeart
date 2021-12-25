<?php

use function PHPSTORM_META\type;

include_once 'configs/db.php';



session_start();
//print_r($_REQUEST) ;
$type=0;
if(isset($_POST['type'])){
  $type = $_POST['type'];
}


    // function sendEmail($otpEmail)
    // {

    //   // code...
    //   $otp = rand(1000, 9999);

    //   $_SESSION['OTPEmail'] = $otp;

    //   $apiKey = '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';
    //   $sendgrid = new \SendGrid($apiKey);
    //   $url = 'https://api.sendgrid.com/';
    //   $pass = $apiKey;


    //   $params = array(
    //     'to'        => $otpEmail,
    //     'toname'    => "Customer",
    //     'from'      => "mohitkamat99@gmail.com",
    //     'fromname'  => "Good Heart",
    //     'subject'   => "Forgot Password",
    //     'html'      => '<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    // <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    // <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    // <div class="full">
    //   <div class="row" style="background-color:#86c5da;padding-left:15%;">
    //     <h1 style="color:white;font-family:Adobe Gothic Std;">OTP Confimation</h1>
    //   </div>

    //     <div class="col" style="padding-left:10%;background-color:#82ae46;">

    //         <img src="https://i.ibb.co/3vpXJzq/Gricee-Groceryfinal.png" alt="Gricee-Groceryfinal" border="0">

    //     </div>

    //   <hr>
    //   <div class="col">
    //     <h4>Your One Time Password for Forgot Password is ' . $otp . '.</h4>
    //   </div>
    // </div>',
    //     //'x-smtpapi' => json_encode($js),
    //   );

    //   $request =  $url . 'api/mail.send.json';

    //   // Generate curl request
    //   $session = curl_init($request);
    //   // Tell PHP not to use SSLv3 (instead opting for TLS)
    //   curl_setopt($session, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1_2);
    //   curl_setopt($session, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $apiKey));
    //   // Tell curl to use HTTP POST
    //   curl_setopt($session, CURLOPT_POST, true);
    //   // Tell curl that this is the body of the POST
    //   curl_setopt($session, CURLOPT_POSTFIELDS, $params);
    //   // Tell curl not to return headers, but do return the response
    //   curl_setopt($session, CURLOPT_HEADER, false);
    //   curl_setopt($session, CURLOPT_RETURNTRANSFER, true);

    //   // obtain response
    //   $response = curl_exec($session);
    //   curl_close($session);
    // }



    function OtpMsg($mobile, $rndno)
    {
      # code...

      $_SESSION['OTP'] = $rndno;

      $curl = curl_init();

      curl_setopt_array($curl, array(
        CURLOPT_URL => "https://2factor.in/API/V1/442f3f97-4956-11ec-b710-0200cd936042/SMS/$mobile/$rndno/goodheart",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_SSL_VERIFYHOST => 0,
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_CUSTOMREQUEST => "POST"

      ));

      $response = curl_exec($curl);
      $err = curl_error($curl);

      curl_close($curl);

      if ($err) {
        echo "cURL Error #:" . $err;
      } else {
        //echo "sent";
        echo json_encode(array("statusCode" => 200));
      }

      //return true;
    }



  if ($type == 1) 
  {
    $uemail = ($_POST['uemail']);
    $pass = ($_POST['pass']);
    $mobileNo = ($_POST['mobileNo']);
    $encryptPass = md5($pass);
  // code...
  
    # code...
    $rndno = rand(1000, 9999);
    //$_SESSION['rndno'] = $rndno;

    OtpMsg($mobileNo, $rndno);
    
  // }
      //echo  $_SESSION['First_Name'];
}


if($type == 3)
{
  if (isset($_POST['otpinput'])) {
    # code...
    $SessOTP =  $_SESSION['OTP'];
  
    $inpOTP = $_POST['otpinput'];

    //echo $_SESSION['OTP'];

    if ($inpOTP == $SessOTP) {
      # code...
      echo json_encode(array("statusCode"=>200));
    } else {
      # code...
      echo json_encode(array("statusCode" => 400));
    }
    
     
  } 

  else{
    echo $_SESSION['OTP'];
    echo ($_POST['otpinput']);
  }
    }


    ?>