<?php
include  ('../includes/connection.php');
include  ('../includes/head.php');


$region = $_SESSION['region'];


$query=mysqli_query($link, "SELECT * FROM notifications WHERE region='$region'");
 

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
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card card-small mb-4">
                            <div class="card-header border-bottom">
                                <h6 class="m-0">Account Details</h6>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item p-3">
                                    <div class="row">
                                        <div class="col">
                                            <h6 class="font-weight-bold text-center">Personal Details</h6>
                                            <ul>
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>

                                                            <th scope="col">Number Plates</th>
                                                            <th scope="col">Description</th>
                                                            <th scope="col">Phone Number</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                   while($result = mysqli_fetch_assoc($query)) :
                            $numPlate=$result['numPlate'];
                            $description=$result['description'];
                            $phone=$result['phone'];
                                                     
                                                        ?>
                                                        <tr>


                                                            <td><?php echo $numPlate; ?></td>
                                                            <td><?php echo  $description;?></td>
                                                            <td><?php echo $phone; ?></td>


                                                        </tr>
                                                        <?php endwhile; ?>


                                                    </tbody>
                                                </table>

                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>


                        <?php 
    include '../includes/footer.php'; 
   
    ?>
