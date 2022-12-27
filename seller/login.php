<?php

$uname=$_POST['uname'];
$upass=$_POST['upass'];


$input_hash=md5($upass);

include_once "../shared/connection.php";

$cmd="select * from user where username='$uname' and password='$input_hash'";
$sql_result=mysqli_query($conn,$cmd);

$total_row_count=mysqli_num_rows($sql_result);

if($total_row_count==1)
{
    echo "Login Success";
    header('location:upload_fe.php');
}
else
{
    echo "Login Failed";
}


?>