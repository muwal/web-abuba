<?php  
require __DIR__.'/vendor/autoload.php';

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/secret/training-abe86-c1169630c405.json');

$firebase = (new Factory)
->withServiceAccount($serviceAccount)
->create();

$database = $firebase->getDatabase(); 
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Responsive admin dashboard and web application ui kit. ">
  <meta name="keywords" content="login, signin">

  <title>Abuba 4.0</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,300i" rel="stylesheet">

  <!-- Styles -->
  <link href="assets/css/core.min.css" rel="stylesheet">
  <link href="assets/css/app.min.css" rel="stylesheet">
  <link href="assets/css/style.min.css" rel="stylesheet">
  <script src="https://www.gstatic.com/firebasejs/5.8.2/firebase.js"></script>
  <script src="https://cdn.firebase.com/libs/firebaseui/3.1.1/firebaseui.js"></script>
  <link type="text/css" rel="stylesheet" href="https://cdn.firebase.com/libs/firebaseui/3.1.1/firebaseui.css" />
  <!-- Favicons -->
  <link rel="apple-touch-icon" href="assets/img/apple-touch-icon.png">
  <link rel="icon" href="assets/img/logo_splash.png">
</head>

<body>


  <div class="row no-gutters min-h-fullscreen bg-white">
    <div class="col-md-6 col-lg-7 col-xl-8 d-none d-md-block bg-img" style="background-image: url(assets/img/slide2.png)" data-overlay="5">

      <div class="row h-100 pl-50">
        <div class="col-md-10 col-lg-8 align-self-end">
          <img src="assets/img/logo.png" alt="..." class="img-fluid">
          <h4 class="text-white">The admin is the best admin framework available online.</h4>
          <p class="text-white">Credibly transition sticky users after backward-compatible web services. Compellingly strategize team building interfaces.</p>
          <br><br>
        </div>
      </div>

    </div>



    <div class="col-md-6 col-lg-5 col-xl-4 align-self-center" id="login_div">
      <div class="px-80 py-30">
        <h4>Login</h4>
        <p><small>Sign into your account</small></p>
        <!-- <div id="firebaseui-auth-container"></div> -->
        <div id="loader"></div>
        <br>

        <!-- <form class="form-type-material" > -->
          <div class="form-type-material">
            <div class="form-group">
              <input type="text" class="form-control" id="email_field" autocomplete="off">
              <label for="email_field">Email</label>
            </div>

            <div class="form-group">
              <input type="password" class="form-control" id="password_field">
              <label for="password_field">Password</label>
            </div>

            <div class="form-group flexbox">
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" checked>
                <label class="custom-control-label">Remember me</label>
              </div>

              <a class="text-muted hover-primary fs-13" href="#">Forgot password?</a>
            </div>

            <div class="form-group">
              <button class="btn btn-bold btn-block btn-primary" onclick="login()">Login</button>
            </div>
          </div>
        <!-- </form> -->

        <div class="divider">Or Sign In With</div>
        <div class="text-center">
          <a class="btn btn-square btn-facebook" href="#"><i class="fa fa-facebook"></i></a>
          <a class="btn btn-square btn-google" href="#"><i class="fa fa-google"></i></a>
          <a class="btn btn-square btn-twitter" href="#"><i class="fa fa-twitter"></i></a>
        </div>

        <hr class="w-30px">

        <p class="text-center text-muted fs-13 mt-20">Don't have an account? <a class="text-primary fw-500" href="#">Sign up</a></p>
      </div>
    </div>

    <!-- <div class="col-md-6 col-lg-5 col-xl-4 align-self-center" id="user_div">
      <div class="px-80 py-30">
        <h4>Welcome User</h4>
        <p id="user_para">Success Login</p>
        <br>
        <div class="form-group">
          <button class="btn btn-bold btn-block btn-primary" onclick="logout()">Logout</button>
        </div>
      </div>
    </div> -->
  </div>




  <!-- Scripts -->
  <script src="assets/js/core.min.js"></script>
  <script src="assets/js/app.min.js"></script>
  <script src="assets/js/script.min.js"></script>
  <script type="text/javascript" src="firebase.js"></script>
  <script type="text/javascript" src="index.js"></script>
</body>
</html>

