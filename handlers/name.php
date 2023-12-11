<?php
session_start();
include('../connection.php');

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $resultArray = array();
    $query = mysqli_query($con, "SELECT * FROM names");
    if(mysqli_num_rows($query)){
        while($result = mysqli_fetch_assoc($query)){
            $resultArray[] = $result['name'];
        }
        echo  json_encode($resultArray);
    }
}else if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['name'])){
    $item = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
    $item = strtoupper($item);
    $query = mysqli_query($con, "INSERT INTO names(name) VALUES('$item')");
    echo $item;
}