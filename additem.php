<?php
session_start();
include ('connect.php');
if(!isset($_SESSION['uid'])){
	header('location:loginn.php');
}
	$uid = $_SESSION['uid'];
if(isset($_POST['insert'])){
	$cat_id = $_POST['category'];
	echo $cat_id;
	$name = $_POST['name'];
	$description = $_POST['description'];
	$init_value = $_POST['init_value'];

	 $uploadOk = 0;
    if(isset($_FILES['photo'])){
        $errors= array();
        $file_name = $_FILES['photo']['name'];
        $file_size = $_FILES['photo']['size'];
        $file_tmp = $_FILES['photo']['tmp_name'];
        $file_type = $_FILES['photo']['type'];
        $tmp = explode('.', $_FILES['photo']['name']);
        $file_ext=strtolower(end($tmp));
        $expensions= array("jpeg","jpg","png", "gif");
        if(in_array($file_ext,$expensions)=== false){
        	echo "extensions error";
           array_push($errors, "extension not allowed, please choose a JPEG or PNG file.");
        }
        
        if($file_size > 600000000) {
            array_push($errors, "File size must be excately 50 KB.");
        }
        
        if(empty($errors)==true) {
        	echo "noerror";
           move_uploaded_file($file_tmp,"uploads/".$file_name) or die("error moving file");
           $uploadOk = 1;
        }else{
		   print_r($errors);
		   
        }
     
    if ($uploadOk == 1) {
        $photo= $_FILES["photo"]["name"];
    $qry = "INSERT INTO `product`(`uid`,`name`,`description`,`init_value`,`photo`) VALUES('$uid','$name','$description','$init_value','$photo');";

    mysqli_query($conn,$qry) or die("Connection failed: " . $qry);
        header('location:view1.php');
    }
}
}
?>
