<?php

include "../../app/config.php";


?>
<!doctype html>
<html lang="en">
<!-- [Head] start -->

<head>
  <?php include "../layouts/head.php" ?>
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


  <!-- [ Main Content ] start -->
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
          <img src="<?= BASE_PATH ?>assets/images/logo-white.svg"  alt="images" />
          <a href=""></a>
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
            <img src="<?= BASE_PATH ?>assets/images/favicon.svg" alt="image" class="" style="max-height:300px; margin-bottom:100px">
            <h4 class="f-w-500 mb-1">Olvidar contraseña</h4>
            <p class="mb-3">Volver a <a href="<?= BASE_PATH ?>" class="link-primary">Log in</a></p>
            <div class="mb-3">
              <label class="form-label">Correo electrónico</label>
              <input type="email" class="form-control" id="floatingInput" placeholder="Correo electrónico" />
            </div>
            <div class="d-grid mt-3">
              <button type="button" class="btn btn-primary">Enviar email de reset</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- [ Main Content ] end -->

  <?php include "../layouts/footer.php" ?>

  <?php include "../layouts/scripts.php" ?>

  <?php include "../layouts/modals.php" ?>
</body>
<!-- [Body] end -->undefined

</html>