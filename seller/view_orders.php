<?php

include "menu.html";

include_once "../shared/connection.php";

$cmd="select * from orders join products on products.pid=orders.pid join user on orders.userid=user.userid";

$sql_result=mysqli_query($conn,$cmd);

echo "<table class='table table-border w-50'>

    <thead>
      <tr class='border'>
        <td class='border'>Order Id</td>
        <td class='border'>User Information</td>
        <td class='border'>Product Information</td>
        <td class='border'>Address</td>
       </tr> 
    </thead>";


while($row=mysqli_fetch_assoc($sql_result))
{
    $orderid=$row['orderid'];
    $userid=$row['userid'];
    $pid=$row['pid'];
    $address=$row['address'];

    $pname=$row['name'];
    $pimg=$row['impath'];

    $uname=$row['username'];
    echo "<tr class='border'>

        <td class='border'>$orderid</td>
        <td class='border'>
            <div>
                <h3>$uname</h3>
            </div>
            $userid
        </td>
        <td class='border'>
        <div>
            <h3>$pname</h3>
            <img class='w-100' src='$pimg'>
        </div>    
        $pid
            
        </td>
        <td class='border'>$address</td>

    </tr>";
}

echo "</table>";
?>