<?php 
include("server/controller.php"); 

if($role == "cust"){ header("Location: http://localhost/intern_restro/menu.php"); }else
if($role == "restro"){ header("Location: http://localhost/intern_restro/restaurant/dashboard.php"); }
?>

<!DOCTYPE html>
<html>
<head>
	<title>InternRestro | Login</title>
	<?php include("includes/header.php"); ?>	
</head>
<body>

<?php include("includes/nav.php"); ?>

<div>    
  <form class="modal-content animate" action="" method="post">          
      <div class="imgcontainer" >  
        <img src="assets/images/avtar1.png" class="avatar"><br><br>
        <h3 style="text-align:center; color: #1295c9;">LOGIN</h3>
      </div>
  
      <div class="login-box">
          <div class="textbox">
            <i class="fa fa-at"></i> 
            <input type="email" placeholder="Email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2, 4}$" required >
          </div>
      
        <div class="textbox">
          <i class="fa fa-lock"></i>
          <input type="password" placeholder="Password" name="password" required>
        </div>       
      
        <input type="submit" name="login" class="btn login_btn" value="LogIn"><br><br>
        <p class="not-yet-user">Not Registered? <a href="./signup.php" style="text-decoration: none; color: #1298c9;">SignUp</a></p>
        <br><br>
      </div>
  </form>    
</div>

<?php echo $msg; ?>

</body>
</html>
