<?php
session_start();
include('../connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name']) && isset($_POST['invoiceType'])) {
    $name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
    $invoiceType = htmlspecialchars($_POST['invoiceType'], ENT_QUOTES, 'UTF-8');
    // echo $name;
    $query;
    if($invoiceType == 'vatable'){
        $name = 'Bigbro Enterprises';
        $query = mysqli_query($con, "SELECT customerPin, CUSerialNumber, CUInvoiceNumber FROM invoices where name = '$name'");
    }else{
        $query = mysqli_query($con, "SELECT customerPin, CUSerialNumber FROM invoices where name = '$name'");
    }
    if(mysqli_num_rows($query)){
        $details = mysqli_fetch_assoc($query);

        $response = json_encode($details);
        echo $response;
    }
}