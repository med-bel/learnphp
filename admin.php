

<?php

session_start();



if(isset($_SESSION['logged_in'])){//check if user logged in 

    echo "<h1>Weclome ".$_SESSION['username']."</h1>";
    echo "<a href=\"logout.php\">Logout</a>";
}else{
    header('location:login.php');//redirect to login page if user not logged in 
}



?>

