<html>
    <head>
        <style>
       .pdt-container{
            height:fit-content;
            display:inline-block;
            margin:20px;
            text-align:justify;
            
        }
        .card{
            width:22rem;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
            border-radius: 40px;
        }
        
        </style>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
        
    </body>
</html>




<?php

include 'menu.html';
include_once '../shared/connection.php';

$cmd="select * from products";


$sql_result=mysqli_query($conn,$cmd);

while($row=mysqli_fetch_assoc($sql_result))
{
    $pid=$row['pid'];
    $name=$row['name'];
    $price=$row['price'];
    $details=$row['details'];
    $impath=$row['impath'];

    echo "<div class='pdt-container'>
          <div class='card bg-light'>
            <div class='text-capitalize p-3 '>$name</div>
            <h3 class='text-warning ps-4'>$$price</h3>
            <img class='card-img-top' src='$impath'>
            <div class='card-body'>
                <p class='text-capitalize'>$details</p>
                <a href='edit_fe.php?pid=$pid' class='btn btn-danger'>Edit</a>
                <a href='deletepdt.php?pid=$pid' class='btn btn-danger'>Delete</a>

            </div>
        </div>
    </div>
    </div>";
   
}
?>