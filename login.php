
<?php 
	session_start();
	include('connect.php');

	if(isset($_SESSION['logged_in'])){
		header('location:admin.php');
	}
?>

<?php
	
	
			if(isset($_POST['login'])){
				$username=$_POST['username'];//username
				$userpass=$_POST['userpass'];//password
			
				if(isset($username)  && isset($userpass)){//Check If Data Is wrote By Client
				
					if(! empty($username) && !empty($userpass)){//Check Value Of form isn't empty
					$sql= "select * from users where name='$username' and password='$userpass'" ;//I Change Table Name From signdata To Users
					$result = mysqli_query($connect,$sql);
				
					$row=mysqli_num_rows($result);
					if($row==1){
						$_SESSION['logged_in'] = True;
						$_SESSION['username'] = $username;
						header("location: admin.php");
					}else{
						$message = "Invalid username/password";
					}}else{
						$message = "Messing Data!";
					}
			}
		}
	
	?>


<!DOCTYPE html>
<html>
<head>
	<title>login</title>
	<link rel="icon" type="icon" href="style/img/icon.png">
	<link rel="stylesheet" type="text/css" href="style/style.css">
	<link href="https://fonts.googleapis.com/css?family=Indie+Flower&display=swap" rel="stylesheet">

</head>
<body>	
	<div id="loginbox">
		<div id="logo">
			
		<div id="logotext">
			<span id="m1">W</span><span id="m2">e</span><span id="m3">l</span><span id="m4">c</span><span id="m5">o</span><span id="m6">m</span><span id="m7">e</span>

		</div>	
		<img src="style/img/logo1.png" alt="please wait your connection is so slow" title="welcome" >			
	</div>
		<?php 

			if(isset($message)){
				echo "<p style='color:red;'>". $message. "</p>";
			}
		?>
	<form action="" method="POST">
		<input type="text" name="username" placeholder="username" class="login">
		<br>
		<input type="password" name="userpass" placeholder="password" class="login">
		<br>
        <input type="submit" name="login" id="btmlogin" value="login">	
</form>
<a class="link" href="https://medsitetest.000webhostapp.com/forgotpass.html">Forgot password?</a>
<br>
<span  >Don't have an account?</span> <a class="link" href="https://medsitetest.000webhostapp.com/signup.html">Sign up</a>
</div>
</body>
</html>



<?php

	mysqli_close($connect);

?>