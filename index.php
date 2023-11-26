<?php
session_start();
include("connection.php");
function sanitizeInput($data) {
    // Use appropriate sanitization methods based on your requirements
    return htmlspecialchars(strip_tags(trim($data)));
}
// request method
$method = $_SERVER['REQUEST_METHOD'];
if ($method == 'GET' && isset($_GET['username']) && isset($_GET['password']) && $_GET['username'] != null) {
    $username = sanitizeInput($_GET['username']);
    $password = sanitizeInput($_GET['password']);

    // echo $password." -> ".$username;
    // check if the username and password exist in the database
    $sql = "SELECT * FROM users WHERE `username` = '$username' AND `password` = '$password'";
    $result = mysqli_query($con, $sql);
    $data = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) >  0) {
        $_SESSION['name'] = $username;
        if($data['admin']){
            header('location: main.php');
        }else{
            header('location: invoice.php');
        }
        $_SESSION['error'] = false;
    }else{
        
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BIGBRO | VAT</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <form  class="login">
        <h2>Welcome</h2>
        <p>Please log in</p>
        <input type="text" class="username" name="username" placeholder="Jon"  autocomplete="username"/>
        <input type="password" class="password" name="password" placeholder="*********" autocomplete="password" />
        <input type="submit" class="submit" value="Log In" />
        <div class="links">
            <a href="#">Forgot password</a>
            <a href="register.php">Register</a>
        </div>
    </form>
    <script src="js/index.js"></script>
</body>