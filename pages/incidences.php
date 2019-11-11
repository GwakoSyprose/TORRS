<?php
include $_SERVER['DOCUMENT_ROOT'] . '/TORS/includes/connection.php';
include '../includes/head.php'; 
    
    $query=mysqli_query($link, 
"SELECT incidentID,catName, offenceName, numPlate, location, fname, lname, dfname, dlname,recDate
FROM incidences i 
INNER JOIN offence_types ot ON i.offenceID=ot.otID
INNER JOIN offence_categories oc ON ot.categoryID=oc.ocID
INNER JOIN users u ON i.userID=u.userID
INNER JOIN offences  ON offences.offenceID=i.offenceID
INNER JOIN drivers d ON d.driverID =offences.driverID");
  
?>

<body class="h-100">

    <div class="container-fluid">
        <div class="row">
            <!-- Main Sidebar -->
            <?php include '../includes/sidenav.php'; ?>
            <!-- End Main Sidebar -->
            <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
                <?php include '../includes/navbar.php'; ?>
                <!-- / .main-navbar -->
                <div class="main-content-container container-fluid px-4">
                    <!-- Page Header -->
                    <div class="page-header row no-gutters py-4">
                        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                            <span class="text-uppercase page-subtitle">Overview</span>
                            <h3 class="page-title">Recorded Incidences</h3>

                        </div>
                    </div>
                    <!-- Incidences -->
                
                        <div id="active" class="container tab-pane active">
                            <!-- Default Light Table -->
                            <div class="row" id="activeTable">
                                <div class="col">
                                    <div class="card card-small mb-4">
                                        <div class="card-header border-bottom">
                                            <h6 class="m-0">INCIDENCES</h6>
                                        </div>
                                        <div class="card-body p-0 pb-3 text-center">

                                            <!--  table  drivers -->

                                            <table class="table mb-0 " id="incidences">
                                                <thead class="bg-light">
                                                    <tr>

                                                        <th scope="col" class="border-0">IncidentID</th>
                                                        <th scope="col" class="border-0">Offense Cat.</th>
                                                        <th scope="col" class="border-0">Offense Type</th>
                                                        <th scope="col" class="border-0">No.Plate</th>
                                                        <th scope="col" class="border-0">Driver</th>
                                                        <th scope="col" class="border-0">Location</th>
                                                        <th scope="col" class="border-0">BookedBy</th>
                                                        <th scope="col" class="border-0">Date</th>
                                                        <!-- <th scope="col" class="border-0">Action</th> -->
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php
                    while($result = mysqli_fetch_assoc($query)) :
                            $id=$result['incidentID'];
                            $offType=$result['catName'];
                            $offName=$result['offenceName'];
                            $plate=$result['numPlate'];
                            $location=$result['location'];
                            $officerfname=$result['fname'];
                            $officerlname=$result['lname'];
                            $driverfname=$result['dfname'];
                            $driverlname=$result['dlname'];
                            $date=$result['recDate'];
                        ?>

                                                    <tr>
                                                        <td id="id"><?= $id; ?></td>
                                                        <td id="id"><?= $offType; ?></td>
                                                        <td id="id"><?= $offName; ?></td>
                                                        <td id="name"><?= $plate; ?></td>
                                                        <td id="name"><?= $driverfname; ?> <?= $driverlname; ?></td>
                                                        <td id="license"><?= $location; ?></td>
                                                        <td id="type"><?= $officerfname; ?> <?= $officerlname; ?></td>
                                                        <td id="count"><?= $date; ?> </td>
                                                        <!-- <td><a href="incidences.php"><button
                                                                    type="submit" class="btn btn-sm btn-info"><span
                                                                        class="glyphicon glyphicon-folder-open "></span>View</button></a>
                                                        </td> -->

                                                    </tr>
                                                   
                                                   
                                                    <?php endwhile; ?>



                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Default Light Table -->
                        </div>
                       

                    </div>

                    <!-- End Page Header -->


                </div>
                <script type="text/javascript">
                $(document).ready(function() {
                    $('#incidences').DataTable();
                    

                });
                </script>
                <?php 
    include '../includes/footer.php'; 
   
    ?>