<?php
session_start();
include("../connection.php");

$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'POST') {
    $headings = $_POST['headings'];
    $allData = $_POST['ndata'];
    $tableName = "invoices";

    // Construct the SQL query
    $columns = implode(", ", $headings);
    $values = implode(", ", array_fill(0, count($headings), "?"));
    $sql = "INSERT INTO $tableName ($columns) VALUES ($values)";

    // Prepare the statement
    $stmt = $con->prepare($sql);

    // Bind parameters
    $types = '';
    foreach ($allData as $value) {
        if (is_int($value)) {
            $types .= "i"; // Integer
        } elseif (is_float($value)) {
            $types .= "d"; // Double
        } elseif (is_string($value)) {
            // Additional check for date format could be added here
            $types .= "s"; // String
        } else {
            // Handle other types as needed
        }
    }

    // Loop through each row of data
    foreach ($allData as $data) {
        $types = '';
        foreach ($data as $value) {
            if (is_int($value)) {
                $types .= "i"; // Integer
            } elseif (is_float($value)) {
                $types .= "d"; // Double
            } elseif (is_string($value)) {
                // Additional check for date format could be added here
                $types .= "s"; // String
            } else {
                // Handle other types as needed
            }
        }
        $stmt->bind_param($types, ...$data);

        // Execute the statement for each row
        if ($stmt->execute()) {
            echo true;
        } else {
            $stmt->error;
            echo false; 
        }

        // Reset the parameters for the next iteration
        $stmt->reset();
    }

    // Close the statement and connection
    $stmt->close();
    $con->close();
}
?>
