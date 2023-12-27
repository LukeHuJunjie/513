<?php
// include database connection file
include_once("config.php");

// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	
	$First_name=$_POST['First_name'];
	$Last_name=$_POST['Last_name'];
	$luke_609=$_POST['luke_609'];
	$mobile_number=$_POST['mobile_number'];
	$Address=$_POST['Address'];
	$city=$_POST['city'];
	$email=$_POST['email'];
		
	// update user data
	$result = mysqli_query($mysqli, "UPDATE users SET First_name='$First_name',Last_name='$Last_name',luke_609='$luke_609',mobile_number='$mobile_number',Address='$Address',city='$city',email='$email' WHERE id=$id");
	
	// Redirect to homepage to display updated user in list
	header("Location: index.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];

// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM users WHERE id=$id");

while($user_data = mysqli_fetch_array($result))
{

	$First_name=$user_data['First_name'];
	$Last_name=$user_data['Last_name'];
	$luke_609=$user_data['luke_609'];
	$mobile_number=$user_data['mobile_number'];
	$Address=$user_data['Address'];
	$city=$user_data['city'];
	$email=$user_data['email'];
}
?>
<html>
<head>	
	<title>Edit User Data</title>
</head>

<body>
	<a href="index.php" class="btn">Home</a>
	<br/><br/>
	
	<form name="update_user" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>First_name</td>
				<td><input type="text" name="First_name" value=<?php echo $First_name;?>></td>
			</tr>
			<tr> 
				<td>Last_name</td>
				<td><input type="text" name="Last_name" value=<?php echo $Last_name;?>></td>
			</tr>
			<tr> 
				<td>luke_609</td>
				<td><input type="text" name="luke_609" value=<?php echo $luke_609;?>></td>
			</tr>
			<tr> 
				<td>mobile_number</td>
				<td><input type="text" name="mobile_number" value=<?php echo $mobile_number;?>></td>
			</tr>
			<tr> 
				<td>Address</td>
				<td><input type="text" name="Address" value=<?php echo $Address;?>></td>
			</tr>
			<tr> 
				<td>city</td>
				<td><input type="text" name="city" value=<?php echo $city;?>></td>
			</tr>
			<tr> 
				<td>email</td>
				<td><input type="text" name="email" value=<?php echo $email;?>></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>


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