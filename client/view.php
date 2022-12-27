<html>
    <head>
        <style>
        .pdt-container{
            width:18rem;
            height:fit-content;
            display:inline-block;
            margin:20px;
            text-align:justify;
            /* height:5px; */
        }
        .card{
            /* width:20rem; */
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
            border-radius: 40px;
        }
        </style>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    </head>
    <body>
        
    </body>
</html>




<?php

session_start();
if(!isset($_SESSION['login'])){
    
    echo "Invalid access";
    die;
}
if($_SESSION['login']==false)
{
    echo "Invalid access";
    die;
}

$username=$_SESSION['username'];
echo "<h3>$username</h3>";

include 'menu.html';
// include './slider/ind.html';
include_once '../shared/connection.php';

$cmd="select * from products";
// $cmd="select * from products where status=1";

$sql_result=mysqli_query($conn,$cmd);

while($row=mysqli_fetch_assoc($sql_result))
{
    $pid=$row['pid'];
    $name=$row['name'];
    $price=$row['price'];
    $details=$row['details'];
    $impath=$row['impath'];

    echo "<div class='pdt-container' >
    <div class='card bg-light'>
    <div class='text-capitalize p-3'>$name</div>
    <h3 class='text-warning ps-4'>$$price</h3>
    <img src='$impath' class='card-img-top' alt='Product image'>
    <div class='card-body'>
            <p class='text-capitalize '>$details</p>
            <br/>
            <a href='add_cart.php?pid=$pid' class='btn btn-danger'>Add to cart</a>
        </div>
    </div>
    </div>";
}
?>