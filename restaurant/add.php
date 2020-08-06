<?php 
include("../server/controller.php");
if($role == "cust" or $role == "")
{header("Location: http://localhost/intern_restro/login.php");}
?>
<!DOCTYPE html>
<html>
<head>
	<title>InternRestro | Add Dish</title>
	<?php include("../includes/header.php"); ?>	
</head>
<body>
<?php include("../includes/nav.php"); ?>

<form class="modal-content animate" action="" method="post" enctype="multipart/form-data">          
  <div class="imgcontainer" >  
    <img src="../assets/images/avtar1.png" alt="Avatar" class="avatar"><br><br>
    <h3 style="text-align:center; color: #1295c9;">Add Dish</h3>
  </div>

  <div class="login-box">
      <div class="textbox">
        <i class="fa fa-cutlery"></i> 
        <input type="text" placeholder="Dish Name" name="d_name"  required >
      </div>
  
    <div class="textbox">
      <i class="fa fa-pencil"></i>
      <textarea style="font-size: 15px; width: 80%; background: none; color: white;border: none;outline: none;" rows="5" placeholder="Please Write Description of the Dish." name="d_description" required ></textarea>
    </div>       
  
	<span style="color: #1295c9;font-size: 20px;"><b>Dish Type : </b></span><br><br>
	<div class="col-md-12">
	  <div class="btn-group" data-toggle="buttons">              
	    <label class="btn btn-success active" style="background-color: #62760c !important;">
	      <input type="radio" name="d_type" value="veg" autocomplete="off" checked> Veg
	    </label>
	    <label class="btn btn-danger" style="background-color: #e84a5f !important;">
	      <input type="radio" name="d_type" value="nveg" autocomplete="off"> Non-Veg
	    </label>
	  </div>
	</div>

	<div class="textbox">
		<i class="fa fa-rupee"></i>
		<input type="text" placeholder="Price Tag" name="d_price" required>
	</div> 

	<div class="textbox">
		<i class="fa fa-file-photo-o"></i><br>
		<input type="file" name="d_img" style="border-radius: 5px; font-size: 20px;" required>       
	</div>          

    <input type="submit" name="add_dish" class="btn login_btn" value="Add Dish"><br><br>
    <br>
  </div>
</form>

<?php echo $msg; ?>

</body>
</html>
