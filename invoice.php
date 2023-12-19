<?php
session_start();
include("connection.php");

if(!isset($_SESSION["name"])){
    header("location: index.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <!-- Include DataTables Buttons and its dependencies -->
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="css/invoice.css">
    <link rel="stylesheet" href="css/navbar.css">
    <style>
        * {
            font-size: small;
        }
        #example tbody td:last-child i {
            cursor: pointer;
        }
    </style>
</head>
<body style="width: 100vw; display: flex;background: #f0f4F8; color=#102a43 ;flex-direction: column;align-items: center;">
    <!-- nav start -->
    <div class="nav" style="display:flex;justify-content: space-between;position:static;">
        <input type="checkbox" id="nav-check">
        <div class="nav-header">
            <div class="nav-title">
            BIGROVAT
            </div>
        </div>
        <div class="nav-btn">
            <label for="nav-check">
            <span></span>
            <span></span>
            <span></span>
            </label>
        </div>
        
        <div class="nav-links" style="z-index:1000">
            <a href="invoice.php">Invoices</a>
            <a href="upload.php">Upload</a>
            <a href="main.php">Dashboard</a>
        </div>
    </div>
    <!-- nav end -->
    <div class="card" style="margin-top: 20px;">
        <div class="card-body">
            <table id="example" class="table table-striped table-bordered dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="example_info" style="width: 100%;">
                <thead>
                    <tr role="row">
                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 100px;">Business<br>Name</th>
                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 137px;">Invoice Type</th>
                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 137px;">Invoice No.</th>
                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 215px;">Amount</th>
                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 100px;">Invoice Date</th>
                        <th class="sorting_desc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" aria-sort="descending" style="width: 44px;">Paid</th>
                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 93px;">Filed</th>
                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 77px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
                <tfoot>
                    <tr>
                        <th rowspan="1" colspan="1">Business Name</th>
                        <th rowspan="1" colspan="1">Invoice Type.</th>
                        <th rowspan="1" colspan="1">Invoice No.</th>
                        <th rowspan="1" colspan="1">Amount</th>
                        <th rowspan="1" colspan="1">Invoice Date</th>
                        <th rowspan="1" colspan="1">Paid</th>
                        <th rowspan="1" colspan="1">Filed</th>
                        <th rowspan="1" colspan="1">Action</th>

                    </tr>
                </tfoot>
                <tbody></tbody>
            </table>
        </div>

    </div>
    <div class="card mt-4">
        <div class="card-body row">
            <table class="table col-12 table-bordered table-striped" id="example1">
                <thead>
                    <tr>
                        <th>Business Name</th>
                        <th>Pin</th>
                        <th>Invoice Amount</th>
                        <th>Tax Amount</th>
                        <th>CU Invoice Number</th>
                        <th>Date</th>                        
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</body>
<script src="js/invoice.js"></script>
<!-- <script src="js/navbar.js"></script> -->
</html>