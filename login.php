<?php
$con=mysqli_connect("localhost","root","","examm");
if(isset($_POST['login'])){
    $user=$_POST['user'];
    $pass=$_POST['pass'];
    $re=mysqli_query($con,"SELECT * from user where username='$user' and pass='$pass'");
    $rows=mysqli_fetch_array($re);
    if($rows['username']==$user && $rows['pass']==$pass){
        session_start();
        $_SESSION['username']=$user;
        $_SESSION['pass']=$pass;
        header('Location:welcome.html');
    }
    else{
        echo "wrong";
    }
}
?>
