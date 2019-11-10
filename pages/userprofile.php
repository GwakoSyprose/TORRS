<?php include $_SERVER['DOCUMENT_ROOT'] . '/TORS/includes/head.php';

      include $_SERVER['DOCUMENT_ROOT'] . '/TORS/includes/connection.php';


$id = $_SESSION['userID'];
if(isset($_POST['submit'])){
     $password2 = mysqli_real_escape_string($link, $_POST['password2']);
    
     $hashedPwd2 = password_hash($password2, PASSWORD_DEFAULT);
   $query= "UPDATE users SET password='$hashedPwd2' WHERE userID = $id";
    mysqli_query($link, $query);
    
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
                <div class="alert alert-success alert-dismissible fade show mb-0 col-md-6" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <i class="fa fa-times mx-2"></i>
                    <strong>Success!</strong> Your profile has been updated! </div>
                <div class="main-content-container container-fluid px-4">
                    <!-- Page Header -->
                    <div class="page-header row no-gutters py-4">
                        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                            <span class="text-uppercase page-subtitle">Overview</span>
                            <h3 class="page-title">User Profile</h3>
                        </div>
                    </div>
                    <!-- End Page Header -->
                    <!-- Default Light Table -->
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card card-small mb-4 pt-3">
                                <div class="card-header border-bottom text-center">
                                    <div class="mb-3 mx-auto">
                                        <img class="rounded-circle" src="images/cop.png" alt="User Avatar" width="110"> </div>
                                    <h4 class="mb-0">Sabeti Chebet</h4>
                                    <span class="text-muted d-block mb-2">Project Manager</span>
                                    <button type="button" class="mb-2 btn btn-sm btn-pill btn-outline-primary mr-2">
                                        <i class="material-icons mr-1">person_add</i>Follow</button>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item px-4">
                                        <div class="progress-wrapper">
                                            <strong class="text-muted d-block mb-2">Workload</strong>
                                            <div class="progress progress-sm">
                                                <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="74" aria-valuemin="0" aria-valuemax="100" style="width: 74%;">
                                                    <span class="progress-value">74%</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item p-4">
                                        <strong class="text-muted d-block mb-2">Description</strong>
                                        <span>Description goes here</span>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-8">
                            <div class="card card-small mb-4">
                                <div class="card-header border-bottom">
                                    <h6 class="m-0">Update Password</h6>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item p-3">
                                        <div class="row">
                                            <div class="col">
                                                <form method="post" id="passwordForm">

                                                    <div class="form-group col-md-12">
                                                        <label for="Password">New Password</label>
                                                        <input type="password" class="form-control" id="password1" name="password1" placeholder="" autocomplete="off"> </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <small><i class="fa fa-times" style="font-size:13px;color:red" id="8char"></i> 8 Characters Long <br></small>
                                                            <small><i class="fa fa-times" style="font-size:13px;color:red" id="ucase"></i> One Uppercase Letter</small>
                                                        </div>
                                                        <div class="col-sm-6">
                                                           <small> <i class="fa fa-times" style="font-size:13px;color:red" id="lcase"></i> One Lowercase Letter<br></small>
                                                            <small><i class="fa fa-times" style="font-size:13px;color:red" id="num"></i> One Number</small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label for="Password2">Repeat Password</label>
                                                        <input type="password" class="form-control" id="password2" name="password2" placeholder="" autocomplete="off"></div>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                           <small><i class="fa fa-times" style="font-size:13px;color:red" id="pwmatch"></i> Passwords Match</small> 
                                                        </div>
                                                    </div>

                                                    <div><button type="submit" name="submit" class="btn btn-accent" data-loading-text="Changing Password...">Update Password</button></div>

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
                <script>
                   $("input[type=password]").keyup(function(){
    var ucase = new RegExp("[A-Z]+");
    var lcase = new RegExp("[a-z]+");
    var num = new RegExp("[0-9]+");
    
    if($("#password1").val().length >= 8){
        $("#8char").removeClass("fa fa-times ");
        $("#8char").addClass("fa fa-check");
        $("#8char").css("color","#00A41E");
    }else{
        $("#8char").removeClass("fa fa-check");
        $("#8char").addClass("fa fa-times ");
        $("#8char").css("color","#FF0004");
    }
    
    if(ucase.test($("#password1").val())){
        $("#ucase").removeClass("fa fa-times ");
        $("#ucase").addClass("fa fa-check");
        $("#ucase").css("color","#00A41E");
    }else{
        $("#ucase").removeClass("fa fa-check");
        $("#ucase").addClass("fa fa-times ");
        $("#ucase").css("color","#FF0004");
    }
    
    if(lcase.test($("#password1").val())){
        $("#lcase").removeClass("fa fa-times ");
        $("#lcase").addClass("fa fa-check");
        $("#lcase").css("color","#00A41E");
    }else{
        $("#lcase").removeClass("fa fa-check");
        $("#lcase").addClass("fa fa-times ");
        $("#lcase").css("color","#FF0004");
    }
    
    if(num.test($("#password1").val())){
        $("#num").removeClass("fa fa-times ");
        $("#num").addClass("fa fa-check");
        $("#num").css("color","#00A41E");
    }else{
        $("#num").removeClass("fa fa-check");
        $("#num").addClass("fa fa-times ");
        $("#num").css("color","#FF0004");
    }
    
    if($("#password1").val() == $("#password2").val()){
        $("#pwmatch").removeClass("fa fa-times ");
        $("#pwmatch").addClass("fa fa-check");
        $("#pwmatch").css("color","#00A41E");
    }else{
        $("#pwmatch").removeClass("fa fa-check");
        $("#pwmatch").addClass("fa fa-times ");
        $("#pwmatch").css("color","#FF0004");
    }
});

                </script>
                <?php 
    include $_SERVER['DOCUMENT_ROOT'] . '/TORS/includes/footer.php'; 
   
    ?>
