<?php 
include("server/controller.php"); 
if($role == "cust"){ header("Location: http://localhost/intern_restro/menu.php"); }else
if($role == "restro"){ header("Location: http://localhost/intern_restro/restaurant/dashboard.php"); }
?>

<!DOCTYPE html>
<html>
<head>
	<title>InternRestro | SignUp</title>
	<?php include("includes/header.php"); ?>
</head>
<body>

<?php include("includes/nav.php"); ?>

<div>


    <div class="modal-content animate" >         
      <div class="imgcontainer" >  
        <img src="assets/images/avtar1.png" alt="Avatar" class="avatar"><br><br>
        <h3 style="text-align:center; color: #1295c9;">SignUp As : </h3>
      </div>

      <span>
        <center>
          <button class="sign_type_btn" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Customer</button>
          <button class="sign_type_btn collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Restaurant</button>
        </center>
      </span>

    <div id="accordion">
      <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">      
        <br><br>
      <div class="login-box">
        <form action="" method="post">
          <div class="textbox">
            <i class="fa fa-user"></i> 
            <input type="text" placeholder="Name" name="name"  required >
          </div>

          <div class="textbox">
            <i class="fa fa-at"></i> 
            <input type="email" placeholder="Email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2, 4}$" required >
          </div>

          <div class="textbox">
            <i class="fa fa-phone"></i> 
            <input type="text" placeholder="Phone" name="phone" pattern="[1-9]{1}[0-9]{9}$" required >
          </div>        
          <span style="color: #1295c9;font-size: 20px;"><b>Your Preference : </b></span><br><br>
          <div class="col-md-12">
              <div class="btn-group" data-toggle="buttons">              
                <label class="btn btn-success active" style="background-color: #62760c !important;">
                  <input type="radio" name="pref" value="veg" autocomplete="off" checked> Vegetarian
                </label>
                <label class="btn btn-danger" style="background-color: #e84a5f !important;">
                  <input type="radio" name="pref" value="nveg" autocomplete="off"> Non-Vegetarian
                </label>
              </div>
          </div>
          <br>
          <div class="textbox">
            <i class="fa fa-lock"></i>
            <input type="password" placeholder="Password" name="password" required>
          </div>       
          <input type="hidden" name="role" value="cust">
          <input type="hidden" name="restro_name" value="">
          <input type="submit" name="signup" class="btn login_btn" value="SignUp"><br><br>

        </form>
        <p class="not-yet-user">Alredy Registered? <a href="./login.php" style="text-decoration: none; color: #1298c9;">Login</a></p>
        <br><br>
      </div>

      </div>

      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">      
        <br><br>
      <div class="login-box">
        <form action="" method="post">
          <div class="textbox">
            <i class="fa fa-user"></i> 
            <input type="text" placeholder="Name" name="name"  required >
          </div>

          <div class="textbox">
            <i class="fa fa-at"></i> 
            <input type="email" placeholder="Email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2, 4}$" required >
          </div>

          <div class="textbox">
            <i class="fa fa-phone"></i> 
            <input type="text" placeholder="Phone" name="phone" pattern="[1-9]{1}[0-9]{9}$" required >
          </div>   

        <div class="textbox">
          <i class="fa fa-building-o"></i> 
          <input type="text" placeholder="Restaurant Name" name="restro_name"  required >
        </div>                

        <div class="textbox">
          <i class="fa fa-lock"></i>
          <input type="password" placeholder="Password" name="password"  required>
        </div>       
        <input type="hidden" name="role" value="restro">
        <input type="hidden" name="pref" value="">
        <input type="submit" name="signup" class="btn login_btn" value="SignUp"><br><br>
      </form>
        <p class="not-yet-user">Alredy Registered? <a href="./login.php" style="text-decoration: none; color: #1298c9;">Login</a></p>
        <br><br>
      </div>       
      </div>
    </div>

  
  
    </div>

<?php echo $msg; ?>


</body>
</html>
