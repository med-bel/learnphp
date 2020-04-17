
<?php

session_start();//start session

if(isset($_SESSION['logged_in'])){//check if user logged in
    session_unset();
    session_destroy();// destroy session and logout
    header('location:login.php');// redirect to login page
}else{

    header('location:login.php');// redirect to login page
}

?>