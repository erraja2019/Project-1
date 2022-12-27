<?php
    include 'menu.html'; 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body{
            background-color:#2b364a;
        }
        #card{
            width:22rem;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        }
    </style>
    <title>Document</title>

</head>
<body>
    
    <div class="d-flex justify-content-center align-items-center vh-100">
        <form id="card" enctype="multipart/form-data" action="upload.php" class="text-center p-5 bg-secondary" method="POST">
            
            <h3 class="fw-bold text-danger">Upload Products</h3>
            <input type="text" class="mt-3 form-control" name="name" placeholder="Enter product Name">
            <input type="number" class="mt-2 form-control" name="price" placeholder="Enter product Price">
            <textarea class="form-control mt-2" name="details" id="" cols="20" rows="5" placeholder="Enter description"></textarea>
            <input type="file" class="mt-2 form-control" name="pdtimg" accept=".jpg">
            <input type="submit" value="Upload Now" class="mt-3 btn btn-warning fw-bold">


        </form>
    </div>
</body>
</html>