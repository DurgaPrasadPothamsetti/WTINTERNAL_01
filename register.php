<?php
$con=mysqli_connect("localhost","root","","examm");
if (isset($_POST['register'])){
    $user=$_POST['user'];
    $pass=$_POST['pass'];
    mysqli_query($con,"INSERT INTO user (username,pass) VALUES ('$user','$pass')");
}
?>
