<?php 
    include $_SERVER['DOCUMENT_ROOT'] . '/TORS/includes/connection.php'; 

    include $_SERVER['DOCUMENT_ROOT'] . '/TORS/includes/adminsidenav.php';

    include $_SERVER['DOCUMENT_ROOT'] . '/TORS/includes/head.php'; 
    require '../checkadmin.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/TORS/includes/navbar.php';

if (isset ($_POST['submit'])) {

   $userID = mysqli_real_escape_string($link, $_POST['userID']);
   $fname = mysqli_real_escape_string($link, $_POST['fname']);
   $lname = mysqli_real_escape_string($link, $_POST['lname']);
   $password = mysqli_real_escape_string($link, $_POST['password']);
   $rank = mysqli_real_escape_string($link, $_POST['rank']);
    $station = mysqli_real_escape_string($link, $_POST['station']);
   $date = mysqli_real_escape_string($link, $_POST['regDate']);
    $email = mysqli_real_escape_string($link, $_POST['email']);
  

  

  //Error Handlers
   //Check for empty fields

   if(empty($userID) || empty($fname) || empty($password) || empty($rank) || empty($date)
 ){

    header("Location: addnewuser.php?addnewuser=empty");
    exit();

   } else {
    //check if user is taken
    $sql = "SELECT * FROM users WHERE userID = '$userID'";
    $result = mysqli_query($link, $sql);
    $resultCheck = mysqli_num_rows($result);

    if($resultCheck > 0) {
     echo "<script>";
          echo "swal('Ooops..!', 'Could not register officer! National ID already exists!', 'error')";
          echo "</script>" . mysqli_error($link);

    } else {
      //hashing the password
      $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
      //Insert user into the database
      $sql = "INSERT INTO users (userID, fname, lname, password, rank, stationID, joined, domain, email)
            VALUES ('$userID', '$fname', '$lname', '$hashedPwd','$rank','$station', '$date', '0', '$email')";
      mysqli_query($link, $sql);
      echo "<script>";
          echo "swal('Good job!', 'Officer registered successfully', 'success')";
          echo "</script>";

     

    }

}
} 






?>

<body class="h-100">


    <div class="container-fluid">
        <div class="row">

            <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">




                <div class="main-content-container container-fluid px-4">
                    <!-- Page Header -->
                    <div class="page-header row no-gutters py-4">
                        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                            <span class="text-uppercase page-subtitle">Overview</span>
                            <h3 class="page-title">Traffic Officers Registration Form</h3>
                        </div>
                    </div>
                    <!-- End Page Header -->
                    <!-- Default Light Table -->
                    <div class="row">

                        <div class="col-lg-12 ">
                            <div class="card card-small mb-4">
                                <div class="card-header border-bottom">
                                    <h6 class="m-0">User Information</h6>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item p-3">
                                        <div class="row">
                                            <div class="col">
                                                <form action="addnewuser.php" method="post">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label for="ID">National ID</label>
                                                            <input type="number" class="form-control" name="userID" placeholder="National ID" required> </div>
                                                        <div class="form-group col-md-12">
                                                            <label for="Name">First Name</label>
                                                            <input type="text" class="form-control" name="fname" placeholder="Name" required> </div>
                                                        <div class="form-group col-md-12">
                                                            <label for="Name">Last Name</label>
                                                            <input type="text" class="form-control" name="lname" placeholder="Name" required> </div>
                                                        <div class="form-group col-md-12">
                                                            <label for="Name">Email</label>
                                                            <input type="email" class="form-control" name="email" placeholder="example@gmail.com" required> </div>
                                                        <div class="form-group col-md-12">
                                                            <label for="Password">Password</label>
                                                            <input type="password" class="form-control" name="password" placeholder="password" required> </div>
                                                         <div class="form-group col-md-12">
                                                            <label for="Region">Region</label>
                                                             
         <select name="station" class="form-control" required >
           <option disabled selected>Select Station</option>
          <?php 
        require_once $_SERVER['DOCUMENT_ROOT'].'/tors/includes/connection.php';

        $sql = "SELECT * FROM stations;";
        $result = $link->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo  '<option value="'.$row["stationID"].'" >'.$row["stationName"].'</option>';
            }
        } else {

        }
          ?>
        </select>
      </div>




                                                        <div class="form-group col-md-6">
                                                            <label for="Rank">Rank</label>

                                                            <select id="Type" class="form-control" name="rank" required>
                                                                <option value="" disabled selected>Select Rank</option>
                                                                <option>COMMANDER</option>
                                                                <option>OFFICER</option>

                                                            </select></div>
                                                        <div class="form-group col-md-6">
                                                            <label for="Type">Joined</label>
                                                            <input type="date" class="form-control" name="regDate" placeholder="Joined" required> </div>



                                                    </div>


                                                    <button type="submit" name="submit" value="sign up!" class="btn btn-accent">Register</button>
                                                </form>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End Default Light Table -->
                </div>
                <?php 
    include $_SERVER['DOCUMENT_ROOT'] . '/TORS/includes/footer.php'; 
   
    ?>
