<?php
session_start();
include("../connection.php");
function sanitizeInput($data) {
    // Use appropriate sanitization methods based on your requirements
    return htmlspecialchars(strip_tags(trim($data)));
}
$method = $_SERVER['REQUEST_METHOD'];
if ($method == 'POST' && isset($_POST['username'])) {
    $username = sanitizeInput($_POST['username']);
    $password = sanitizeInput($_POST['password']);
    $name = sanitizeInput($_POST['name']);
    $cpassword = sanitizeInput($_POST['cpassword']);

    echo $name." -> ".$username;
    // check if the username and password exist in the database
    if($password == $cpassword) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users  (`name`, `username`, `password`, `admin`) VALUES ('$name','$username' ,'$hashedPassword','0')";
        if(mysqli_query($con, $sql)){
            echo "
            <script>
                location.replace('../register.php');
                alert('Registered Successfully. Please Wait To Be Verified');
            </script>";
        }

    } else {
        echo "
        <script>
            location.replace('../register.php');
            alert('Passwords Do not Match')
        </script>";
    }
}else if(isset($username)){
     echo "
        <script>
            location.replace('../register.php');
            alert('All Field Are Required');
        </script>";
}else{
    echo('Loading');
}