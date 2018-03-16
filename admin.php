<?php
$con=mysqli_connect("localhost","root","","examm");
if(isset($_POST['login'])){
    $user=$_POST['user'];
    $pass=$_POST['pass'];
    $re=mysqli_query($con,"SELECT * from admin where username='$user' and pass='$pass'");
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
<html>
<head >
         <title>Login</title>
     <link rel="stylesheet" type="text/css" href="style.css">  
</head>
 <h1>Login</h1>
 <form action="" method="post">
 username:<input type="text" name="user"><br>
 password:<input type="password" name="pass"><br>
 <input type="submit" name="login">
</form>
<a href="register.php">register</a>
</html>