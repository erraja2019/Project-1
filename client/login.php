<?php

$uname=$_POST['uname'];
$upass=$_POST['upass'];


$input_hash=md5($upass);

include_once "../shared/connection.php";

$cmd="select * from user where username='$uname' and password='$input_hash'";
$sql_result=mysqli_query($conn,$cmd);

$total_row_count=mysqli_num_rows($sql_result);

$row=mysqli_fetch_assoc($sql_result);
session_start();

$_SESSION['login']=false;
if($total_row_count==1)
{
    

    $_SESSION['login']=true;
    $_SESSION['userid']=$row['userid'];
    $_SESSION['username']=$row['username'];

    echo "Login Success";
    header('location:view.php');
}
else
{
    echo "Login Failed";
}

/*

echo "$input_hash <br>";

$row=mysqli_fetch_assoc($sql_result);
print_r($row);

if($row['password']==$input_hash)
{
    echo "Login Success";
}
else
{
    echo "Login Failed";
}

*/

?>