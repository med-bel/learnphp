<?php
  
  include("connect.php");
  session_start();
  if(isset($_SESSION['logged_in'])){
		header('location:admin.php');
	}


?>
<?php


  if($_SERVER['REQUEST_METHOD'] === "POST"){

    if($_REQUEST['username'] && $_REQUEST['email'] && $_REQUEST['password'] && $_REQUEST['re_password']){
        $username     = $_POST['username'];
        $email        = $_POST['email'];
        $password     = $_POST['password'];
        $re_password  = $_POST['re_password'];
        if(!empty($username) && !empty($email) && !empty($password) && !empty($re_password)){
          if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $messageError = "Email Not Valid ! Please Enter Valid Email";
          }elseif(!preg_match('/^[a-zA-Z0-9_-]{4,16}$/',$username)){
            $messageError = "Invalid Username ! Please Enter Valid Username must not be grater than 16 chars. exmpl :{johanbob , johan-bob,johan_bob}";
          }elseif(!preg_match('/^[a-zA-Z0-9_-]{4,32}$/',$password)){
            $messageError = "Invalid Password ! Please Enter Valid Password must not be grater than 32 chars.";
          }elseif(!preg_match('/^[a-zA-Z0-9_-]{4,32}$/',$re_password)){
            $messageError = "Invalid Re-Password ! Please Enter Valid Re-Password must not be grater than 32 chars.";
          }elseif($password !== $re_password){
            $messageError = "The Re-Password Not Match The Password !";
          }else{
            $sql = 'SELECT user_pass FROM users WHERE user_name="'.$username.'" OR user_mail="'.$email.'"';
            
            $result = $conn->query($sql);
            if($result->num_rows > 0){
              $messageError = "Email Or Username Already Register ! Try To <a href='index.php'>Login</a>";
            }else{

              $sql = "INSERT INTO users(user_name,user_mail,user_pass)VALUES(?,?,?)";
              $command = $conn->prepare($sql);
              $command->bind_param('sss',$userName,$userMail,$userPass);
              $userName = $username;
              $userMail = $email;
              $userPass = md5($password);
              $command->execute();
            
              $messageSuccess = "Resgister Successfully!Wait We Will Redirect You To Login";

              echo "<script>setTimeout(function () {
                    window.location.href= 'index.php';
                 },3000);</script>";


            }
            
          }
          
        }else{
          $messageError = "Some Fields Is Empty";
        }
    }else{
      $messageError = "Data Missing! Check Fields";
    }

  }


?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Registration</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
  </head>
  <body>

  <div class="main">
    <div class="item">
      <div class="content">
        <form action="" class="form-horizontal" method="POST">
          <div class="logo"><img src="./images/user1.png"></div>
          <?php
              if(isset($messageError) ){
                echo "<div class=\"alert alert-danger\" role=\"alert\">";
                echo "<p class=\"mb-0\">".$messageError."</p>";
                echo "</div>";
              }
              if( isset($messageSuccess)){
                echo "<div class=\"alert alert-success\" role=\"alert\">";
                echo "<p class=\"mb-0\">".$messageSuccess."</p>";
                echo "</div>";
              }
          ?>
          <div class="input-group lg">
            <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
            <input type="text" name="username" value ="<?php echo isset($username)?$username:null ?>" class="form-control" placeholder="Username" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'" required>
          </div>
        
          <div class="input-group lg">
            <span class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i></span>
            <input type="email" name="email" value ="<?php echo isset($email)?$email:null ?>" class="form-control" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'" required>
          </div> 

      

          <div class="input-group lg">
            <span class="input-group-addon"><i class="fa fa-lock" aria-hidden="true"></i></span>
            <input type="password" name="password" class="form-control" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'" required>
          </div>  

          <div class="input-group lg">
            <span class="input-group-addon"><i class="fa fa-lock" aria-hidden="true"></i></span>
            <input type="password" name="re_password" class="form-control" placeholder="Confirm Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Confirm Password'" required>
          </div>  
          <div class="form-group in">
          <input type="submit" name="reg" class="btn btn-info btn-block" value="SIGN UP"><br>
          <button type="button" name="back" class="btn btn-danger btn-block" id="back"><a href="index.php">BACK TO LOGIN</a></button>
          <!-- <input type="button"  class="btn btn-info btn-block" value=""> -->
          </div>
        </form>
      </div>
    </div>
  </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
<?php

$conn->close();
?>