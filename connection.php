<?php
$user= 'root';
$password= "";
$db = "vat";
$host='localhost';
$con = mysqli_connect("$host","$user","$password","$db");

if (!$con){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}