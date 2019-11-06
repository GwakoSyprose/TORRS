<?php include $_SERVER['DOCUMENT_ROOT'] . '/TORS/includes/head.php';
include('../includes/connection.php');

//getting the number of psvs
 $querypsv=mysqli_query($link, "SELECT * FROM drivers WHERE typeID= 1");
    $psvno= mysqli_num_rows($querypsv);
//getting the number of motorcycles
 $querymotor=mysqli_query($link, "SELECT * FROM drivers WHERE typeid='2'");
    $motorno= mysqli_num_rows($querymotor);
//getting the number of personal cars
 $querycar=mysqli_query($link, "SELECT * FROM drivers WHERE typeid='3'");
    $carno= mysqli_num_rows($querycar);
//getting the number of organizations
 $queryorg=mysqli_query($link, "SELECT * FROM drivers WHERE typeid='4'");
    $orgno= mysqli_num_rows($queryorg);
//getting the number of trucks
 $querytruck=mysqli_query($link, "SELECT * FROM drivers WHERE typeid='5'");
    $truckno= mysqli_num_rows($querytruck);





?>


<body class="h-100">



    <div class="container-fluid">
        <div class="row">

            <?php include $_SERVER['DOCUMENT_ROOT'] . '/TORS/includes/sidenav.php'; ?>

            <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">


                <?php include $_SERVER['DOCUMENT_ROOT'] . '/TORS/includes/navbar.php';?>
                <div class="main-content-container container-fluid px-4">
                    <!-- Page Header -->
                    <div class="page-header row no-gutters py-4">
                        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                            <span class="text-uppercase page-subtitle">
                                <h6>Dashboard</h6>
                            </span>
                            

                        </div>
                    </div>
                    <!-- End Page Header -->
                    <!-- Small Stats Blocks -->
                    <div class="row">
                        <div class="col-lg col-md-6 col-sm-6 mb-4">
                            <div class="stats-small stats-small--1 card card-small">
                                <div class="card-body p-0 d-flex">
                                    <div class="d-flex flex-column m-auto">
                                        <div class="stats-small__data text-center">
                                            <span class="stats-small__label ">
                                                <h6>PSVs</h6>
                                            </span>
                                            <span> <i class='fas fa-shuttle-van' style='font-size:36px'></i></span>
                                            <h6 class="stats-small__value count my-3"><?php echo $psvno ?></h6>
                                            <span style="font-weight:450; "><b>Top Offender:</b> Syprose Gwako</span>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg col-md-6 col-sm-6 mb-4">
                            <div class="stats-small stats-small--1 card card-small">
                                <div class="card-body p-0 d-flex">
                                    <div class="d-flex flex-column m-auto">
                                        <div class="stats-small__data text-center">
                                            <span class="stats-small__label ">
                                                <h6>MOTORCYLES</h6>
                                            </span>
                                            <span> <i class='fas fa-motorcycle' style='font-size:36px'></i></span>
                                            <h6 class="stats-small__value count my-3"><?php echo $motorno ?></h6>
                                            <span style="font-weight:450; "><b>Top Offender:</b> Syprose Gwako</span>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg col-md-4 col-sm-6 mb-4">
                            <div class="stats-small stats-small--1 card card-small">
                                <div class="card-body p-0 d-flex">
                                    <div class="d-flex flex-column m-auto">
                                        <div class="stats-small__data text-center">
                                            <span class="stats-small__label ">
                                                <h6>PERSONAL CARS</h6>
                                            </span>
                                            <span> <i class='fas fa-car' style='font-size:36px'></i></span>
                                            <h6 class="stats-small__value count my-3"><?php echo $carno ?></h6>
                                            <span style="font-weight:450; "><b>Top Offender:</b> Syprose Gwako</span>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg col-md-4 col-sm-6 mb-4">
                            <div class="stats-small stats-small--1 card card-small">
                                <div class="card-body p-0 d-flex">
                                    <div class="d-flex flex-column m-auto">
                                        <div class="stats-small__data text-center">
                                            <span class="stats-small__label ">
                                                <h6>ORGANIZATIONS</h6>
                                            </span>
                                            <span> <i class='fas fa-ambulance' style='font-size:36px'></i></span>
                                            <h6 class="stats-small__value count my-3"><?php echo $orgno ?></h6>
                                            <span style="font-weight:450; "><b>Top Offender:</b> Syprose Gwako</span>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg col-md-4 col-sm-12 mb-4">
                            <div class="stats-small stats-small--1 card card-small">
                                <div class="card-body p-0 d-flex">
                                    <div class="d-flex flex-column m-auto">
                                        <div class="stats-small__data text-center">
                                            <span class="stats-small__label ">
                                                <h6>TRUCKS</h6>
                                            </span>
                                            <span> <i class='fas fa-truck' style='font-size:36px'></i></span>
                                            <h6 class="stats-small__value count my-3"><?php echo $truckno ?></h6>
                                            <span style="font-weight:450; "><b>Top Offender:</b> Stacy Ann Chebet</span>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Small Stats Blocks -->
                    <div class="row">
                        <!-- Users Stats -->
                        <div class="col-lg-4 col-md-12 col-sm-12 mb-4">
                            <div class="card card-small">
                                <div class="card-header border-bottom">
                                    <h6 class="m-0">Users</h6>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="row border-bottom py-2 bg-light">
                                        <div class="col-12 col-sm-6">
                                            <div id="blog-overview-date-range" class="input-daterange input-group input-group-sm my-auto ml-auto mr-auto ml-sm-auto mr-sm-0" style="max-width: 350px;">
                                                <input type="text" class="input-sm form-control" name="start" placeholder="Start Date" id="blog-overview-date-range-1">
                                                <input type="text" class="input-sm form-control" name="end" placeholder="End Date" id="blog-overview-date-range-2">
                                                <span class="input-group-append">
                                                    <span class="input-group-text">
                                                        <i class="material-icons"></i>
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 d-flex mb-2 mb-sm-0">
                                            <button type="button" class="btn btn-sm btn-white ml-auto mr-auto ml-sm-auto mr-sm-0 mt-3 mt-sm-0">View Full Report &rarr;</button>
                                        </div>
                                    </div>
                                    <canvas height="220" style="max-width: 100% !important;" class="blog-overview-users"></canvas>
                                </div>
                            </div>
                        </div>
                        <!-- End Users Stats -->
                        <!-- Users By Device Stats -->
                        <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                            <div class="card card-small h-100">
                                <div class="card-header border-bottom">
                                    <h6 class="m-0">Users by device</h6>
                                </div>
                                <div class="card-body d-flex py-0">
                                    <canvas height="220" class="blog-users-by-device m-auto"></canvas>
                                </div>
                                <div class="card-footer border-top">
                                    <div class="row">
                                        <div class="col">
                                            <select class="custom-select custom-select-sm" style="max-width: 130px;">
                                                <option selected>Last Week</option>
                                                <option value="1">Today</option>
                                                <option value="2">Last Month</option>
                                                <option value="3">Last Year</option>
                                            </select>
                                        </div>
                                        <div class="col text-right view-report">
                                            <a href="#">Full report &rarr;</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                            <div class="card card-small h-100">
                                <div class="card-header border-bottom">
                                    <h6 class="m-0">Users by device</h6>
                                </div>
                                <div class="card-body d-flex py-0">
                                    <canvas height="220" class="blog-users-by-device m-auto"></canvas>
                                </div>
                                <div class="card-footer border-top">
                                    <div class="row">
                                        <div class="col">
                                            <select class="custom-select custom-select-sm" style="max-width: 130px;">
                                                <option selected>Last Week</option>
                                                <option value="1">Today</option>
                                                <option value="2">Last Month</option>
                                                <option value="3">Last Year</option>
                                            </select>
                                        </div>
                                        <div class="col text-right view-report">
                                            <a href="#">Full report &rarr;</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Users By Device Stats -->


                    </div>
                </div>
                <?php 
    include $_SERVER['DOCUMENT_ROOT'] . '/TORS/includes/footer.php'; 
   
    ?>
