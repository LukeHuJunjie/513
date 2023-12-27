<html>
<head>
	<title>Add Users</title>
</head>

<body>
<img src="logo.png" alt="My Image"class="center" width="100" height="100">    
	<a href="index.php"  class="btn">Go to Home</a>
	<br/><br/>

	<form action="add.php"  method="post" name="form1">
		<table width="25%" border="0">
			<tr> 
				<td>First_name</td>
				<td><input type="text" name="First_name"></td>
			</tr>
			<tr> 
				<td>Last_name</td>
				<td><input type="text" name="Last_name"></td>
			</tr>
			<tr> 
				<td>luke_609</td>
				<td><input type="text" name="luke_609"></td>
			</tr>
			<tr> 
				<td>mobile_number</td>
				<td><input type="text" name="mobile_number"></td>
			</tr>
			<tr> 
				<td>Address</td>
				<td><input type="text" name="Address"></td>
			</tr>
			<tr> 
				<td>city</td>
				<td><input type="text" name="city"></td>
			</tr>
			<tr> 
				<td>email</td>
				<td><input type="text" name="email"></td>
			</tr>
			<tr> 
				<td></td>
				<td><input type="submit" name="Submit" value="Add"></td>
			</tr>
		</table>
	</form>
	
	<?php

	// Check If form submitted, insert form data into users table.
	if(isset($_POST['Submit'])) {
		$First_name = $_POST['First_name'];
		$Last_name = $_POST['Last_name'];
		$luke_609 = $_POST['luke_609'];
		$mobile_number = $_POST['mobile_number'];
		$Address= $_POST['Address'];
		$city = $_POST['city'];
		$email = $_POST['email'];
		
		
		// include database connection file
		include_once("config.php");
				
		// Insert user data into table
		$result = mysqli_query($mysqli, "INSERT INTO users(First_name,Last_name,luke_609,mobile_number,Address,city,email) VALUES('$First_name','$Last_name','$luke_609','$mobile_number','$Address','$city','$email')");
		
		// Show message when user added
		echo "User added successfully. <a href='index.php'>View Users</a>";
	}
	?>

<footer>
     <p2 > Copyright &copy;Luke Hu Junjie in TAFE 21IT1 2023 </p>
    </footer>
</body>
</html>




<style>
body {  
  background-color: lightblue;  
}  
  
.center {  
  display: block;  
  margin-left: auto;  
  margin-right: auto;  
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