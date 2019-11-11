<?php
 require $_SERVER['DOCUMENT_ROOT'] . '/TORS/includes/connection.php';

session_start();
$userID_error = $pass_error = "";

// login form

if(isset($_POST['submit'])) {

  $userID = mysqli_real_escape_string($link, $_POST['userID']);
  $password = mysqli_real_escape_string($link, $_POST['password']);
  

//Error Handlers
  //Check if inputs are empty
  if (empty($userID) || empty($password)) {
    echo "empty";

  } else {
    $sql = "SELECT * FROM users WHERE userID = '$userID'";
    $result = mysqli_query($link, $sql);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck == 0) {
     echo '<div class="alert alert-danger alert-dismissable" id="flash-msg">
      <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
      <h4><i class="icon fa fa-times"></i>That National ID does not exist!</h4>
      </div>';

    } else {
      if($row = mysqli_fetch_assoc($result)) {
          //De-hashing the password!
        if(password_verify($password, $row['password'])){
    
                    $_SESSION['userID'] = $row['userID'];
                    $_SESSION['fname'] = $row['fname'];
                    $_SESSION['lname'] = $row['lname'];
                    $_SESSION['domain'] = $row['domain'];
                    $_SESSION['region'] = $row['region'];
             if( $_SESSION['domain'] == 1) {
                  header("Location: pages/adminhome.php?loggedIn=".$_SESSION['userID']);
             }elseif ($_SESSION['domain'] == 0)
             {
                  header("Location: pages/homepage.php?loggedIn=".$_SESSION['userID']);
                  
             }
        
        } else {
            
            echo '<div class="alert alert-danger alert-dismissable" id="flash-msg">
<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
<h4><i class="icon fa fa-times"></i>wrong password!</h4>
</div>';
echo mysqli_error($link);
             

        }
  
      }


  }

}
} 
// report form
if(isset($_POST['notSubmit'])){
    

    
    $numplate = mysqli_real_escape_string($link,$_POST['numplate']);
    $region  = mysqli_real_escape_string($link,$_POST['region']);
    $phoneno  = mysqli_real_escape_string($link,$_POST['phoneno']);
    $description = mysqli_real_escape_string($link,$_POST['description']);
    
    $sql = "INSERT INTO `notifications`( `numPlate`, `description`, `region`, `phone`) VALUES ('$numplate', '$description','$region','$phoneno')";

 
    mysqli_query($link, $sql);
  echo '<div class="alert alert-success alert-dismissable" id="flash-msg">
<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
<h4><i class="icon fa fa-check"></i>Incident Reported successfully!</h4>
</div>';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TORS</title>

    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Fira+Sans|Roboto:300,400|Questrial|Satisfy">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/animate.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


</head>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
    <div class="header">
        <div class="bg-color">
            <header id="main-header">
                <nav class="navbar navbar-default navbar-fixed-top">
                    <div class="container">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#lauraMenu">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="#">TORS</a>
                        </div>
                        <div class="collapse navbar-collapse" id="lauraMenu">
                            <ul class="nav navbar-nav navbar-right navbar-border">
                                <li class="active"><a href="#main-header">Home</a></li>
                                <li><a href="#contact">Report an Incident</a></li>
                                <li><a href="pages/addnewdriver.php">Driver Registration</a></li>
                                <li><a href="" data-toggle="modal" data-target="#myModal">Login</a></li>
                            </ul>

                            <!-- Sign In Modal-->

                            <div id="myModal" class="modal fade" role="dialog">
                                <div class="modal-dialog modal-login">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Sign In</h4>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-hidden="true">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post"
                                                action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                                <div class="form-group">
                                                    <!-- <div class="form-control">
            <?php echo $userID_error; ?>    
        </div> -->
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i
                                                                class="fa fa-user"></i></span>
                                                        <input type="text" class="form-control" name="userID"
                                                            placeholder="National ID" required="required">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <!--  <div class="form-control">
            <?php echo $pass_error; ?>    
        </div> -->
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i
                                                                class="fa fa-lock"></i></span>
                                                        <input type="password" class="form-control" name="password"
                                                            placeholder="Password" required="required">
                                                    </div>
                                                </div>
                                                <div class="form-group">

                                                    <input type="submit" class="btn btn-primary btn-block btn-md"
                                                        name="submit" value="Log In">

                                                </div>
                                                <p class="hint-text"><a href="reset-password.php">Forgot Password?</a>
                                                </p>
                                            </form>
                                            <!--  here we create the form which starts the password recovery -->

                                        </div>

                                        <div class="modal-footer">Don't have an account? <a href="#">Contact Admin</a>
                                        </div>


                                    </div>
                                </div>
                            </div>
                            <!-- End Sign In Modal-->

                        </div>
                    </div>
                </nav>
            </header>
            <div class="wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 wow fadeIn delay-05s">
                            <div class="banner-text">

                                <p>Traffic Offenders Registration <br>System </p>
                                <h2> <span>Making our roads safer</span></h2>
                            </div>
                            <div class="overlay-detail text-center">
                                <a href="#contact"><i class="fa fa-angle-down"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section id="contact" class="section-padding wow fadeIn delay-05s">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="contact-sec text-center">
                        <h2>Witnessed an incident/accident on the road?</h2>
                        <p>Report to us</p>
                    </div>
                </div>

                <div class="col-md-8 col-md-push-2">

                    <div id="sendmessage">
                        <? php echo $message ?>
                    </div>
                    <!--          <div id="errormessage"></div>-->
                    <form action="index.php" method="post" role="form" class="contactForm">

                        <div class="form-group">
                            <input type="type" class="form-control" name="numplate" id="numplate"
                                placeholder="Number plate" data-msg="Please enter a number plate" />
                            <div class="validation"></div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="region" id="numplate"
                                placeholder="Location of the incident" data-msg="Please enter a number plate" />
                            <div class="validation"></div>
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" name="phoneno" id="phoneno" placeholder="Phone No"
                                data-msg="Please enter a number plate" />
                            <div class="validation"></div>
                        </div>

                        <div class="form-group">
                            <textarea class="form-control" name="description" id="description" rows="5"
                                data-rule="required" data-msg="Please give a brief description of the incident"
                                placeholder="Description of the incident"></textarea>
                            <div class="validation"></div>
                        </div>


                        <div class="text-center"><button type="submit" id="notSubmit" name="notSubmit"
                                class="btn btn-primary btn-lg">Report</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </section>
    <?php include 'includes/footer.php' ?>

    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.bxslider.min.js"></script>
    <script src="js/wow.js"></script>
    <script src="js/custom.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $("#flash-msg").delay(2000).fadeOut("slow");
    });
    </script>

</body>

</html>