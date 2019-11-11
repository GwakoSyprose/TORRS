
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>TORS</title>

  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Fira+Sans|Roboto:300,400|Questrial|Satisfy">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 
</head>  
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60" >
  
  
  </div>
  
  <section id="contact" class="section-padding wow fadeIn delay-05s">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="contact-sec text-center">
            <h2>Enter your new password to login</h2>
            <p>Send email</p>
          </div>
        </div>

        <div class="col-md-8 col-md-push-2">

<?php
include('includes/connection.php');
$error= "";
if (isset($_GET["key"]) && isset($_GET["email"])
&& isset($_GET["action"]) && ($_GET["action"]=="reset")
&& !isset($_POST["action"])){
$key = $_GET["key"];
$email = $_GET["email"];
$curDate = date("Y-m-d H:i:s");
$query = mysqli_query($link,"
SELECT * FROM `password_reset_temp` WHERE `key`='".$key."' and `email`='".$email."';");
$row = mysqli_num_rows($query);
if ($row==""){
$error .= '<h2>Invalid Link</h2>
<p>The link is invalid/expired. Either you did not copy the correct link from the email, 
or you have already used the key in which case it is deactivated.</p>
<p><a href="http://'.$_SERVER['SERVER_NAME'].':8080/TORS2/reset-password.php">Click here</a> to reset password.</p>';
  }else{
  $row = mysqli_fetch_assoc($query);
  $expDate = $row['expDate'];
  if ($expDate >= $curDate){
  ?>
    

          <form action="" method="post" name="update" class="contactForm">
           <input type="hidden" name="action" value="update" />
  <br /><br />
             <div class="form-group">
              <input type="password" class="form-control" name="pass1" id="pass1" placeholder="New password" data-msg="Please enter your password " required />
              <div class="validation"></div>
            </div>
            <div class="form-group">
              <input type="password" class="form-control" name="pass2" id="pass2" placeholder="Confirm password" data-msg="Please enter confirm password" />
              <div class="validation"></div>
            </div>
            <input type="hidden" name="email" value="<?php echo $email;?>"/>
             
            <div class="text-center"><button type="submit" id="reset" class="btn btn-primary btn-lg">Reset Password</button>
              </div>
              
          </form>
<?php
}else{
$error .= "<h2>Link Expired</h2>
<p>The link is expired. You are trying to use the expired link which as valid only 24 hours (1 days after request).<br /><br /></p>";
        }
    }
if($error!=""){
  echo "<div class='alert alert-danger'>".$error."</div><br />";
  }     
} // isset email key validate end


if(isset($_POST["email"]) && isset($_POST["action"]) && ($_POST["action"]=="update")){
$error="";
<<<<<<< HEAD
$pass1 = mysqli_real_escape_string($link,$_POST["pass1"]);
$pass2 = mysqli_real_escape_string($link,$_POST["pass2"]);
$email = $_POST["email"];
$curDate = date("Y-m-d H:i:s");
=======
$mail = $_POST["email"];
$pass1 = mysqli_real_escape_string($link,$_POST["pass1"]);
$pass2 = mysqli_real_escape_string($link,$_POST["pass2"]);
$email = $_POST["email"];

>>>>>>> origin/master
if ($pass1!=$pass2){
    $error .= "<p>Password do not match, both password should be same.<br /><br /></p>";
    }
  if($error!=""){
    echo "<div class='error'>".$error."</div><br />";
    }else{
<<<<<<< HEAD

$pass1 = md5($pass1);
$hashedPass1 = password_hash($pass1, PASSWORD_DEFAULT);
mysqli_query($link,
"UPDATE `users` SET `password`='".$hashedPass1."' WHERE `email`='".$email."';"); 

mysqli_query($link, "DELETE FROM `password_reset_temp` WHERE `email`='".$email."';");   
  
echo '<div class="alert alert-success"><p>Congratulations! Your password has been updated successfully.</p>
<p><a href="http://'.$_SERVER['SERVER_NAME'].':8080/TORS2/index.php">Click here</a> to Login.</p></div><br />';
=======
$hashedPass1 = password_hash($pass1, PASSWORD_DEFAULT);
$sql = "UPDATE `users` SET `password`='".$hashedPass1."' WHERE `email`='".$mail."';";

//mysqli_query($link,$sql); 
if ($link->query($sql) === TRUE) {
  
} else {
  echo "Error updating record: " . $link->error;
}


mysqli_query($link, "DELETE FROM `password_reset_temp` WHERE `email`='".$mail."';");   
  
echo '<div class="alert alert-success"><p>Congratulations! Your password has been updated successfully.</p>
<p><a href="http://'.$_SERVER['SERVER_NAME'].':8080/TORS/index.php">Click here</a> to Login.</p></div><br />';

>>>>>>> origin/master
    }   
}
?>

 
        </div>

      </div>
    </div>
  </section>
 

  <script src="js/jquery.min.js"></script>
  <script src="js/jquery.easing.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/custom.js"></script>
</body>

</html>