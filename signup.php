<!DOCTYPE html>
<html>
<head>
	<title>Sign up</title>
<link rel="stylesheet" type="text/css" href="style/signup.css">
	<link href="https://fonts.googleapis.com/css?family=Indie+Flower&display=swap" rel="stylesheet">

</head>
<body>

<div id="box">
	<div id="logo">
		<span id="m1">S</span><span id="m2">i</span><span id="m3">g</span><span id="m4">n </span><span id="m5">u</span><span id="m6">p</span><span id="m7">.</span> 
		
	</div>
            <br>
            
<form  action="valid.php" method="POST">
	
<input type="text" name="name" placeholder="Your name" class="pname">
<br>
<input type="text" name="fname" placeholder="Your first name" class="pname">
<br>

<input type="email" name="email" placeholder="exemple@exemple.com" id="email">
<br>

<input type="password" name="pass" placeholder="********" class="pname">
<br>

<input type="password" name="pass" placeholder="********" class="pname">
<br>

<input type="submit" name="submit" value ="sign up" id="btmsub">
</form>
</div>
<div id="info">
	<h1>Our site</h1>
	<br>
	<p>
Un paragraphe est une section de texte en prose vouée au développement d'un point particulier souvent au moyen de plusieurs phrases, dans la continuité du précédent et du suivant.
Sur le plan typographique, le début d'un paragraphe est marqué par un léger renfoncement (alinéa) ou par un saut de ligne.
Le symbole du paragraphe est §. La fin d'un paragraphe était autrefois indiquée par un pied-de-mouche (¶).
	</p>

</div>
</body>
</html>
<?php
include('connect.php');

?>

<?php

	if(isset($_POST['name']) && isset($_POST['fname']) && isset($_POST['email']) && isset($_POST['pass'])){

	    $name= $_POST['name'];
	    $fname= $_POST['fname'];
	    $email= $_POST['email'];
	    $pass= $_POST['pass'];


		$sql = "INSERT INTO signdata VALUES('".$name."','".$fname."','".$email."','".$pass."')";
		$result = mysqli_query($connect,$sql);

		if(! $result){
		    $message = "Please Try Again !";
		}
		else{
		    header("location: login.php");
		}
	}

?>



<?php
mysqli_close($connect);

?>
