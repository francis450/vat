<?php
session_start();
include("../connection.php");
$method = $_SERVER['REQUEST_METHOD'];
function sanitizeInput($data) {
    // Use appropriate sanitization methods based on your requirements
    return htmlspecialchars(strip_tags(trim($data)));
}
switch ($method) {
    case 'GET':
        // e.g., fetch invoices
        $result = $con->query("SELECT * FROM invoices");
        $invoices = [];
        while ($row = $result->fetch_assoc()) {
            $invoices[] = $row;
        }
        break;

    case 'POST':
        // Handle POST requests
        // e.g., insert a new invoice
        // echo "posted";
        $data = json_decode(file_get_contents("php://input"), true);
        

        $name = sanitizeInput($data['name']);
        $item = sanitizeInput($data['item']);
        $customerPin = sanitizeInput($data['customerPin']);
        $amount = floatval($data['amount']);
        $vat = floatval($data['vat']); 
        $invoiceDate = sanitizeInput($data['invoiceDate']);
        $invoiceNumber = sanitizeInput($data['invoiceNumber']);
        $invoiceType = sanitizeInput($data['invoiceType']); 
        $CUSerialNumber = sanitizeInput($data['CUSerialNumber']);
        $CUInvoiceNumber = sanitizeInput($data['CUInvoiceNumber']);
        $withholding = intval($data['withholding']); 
        $paid = 0;
        if($data['paid']){
            $paid = 1;
        }
        // $expenseORAsset = intval($data['expenseORAsset']);
        // $stmt = $con->prepare("INSERT INTO invoices (name, item, customerPin, amount, vat, invoiceDate, invoiceNumber, invoiceType, CUSerialNumber, CUInvoiceNumber, withholding, paid) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        // $stmt->bind_param("ssdssisssii", $name, $item, $customerPin, $amount, $vat, $invoiceDate, $invoiceNumber, $invoiceType, $CUSerialNumber, $CUInvoiceNumber, $withholding, $paid);
        $stmt = "INSERT INTO invoices (name, item, customerPin, amount, vat, invoiceDate, invoiceNumber, invoiceType, CUSerialNumber, CUInvoiceNumber, withholding, paid)
        VALUES ( '$name', '$item', '$customerPin', '$amount', '$vat', '$invoiceDate', '$invoiceNumber', '$invoiceType', '$CUSerialNumber', '$CUInvoiceNumber', '$withholding', '$paid')";

        if (mysqli_query($con, $stmt)) {
            echo  'Invoice Inserted Successfully';
        } else {
            http_response_code(500); // Internal Server Error
            echo json_encode(array('message' => 'Error creating invoice'));
        }
        mysqli_close($con);
        break;

    case 'PUT':
        // Handle PUT requests
        // e.g., update an existing invoice
        parse_str(file_get_contents("php://input"), $data);
        
        // Validate and sanitize data before using it in the query
        // ...

        $stmt = $con->prepare("UPDATE invoices SET name=?, customerPin=?, amount=?, vat=?, invoiceDate=?, invoiceNumber=?, invoiceType=?, CUSerialNumber=?, CUInvoiceNumber=?, withholding=?, paid=?, expenseORAsset=? WHERE id=?");
        $stmt->bind_param("ssddssisssiii", $data['name'], $data['customerPin'], $data['amount'], $data['vat'], $data['invoiceDate'], $data['invoiceNumber'], $data['invoiceType'], $data['CUSerialNumber'], $data['CUInvoiceNumber'], $data['withholding'], $data['paid'], $data['expenseORAsset'], $data['id']);
        
        if ($stmt->execute()) {
            echo json_encode(array('message' => 'Invoice updated successfully'));
        } else {
            http_response_code(500); // Internal Server Error
            echo json_encode(array('message' => 'Error updating invoice'));
        }

        $stmt->close();
        break;

    case 'DELETE':
        // Handle DELETE requests
        // e.g., delete an invoice
        parse_str(file_get_contents("php://input"), $data);

        $stmt = $con->prepare("DELETE FROM invoices WHERE id=?");
        $stmt->bind_param("i", $data['id']);
        
        if ($stmt->execute()) {
            echo json_encode(array('message' => 'Invoice deleted successfully'));
        } else {
            http_response_code(500); // Internal Server Error
            echo json_encode(array('message' => 'Error deleting invoice'));
        }

        $stmt->close();
        break;

    default:
        http_response_code(405); // Method Not Allowed
        echo json_encode(array('message' => 'Method Not Allowed'));
        break;
}
