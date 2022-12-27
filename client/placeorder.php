<?php
$address=$_GET['address'];

session_start();

$userid=$_SESSION['userid'];

include_once '../shared/connection.php';

$cmd="select * from products join cart on cart.pid=products.pid where cart.userid=$userid";

$sql_result=mysqli_query($conn,$cmd);

while($row=mysqli_fetch_assoc($sql_result))
{
   $pid=$row['pid'];

   $insert_cmd="insert into orders(pid,userid,address) values($pid,$userid,'$address')";

   mysqli_query($conn,$insert_cmd);
}

//delete query to remove the cart w.r.t userid
//redirect to view products


$sql_status=mysqli_query($conn,$cmd);  //$conn,$cmd
if($sql_status)
{
    echo "Order success!";
    //Redirect to Login Page
    header('location:view.php');
}
else
{
    echo "Failed to Order!";
    echo mysqli_error($conn);
}

?>