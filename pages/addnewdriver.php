<?php 
    include $_SERVER['DOCUMENT_ROOT'] . '/TORS/includes/connection.php'; 

    

    include $_SERVER['DOCUMENT_ROOT'] . '/TORS/includes/head.php'; 
    

//session_start();
 $error = "";


if(array_key_exists("submit" , $_POST)) {

  

   $link = mysqli_connect('localhost','root','','tobs');

   if(mysqli_connect_error()) {

    die ("Database Connection Error!");
   }
    // Escape user inputs for security
    if(isset($_POST["submit"])) {
        
    
            $file = $_FILES['profile'];
    
    $fileName = $_FILES['profile']['name'];
    $fileTmpName = $_FILES['profile']['tmp_name'];
    $fileSize = $_FILES['profile']['size'];
    $fileError = $_FILES['profile']['error'];
    $fileType = $_FILES['profile']['type'];
    
    $fileExt = explode('.',$fileName);
    $fileActualExt = strtolower(end($fileExt));
    
    $allowed= array('jpg', 'jpeg', 'png');
    
    if(in_array($fileActualExt, $allowed)){
        if($fileError === 0){
            if($fileSize< 2000000){
                //giving the image a unique name
                //$fileNameNew = uniqid('', true).".".$fileActualExt;
                $fileDestination= '../pages/images/'.$fileName;
                move_uploaded_file($fileTmpName, $fileDestination);
            }else{
                echo "Your file is too big";
            }
            
        }else{
            echo "There was an error in uploading your file";
        }
        
        
    }else{
        echo "You cannot upload files of this type";
    }
        
      $driverID = mysqli_real_escape_string($link, $_POST['driverID']);
    //$password = mysqli_real_escape_string($link, $_POST['password']);
    $fname = mysqli_real_escape_string($link, $_POST['fname']);
      $lname = mysqli_real_escape_string($link, $_POST['lname']);
    $licence = mysqli_real_escape_string($link, $_POST['licence']);
    
    $type = mysqli_real_escape_string($link, $_POST['type']);
    
    $profile = $_FILES['profile']['name'];
    $date = mysqli_real_escape_string($link, $_POST['date']);
    

    }


     

         $query = "INSERT INTO drivers(`driverID`, `dfname`,`dlname`, `licence`, `typeID`, `offenceCount`, `profileImage`,`regDate`)
            VALUES ('$driverID', '$fname', '$lname','$licence', '$type', '0','$profile',  '$date')";
       

       
         
if(!mysqli_query($link, $query)) {
                 echo "<script>";
          echo "swal('Ooops..!', 'Something went wrong,Could not register driver!', 'error')";
          echo "</script>" . mysqli_error($link);
  

           } else { 

            mysqli_query($link, $query);
           echo "<script>";
          echo "swal('Good job!', 'Driver registered successfully', 'success')";
          echo "</script>";
}
             
           }
       
    
   


    ?>

<body class="h-100">


    <div class="container-fluid">
        <div class="row">

            <main class="main-content col-lg-12">
                


                <div class="main-content-container container-fluid  px-4">
                    <!-- Page Header -->
                    <div class="page-header row no-gutters py-4">
                        <div class="col-12 col-sm-4 text mb-0">
                            <span class="text-uppercase page-subtitle">Overview</span>
                            <h3 class="page-title">Driver Registration</h3>
                        </div>
                        <?php echo $error; ?>
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
                                                <form method="post" action="addnewdriver.php" enctype="multipart/form-data">
                                                    <div class="form-row">
                                                         <div class="form-group col-md-12">
                                                        <label for="ID">National ID</label>
                                                        <input type="number" class="form-control" name="driverID" placeholder="National ID" required> </div>
                                                         <div class="form-group col-md-12">
                                                        <label for="Fname">First name</label>
                                                        <input type="text" class="form-control" name="fname" placeholder="First name" required> </div>
                                                        <div class="form-group col-md-12">
                                                        <label for="Lname">Last name</label>
                                                        <input type="text" class="form-control" name="lname" placeholder="Last name" required> </div>
                                                         <div class="form-group col-md-12">
                                                        <label for="licence">Licence</label>
                                <input type="text" class="form-control" name="licence" placeholder="licence" required> </div>
                                                     <div class="form-group col-md-12">
                                <label for="Type">Type</label>
                                                            <select name="type" class="form-control" id="Type" required >
                                                                 <option disabled selected>Select Type</option>
                                                                <?php 
                                                            require_once('../includes/connection.php');

                                                                $sql = "SELECT * FROM types;";
                                                                $result = $link->query($sql);

                                                                if ($result->num_rows > 0) {
                                                                    // output data of each row
                                                                    while($row = $result->fetch_assoc()) {
                                                                        echo  '<option value="'.$row["typeID"].'" >'.$row["typeName"].'</option>';
                                                                    }
                                                                } else {

                                                                }
                                                                ?>
		                                                          </select>

                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label for="Profile">Profile Picture</label>
                                                            <div class="input-group mb-3 ">
                                                                <div class="custom-file">
                                                                    <input type="file" class="custom-file-input" name="profile" id="Profile" required>
                                                                    <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02"></label>
                                                                </div>

                                                            </div>
                                                        </div>

                                                        

                                                           
                                                            <div class="form-group col-md-12">
                                                                <label for="Date">Date</label>
                                                                <input type="date" class="form-control" name="date" value="<?=(date('Y-m-d'))?>" required> </div>


                                                    
                                            




                                                    <button type="submit" name="submit" value=sign up! class="btn btn-accent">Register</button>
                                                    </div>
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
