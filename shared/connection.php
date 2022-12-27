<?php

$conn=new mysqli("localhost","root","","acme_oct");

if($conn->connect_error)
{
    echo "connection failed";
    die;
}

?>