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
                <script>
                /*
 |--------------------------------------------------------------------------
 | Shards Dashboards: Blog Overview Template
 |--------------------------------------------------------------------------
 */

                'use strict';

                (function($) {
                    $(document).ready(function() {

                        // Blog overview date range init.
                        $('#blog-overview-date-range').datepicker({});

                        //
                        // Small Stats
                        //

                        // Datasets
                        var boSmallStatsDatasets = [{
                                backgroundColor: 'rgba(0, 184, 216, 0.1)',
                                borderColor: 'rgb(0, 184, 216)',
                                data: [1, 2, 1, 3, 5, 4, 7],
                            },
                            {
                                backgroundColor: 'rgba(23,198,113,0.1)',
                                borderColor: 'rgb(23,198,113)',
                                data: [1, 2, 3, 3, 3, 4, 4]
                            },
                            {
                                backgroundColor: 'rgba(255,180,0,0.1)',
                                borderColor: 'rgb(255,180,0)',
                                data: [2, 3, 3, 3, 4, 3, 3]
                            },
                            {
                                backgroundColor: 'rgba(255,65,105,0.1)',
                                borderColor: 'rgb(255,65,105)',
                                data: [1, 7, 1, 3, 1, 4, 8]
                            },
                            {
                                backgroundColor: 'rgb(0,123,255,0.1)',
                                borderColor: 'rgb(0,123,255)',
                                data: [3, 2, 3, 2, 4, 5, 4]
                            }
                        ];

                        // Options
                        function boSmallStatsOptions(max) {
                            return {
                                maintainAspectRatio: true,
                                responsive: true,
                                // Uncomment the following line in order to disable the animations.
                                // animation: false,
                                legend: {
                                    display: false
                                },
                                tooltips: {
                                    enabled: false,
                                    custom: false
                                },
                                elements: {
                                    point: {
                                        radius: 0
                                    },
                                    line: {
                                        tension: 0.3
                                    }
                                },
                                scales: {
                                    xAxes: [{
                                        gridLines: false,
                                        scaleLabel: false,
                                        ticks: {
                                            display: false
                                        }
                                    }],
                                    yAxes: [{
                                        gridLines: false,
                                        scaleLabel: false,
                                        ticks: {
                                            display: false,
                                            // Avoid getting the graph line cut of at the top of the canvas.
                                            // Chart.js bug link: https://github.com/chartjs/Chart.js/issues/4790
                                            suggestedMax: max
                                        }
                                    }],
                                },
                            };
                        }

                        // Generate the small charts
                        boSmallStatsDatasets.map(function(el, index) {
                            var chartOptions = boSmallStatsOptions(Math.max.apply(Math, el.data) +
                                1);
                            var ctx = document.getElementsByClassName('blog-overview-stats-small-' +
                                (index + 1));
                            new Chart(ctx, {
                                type: 'line',
                                data: {
                                    labels: ["Label 1", "Label 2", "Label 3", "Label 4",
                                        "Label 5", "Label 6", "Label 7"
                                    ],
                                    datasets: [{
                                        label: 'Today',
                                        fill: 'start',
                                        data: el.data,
                                        backgroundColor: el.backgroundColor,
                                        borderColor: el.borderColor,
                                        borderWidth: 1.5,
                                    }]
                                },
                                options: chartOptions
                            });
                        });


                        //
                        // Blog Overview Users
                        //

                        var bouCtx = document.getElementsByClassName('blog-overview-users')[0];

                        // Data
                        var bouData = {
                            // Generate the days labels on the X axis.
                            labels: Array.from(new Array(30), function(_, i) {
                                return i === 0 ? 1 : i;
                            }),
                            datasets: [{
                                label: 'Current Month',
                                fill: 'start',
                                data: [500, 800, 320, 180, 240, 320, 230, 650, 590, 1200, 750,
                                    940, 1420, 1200, 960, 1450, 1820, 2800, 2102, 1920,
                                    3920, 3202, 3140, 2800, 3200, 3200, 3400, 2910, 3100,
                                    4250
                                ],
                                backgroundColor: 'rgba(0,123,255,0.1)',
                                borderColor: 'rgba(0,123,255,1)',
                                pointBackgroundColor: '#ffffff',
                                pointHoverBackgroundColor: 'rgb(0,123,255)',
                                borderWidth: 1.5,
                                pointRadius: 0,
                                pointHoverRadius: 3
                            }, {
                                label: 'Past Month',
                                fill: 'start',
                                data: [380, 430, 120, 230, 410, 740, 472, 219, 391, 229, 400,
                                    203, 301, 380, 291, 620, 700, 300, 630, 402, 320, 380,
                                    289, 410, 300, 530, 630, 720, 780, 1200
                                ],
                                backgroundColor: 'rgba(255,65,105,0.1)',
                                borderColor: 'rgba(255,65,105,1)',
                                pointBackgroundColor: '#ffffff',
                                pointHoverBackgroundColor: 'rgba(255,65,105,1)',
                                borderDash: [3, 3],
                                borderWidth: 1,
                                pointRadius: 0,
                                pointHoverRadius: 2,
                                pointBorderColor: 'rgba(255,65,105,1)'
                            }]
                        };

                        // Options
                        var bouOptions = {
                            responsive: true,
                            legend: {
                                position: 'top'
                            },
                            elements: {
                                line: {
                                    // A higher value makes the line look skewed at this ratio.
                                    tension: 0.3
                                },
                                point: {
                                    radius: 0
                                }
                            },
                            scales: {
                                xAxes: [{
                                    gridLines: false,
                                    ticks: {
                                        callback: function(tick, index) {
                                            // Jump every 7 values on the X axis labels to avoid clutter.
                                            return index % 7 !== 0 ? '' : tick;
                                        }
                                    }
                                }],
                                yAxes: [{
                                    ticks: {
                                        suggestedMax: 45,
                                        callback: function(tick, index, ticks) {
                                            if (tick === 0) {
                                                return tick;
                                            }
                                            // Format the amounts using Ks for thousands.
                                            return tick > 999 ? (tick / 1000).toFixed(1) +
                                                'K' : tick;
                                        }
                                    }
                                }]
                            },
                            // Uncomment the next lines in order to disable the animations.
                            // animation: {
                            //   duration: 0
                            // },
                            hover: {
                                mode: 'nearest',
                                intersect: false
                            },
                            tooltips: {
                                custom: false,
                                mode: 'nearest',
                                intersect: false
                            }
                        };

                        // Generate the Analytics Overview chart.
                        window.BlogOverviewUsers = new Chart(bouCtx, {
                            type: 'LineWithLine',
                            data: bouData,
                            options: bouOptions
                        });

                        // Hide initially the first and last analytics overview chart points.
                        // They can still be triggered on hover.
                        var aocMeta = BlogOverviewUsers.getDatasetMeta(0);
                        aocMeta.data[0]._model.radius = 0;
                        aocMeta.data[bouData.datasets[0].data.length - 1]._model.radius = 0;

                        // Render the chart.
                        window.BlogOverviewUsers.render();

                        //
                        // Users by device pie chart
                        //

                        // Data
                        var ubdData = {
                            datasets: [{
                                hoverBorderColor: '#ffffff',
                                data: [<?php echo $psvno; ?> , <?php echo $motorno; ?>
                                    , <?php echo $orgno; ?> , <?php echo $truckno; ?>
                                    , <?php echo $carno; ?>
                                ],
                                backgroundColor: [
                                    '#ffb3b3',
                                    '#ff6666',
                                    '#ff4d4d',
                                    '#ffe6e6',
                                    '#ff9999'
                                ]
                            }],
                            labels: ["PSVs", "Motorcycles", "Organizations", "Trucks", "Personal Cars"]
                        };

                        // Options
                        var ubdOptions = {
                            legend: {
                                position: 'bottom',
                                labels: {
                                    padding: 10,
                                    boxWidth: 20
                                }
                            },
                            cutoutPercentage: 0,
                            // Uncomment the following line in order to disable the animations.
                            // animation: false,
                            tooltips: {
                                custom: false,
                                mode: 'index',
                                position: 'nearest'
                            }
                        };

                        var ubdCtx = document.getElementsByClassName('drivers-by-vehicletype')[0];

                        // Generate the users by device chart.
                        window.ubdChart = new Chart(ubdCtx, {
                            type: 'pie',
                            data: ubdData,
                            options: ubdOptions
                        });


                        var ubdData = {
                            datasets: [{
                                hoverBorderColor: '#ffffff',
                                data: [ <?php echo $activeno; ?> , <?php echo $susno; ?>
                                    ],
                                backgroundColor: [
                                    '#ffe6e6',
                                    '#ff9999'
                                ]
                            }],
                            labels: ["Active", "Suspended"]
                        };

                        // Options
                        var ubdOptions = {
                            legend: {
                                position: 'bottom',
                                labels: {
                                    padding: 10,
                                    boxWidth: 20
                                }
                            },
                            cutoutPercentage: 0,
                            // Uncomment the following line in order to disable the animations.
                            // animation: false,
                            tooltips: {
                                custom: false,
                                mode: 'index',
                                position: 'nearest'
                            }
                        };

                        var ubdCtx = document.getElementsByClassName('active-vs-suspended')[0];

                        // Generate the users by device chart.
                        window.ubdChart = new Chart(ubdCtx, {
                            type: 'pie',
                            data: ubdData,
                            options: ubdOptions
                        });

                    });
                })(jQuery);
                </script>
                <?php 
    include $_SERVER['DOCUMENT_ROOT'] . '/TORS/includes/footer.php'; 
   
    ?>