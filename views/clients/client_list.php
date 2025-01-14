<?php

include "../../app/config.php";
include "../../app/clientController.php";

$clientController = new ClientController();
$clients = $clientController->get_clients();

?>

<?php
//VALIDAR SI ESTÁ LOGUEADO
if (!isset($_SESSION['logeado'])) {
    header('Location: ' . BASE_PATH . '');
}

?>

<!doctype html>
<html lang="en">
<!-- [Head] start -->

<head>
    <title>User list</title>
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



                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->


            <!-- [ Main Content ] start -->
            <div id="app">
                <div class="d-flex justify-content-end">
                    <div class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add
                        Client</div>
                </div>
                <div class="row">
                    <!-- [ sample-page ] start -->
                    <div class="col-sm-12">
                        <div class="card border-0 table-card user-profile-list">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <div v-if="isLoading" class="d-flex justify-content-center align-items-center"
                                        style="height: 100vh;">
                                        <div class="spinner-border text-primary" role="status">
                                            <span class="sr-only">Loading...</span>
                                        </div>
                                    </div>
                                    <table v-else class="table table-hover" id="pc-dt-simple">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone number</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-if="userData.length === 0">
                                                <td colspan="6" class="text-center text-muted">
                                                    No hay usuarios disponibles.
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
                                                <td>{{user.email}}</td>
                                                <td v-if="user.phone_number == null">Sin numero</td>
                                                <td v-else>{{user.phone_number}}</td>
                                                <td>
                                                    <div>
                                                        <ul class="list-inline mb-0 d-flex align-items-center">
                                                            <form method="POST"
                                                                class="d-inline">
                                                                <input type="hidden" name="global_token"
                                                                    value="<?php echo $_SESSION['global_token']; ?>">
                                                                <input type="hidden" name="user_id" :value="user.id">
                                                                <input type="hidden" name="action" value="user_details">
                                                                <li class="list-inline-item m-0">
                                                                    <button
                                                                        type="submit"
                                                                        class="avtar avtar-s btn btn-secondary">
                                                                        <i class="ti ti-eye f-18"></i>
                                                                    </button>
                                                                </li>
                                                            </form>
                                                            <li class="list-inline-item m-1">
                                                                <button type="button" data-bs-toggle="modal"
                                                                    data-bs-target="#edit_user"
                                                                    @click="cargarUsuario(user)"
                                                                    class="avtar avtar-s btn btn-primary">
                                                                    <i class="ti ti-pencil f-18"></i>
                                                                </button>
                                                            </li>
                                                            <form method="POST" :id="'form_delete_profile_' + user.id"
                                                                class="d-inline">
                                                                <input type="hidden" name="global_token"
                                                                    value="<?php echo $_SESSION['global_token']; ?>">
                                                                <input type="hidden" name="user_id" :value="user.id">
                                                                <input type="hidden" name="action"
                                                                    value="eliminarUsuario">
                                                                <li class="list-inline-item m-0">
                                                                    <button @click="abrir_sweet_alert(user.id)"
                                                                        type="button"
                                                                        class="avtar avtar-s btn bg-white btn-link-danger">
                                                                        <i class="ti ti-trash f-18"></i>
                                                                    </button>
                                                                </li>
                                                            </form>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>

                                    <div class="d-flex justify-content-end">
                                        <nav aria-label="Page navigation example">
                                            <ul class="pagination">
                                                <li @click="pagina_anterior()" class="page-item"><a class="page-link"
                                                        style="cursor: pointer;">Previous</a></li>
                                                <div v-for="n in cantidad_paginas" :key="n">
                                                    <div v-if="n >= pagina_actual - 1 && n <= pagina_actual + 1">
                                                        <li v-if="n === pagina_actual" class="page-item"> <a
                                                                class="page-link active" style="cursor: pointer;">{{ n
                                                                }}</a></li>
                                                        <li @click="seleccionar_pagina(n)" v-else class="page-item"><a
                                                                class="page-link" style="cursor: pointer;">{{ n }}</a>
                                                        </li>
                                                    </div>

                                                </div>

                                                <li @click="pagina_siguiente()" class="page-item"><a class="page-link"
                                                        style="cursor: pointer;">Next</a></li>
                                            </ul>
                                        </nav>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- [ sample-page ] end -->
                </div>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Add client</h1>

                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form method="POST" enctype="multipart/form-data" id="form_add_client">
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="firstNameInput" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            v-model="agregar_name">
                                        <label v-if="boolean_agregar_name" class="form-label" style="color: red;">The
                                            first name
                                            is not valid</label>
                                    </div>
                                    <div class="mb-3">
                                        <label for="emailInput" class="form-label">Email address</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            v-model="agregar_email" required aria-describedby="emailHelp">
                                        <label v-if="boolean_agregar_email" class="form-label" style="color: red;">The
                                            email is
                                            not valid</label>

                                    </div>                               
                                    <div class="mb-3">
                                        <label for="phoneNumberInput" class="form-label">Phone Number</label>
                                        <input type="text" class="form-control" id="phone_number" name="phone_number"
                                            v-model="agregar_phone_number">
                                    </div>
                                    <label v-if="boolean_agregar_phone_number" class="form-label"
                                        style="color: red;">The
                                        phone number is not correct</label>
                                    <div class="mb-3">
                                        <label for="inputPassword" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password" name="password"
                                            v-model="agregar_password">
                                        <label v-if="boolean_agregar_password" class="form-label"
                                            style="color: red;">The password
                                            must have at least 8 characters</label>
                                    </div>
                                    <input type="hidden" name="global_token"
                                        value="<?php echo $_SESSION['global_token']; ?>">
                                    <input type="hidden" name="action" value="add_client">


                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button @click="abrir_sweet_alert_agregar" type="button"
                                        class="btn btn-primary">Save
                                        changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="edit_user" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Client</h1>

                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form method="POST" enctype="multipart/form-data" id="form_edit_profile">
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="emailInput" class="form-label">Email address</label>
                                        <input type="email" class="form-control" id="edit_email" name="email"
                                            v-model="agregar_email" required aria-describedby="emailHelp">
                                        <label v-if="boolean_agregar_email" class="form-label" style="color: red;">The
                                            email is
                                            not valid</label>

                                    </div>
                                    <div class="mb-3">
                                        <label for="firstNameInput" class="form-label">First Name</label>
                                        <input type="text" class="form-control" id="edit_firstName" name="firstName"
                                            v-model="agregar_name">
                                        <label v-if="boolean_agregar_name" class="form-label" style="color: red;">The
                                            first name
                                            is not valid</label>
                                    </div>
                                    <div class="mb-3">
                                        <label for="lastNameInput" class="form-label">Last Name</label>
                                        <input type="text" class="form-control" id="edit_lastName" name="lastName"
                                            v-model="agregar_lastname">
                                        <label v-if="boolean_agregar_lastname" class="form-label"
                                            style="color: red;">The
                                            lastname is not correct</label>
                                    </div>
                                    <div class="mb-3">
                                        <label for="phoneNumberInput" class="form-label">Phone Number</label>
                                        <input type="text" class="form-control" id="edit_phoneNumber" name="phoneNumber"
                                            v-model="agregar_phone_number">
                                    </div>
                                    <label v-if="boolean_agregar_phone_number" class="form-label"
                                        style="color: red;">The
                                        phone number is not correct</label>
                                    <div class="mb-3">
                                        <label for="roleInput" class="form-label">Rol</label>
                                        <select class="form-select" id="edit_role_dropdown" name="role_dropdown"
                                            v-model="agregar_role" aria-label="Default select example" required>
                                            <option disabled selected value> -- Select a role </option>
                                            <option value="Administrador">Administrador</option>

                                        </select>
                                    </div>

                                    <input type="hidden" name="global_token"
                                        value="<?php echo $_SESSION['global_token']; ?>">
                                    <input type="hidden" name="user_id" v-model="user_id">
                                    <input type="hidden" name="editUser" value="editUser">


                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button @click="update_user" type="button" class="btn btn-primary">Save
                                        changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

            <!-- [ Main Content ] end -->
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

    <?php
    $current_page = isset($_GET['page']) ? intval($_GET['page']) : 1;
    ?>


    <script>
        function abrir_sweet_alert(id) {
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this imaginary file!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        swal("Poof! Your imaginary file has been deleted!", {
                            icon: "success",

                        }).then(() => {
                            document.getElementById('form_delete_profile').submit();
                        });

                    } else {
                        swal("Your imaginary file is safe!");
                    }
                });

        }


    </script>

    <script>
        const { createApp, ref } = Vue

        createApp({
            setup() {
                const message = ref('Hello vue!')

                //Lista de usuarios de 10 en 10
                let variable_usuarios = ref(10)
                let variable_rango_usuarios = ref(20)
                let cantidad_paginas = ref(0);
                const pagina_actual = ref(<?php echo $current_page; ?>);
                const isLoading = ref(true);

                const formatear_fecha = (fechaISO) => {
                    const fecha = new Date(fechaISO);
                    return fecha.toISOString().split('T')[0];
                };

                const users = ref(<?php echo json_encode($clients); ?>);
                const userData = ref(users.value.slice(0, 10));

                const cargarDatos = async () => {
                    try {
                        isLoading.value = true;

                        await new Promise(resolve => setTimeout(resolve, 650));

                        //rocesa los datos después del retraso
                        users.value = <?php echo json_encode($clients); ?>.map(user => {
                            return {
                                ...user,
                                created_at: formatear_fecha(user.created_at)
                            };
                        });

                        const inicio = (pagina_actual.value - 1) * 10;
                        const fin = inicio + 10;
                        userData.value = users.value.slice(inicio, fin);

                    } finally {
                        isLoading.value = false;
                    }
                };

                cargarDatos();

                //VARIABLES AGREGAR USUARIO
                let agregar_email = ref(""), agregar_name = ref(""), agregar_lastname = ref(""), agregar_phone_number = ref(""), agregar_role = ref(""), agregar_password = ref(""), user_id = ref("");
                let boolean_agregar_email = ref(false), boolean_agregar_name = ref(false), boolean_agregar_lastname = ref(false), boolean_agregar_phone_number = ref(false), boolean_agregar_role = ref(false), boolean_agregar_password = ref(false);

                return {
                    message,
                    userData,
                    users,
                    variable_usuarios,
                    variable_rango_usuarios,
                    cantidad_paginas,
                    pagina_actual,
                    isLoading,

                    //AGREGAR USUARIO VARIABLES
                    agregar_email, agregar_name, agregar_lastname, agregar_phone_number, agregar_role, agregar_password, user_id,
                    boolean_agregar_email, boolean_agregar_name, boolean_agregar_lastname, boolean_agregar_phone_number, boolean_agregar_role, boolean_agregar_password

                }
            },
            
            methods: {
                pagina_siguiente(numero) {
                    let ultima_pagina = false;
                    if (this.pagina_actual == this.cantidad_paginas) {
                        ultima_pagina = true;
                    }

                    if (this.variable_usuarios <= this.users.length && !ultima_pagina) {
                        this.variable_usuarios += 10;
                        this.variable_rango_usuarios += 10;
                        //this.userData = this.users.slice(this.variable_rango_usuarios, this.variable_rango_usuarios);
                        this.pagina_actual += 1;
                        window.location.href = "./" + this.pagina_actual;

                    }

                },

                pagina_anterior() {
                    let primera_pagina = false;
                    if (this.pagina_actual == 1) {
                        primera_pagina = true;
                    } else {
                        primera_pagina = false;
                    }

                    if (this.variable_usuarios <= this.users.length && primera_pagina == false) {
                        this.variable_usuarios -= 10;
                        this.variable_rango_usuarios -= 10
                        //this.userData =this.users.slice(this.variable_rango_usuarios, this.variable_rango_usuarios);
                        this.pagina_actual -= 1;
                        window.location.href = "./" + this.pagina_actual;
                    }


                },
                seleccionar_pagina(numero) {
                    this.pagina_actual = numero;
                    const inicio = (numero - 1) * 10;
                    const fin = inicio + 10;

                    this.variable_usuarios = inicio;
                    this.variable_rango_usuarios = fin;
                    //this.userData = this.users.slice(fin, fin);
                    window.location.href = "./" + this.pagina_actual;



                },
                obtener_paginas() {
                    let contador = 0;
                    this.cantidad_paginas = 0;

                    for (let index = 0; index < this.users.length; index++) {
                        contador++;
                        if (contador % 10 == 0) {
                            this.cantidad_paginas++;
                        }
                    }

                    if (contador % 10 !== 0) {
                        this.cantidad_paginas++;
                    }
                },
                abrir_sweet_alert(id) {
                    swal({
                        title: "Are you sure?",
                        text: "Once deleted, you will not be able to recover this imaginary file!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                        .then((willDelete) => {
                            if (willDelete) {
                                swal("Poof! Your imaginary file has been deleted!", {
                                    icon: "success",

                                }).then(() => {
                                    document.getElementById('form_delete_profile_' + id).submit();
                                });

                            } else {
                                swal("Your imaginary file is safe!");
                            }
                        });

                },

                //AGREGAR USUARIO
                abrir_sweet_alert_agregar() {
                    //VALIDAR FORMULARIO AGREGAR USUARIO

                    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/
                    const nameRegex = /^[A-Za-zÁÉÍÓÚáéíóúÑñ ]+$/;
                    const lastnameRegex = /^[A-Za-zÁÉÍÓÚáéíóúÑñ ]+$/;


                    this.boolean_agregar_email = false;
                    this.boolean_agregar_name = false;
                    this.boolean_agregar_lastname = false;
                    this.boolean_agregar_phone_number = false;

                    let email_valido = emailRegex.test(this.agregar_email);
                    let name_valido = nameRegex.test(this.agregar_name);
                    let lastname_valido = lastnameRegex.test(this.agregar_lastname);
                    let phone_number_valido = this.agregar_phone_number.length == 10;
                    let password_valido = this.agregar_password.length >= 8;


                    if (email_valido && name_valido && phone_number_valido && password_valido) {
                        swal({
                            title: "Cambios realizados!",
                            text: "Has actualizado tus datos de manera correcta!",
                            icon: "success",
                            button: "Aceptar",
                        }).then(() => {
                            document.getElementById('form_add_client').submit();
                        });


                    }
                    else {
                        this.boolean_agregar_email = !email_valido;
                        this.boolean_agregar_name = !name_valido;
                        this.boolean_agregar_lastname = !lastname_valido;
                        this.boolean_agregar_phone_number = !phone_number_valido;
                        this.boolean_agregar_password = !password_valido;
                    }
                },
                update_user() {
                    //VALIDAR FORMULARIO EDITAR USUARIO

                    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/
                    const nameRegex = /^[A-Za-zÁÉÍÓÚáéíóúÑñ ]+$/;
                    const lastnameRegex = /^[A-Za-zÁÉÍÓÚáéíóúÑñ ]+$/;


                    this.boolean_agregar_email = false;
                    this.boolean_agregar_name = false;
                    this.boolean_agregar_lastname = false;
                    this.boolean_agregar_phone_number = false;

                    let email_valido = emailRegex.test(this.agregar_email);
                    let name_valido = nameRegex.test(this.agregar_name);
                    let lastname_valido = lastnameRegex.test(this.agregar_lastname);
                    let phone_number_valido = this.agregar_phone_number.length == 10;


                    if (email_valido && name_valido && lastname_valido && phone_number_valido) {
                        swal({
                            title: "Cambios realizados!",
                            text: "Has actualizado tus datos de manera correcta!",
                            icon: "success",
                            button: "Aceptar",
                        }).then(() => {
                            document.getElementById('form_edit_profile').submit();
                        });


                    }
                    else {
                        this.boolean_agregar_email = !email_valido;
                        this.boolean_agregar_name = !name_valido;
                        this.boolean_agregar_lastname = !lastname_valido;
                        this.boolean_agregar_phone_number = !phone_number_valido;
                    }
                },


                cargarUsuario(usuario) {
                    this.agregar_name = usuario.name;
                    this.agregar_lastname = usuario.lastname;
                    this.agregar_email = usuario.email;
                    //this.correo_actual = usuario.phone_number;
                    this.agregar_phone_number = usuario.phone_number;
                    this.agregar_role = usuario.role;
                    this.user_id = usuario.id;
                    console.log(this.user_id)

                 
                },

                reiniciar_campos(){
                    this.agregar_name = "";
                    this.agregar_lastname = "";
                    this.agregar_email = "";
                    this.agregar_password = "";
                    this.agregar_phone_number = "";
                    this.agregar_role = "";

                    this.boolean_agregar_email = false;
                    this.boolean_agregar_lastname = false;
                    this.boolean_agregar_password = false;
                    this.boolean_agregar_name = false;
                    this.boolean_agregar_phone_number = false;
                    this.boolean_agregar_role = false;
                }


            },
            mounted() {
                this.obtener_paginas();
                const inicio = (this.pagina_actual - 1) * 10;
                const fin = inicio + 10;

                this.variable_usuarios = inicio;
                this.variable_rango_usuarios = fin;
                this.userData = this.users.slice(inicio, fin);

                console.log("cantidad: " + this.cantidad_paginas)
                console.log("pagina actual: " + this.pagina_actual)
                const modal = document.getElementById('edit_user');
                const agregar_modal =document.getElementById('exampleModal');
                if (modal) {
                    modal.addEventListener('hidden.bs.modal', () => {
                        console.log("Modal cerrado, restableciendo valores de v-models");
                        this.reiniciar_campos();
                    });
                }
                if (agregar_modal) {
                    agregar_modal.addEventListener('hidden.bs.modal', () => {
                        console.log("Modal cerrado, restableciendo valores de v-models");
                        this.reiniciar_campos();
                    });
                }
            }

        }).mount('#app')
    </script>


    <?php include "../layouts/modals.php" ?>
</body>
<!-- [Body] end -->undefined

</html>