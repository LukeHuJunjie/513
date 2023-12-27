<?php
/**
* Simple PHP CRUD Script
* Developed by TutorialsClass.com
* URL:  http://tutorialsclass.com/code/php-simple-crud-application
**/

// Create database connection using config file
include_once("config.php");

// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id DESC");
?>

<html>
<head>    
    <title>Homepage</title>
</head>

<body>
<img src="logo.png" alt="My Image"class="center" width="100" height="100">    
<div>
    <a href="add.php" class="btn">Add New User</a><br/><br/>

<table width='80%' border=1>

<tr>
    <th>First_name</th> <th>Last_name</th> <th>luke_609</th> <th>mobile_number</th><th>Address</th><th>city</th><th>email</th> <th>Update</th>
</tr>
<?php  
while($user_data = mysqli_fetch_array($result)) {         
    echo "<tr>";
    echo "<td>".$user_data['First_name']."</td>";
    echo "<td>".$user_data['Last_name']."</td>";
    echo "<td>".$user_data['luke_609']."</td>";
    echo "<td>".$user_data['mobile_number']."</td>";
    echo "<td>".$user_data['Address']."</td>";
    echo "<td>".$user_data['city']."</td>";
    echo "<td>".$user_data['email']."</td>";    
    echo "<td><a href='edit.php?id=$user_data[id]'>Edit</a> | <a href='delete.php?id=$user_data[id]'>Delete</a></td></tr>";        
}
?>
</table>

<p>
    <a href="http://127.0.0.1/luca's/login/login.php#Shopping%20cart"  class="btn">Sign Out of Your Account and back to welcome</a>
</p>
</div>


    <footer>
     <p2 > Copyright &copy;Luke Hu Junjie in TAFE 21IT1 2023 </p>
    </footer>
</body>
</html>



<style>
body {  
  background-color: lightblue;  
}  
  
div{
    margin:auto
}

h1 {  
  color: white;  
  text-align: center;  
}  
  
p {  
  font-family: verdana;  
  font-size: 20px;  
}
 
/* 链接按钮的样式 */  
a.btn {  
  display: inline-block;  
  padding: 10px 20px;  
  text-align: center;  
  text-decoration: none;  
  font-size: 16px;  
  color: #fff;  
  background-color: #007BFF;  
  border-radius: 4px;  
}  
  
/* 鼠标悬停时链接按钮的样式 */  
a.btn:hover {  
  background-color: #0056b3;  
}

.center {  
  display: block;  
  margin-left: auto;  
  margin-right: auto;  
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