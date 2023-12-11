<?php
session_start();
include('../connection.php');

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $resultArray = array();
    $query = mysqli_query($con, "SELECT * FROM items");
    if(mysqli_num_rows($query)){
        while($result = mysqli_fetch_assoc($query)){
            $resultArray[] = $result['item'];
        }
        echo  json_encode($resultArray);
    }
}else if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['item'])){
    $item = htmlspecialchars($_POST['item'], ENT_QUOTES, 'UTF-8');
    $item = strtoupper($item);
    $query = mysqli_query($con, "INSERT INTO items(item) VALUES('$item')");
    echo $item;
}