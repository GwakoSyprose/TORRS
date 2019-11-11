<?php include $_SERVER['DOCUMENT_ROOT'] . '/TORS/includes/head.php';
include('../includes/connection.php');

//getting the number of psvs
 $querypsv=mysqli_query($link, "SELECT * FROM drivers WHERE typeID= 1");
    $psvno= mysqli_num_rows($querypsv);
//getting the number of motorcycles
 $querymotor=mysqli_query($link, "SELECT * FROM drivers WHERE typeID=4");
    $motorno= mysqli_num_rows($querymotor);
//getting the number of personal cars
 $querycar=mysqli_query($link, "SELECT * FROM drivers WHERE typeID=2");
    $carno= mysqli_num_rows($querycar);
//getting the number of organizations
 $queryorg=mysqli_query($link, "SELECT * FROM drivers WHERE typeID=3");
    $orgno= mysqli_num_rows($queryorg);
//getting the number of trucks
 $querytruck=mysqli_query($link, "SELECT * FROM drivers WHERE typeID=5");
    $truckno= mysqli_num_rows($querytruck);

//getting the number of active drivers
$queryactive=mysqli_query($link, "SELECT * FROM drivers WHERE status=0");
    $activeno= mysqli_num_rows($queryactive);
//getting the number of suspended drivers
 $querysus=mysqli_query($link, "SELECT * FROM drivers WHERE status=1");
    $susno= mysqli_num_rows($querysus);

//getting the top offender PSV
$result= mysqli_query($link, "SELECT *, MAX(offenceCount) AS maximum FROM drivers WHERE typeID=1");

$row = mysqli_fetch_assoc($result); 

$firstnamePSV = $row['dfname'];
$lastnamePSV = $row['dlname'];
//getting the top offender MOTORCYCLES`
$resultm= mysqli_query($link, "SELECT *, MAX(offenceCount) AS maximum FROM drivers WHERE typeID=4");

$rowm = mysqli_fetch_assoc($resultm); 

$firstnameMotor = $rowm['dfname'];
$lastnameMotor = $rowm['dlname'];
//getting the top offender PERSONAL
$resultp= mysqli_query($link, "SELECT *, MAX(offenceCount) AS maximum FROM drivers WHERE typeID=2");

$rowp = mysqli_fetch_assoc($resultp); 

$firstnamePersonal = $rowp['dfname'];
$lastnamePersonal = $rowp['dlname'];
//getting the top offender ORGANIZATION
$resulto= mysqli_query($link, "SELECT *, MAX(offenceCount) AS maximum FROM drivers WHERE typeID=3");

$rowo = mysqli_fetch_assoc($resulto); 

$firstnameOrg = $rowo['dfname'];
$lastnameOrg = $rowo['dlname'];
//getting the top offender TRUCKS
$resultt= mysqli_query($link, "SELECT *, MAX(offenceCount) AS maximum FROM drivers WHERE typeID=5");

$rowt = mysqli_fetch_assoc($resultt); 

$firstnameTruck = $rowt['dfname'];
$lastnameTruck = $rowt['dlname'];









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
                                <h5>Dashboard</h5>

                            </span>


                        </div>
                    </div>
                    <!-- End Page Header -->

                    <!-- Small Stats Blocks -->
                    <div class="row">

                        <div class="col-lg col-md-4 col-sm-12 mb-4">
                            <div class="stats-small stats-small--1 card card-small"
                                style="background-image: linear-gradient( 179.8deg,  rgba(0,116,117,1) 19.2%, rgba(232,232,232,1) 91.3% );">

                                <div class="card-body p-0 d-flex">
                                    <div class="d-flex flex-column m-auto">
                                        <div class="stats-small__data text-center">
                                            <span class="stats-small__label ">
                                                <h6 id="labels">PSVs</h6>
                                                </s #00cc7epan>
                                                <span> <i class='fas fa-shuttle-van' style='font-size:36px'></i></span>
                                                <h6 class="stats-small__value count my-3"><?php echo $psvno ?></h6>
                                                <span
                                                    style="font-weight:450; overflow: hidden; white-space: nowrap;"><b>Top
                                                        Offender:</b><?= $firstnamePSV; ?> <?= $lastnamePSV; ?> </span>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg col-md-4 col-sm-12 mb-4">
                            <div class="stats-small stats-small--1 card card-small"
                                style="background-image: linear-gradient( 179.8deg,  rgba(0,116,117,1) 19.2%, rgba(232,232,232,1) 91.3% );">

                                <div class="card-body p-0 d-flex">
                                    <div class="d-flex flex-column m-auto">
                                        <div class="stats-small__data text-center">
                                            <span class="stats-small__label ">
                                                <h6 id="labels">PERSONALS</h6>
                                                </s #00cc7epan>
                                                <span> <i class='fas fa-car' style='font-size:36px'></i></span>
                                                <h6 class="stats-small__value count my-3"><?php echo $carno ?></h6>
                                                <span
                                                    style="font-weight:450; overflow: hidden; white-space: nowrap;"><b>Top
                                                        Offender:</b><?= $firstnamePersonal; ?>
                                                    <?= $lastnamePersonal; ?> </span>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg col-md-4 col-sm-12 mb-4">
                            <div class="stats-small stats-small--1 card card-small"
                                style="background-image: linear-gradient( 179.8deg,  rgba(0,116,117,1) 19.2%, rgba(232,232,232,1) 91.3% );">
                                <div class="card-body p-0 d-flex">
                                    <div class="d-flex flex-column m-auto">
                                        <div class="stats-small__data text-center">
                                            <span class="stats-small__label ">
                                                <h6 id="labels">ORGANIZATIONS</h6>
                                                </s #00cc7epan>
                                                <span> <i class='fas fa-ambulance' style='font-size:36px'></i></span>
                                                <h6 class="stats-small__value count my-3"><?php echo $orgno ?></h6>
                                                <span
                                                    style="font-weight:450; overflow: hidden; white-space: nowrap;"><b>Top
                                                        Offender:</b><?= $firstnameOrg; ?> <?= $lastnameOrg; ?> </span>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg col-md-4 col-sm-12 mb-4">
                            <div class="stats-small stats-small--1 card card-small"
                                style="background-image: linear-gradient( 179.8deg,  rgba(0,116,117,1) 19.2%, rgba(232,232,232,1) 91.3% );">
                                <div class="card-body p-0 d-flex">
                                    <div class="d-flex flex-column m-auto">
                                        <div class="stats-small__data text-center">
                                            <span class="stats-small__label ">
                                                <h6 id="labels">MOTORCYLCLES</h6>
                                                </s #00cc7epan>
                                                <span> <i class='fas fa-motorcycle' style='font-size:36px'></i></span>
                                                <h6 class="stats-small__value count my-3"><?php echo $motorno ?></h6>
                                                <span
                                                    style="font-weight:450; overflow: hidden; white-space: nowrap;"><b>Top
                                                        Offender:</b><?= $firstnameMotor; ?> <?= $lastnameMotor; ?>
                                                </span>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-lg col-md-4 col-sm-12 mb-4">
                            <div class="stats-small stats-small--1 card card-small"
                                style="background-image: linear-gradient( 179.8deg,  rgba(0,116,117,1) 19.2%, rgba(232,232,232,1) 91.3% );">
                                <div class="card-body p-0 d-flex">
                                    <div class="d-flex flex-column m-auto">
                                        <div class="stats-small__data text-center">
                                            <span class="stats-small__label ">
                                                <h6 id="labels">TRUCKS</h6>
                                                </s #00cc7epan>
                                                <span> <i class='fas fa-truck' style='font-size:36px'></i></span>
                                                <h6 class="stats-small__value count my-3"><?php echo $truckno ?></h6>
                                                <span
                                                    style="font-weight:450; overflow: hidden; white-space: nowrap;"><b>Top
                                                        Offender:</b><?= $firstnameTruck; ?> <?= $lastnameTruck; ?>
                                                </span>
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
                                            <div id="blog-overview-date-range"
                                                class="input-daterange input-group input-group-sm my-auto ml-auto mr-auto ml-sm-auto mr-sm-0"
                                                style="max-width: 350px;">
                                                <input type="text" class="input-sm form-control" name="start"
                                                    placeholder="Start Date" id="blog-overview-date-range-1">
                                                <input type="text" class="input-sm form-control" name="end"
                                                    placeholder="End Date" id="blog-overview-date-range-2">
                                                <span class="input-group-append">
                                                    <span class="input-group-text">
                                                        <i class="material-icons"></i>
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 d-flex mb-2 mb-sm-0">
                                            <button type="button"
                                                class="btn btn-sm btn-white ml-auto mr-auto ml-sm-auto mr-sm-0 mt-3 mt-sm-0">View
                                                Full Report &rarr;</button>
                                        </div>
                                    </div>
                                    <canvas height="220" style="max-width: 100% !important;"
                                        class="blog-overview-users"></canvas>
                                </div>
                            </div>
                        </div>
                        <!-- End Users Stats -->
                        <!-- Users By Device Stats -->
                        <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                            <div class="card card-small h-100">
                                <div class="card-header border-bottom">
                                    <h6 class="m-0">Drivers by Vehicle Type</h6>
                                </div>
                                <div class="card-body d-flex py-0">
                                    <canvas height="220" class="drivers-by-vehicletype"></canvas>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                            <div class="card card-small h-100">
                                <div class="card-header border-bottom">
                                    <h6 class="m-0">Active vs Suspended Drivers</h6>
                                </div>
                                <div class="card-body d-flex py-0">
                                    <canvas height="220" class="active-vs-suspended"></canvas>
                                </div>

                            </div>
                        </div>
                        <!-- End Users By Device Stats -->


                    </div>
                </div>
               
                <?php 
    include $_SERVER['DOCUMENT_ROOT'] . '/TORS/includes/footer.php'; 
   
    ?>