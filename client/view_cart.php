<html>
    <head>
        <style>     
    #total{
        font-size:24px;
        color:tomato;
        font-weight:bold;
    }  

    .pdt-container{
            height:fit-content;
            display:inline-block;
            margin:20px;
            text-align:justify;
            
        }
        .card{
            width:22rem;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
            float: right;
        }
    </style>

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
if($_SESSION['login']==false){

    echo "Invalid access";
    die;
}

$username=$_SESSION['username'];

$userid=$_SESSION['userid'];
echo "<div><h3 style='margin:5px'>$username</h3></div>";



include 'menu.html';

include_once '../shared/connection.php';



$cmd="select * from products join cart on cart.pid=products.pid where cart.userid=$userid";

$sql_result=mysqli_query($conn,$cmd);

$total=0;

echo "<div class='card'>
        <div class='d-flex' style='justify-content:space-between'>
            <div id='total'>
            Total:$$total
            </div>
        
        <form action='placeorder.php' methode='GET'>
            <textarea class='form-control' name='address' placeholder='Delivery Address'></textarea>

            <input type='submit' value='Place Order' class='btn btn-success form-control'>
        </form>

        </div> 
    </div>";



while($row=mysqli_fetch_assoc($sql_result))
{
$cartid=$row['cartid'];
$pid=$row['pid'];
$name=$row['name'];
$price=$row['price'];
$details=$row['details'];
$impath=$row['impath'];

$total=$total+$price;
echo "<div class='pdt-container'>
        <div class='card bg-light'>
            <div class='text-capitalize p-3'>$name</div>
            <h3 class='text-warning ps-4'>$$price</h3>        
            <img class='card-img-top' src='$impath'>
        <div class='card-body'>
            <p class='text-capitalize'>$details</p>
            <a href='deletecart.php?cartid=$cartid' class='btn btn-danger'>Remove from cart</a> 
        </div>
   </div>
</div>";
}

echo "<script>
        document.getElementById('total').innerHTML='Total=$total';
      </script>"
?>