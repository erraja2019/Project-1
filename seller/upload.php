<?php

// print_r($_POST);
// echo "<br>";
// print_r($_FILES);

$name=$_POST['name'];
$price=$_POST['price'];
$details=$_POST['details'];


$actual_name=$_FILES['pdtimg']['name'];
$tmp_path=$_FILES['pdtimg']['tmp_name'];


$target_path="..//images//$actual_name";
move_uploaded_file($tmp_path,$target_path);


include_once '../shared/connection.php';

$cmd="insert into products(name,price,details,impath) values('$name',$price,'$details','$target_path')";

$sql_status=mysqli_query($conn,$cmd);

if($sql_status){
    echo "product uploaded successfully!";
}
else{
    echo "Upload Failed";
    echo mysqli_error($conn);
}
?>