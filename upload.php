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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/jquery.dataTables.min.css" integrity="sha512-1k7mWiTNoyx2XtmI96o+hdjP8nn0f3Z2N4oF/9ZZRgijyV4omsKOXEnqL1gKQNPy2MTSP9rIEWGcH/CInulptA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/main.css">
    <!-- endinject -->
    <title>Upload</title>
    <style>
        .excel-table {
        border-collapse: collapse;
        width: 100%;
        margin-top: 20px;
        }
        
        .excel-table th,
        .excel-table td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        
        .excel-table th {
            background-color: #f2f2f2;
        }

    </style>
</head>
<body>
    <div class="col-12 grid-margin" style="display: flex;flex-direction: column;align-items: center;">
        <div class="card m-1" style="width: 100%;max-width: 1000px;">
            <div class="card-body" >
                <!-- <h4 class="card-title">Import Data</h4> -->
                <div style="display:flex;justify-content:space-around;">
                    <div class="form-group">
                        <label for="exampleInputFile"></label>
                        <input type="file" name="file" accept=".xls, .xlsx, application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" id="file" size="150">
                        <!-- <p class="help-block">Only Excel/CSV File Import.</p> -->
                    </div>
                    <button style="display:position; right:0px" id="upload" class="btn btn-warning t" name="submit" value="submit">Upload</button>
                </div>
            </div>
        </div>
        <div id="excelData"  class="mb-4"></div>
    </div>
<script>
    // const table = new DataTable('#example');
    $(document).ready(function(){
        $('#example').DataTable();
    })
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js" integrity="sha512-BkpSL20WETFylMrcirBahHfSnY++H2O1W+UnEEO4yNIl+jI2+zowyoGJpbtk6bx97fBXf++WJHSSK2MV4ghPcg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.15.6/xlsx.full.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
<script type="module" src="js/upload.js"></script>
</body>
</html>