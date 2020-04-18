<?php

  include("connect.php");//Connect To Database
  session_start();

  if(isset($_SESSION['logged_in'])){
		header('location:admin.php');
	}

?>


<?php 

    //Start Development The Project
 
    if($_SERVER['REQUEST_METHOD'] === "POST"){// Check Request Method 

        if($_REQUEST['username'] && $_REQUEST['password']){//Check If Form Complete

            $username = $_POST['username'];
            $password = $_POST['password'];

            if(empty($username) && empty($password)){
              $message = "Some Fields Is Empty Check It";
            }elseif(!preg_match('/^[a-zA-Z0-9_-]{4,16}$/',$username  )){
              $message = "Invalid Username ! Please Enter Valid Username must not be grater than 16 chars. exmpl :{johanbob , johan-bob,johan_bob}";
            }elseif(!preg_match('/^[a-zA-Z0-9_-]{4,16}$/',$password) ){
              $message = "Invalid Password ! Please Enter Valid Password must not be grater than 32 chars.";
            }else{
              $sql = 'SELECT user_id,user_name,user_mail,user_pass FROM users WHERE user_name="'.$username.'"';

              $check_user = $conn->query($sql);
              
              if($check_user->num_rows > 0){
                  $row = $check_user->fetch_assoc();
                  if($row['user_pass'] === md5($password)){
                    $_SESSION["logged_in"]  = True;
                    $_SESSION['userid']     = $row['user_id'];
                    $_SESSION['username']   = $row['user_name'];
                    $_SESSION['email']      =  $row['user_mail'];
                    header('location:admin.php');
                  }else{
                    $message = "Incorrect username/password";
                  }
              }else{
                $message = "username not register ! try to <a href='register.php'>Sign Up</a>";
              }
            }
          }else{
          $message = "Missing Data!";
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
    <title>Login</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
  </head>
  </head>
  <body>
  <div class="main">

    <div class="item">
      <div class="content">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="form-horizontal" method="POST">
          <div class="logo"><img src="./images/user1.png"></div>
          
          <?php
              if(isset($message)){
                echo "<div class=\"alert alert-danger\" role=\"alert\">";
                echo "<p class=\"mb-0\">".$message."</p>";
                echo "</div>";
              }
          ?>
          <div class="input-group lg">
            <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
            <input type="text" name="username" class="form-control" placeholder="Username" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'">
          </div>

          <div class="input-group lg">
            <span class="input-group-addon"><i class="fa fa-lock" aria-hidden="true"></i></span>
            <input type="password" name="password" class="form-control" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
          </div>  
          <div class="form-group in">
          <input type="submit" name="submit" class="btn btn-info btn-block" value="LOGIN"><br>
          <button type="button" name="signup" class="btn btn-success btn-block" id="back"><a href="register.php">SIGN UP</a></button>
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

  $conn->close();//Close Connection With Database

?>