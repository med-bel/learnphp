<!DOCTYPE html>
<html>
<head>
	<title>login</title>
	<link rel="icon" type="icon" href="style/img/icon.png">
	<link rel="stylesheet" type="text/css" href="style/style.css">
	<link href="https://fonts.googleapis.com/css?family=Indie+Flower&display=swap" rel="stylesheet">

</head>
<body>
    <?php
    include('connect.php');
	?>
	<?php
	
	$cconame = $_COOKIE['userid'];
	$sql3="select name from signdata where name='$cconame'";
	$result3 = mysqli_query($connect,$sql3);
	
	$row=mysqli_num_rows($result3);
	if($row==1){
	header("location: signup.php");
	
		}
		else{
			if(isset($_POST['login'])){
				$usrname=$_POST['usrname'];
			$usrpass=$_POST['usrpass'];
			
			$sql2="select * from signdata where name='$usrname' and PASSWORD='$usrpass'" ;
			$result2 = mysqli_query($connect,$sql2);
			
			$row=mysqli_num_rows($result2);
			if($row==1){
				$coname="userid";
				$covalue = $usrname;
				$coexp = time()+(60*24);
			setcookie($coname,$covalue,$coexp);
			header("location: signup.php");
			
				}
				else{
					echo"username or password incorect";
				}
			}
		}
	
	?>
	<?php 




?>
		
<div id="loginbox">
	<div id="logo">
			
<div id="logotext">
	<span id="m1">W</span><span id="m2">e</span><span id="m3">l</span><span id="m4">c</span><span id="m5">o</span><span id="m6">m</span><span id="m7">e</span>

</div>
<img src="style/img/logo1.png" alt="please wait your connection is so slow" title="welcome" >
			
		</div>
	<form action="" method="POST">
		<input type="text" name="usrname" placeholder="username" class="login">
		<br>
		<input type="password" name="usrpass" placeholder="********" class="login">
		<br>
        <input type="submit" name="login" id="btmlogin" value="login">	
</form>
<a class="link" href="https://medsitetest.000webhostapp.com/forgotpass.html">Forgot password?</a>
<br>
<span  >Don't have an account?</span> <a class="link" href="https://medsitetest.000webhostapp.com/signup.html">Sign up</a>
</div>



<?php
mysqli_close($connect);

?>
</body>
</html>