<?php include $_SERVER['DOCUMENT_ROOT'] . '/TORS/includes/head.php';

      include $_SERVER['DOCUMENT_ROOT'] . '/TORS/includes/connection.php';

      if (isset($_GET['pid'])) {
        $id = $_GET['pid'];
        $query = "SELECT * FROM drivers WHERE driverID = $id";
        $result = mysqli_query($link, $query);
        $driver= mysqli_fetch_assoc($result);
        $summ= 0;

      }
        
 // Escape user inputs for security
    if(isset($_POST["submit"])) {
      $id = $_GET['pid'];
      $offense =  $_POST['offense'];
      $numplate = mysqli_real_escape_string($link, $_POST['numplate']);
      $description = mysqli_real_escape_string($link, $_POST['description']);

      $cou = count($_POST['offense']);
      $sql = "INSERT INTO offences(offenceType,description,driverID) VALUES ";
      $comma = "";
      for ($i=0; $i < $cou; $i++) { 
        if ($i > 0) {
          $comma = ",";
        }
        $sql .= $comma."(".$_POST['offense'][$i].",'$description','$id')";
      }
      if ($link->multi_query($sql) === TRUE) {

        // record incident
        $date  = date('Y-m-d');
        $days = 90;
        $oid = $_SESSION['userID'];
        //inserting offences to offences table and incidences table
        $sql = "INSERT INTO `incidences` (`offenceID`, `userID`,`numPlate`, `location`,`recDate`)
               SELECT offences.`offenceID`,$oid,'$numplate','MOI','$date' FROM offences  WHERE  NOT EXISTS( SELECT 
            incidences.`offenceID` FROM  incidences  WHERE incidences.`offenceID` = `offences`.`offenceID` );";
            //checks if the insertion has performed successfully
            if (mysqli_query($link, $sql)) {
              //sum the total ofences for that driver
                $sql2 = "SELECT SUM(ot.value) offenceCount FROM offences off 
INNER JOIN drivers d ON d.driverID = off.driverID
INNER JOIN offence_types ot ON off.offenceType=ot.otID
WHERE d.driverID = '$id' ";
            //assign the total sum to $summ variable
          $summ = mysqli_query($link, $sql2);
          $result = mysqli_fetch_assoc($summ);
          $base = $result['offenceCount'];
          //updates the offenceCount of that driver
          $sql3 = "UPDATE drivers SET offenceCount = '$base'  WHERE driverID = '$id'";
          if(mysqli_query($link, $sql3)){
            //updates the status to suspended if condition is met
            $sql4 = "UPDATE drivers SET status = '1' WHERE offenceCount > '12'";
           if(mysqli_query($link, $sql4)){
            $sql5 = "INSERT INTO suspended_licences(driverID, suspendedDate, activatedDate)
                 VALUES ('$id', '$date', DATE_ADD(suspendedDate, INTERVAL 90 DAY))";
            mysqli_query($link, $sql5);
           }
                header('location:viewdriver.php?pid='.$id.'&success=1');

            }
          }

       
    } else {
        echo "Error: " . $sql . "<br>" . $link->error;
    }
     
  
    }?>
<body class="h-100">


    <div class="container-fluid">
        
        <div class="row">
            
 <?php include '../includes/sidenav.php'; ?>
            <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
                


                <div class="main-content-container container-fluid  px-4">
                    <!-- Page Header -->
                    <div class="page-header row no-gutters py-4">
                        <div class="col-12 col-sm-4 text mb-0">
                            <span class="text-uppercase page-subtitle">Overview</span>
                            <h3 class="page-title">Record Offence</h3>
                        </div>
                       
                    </div>
                    <!-- End Page Header -->
                    <!-- Default Light Table -->
                    <div class="row">

                        <div class="col-lg-10 offset-md-1">
                            <div class="card card-small mb-4">
                                <div class="card-header border-bottom">
                                    <h6 class="m-0">Account Details</h6>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item p-3">
                                        <div class="row">
                                            <div class="col">
                                                                                       <form role="form" method="POST">

                                            <div class="form-group">
                                                <label for="comment"><b>Select an offense</b></label><br>

                                                <select name="offense[]" class="custom-select" multiple="multiple">
                                                    <?php include 'offence_types.php'; ?>
                                                </select>
                                            </div>

                                            <!-- Initialize the plugin: -->
                                            <script type="text/javascript">
                                                $(document).ready(function() {
                                                    $('.custom-select').multiselect();
                                                });

                                            </script>

                                            <div class="form-group">
                                                <label for="comment"><b>Number Plate</b></label>
                                                <input type="text" class="form-control" placeholder="KAP-506Z" name="numplate">
                                            </div>
                                            <script type="text/javascript">
                                                $(document).ready(function() {



                                                    $("#numplate").inputmask("aaa-999a"); //static mask

                                                });

                                            </script>

                                            <div class="form-group">
                                                <label for="comment"><b>Offence Description:</b></label>
                                                <textarea class="form-control" rows="5" name="description"></textarea>
                                            </div>
                                            <input type="submit" class="btn btn-block" name="submit" value="Submit">

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