
<?php
include('includes/connection.php');
$error = "";
if(isset($_POST["email"]) && (!empty($_POST["email"]))){
$email = $_POST["email"];
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
$email = filter_var($email, FILTER_VALIDATE_EMAIL);
if (!$email) {
    $error .="<p>Invalid email address please type a valid email address!</p>";
  }else{
  $sel_query = "SELECT * FROM `users` WHERE email='".$email."'";
  $results = mysqli_query($link,$sel_query);
  $row = mysqli_num_rows($results);
  if ($row==""){
    $error .= "<p>No user is registered with this email address!</p>";
    }
  }
  if($error!=""){
  echo "<div class='error'>".$error."</div>
  <br /><a href='javascript:history.go(-1)'>Go Back</a>";
    }else{
  $expFormat = mktime(date("H"), date("i"), date("s"), date("m")  , date("d")+1, date("Y"));
  $expDate = date("Y-m-d H:i:s",$expFormat);
  $key = md5($email);
  $addKey = substr(md5(uniqid(rand(),1)),3,10);
  $key = $key . $addKey;
  $url = 'http://'.$_SERVER['SERVER_NAME'].':8080/TORS/changepass.php?key='.$key.'&email='.$email.'&action=reset';
// Insert Temp Table
mysqli_query($link,
"INSERT INTO `password_reset_temp` (`email`, `key`, `expDate`)
VALUES ('".$email."', '".$key."', '".$expDate."');");

$output='<p>Dear user,</p>';
$output.='<p>Please click on the following link to reset your password.</p>';
$output.='<p>-------------------------------------------------------------</p>';
$output.='<p><a href='.$url.' target="_blank">'.$url.'</a></p>';    
$output.='<p>-------------------------------------------------------------</p>';
$output.='<p>Please be sure to copy the entire link into your browser.
The link will expire after 1 day for security reason.</p>';
$output.='<p>If you did not request this forgotten password email, no action 
is needed, your password will not be reset. However, you may want to log into 
your account and change your security password as someone may have guessed it.</p>';    
$output.='<p>Thanks,</p>';
$output.='<p>Traffic Offenders Registration System</p>';
$body = $output; 
$subject = "Password Recovery - TORS";

$email_to = $email;
$fromserver = "torsreply@gmail.com"; 
require("PHPMailer/PHPMailerAutoload.php");
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Host = "smtp.gmail.com"; // Enter your host here
$mail->SMTPAuth = true;
$mail->Username = "torsreply@gmail.com"; // Enter your email here
$mail->Password = "123@tors"; //Enter your passwrod here
$mail->Port = 25;
$mail->IsHTML(true);
$mail->From = "torsreply@gmail.com";
$mail->FromName = "Traffic Offenders Reg System";
$mail->Sender = $fromserver; // indicates ReturnPath header
$mail->Subject = $subject;
$mail->Body = $body;
$mail->AddAddress($email_to);
if(!$mail->Send()){
echo "Mailer Error: " . $mail->ErrorInfo;
}else{
echo "<div class='alert alert-success'>
<p>An email has been sent to you with instructions on how to reset your password.</p>
</div><br /><br /><br />";
  }

    }
     

}else{
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>TORS</title>

  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Fira+Sans|Roboto:300,400|Questrial|Satisfy">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/animate.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
  
</head>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60" >
  
  
  </div>
  
  <section id="contact" class="section-padding wow fadeIn delay-05s">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="contact-sec text-center">
            <h2>Having trouble logging in?</h2>
            <p>Send email</p>
          </div>
        </div>

        <div class="col-md-8 col-md-push-2">
         
          <form method="post" role="form" class="contactForm" name="reset">
           
             <div class="form-group">
              <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email address" data-msg="Please enter an email address" />
              <div class="validation"></div>
            </div>
             
            <div class="text-center"><button type="submit" id="notSubmit" name="reset-request-submit" class="btn btn-primary btn-lg">Receive new password by email</button>
              </div>
              
          </form>
       
        </div>

      </div>
    </div>
  </section>
  <?php } ?>
 

  <script src="js/jquery.min.js"></script>
  <script src="js/jquery.easing.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/custom.js"></script>


</body>

</html>
