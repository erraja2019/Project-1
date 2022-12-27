<?php

    include_once "../shared/connection.php";
    $pid=$_GET['pid'];
    $cmd="select * from products where pid=$pid";
    $sql_result=mysqli_query($conn,$cmd);
    $row=mysqli_fetch_assoc($sql_result);
    
    $name=$row['name'];
    $price=$row['price'];
    $details=$row['details'];
    $img=$row['impath'];

    if(isset($_POST['update'])){

        $name=$_POST['name'];
        $price=$_POST['price'];
        $details=$_POST['details'];
        $actual_name=$_FILES['pdtimg']['name'];
        $tmp_path=$_FILES['pdtimg']['tmp_name'];
    
    
    
        
    $target_path="..//images//$actual_name";
    move_uploaded_file($tmp_path,$target_path);
    
    
    // include_once '../shared/connection.php';
    
    $cmd="UPDATE products set name='$name' , price=$price,details='$details', pdtimg='$target_path' where pid='$pid'";
    
    $sql_status=mysqli_query($conn,$cmd);
    
    if($sql_status){
        echo "product updated successfully!";
        header('location:view.php');
    }
    else{
        echo "Failed to update!";
        echo mysqli_error($conn);
    }
    
    }
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    
    <div class="d-flex justify-content-center align-items-center vh-100">
        <form enctype="multipart/form-data" action="upload.php" class="text-center p-5 bg-warning" method="POST">
            
            <h3>Update product</h3>
            <input type="text" class="mt-2 form-control" name="name" placeholder="Enter product Name"
            value="<?php echo $name ?>";>
            <input type="number" class="mt-2 form-control" name="price" placeholder="Enter product Price"
            value="<?php echo $price ?>";>
            <textarea class="form-control mt-2" name="details" id="" cols="20" rows="5" placeholder="Enter description"><?php echo $details?></textarea>
            <input type="file" class="mt-2 form-control" name="pdtimg" accept=".jpg " value="<?php echo $img ?>" /><img src="impath/ <?php echo $img ?>"> 
            <input type="submit" value="Edit" class="mt-2 btn btn-success">


        </form>
        
    </div>
</body>
</html>