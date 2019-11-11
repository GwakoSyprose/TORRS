<?php 
    include $_SERVER['DOCUMENT_ROOT'] . '/TORS/includes/connection.php'; 

    include $_SERVER['DOCUMENT_ROOT'] . '/TORS/includes/adminsidenav.php';

    include $_SERVER['DOCUMENT_ROOT'] . '/TORS/includes/head.php'; 
    require '../checkadmin.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/TORS/includes/navbar.php';

$sql="SELECT * FROM offence_categories;";
$result= $link->query($sql);
$category= '';

if (isset ($_POST['submitCat'])) {

   $oCat = mysqli_real_escape_string($link, $_POST['oCategory']);
  
 
  //Error Handlers
   //Check for empty fields

   if(empty($oCat))
 {

    header("Location: addoffence.php?addnewuser=empty");
    exit();

   } else {
    //check if user is taken
    $sql = "SELECT * FROM offence_categories WHERE catName = '$oCat'";
    $result = mysqli_query($link, $sql);
    $resultCheck = mysqli_num_rows($result);

    if($resultCheck > 0) {
     echo "<script>";
          echo "swal('Ooops..!', 'Offence category already exists!', 'error')";
          echo "</script>" . mysqli_error($link);

    } else {
      
      //Insert user into the database
      $sql = "INSERT INTO offence_categories (catName) VALUES ('$oCat')";
      mysqli_query($link, $sql);

      echo "<script>";
          echo "swal('Good job!', 'Offence category added successfully', 'success')";
          echo "</script>";


     

    }

}
} 

if (isset ($_POST['submitType'])) {

   $oType = mysqli_real_escape_string($link, $_POST['oType']);
   $category = mysqli_real_escape_string($link, $_POST['category']);
   $oValue= mysqli_real_escape_string($link, $_POST['oValue']);
  
 
  //Error Handlers
   //Check for empty fields

   if(empty($oType) || empty($category) || empty($oValue))
 {

   echo "empty";
    exit();

   } else {
    //check if user is taken
    $sql = "SELECT * FROM offence_types WHERE offenceName = '$oType'";
    $result2 = mysqli_query($link, $sql);
    $resultCheck2 = mysqli_num_rows($result2);

    if($resultCheck2 > 0) {
     echo "<script>";
          echo "swal('Ooops..!', 'Offence category already exists!', 'error')";
          echo "</script>" . mysqli_error($link);

    } else {
      
      //Insert user into the database
      $sql = "INSERT INTO offence_types (categoryID, offenceName, value) VALUES ('$category','$oType','$oValue')";
      mysqli_query($link, $sql);
      echo "<script>";
          echo "swal('Good job!', 'Offence type added successfully', 'success')";
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
                           
                            <h3 class="page-title">New Offence Category</h3>
                        </div>
                    </div>
                    <!-- End Page Header -->
                   
                    <div class="row">
                    	 <!-- new category -->
                        <div class="col-lg-10 offset-md-1 ">
                            <div class="card card-small mb-4">
                                <div class="card-header border-bottom">
                                    <h6 class="m-0">New Offence Category</h6>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item p-3">
                                        <div class="row">
                                            <div class="col">
                                                <form action="addoffence.php" method="post">
                                                    <div class="form-row">
                                                        
                                                        <div class="form-group col-md-12">
                                                            <label for="Name">Offence Category</label>
                                                            <input type="text" class="form-control" name="oCategory" placeholder="Offence Category" required> </div>
                                                       
                                                    </div>
                                                    <button type="submit" name="submitCat" value="sign up!" class="btn btn-success">Add</button>
                                                </form>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- end new category -->
                        <!-- new offence -->
                         <div class="col-lg-10 offset-md-1 ">
                            <div class="card card-small mb-4">
                                <div class="card-header border-bottom">
                                    <h6 class="m-0">New Offence Type</h6>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item p-3">
                                        <div class="row">
                                            <div class="col">
                                                <form action="addoffence.php" method="post">
                                                    <div class="form-row">
                                                        
                                                      
                                                        <div class="form-group col-md-6">
                                                            <label for="Rank">Offence Category</label>

                                                            <select id="Type" class="form-control" name="category" required>
                                                                <option value="" disabled selected>Select Category</option>
                                                               <?php while($category=mysqli_fetch_assoc($result)): ?>
																<option value="<?=$category['ocID'];?>"> <?=$category['catName'];?></option>
																<?php endwhile; ?>

                                                            </select>

                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label for="otype">Offence Type</label>
                                                            <input type="text" class="form-control" name="oType" placeholder="offence name" required> </div>
                                                          <div class="form-group col-md-12">
                                                            <label for="ovalue">Offence Value</label>
                                                            <input type="number" class="form-control" name="oValue" placeholder="offence value" required> </div>
                                                       
                                                    </div>
                                                    <button type="submit" name="submitType" value="sign up!" class="btn btn-success">Add</button>
                                                </form>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                         <!-- end new offence -->
                    </div>
                    <!-- End Default Light Table -->
                </div>

               
                <?php 
    include $_SERVER['DOCUMENT_ROOT'] . '/TORS/includes/footer.php'; 
   
    ?>
