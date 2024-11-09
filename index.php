<?php

include "app/config.php";
include "app/global_token.php"
  ?>
<!doctype html>
<html lang="en">
<!-- [Head] start -->

<head>
  <?php include "views/layouts/head.php" ?>
  <style>
    
  </style>
</head>
<!-- [Head] end -->
<!-- [Body] Start -->

<body data-pc-preset="preset-1" data-pc-sidebar-theme="light" data-pc-sidebar-caption="true" data-pc-direction="ltr"
  data-pc-theme="light">
  <!-- [ Pre-loader ] start -->
  <div class="loader-bg">
    <div class="loader-track">
      <div class="loader-fill"></div>
    </div>
  </div>
  <!-- [ Pre-loader ] End -->

  <div class="auth-main v2">
    <div class="bg-overlay bg-dark"></div>
    <div class="auth-wrapper">
      <div class="auth-sidecontent">
        <div class="auth-sidefooter">
          <img src="assets/images/logo-white.svg"  />
          <hr class="mb-3 mt-4" />
          <div class="row">
            <div class="col my-1">
              <p class="m-0">Made with ♥ by Team <a href="https://themeforest.net/user/phoenixcoded" target="_blank">
                  Phoenixcoded</a></p>
            </div>
            <div class="col-auto my-1">
              <ul class="list-inline footer-link mb-0">
                <li class="list-inline-item"><a href="../index.html">Home</a></li>
                <li class="list-inline-item"><a href="https://pcoded.gitbook.io/light-able/"
                    target="_blank">Documentation</a></li>
                <li class="list-inline-item"><a href="https://phoenixcoded.support-hub.io/" target="_blank">Support</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="auth-form">
        <div class="card my-5 mx-3">
          <div class="card-body">
            <img src="assets/images/favicon.svg" alt="image" class="" style="max-height:300px; margin-bottom:100px">
            <h4 class="f-w-500 mb-1">Inicia sesión con tu cuenta</h4>
            
            <form method="POST" action="./app/AuthController.php">
              <div class="mb-3">
                <input type="email" class="form-control" id="floatingInput" name="username" placeholder="Correo electrónico" />
              </div>
              <div class="mb-3">
                <input type="password" class="form-control" id="floatingInput1" name="password" placeholder="Contraseña" />
              </div>
              <div class="d-flex mt-1 justify-content-between align-items-center">
                <div class="form-check">
                  <input class="form-check-input input-primary" type="checkbox" id="customCheckc1" checked="" />
                  <label class="form-check-label text-muted" for="customCheckc1">Remember me?</label>
                </div>
                <input type="hidden" name="global_token" value="<?php echo $_SESSION['global_token']; ?>">
                <input type="hidden" name="enviar" value="enviar">
                <a href="<?= BASE_PATH ?>/forgot_password">
                  <h6 class="text-secondary f-w-400 mb-0">Forgot Password?</h6>
                </a>
              </div>
              <div class="d-grid mt-4">
                <button type="submit" class="btn btn-primary">Login</button>
              </div>
             
            
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- [ Main Content ] end -->

  <?php include "views/layouts/scripts.php" ?>


</body>
<!-- [Body] end -->

</html>