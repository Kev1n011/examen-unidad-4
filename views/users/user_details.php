<?php

include "../../app/config.php";
include "../../app/userController.php";

?>

<?php


//Obtener datos de usuario
$user_details = new UserController;
$user = $user_details->get_user_details($_GET['user_id']);

//VALIDAR SI ESTÁ LOGUEADO
if (!isset($_SESSION['logeado'])) {
    header('Location: ' . BASE_PATH . '');
}

//VALIDAR SI LA URL DEVUELVE DATOS
if (!isset($user['id'])) {
    echo "No se encontraron los datos del usuario";
    exit;
}
?>
<!doctype html>
<html lang="en">
<!-- [Head] start -->

<head>
    <title>User details</title>
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
    <?php include "../layouts/sidebar.php" ?>
    <?php include "../layouts/navbar.php" ?>



    <!-- [ Main Content ] start -->
    <section class="pc-container">
        <div class="pc-content">
            <!-- [ breadcrumb ] start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="../dashboard/index.html">Home</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0)">Forms</a></li>
                                <li class="breadcrumb-item" aria-current="page">User Details</li>
                            </ul>
                        </div>
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h2 class="mb-0">User Details</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->


            <!-- [ Main Content ] start -->
            <div class="row">
                <!-- [ form-element ] start -->
                <div class="col-lg-9">
                    <div class="card">
                        <div class="card-header">
                            <h5>User information</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 text-center">
                                    <div class="d-flex justify-content-center align-items-center" style="height: 400px;">
                                        <img src="<?php echo $user['avatar'] ?>" alt="Profile Picture" class="rounded-circle img-thumbnail w-100 h-100 object-fit-cover">
                                    </div>
                                    <small class="d-block text-muted mt-2">Profile Picture</small>
                                </div>

                                <div class="col-md-8">
                                    <form>
                                        <div class="mb-3">
                                            <label class="form-label">Name:</label>
                                            <input type="text" class="form-control" placeholder="Enter full name" value="<?php echo $user['name'] ?>" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Lastname:</label>
                                            <input type="text" class="form-control" placeholder="Enter full name" value="<?php echo $user['lastname'] ?>" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Email:</label>
                                            <input type="email" class="form-control" placeholder="Enter email" value="<?php echo $user['email'] ?>" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Phone number</label>
                                            <input type="text" class="form-control" placeholder="Enter Password" value="<?php echo $user['avatar'] ?>" />
                                        </div>
                                        <div class="mb-0">
                                            <label class="form-label">Language:</label>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input input-primary" id="customCheckinl1" checked />
                                                <label class="form-check-label" for="customCheckinl1">English</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input input-primary" id="customCheckinl2" />
                                                <label class="form-check-label" for="customCheckinl2">French</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input input-primary" id="customCheckinl3" />
                                                <label class="form-check-label" for="customCheckinl3">Dutch</label>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- [ form-element ] end -->
            </div>
            <!-- [ Main Content ] end -->
        </div>
    </section>
    <!-- [ Main Content ] end -->
    <?php include "../layouts/footer.php" ?>

    <?php include "../layouts/scripts.php" ?>
</body>
<!-- [Body] end -->

</html>