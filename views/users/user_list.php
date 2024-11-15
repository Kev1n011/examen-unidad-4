<?php

include "../../app/config.php";
include "../../app/userController.php";

$userController = new UserController();
$users = $userController->obtener_usuarios();
?>
<!doctype html>
<html lang="en">
<!-- [Head] start -->

<head>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
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
    <div id="app">
        <div class="pc-container">
            <div class="pc-content">
                <!-- [ breadcrumb ] start -->
                <div class="page-header">
                    <div class="page-block">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="../dashboard/index.html">Home</a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0)">Profile</a></li>
                                    <li class="breadcrumb-item" aria-current="page">User List</li>
                                </ul>
                            </div>
                            <div class="col-md-12">
                                <div class="page-header-title">
                                    <h2 class="mb-0">User List</h2>

                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <div class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add User</div>
                            </div>


                        </div>
                    </div>
                </div>
                <!-- [ breadcrumb ] end -->


                <!-- [ Main Content ] start -->
                <div class="row">
                    <!-- [ sample-page ] start -->
                    <div class="col-sm-12">
                        <div class="card border-0 table-card user-profile-list">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover" id="pc-dt-simple">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Role</th>
                                                <th>Email</th>
                                                <th>Phone number</th>
                                                <th>Creation date</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="d-inline-block align-middle">
                                                        <img src="<?= BASE_PATH ?>/assets/images/user/avatar-1.jpg"
                                                            alt="user image" class="img-radius align-top m-r-15"
                                                            style="width: 40px" />
                                                        <div class="d-inline-block">
                                                            <h6 class="m-b-0">Quinn Flynn</h6>
                                                            <p class="m-b-0 text-primary">Android developer</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>Support Lead</td>
                                                <td>Edinburgh</td>
                                                <td>61</td>
                                                <td>2011/04/25</td>
                                                <td>
                                                    <span class="badge bg-light-success">Active</span>
                                                    <div class="overlay-edit">
                                                        <ul class="list-inline mb-0">
                                                            <li class="list-inline-item m-0"><a href="#"
                                                                    class="avtar avtar-s btn btn-primary"><i
                                                                        class="ti ti-pencil f-18"></i></a></li>
                                                            <li class="list-inline-item m-0"><a href="#"
                                                                    class="avtar avtar-s btn bg-white btn-link-danger"><i
                                                                        class="ti ti-trash f-18"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-inline-block align-middle">
                                                        <img src="<?= BASE_PATH ?>/assets/images/user/avatar-2.jpg"
                                                            alt="user image" class="img-radius align-top m-r-15"
                                                            style="width: 40px" />
                                                        <div class="d-inline-block">
                                                            <h6 class="m-b-0">Garrett Winters</h6>
                                                            <p class="m-b-0 text-primary">Android developer</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>Accountant</td>
                                                <td>Tokyo</td>
                                                <td>63</td>
                                                <td>2011/07/25</td>
                                                <td>
                                                    <span class="badge bg-light-danger">Disabled</span>
                                                    <div class="overlay-edit">
                                                        <ul class="list-inline mb-0">
                                                            <li class="list-inline-item m-0"><a href="#"
                                                                    class="avtar avtar-s btn btn-primary"><i
                                                                        class="ti ti-pencil f-18"></i></a></li>
                                                            <li class="list-inline-item m-0"><a href="#"
                                                                    class="avtar avtar-s btn bg-white btn-link-danger"><i
                                                                        class="ti ti-trash f-18"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-inline-block align-middle">
                                                        <img src="<?= BASE_PATH ?>/assets/images/user/avatar-3.jpg"
                                                            alt="user image" class="img-radius align-top m-r-15"
                                                            style="width: 40px" />
                                                        <div class="d-inline-block">
                                                            <h6 class="m-b-0">{{userData.name}}</h6>
                                                            <p class="m-b-0 text-primary">Android developer</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>Junior Technical Author</td>
                                                <td>San Francisco</td>
                                                <td>66</td>
                                                <td>2009/01/12</td>
                                                <td>
                                                    <span class="badge bg-light-danger">Disabled</span>
                                                    <div class="overlay-edit">
                                                        <ul class="list-inline mb-0">
                                                            <li class="list-inline-item m-0"><a href="#"
                                                                    class="avtar avtar-s btn btn-primary"><i
                                                                        class="ti ti-pencil f-18"></i></a></li>
                                                            <li class="list-inline-item m-0"><a href="#"
                                                                    class="avtar avtar-s btn bg-white btn-link-danger"><i
                                                                        class="ti ti-trash f-18"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-inline-block align-middle">
                                                        <img src="<?= BASE_PATH ?>/assets/images/user/avatar-4.jpg"
                                                            alt="user image" class="img-radius align-top m-r-15"
                                                            style="width: 40px" />
                                                        <div class="d-inline-block">
                                                            <h6 class="m-b-0">Cedric Kelly</h6>
                                                            <p class="m-b-0 text-primary">Android developer</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>Senior Javascript Developer</td>
                                                <td>Edinburgh</td>
                                                <td>22</td>
                                                <td>2012/03/29</td>
                                                <td>
                                                    <span class="badge bg-light-success">Active</span>
                                                    <div class="overlay-edit">
                                                        <ul class="list-inline mb-0">
                                                            <li class="list-inline-item m-0"><a href="#"
                                                                    class="avtar avtar-s btn btn-primary"><i
                                                                        class="ti ti-pencil f-18"></i></a></li>
                                                            <li class="list-inline-item m-0"><a href="#"
                                                                    class="avtar avtar-s btn bg-white btn-link-danger"><i
                                                                        class="ti ti-trash f-18"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr v-for="user in userData">
                                                <td>
                                                    <div class="d-inline-block align-middle">
                                                        <img src="<?= BASE_PATH ?>/assets/images/user/avatar-4.jpg"
                                                            alt="user image" class="img-radius align-top m-r-15"
                                                            style="width: 40px" />
                                                        <div class="d-inline-block">
                                                            <h6 class="m-b-0">{{user.name}}</h6>
                                                            <p class="m-b-0 text-primary">Android developer</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>{{user.role}}</td>
                                                <td>{{user.email}}</td>
                                                <td v-if="user.phone_number == null">Sin numero</td>
                                                <td v-else>{{user.phone_number}}</td>
                                                <td>2008/11/28</td>
                                                <td>
                                                    <span class="badge bg-light-success">Active</span>
                                                    <div class="overlay-edit">
                                                        <ul class="list-inline mb-0">
                                                            <li class="list-inline-item m-0"><a href="#"
                                                                    class="avtar avtar-s btn btn-primary"><i
                                                                        class="ti ti-pencil f-18"></i></a></li>
                                                            <li class="list-inline-item m-0"><a href="#"
                                                                    class="avtar avtar-s btn bg-white btn-link-danger"><i
                                                                        class="ti ti-trash f-18"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-end">
                                        <nav aria-label="Page navigation example">
                                            <ul class="pagination">
                                                <li @click="pagina_anterior()" class="page-item"><a class="page-link" href="#!">Previous</a></li>
                                                <div v-for="n in cantidad_paginas" :key="n">
                                                    <div  v-if="n >= pagina_actual - 1 && n <= pagina_actual + 1">
                                                        <li v-if="n === pagina_actual" class="page-item"> <a class="page-link active" href="#!">{{ n }}</a></li>
                                                        <li @click="seleccionar_pagina(n)" v-else class="page-item"><a class="page-link" href="#!">{{ n }}</a></li>
                                                    </div>
                                                    
                                                </div>

                                                <li @click="pagina_siguiente()" class="page-item"><a class="page-link"
                                                        href="#!">Next</a></li>
                                            </ul>
                                        </nav>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- [ sample-page ] end -->
                </div>
                <!-- [ Main Content ] end -->
            </div>
        </div>
    </div>


    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add User</h1>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1">
                        </div>

                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->

    <?php include "../layouts/footer.php" ?>

    <?php include "../layouts/scripts.php" ?>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        const myModal = document.getElementById('myModal')
        const myInput = document.getElementById('myInput')

        myModal.addEventListener('shown.bs.modal', () => {
            myInput.focus()
        })
    </script>
    <script>
        const { createApp, ref } = Vue

        createApp({
            setup() {
                const message = ref('Hello vue!')
                const users = ref(<?php echo json_encode($users); ?>);
                const userData = ref(<?php echo json_encode($users); ?>.slice(0, 10));

                //Lista de usuarios de 10 en 10
                let variable_usuarios = ref(10)
                let variable_rango_usuarios = ref(20)
                let cantidad_paginas = ref(0);
                let pagina_actual = ref(1);


                return {
                    message,
                    userData,
                    users,
                    variable_usuarios,
                    variable_rango_usuarios,
                    cantidad_paginas,
                    pagina_actual

                }
            },
            methods: {
                pagina_siguiente() {
                    let ultima_pagina = false;
                    console.log(this.users.length)
                    if ((this.users.length - this.variable_usuarios) < 10) {

                        ultima_pagina = true;

                    }
                    if (this.variable_usuarios <= this.users.length && ultima_pagina == false) {
                       
                        this.userData = [];
                        this.variable_usuarios += 10;
                        this.variable_rango_usuarios += 10;
                        this.userData = ref(<?php echo json_encode($users); ?>.slice(this.variable_usuarios, this.variable_rango_usuarios));
                       
                        this.pagina_actual += 1;

                    }


                },
                pagina_anterior() {
                    let primera_pagina = false;
                    console.log(this.users.length)
                    if(this.pagina_actual == 1){
                        primera_pagina = true;
                    }else{
                        primera_pagina = false;
                    }
                    
                    if (this.variable_usuarios <= this.users.length && primera_pagina == false) {
                        this.variable_usuarios -= 10;
                        this.variable_rango_usuarios -= 10
                        this.userData = [];
                        this.userData = ref(<?php echo json_encode($users); ?>.slice(this.variable_usuarios, this.variable_rango_usuarios));
                       ;
                        this.pagina_actual -= 1;

                    }


                },
                seleccionar_pagina(numero){
                    this.pagina_actual = numero;

                    this.variable_usuarios = numero * 10;
                    this.variable_rango_usuarios = (numero * 10) + 10;
                    this.userData = [];
                    this.userData = ref(<?php echo json_encode($users); ?>.slice(this.variable_usuarios, this.variable_rango_usuarios));
                    
                },
                obtener_paginas() {
                    let contador = 0;
                    for (let index = 0; index < this.users.length; index++) {
                        contador++
                        if (contador % 10 == 0) {
                            this.cantidad_paginas++
                        }

                    }

                }


            },
            mounted() {
                this.obtener_paginas();

            }

        }).mount('#app')
    </script>

    <?php include "../layouts/modals.php" ?>
</body>
<!-- [Body] end -->undefined

</html>