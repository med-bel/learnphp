
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
</head>
<body>
    <center>
    <?php

session_start();



if(isset($_SESSION['logged_in'])){//check if user logged in 

    echo "<h1>Weclome ".$_SESSION['username']."</h1>";
    echo "<p>Your ID :".$_SESSION['userid']."</p>";
    echo "<p>Your Email:".$_SESSION['email'] . "</p>";
    echo "<button onclick=\"javascript:window.location= 'logout.php' ;\" >Logout</button>";
}else{
    header('location:index.php');//redirect to login page if user not logged in 
}



?>
    </center>
</body>
</html>
