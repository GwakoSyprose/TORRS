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
     
  
    }
 function fetch_data()  {
        
        include('../includes/connection.php');
        $output="";
     $id = $_GET['pid'];
        
     
        $query= "SELECT * FROM drivers WHERE driverID=$id";
        
        $result= mysqli_query($link, $query);

	while($row=mysqli_fetch_array($result))
      {       
      $output .= '<tr>

                        <td class="font-weight-bold">First Name</td>
                        
                        
                        <td>'.$row['dfname'].' '.$row['dlname'].'</td>



</tr>

<tr >

    <td class="font-weight-bold">National ID</td>
    <td>'.$row["driverID"].'</td>

</tr>
<tr>

    <td class="font-weight-bold">License No</td>
    <td>'.$row["licence"].'</td>


</tr>
<tr>

    <td class="font-weight-bold">Status</td>
    <td>'.$row["status"].'</td>


</tr>
<tr>

    <td class="font-weight-bold">Type</td>
    <td>'.$row["typeID"].'</td>


</tr>
<tr>

    <td class="font-weight-bold">Offence Count</td>
    <td>'.$row["offenceCount"].'</td>


</tr>
<tr>

    <td class="font-weight-bold">Registration Date</td>
    <td>'.$row["regDate"].'</td>


</tr>  
                          ';  
      }  
      return $output;  
 }  
 if(isset($_POST["generate_pdf"]))  
 {  
      require_once('../TCPDF/tcpdf.php');  
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("Generate HTML Table Data To PDF From MySQL Database Using TCPDF In PHP");  
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      $obj_pdf->SetDefaultMonospacedFont('helvetica');  
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
      $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(TRUE, 10);  
      $obj_pdf->SetFont('helvetica', '', 11);  
      $obj_pdf->AddPage();  
      $content = '';  
      $content .= '
      
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example" style="font-size: 11px;left:40%; border-spacing: 5px;" align="left">
      
      ';  
      $content .= fetch_data();
     
      $content .= '</table>'; 
     
      $obj_pdf->writeHTML($content); 
     ob_end_clean();
      $obj_pdf->Output('file.pdf', 'I');  
 }  



?>

<body class="h-100">

    <div class="color-switcher-toggle animated pulse infinite">
        <i class="material-icons">settings</i>
    </div>
    <div class="container-fluid">
        <div class="row">
            <!-- Main Sidebar -->
            <?php include '../includes/sidenav.php'; ?>
            <!-- End Main Sidebar -->
            <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
                <div class="main-navbar sticky-top bg-white">
                    <!-- Main Navbar -->
                    <?php include '../includes/navbar.php'; ?>
                </div>
                <!-- / .main-navbar -->
                
                <div class="main-content-container container-fluid px-4">
                    <!-- Page Header -->
                    <div class="page-header row no-gutters py-4">
                        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                            <span class="text-uppercase page-subtitle">Overview</span>
                            <h3 class="page-title">Driver Details</h3>
                        </div>
                    </div>
                    <!-- End Page Header -->
                    <!-- Default Light Table -->
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card card-small mb-4 pt-3">
                                <div class="card-header border-bottom text-center">
                                    <h6 class="mb-0">Profile Picture</h6>
                                    <div class="mb-3 mx-auto">
                                        <?php
                                    
                                    echo "<img src='images/".$driver['profileImage']."' width=200 height=200 >";
                                    
                                     ?> </div>
                                    <div class="btn-group">
                                        <a class="nav-link">
                                            <button class="btn btn-sm btn-pill btn-outline-success col text-center " data-toggle="modal" data-target="#myModal">RECORD OFFENSE</button>
                                        </a>


                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item px-4">
                                            <div class="progress-wrapper">
                                                <strong class="text-muted d-block mb-2">Infringement rate</strong>
                                                <div class="progress progress-sm">
                                                    <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="74" aria-valuemin="0" aria-valuemax="100" style="width: 74%;">
                                                        <span class="progress-value">74%</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item p-4">
                                            <strong class="text-muted d-block mb-2">Description</strong>
                                            <span></span>
                                        </li>
                                    </ul>



                                </div>

                            </div>
                        </div>
                        <!--        modal-->
                        <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4><span class="glyphicon glyphicon-lock"></span> Record Offence</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                                    </div>
                                    <div class="modal-body">
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
                                            <input type="submit" class="btn btn-block" name="submit" value="submit">

                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal">
                                            <span class="glyphicon glyphicon-remove"></span> Cancel
                                        </button>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
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
                                                    <table class="table table-striped table-borderless">
                                                        <div class="col-md-12" align="right">
                                                            <form method="post">
                                                                <input type="submit" name="generate_pdf" class="btn btn-success" value="Generate PDF" />
                                                            </form>
                                                        </div>

                                                        <tbody>
                                                            <tr>

                                                                <td class="font-weight-bold">First Name</td>
                                                                <td><?= $driver['dfname']; ?> <?= $driver['dlname']; ?></td>



                                                            </tr>

                                                            <tr>

                                                                <td class="font-weight-bold">National ID</td>
                                                                <td><?= $driver['driverID']; ?></td>

                                                            </tr>
                                                            <tr>

                                                                <td class="font-weight-bold">License No</td>
                                                                <td><?= $driver['licence']; ?></td>


                                                            </tr>
                                                            <tr>

                                                                <td class="font-weight-bold">Status</td>
                                                                <td><?= ($driver['status'] == 0)? 'Active' : 'Suspended'; ?></td>


                                                            </tr>
                                                            <tr>

                                                                <td class="font-weight-bold">Type</td>
                                                                <td><?= $driver['typeID']; ?></td>


                                                            </tr>
                                                            <tr>

                                                                <td class="font-weight-bold">Offence Count</td>
                                                                <td><?= $driver['offenceCount']; ?></td>


                                                            </tr>
                                                            <tr>

                                                                <td class="font-weight-bold">Registration Date</td>
                                                                <td><?= $driver['regDate']; ?></td>


                                                            </tr>

                                                        </tbody>
                                                    </table>

                                                </ul>
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
