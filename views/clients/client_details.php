<?php

include "../../app/config.php";
include "../../app/clientController.php";

?>

<?php


//Obtener datos de usuario
$user_details = new ClientController;
$user = $user_details->client_details($_GET['client_id']);

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
    <title>Client details</title>
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
                                <li class="breadcrumb-item" aria-current="page">Client Details</li>
                            </ul>
                        </div>
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h2 class="mb-0">Client Details</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->


            <!-- [ Main Content ] start -->
            <div id="app">
                <div class="row">
                    <!-- [ form-element ] start -->
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h5>Client information</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-md-12">
                                        <form>
                                            <div class="mb-3">
                                                <label class="form-label">Name:</label>
                                                <input type="text" class="form-control" placeholder="Enter full name"
                                                    value="<?php echo $user['name'] ?>" />
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Email:</label>
                                                <input type="email" class="form-control" placeholder="Enter email"
                                                    value="<?php echo $user['email'] ?>" />
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Phone number</label>
                                                <input type="text" class="form-control" placeholder="Enter Password"
                                                    value="<?php echo $user['phone_number'] ?>" />
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Current level</label>
                                                <input type="text" class="form-control" placeholder="Enter Password"
                                                    value="<?php echo $user['level']['name'] ?>" />
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h5>Control Divider</h5>
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="mb-3">
                                        <label class="form-label">Name:</label>
                                        <input type="email" class="form-control" placeholder="Enter full name" />
                                        <small class="form-text text-muted">Please enter your full name</small>
                                    </div>
                                    <hr class="my-4" />
                                    <div class="mb-3">
                                        <label class="form-label">Email:</label>
                                        <input type="email" class="form-control" placeholder="Enter email" />
                                        <small class="form-text text-muted">Please enter your Email</small>
                                    </div>
                                    <hr class="my-4" />
                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <input type="password" class="form-control" placeholder="enter Password" />
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped mb-0">
                                        <thead>
                                            <tr>
                                                <th>Folio</th>
                                                <th>Client</th>
                                                <th>ID Coupon</th>
                                                <th>Qty</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-if="client.orders.length === 0">
                                                <td colspan="6" class="text-center text-muted">
                                                    No se han encontrado órdenes.
                                                </td>
                                            </tr>
                                            <tr v-for="orders in client.orders">
                                                <td>{{orders.folio}}</td>
                                                <td>{{client.name}}</td>
                                                <td>{{orders.coupon_id}}</td>
                                                <td>{{orders.presentations.length}}</td>
                                                <td>${{orders.total}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            <!-- [ Main Content ] end -->
        </div>
    </section>
    <!-- [ Main Content ] end -->
    <?php include "../layouts/footer.php" ?>

    <?php include "../layouts/scripts.php" ?>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script>
        const { createApp, ref } = Vue

        createApp({
            setup() {
                const message = ref('Hello vue!')
                const client = ref(<?php echo json_encode($user); ?>);
                return {
                    message,
                    client
                }
            },
            
            methods: {
                


            },
            mounted() {
                console.log(this.client.orders)
                
            }

        }).mount('#app')
    </script>
</body>
<!-- [Body] end -->

</html>