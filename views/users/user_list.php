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
                        <div class="d-flex justify-content-end">
                            <div class="btn btn-primary">Agregar Usuario</div>
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
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
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
                                                        <h6 class="m-b-0">Ashton Cox</h6>
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
                                        <tr>
                                            <td>
                                                <div class="d-inline-block align-middle">
                                                    <img src="<?= BASE_PATH ?>/assets/images/user/avatar-4.jpg"
                                                        alt="user image" class="img-radius align-top m-r-15"
                                                        style="width: 40px" />
                                                    <div class="d-inline-block">
                                                        <h6 class="m-b-0">Airi Satou</h6>
                                                        <p class="m-b-0 text-primary">Android developer</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>Accountant</td>
                                            <td>Tokyo</td>
                                            <td>33</td>
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
                                        <tr>
                                            <td>
                                                <div class="d-inline-block align-middle">
                                                    <img src="<?= BASE_PATH ?>/assets/images/user/avatar-5.jpg"
                                                        alt="user image" class="img-radius align-top m-r-15"
                                                        style="width: 40px" />
                                                    <div class="d-inline-block">
                                                        <h6 class="m-b-0">Brielle Williamson</h6>
                                                        <p class="m-b-0 text-primary">Android developer</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>Integration Specialist</td>
                                            <td>New York</td>
                                            <td>61</td>
                                            <td>2012/12/02</td>
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
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- [ sample-page ] end -->
            </div>
            <!-- [ Main Content ] end -->
        </div>
    </div>
    <!-- [ Main Content ] end -->

    <?php include "../layouts/footer.php" ?>

    <?php include "../layouts/scripts.php" ?>

    <?php include "../layouts/modals.php" ?>
</body>
<!-- [Body] end -->undefined

</html>