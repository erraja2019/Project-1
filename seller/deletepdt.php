<?php

$pid=$_GET['pid'];

include_once "../shared/connection.php";

$cmd="delete from products where pid=$pid";

// $cmd="update products set status=0 where pid=$pid"

$sql_status=mysqli_query($conn,$cmd);

if($sql_status)
{
    echo "product deleted successfully!";
    header('location:view.php');
}
else{
    echo "Failed to Deleted!";
    echo mysqli_error($conn);
}

?>