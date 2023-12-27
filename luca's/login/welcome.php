<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
      <img src="logo.png" alt="My Image" width="100" height="100">   
    <h1 class="my-5">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h1>
    <p>
        <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="logout.php" class="btn btn-danger ml-3">Sign Out of Your Account and back to Luca's bakery</a>
        <a href="simple-php-shopping-cart/index.php" class="btn btn-danger ml-3">Shopping Cart</a>
    </p>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>            
    
    <footer>
     <p2 > Copyright &copy;Luke Hu Junjie in TAFE 21IT1 2023 </p>
    </footer>
</body>
</html>
<style>
body {  
  background-color: lightblue;  
}  
  
h1 {  
  color: white;  
  text-align: center;  
}  
  
p {  
  font-family: verdana;  
  font-size: 20px;  
}
 
footer {  
  background-color: #333; /* 页脚背景颜色 */  
  color: #fff; /* 文字颜色 */  
  padding: 20px; /* 内边距 */  
  text-align: center; /* 文字居中对齐 */  
  font-size: 14px; /* 字体大小 */  
  position: absolute; /* 定位 */  
  bottom: 0; /* 底部对齐 */  
  width: 100%; /* 宽度100% */  
}
</style>