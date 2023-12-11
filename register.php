<?php
session_start();
include("connection.php");
function sanitizeInput($data) {
    // Use appropriate sanitization methods based on your requirements
    return htmlspecialchars(strip_tags(trim($data)));
}
// request method
// $method = $_SERVER['REQUEST_METHOD'];
// if ($method == 'GET' && isset($_POST['username'])) {
//     $username = sanitizeInput($_GET['username']);
//     $password = sanitizeInput($_GET['password']);
//     $name = sanitizeInput($_GET['name']);
//     $cpassword = sanitizeInput($_GET['cpassword']);

//     echo $name." -> ".$username;
//     // check if the username and password exist in the database
//     if($password == $cpassword) {
//         $sql = "INSERT INTO users  (`name`, `username`, `password`, `admin`) VALUES ('$name','$username' ,'$password','0')";
//         $result = mysqli_query($con, $sql);
//     } else {
//         echo "
//         <script>
//             alert('Passwords Do not Match')
//         </script>";
//     }
// }else if(isset($username)){
//      echo "
//         <script>
//             alert('All Field Are Required');
//         </script>";
// }else{
//     echo('Loading');
// }
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
    <form method="POST" action="handlers/handlelogin.php"  class="login">
        <h2>Welcome</h2>
        <p>Please log in</p>
        <label for="name">Name</label>
        <input type="text" class="name" name="name" placeholder="Jon"  autocomplete="name"/>
        <label for="username">Username</label>
        <input type="text" class="username" name="username" placeholder="Jones"  autocomplete="username"/>
        <label for="password">Password</label>
        <input type="password" class="password" name="password" placeholder="*********" autocomplete="password" />
        <label for="cpassword">Confirm Password</label>
        <input type="password" class="cpassword" name="cpassword" placeholder="*********" autocomplete="password" />
        <input type="submit" class="submit" value="Register" />
        <div class="links">
            <a href="#">Forgot password</a>
            <a href="index.php">Login</a>
        </div>
    </form>
    <script src="js/index.js"></script>
</body>