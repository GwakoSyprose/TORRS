<?php
include  ('../includes/connection.php');
include  ('../includes/head.php');


 

require 'officer_name.php';
$region = $_SESSION['region'];
$id =$_SESSION['userID'];


$query=mysqli_query($link, "SELECT * FROM notifications WHERE region='$region'");
 if (isset($_GET['respond'])) {
     $notID = $_GET['respond'];
     $sql= "UPDATE notifications SET `status` = '$id' WHERE notificationID= '$notID'";
     if ($link->query($sql) === TRUE) {
        header("Location: notifications.php");
    } else {
      echo "Error updating record: " . $link->error;
    }
 }


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

                                <h6 class="m-0">Nots Details</h6>

                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item p-3">
                                    <div class="row">
                                        <div class="col">
                                            <h6 class="font-weight-bold text-center">Notifications List</h6>
                                            <ul>
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>

                                                            <th scope="col">Number Plates</th>
                                                            <th scope="col">Description</th>
                                                            <th scope="col">Phone Number</th>
                                                            <th scope="col">Action</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                   while($result = mysqli_fetch_assoc($query)) :
                             $notfID=$result['notificationID'];
                             $status=$result['status'];
                            $numPlate=$result['numPlate'];
                            $description=$result['description'];
                            $phone=$result['phone'];
                                                     
                                                        ?>
                                                        <tr>


                                                            <td><?php echo $numPlate; ?></td>
                                                            <td><?php echo  $description;?></td>
                                                            <td><?php echo $phone; ?></td>
                                                            <td><a  href="?respond=<?= $notfID;?>"> 
                                                            
                                                             <?=(($status == 0)?"<i class='material-icons text-danger'>alarm</i>" .' '. '<a class="text-danger">Respond</a>':''.getName($status));?>
                                                            </a></td>




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
