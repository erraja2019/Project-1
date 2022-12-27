<?php

$uname=$_POST['uname'];
$pass1=$_POST['upass1'];
$pass2=$_POST['upass2'];

if($pass1!=$pass2){

    echo "Password Mismatch";
    die;
}

include_once "../shared/connection.php";

$cmd="select * from user where username='$uname'";
$sql_result=mysqli_query($conn,$cmd);

$total_row_count=mysqli_num_rows($sql_result);
echo "total_row_count=$total_row_count";
if($total_row_count>0){
    
    echo "Username already taken, try differen username";
    die;
}

$hash=md5($pass1);

$cmd="insert into user(username,password) values('$uname','$hash')"; 

$sql_status=mysqli_query($conn,$cmd);
if($sql_status){

    echo "User signup Success!";
    //Redirect to Login Page
    header('location:login.html'); 
}

else{
    echo "Failed Signup!";
    echo mysqli_error($conn);
}


?>