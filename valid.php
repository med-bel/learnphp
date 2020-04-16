<?php
include('connect.php');

?>

<?php

    $name= $_POST['name'];
    $fname= $_POST['fname'];
    $email= $_POST['email'];
    $pass= $_POST['pass'];


$sql = "INSERT INTO signdata VALUES('".$name."','".$fname."','".$email."','".$pass."')";
$result = mysqli_query($connect,$sql);

if(! $result){
    die ("<h1>Error pleas train again </h1>");
}
else{
    header("location: login.php");
}

?>



<?php
mysqli_close($connect);

?>