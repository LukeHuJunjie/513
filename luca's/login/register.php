<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = $confirm_password = $First_name = $Last_name = $mobile_number =$address =$city =$Email ="";
$username_err = $password_err = $confirm_password_err = $First_name_err = $Last_name_err = $mobile_number_err = $address_err = $city_err = $Email_err ="";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
        $username_err = "Username can only contain letters, numbers, and underscores.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM tbl_member WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    if(empty(trim($_POST["First_name"]))){
        $First_name_err = " enter First_name.";     
    } else{
        $First_name = trim($_POST["First_name"]);
    }
    if(empty(trim($_POST["Last_name"]))){
        $Last_name_err = " enter Last_name.";     
    } else{
        $Last_name = trim($_POST["Last_name"]);
    }
    if(empty(trim($_POST["mobile_number"]))){
        $mobile_number_err = "Please enter mobile_number.";     
    } else{
        $mobile_number = trim($_POST["mobile_number"]);
    }
    if(empty(trim($_POST["address"]))){
        $address_err = "Please enter address.";     
    } else{
        $address = trim($_POST["address"]);
    }
    if(empty(trim($_POST["city"]))){
        $city_err = "Please enter city.";     
    } else{
        $city = trim($_POST["city"]);
    }
    if(empty(trim($_POST["Email"]))){
        $Email_err = "Please enter Email.";     
    } else{
        $Email = trim($_POST["Email"]);
    }
    
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)&& empty($First_name_err)&& empty($Last_name_err)&& empty($mobile_number_err)&& empty($address_err)&& empty($city_err)&& empty($Email_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO tbl_member (username, First_name,Last_name,password,mobile_number,address,city,Email) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssssss",$param_username,$param_First_name,$param_Last_name, $param_password, $param_mobile_number, $param_address, $param_city, $param_Email);
            
            // Set parameters
            $param_username = $username;
            $param_First_name = $First_name;
            $param_Last_name = $Last_name;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_mobile_number = $mobile_number;
            $param_address = $address;
            $param_city = $city;
            $param_Email = $Email;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px; }
    </style>
</head>
<body>
<img src="logo.png" alt="My Image" width="100" height="100">  
    <div class="wrapper">
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <label>First_name</label>
                <input type="text" name="First_name" class="form-control <?php echo (!empty($First_name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $First_name; ?>">
                <span class="invalid-feedback"><?php echo $First_name_err; ?></span>
            </div>    
            <div class="form-group">
                <label>Last_name</label>
                <input type="text" name="Last_name" class="form-control <?php echo (!empty($Last_name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Last_name; ?>">
                <span class="invalid-feedback"><?php echo $Last_name_err; ?></span>
            </div>    
            <div class="form-group">
                <label>mobile_number</label>
                <input type="text" name="mobile_number" class="form-control <?php echo (!empty($mobile_number_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $mobile_number; ?>">
                <span class="invalid-feedback"><?php echo $mobile_number_err; ?></span>
            </div>    
            <div class="form-group">
                <label>address</label>
                <input type="text" name="address" class="form-control <?php echo (!empty($address_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $address; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group">
                <label>city</label>
                <input type="text" name="city" class="form-control <?php echo (!empty($city_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $city; ?>">
                <span class="invalid-feedback"><?php echo $city_err; ?></span>
            </div>    
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="Email" class="form-control <?php echo (!empty($Email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Email; ?>">
                <span class="invalid-feedback"><?php echo $Email_err; ?></span>
            </div>    
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-secondary ml-2" value="Reset">
            </div>
            
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
    </div>    
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