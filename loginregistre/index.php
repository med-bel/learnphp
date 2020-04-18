<?php
include("connect.php");

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
 <?php

 ?>
  <?php
  $okay="";
  if(isset($_POST['submit'])){
$username=$_POST['username'];
$password=$_POST['password'];
$username=filtern1($username);

if(!empty($username) && !empty($password) ) {
  header("location: admin.php");
}
else{
  $okay="pleas enter user and pass ";}

  if(!empty($username) || !empty($password)){
    if(!empty($username) ){
          
    } else{
          $okay="pleas enter user ";
        }
        if(!empty($password) ){
        } else{
          $okay="pleas enter pass ";
        }
      
      }
    }

  
 function filtern1($data){
$data=trim($data);
$data=stripcslashes($data);
$data=htmlspecialchars($data);
return $data;
 }





?>
  <div class="main">

    <div class="item">
      <div class="content">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="form-horizontal" method="POST">
          <div class="logo"><img src="./images/user1.png"></div>
          
          <div class="input-group lg">
            <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
            <input type="text" name="username" class="form-control" placeholder="Username" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'">
          </div>

          <div class="input-group lg">
            <span class="input-group-addon"><i class="fa fa-lock" aria-hidden="true"></i></span>
            <input type="password" name="password" class="form-control" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
          </div>  
 <span style="color:red;"><?php echo $okay ?></span>
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

mysqli_close($connect);
?>