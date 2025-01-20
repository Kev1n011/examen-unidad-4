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
                <div class="row align-items-center">
                    <div v-if="isLoading" class="d-flex justify-content-center align-items-center"
                        style="height: 100vh;">
                        <div class="spinner-border text-primary" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                </div>

                <div v-if="!isLoading">
                    <div class="row">
                        <div class="col-sm-6 col-xl-4">
                            <div class="card statistics-card-1">
                                <div class="card-header d-flex align-items-center justify-content-between py-3">
                                    <h5>Total de órdenes realizadas</h5>
                                </div>
                                <div class="card-body">
                                    <img src="<?= BASE_PATH ?>/assets/images/widget/img-status-1.svg" alt="img"
                                        class="img-fluid img-bg h-100" />
                                    <div class="d-flex align-items-center">
                                        <h3 class="f-w-300 d-flex align-items-center m-b-0">{{client.orders.length}}
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-4">
                            <div class="card statistics-card-1">
                                <div class="card-header d-flex align-items-center justify-content-between py-3">
                                    <h5>Total de productos adquiridos</h5>
                                </div>
                                <div class="card-body">
                                    <img src="<?= BASE_PATH ?>/assets/images/widget/img-status-1.svg" alt="img"
                                        class="img-fluid img-bg h-100" />
                                    <div class="d-flex align-items-center">
                                        <h3 class="f-w-300 d-flex align-items-center m-b-0">{{total_products}}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <!-- [ form-element ] start -->
                        <div class="col-lg-5">
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
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter full name"
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

                        <div class="col-lg-7">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Client addresses</h5>
                                </div>
                                <div class="card-body table-border-style">
                                    <div class="d-flex justify-content-end">
                                        <div class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#add_address">
                                            Add
                                            address</div>
                                    </div>
                                    <div class="table-responsive" style="margin-top: 1%;">
                                        <table class="table mb-0">
                                            <thead>
                                                <tr>
                                                    <th>First name</th>
                                                    <th>City</th>
                                                    <th>Province</th>
                                                    <th>Postal Code</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-if="client.addresses.length === 0">
                                                    <td colspan="6" class="text-center text-muted">
                                                        No se han encontrado direcciones.
                                                    </td>
                                                </tr>
                                                <tr v-for="addresses in client.addresses">
                                                    <td>{{addresses.first_name}}</td>
                                                    <td>{{addresses.city}}</td>
                                                    <td>{{addresses.province}}</td>
                                                    <td>{{addresses.postal_code}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Orders list</h5>
                                </div>
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
                let total_products = ref("");
                const isLoading = ref(true);

                const cargarDatos = async () => { //Permite que haya un tiempo de espera antes de que carguen los datos
                    try {
                        isLoading.value = true;

                        await new Promise(resolve => setTimeout(resolve, 1000));



                    } finally {
                        isLoading.value = false;
                    }
                };

                cargarDatos();


                return {
                    message,
                    client,
                    total_products,
                    isLoading,

                }
            },

            methods: {
                get_total_products() {
                    let cont = 0;
                    this.client.orders.forEach(order => {
                        order.presentations.forEach(presentation => {
                            cont++

                        });


                    });
                    this.total_products = cont;

                },



            },
            mounted() {
                console.log(this.client.orders)
                this.get_total_products()
                console.log(this.client.id)

            }

        }).mount('#app')
    </script>
</body>
<!-- [Body] end -->

</html>