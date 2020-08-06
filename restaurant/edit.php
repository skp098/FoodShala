<?php 
include("../server/controller.php");
if($role == "cust" or $role == "")
{header("Location: http://localhost/intern_restro/login.php");}

$dish_id = $_GET['dish_id'];

$sql1 = "SELECT * FROM dishes WHERE dish_id='$dish_id'";
$result1 = mysqli_query($conn, $sql1);
$row1 = mysqli_fetch_assoc($result1);

$d_name = $row1['d_name'];
$d_description = $row1['d_description'];
$d_price = $row1['d_price'];
$d_type = $row1['d_type'];
if($d_type=="veg"){$d_veg="checked";$d_nveg="";}else{$d_veg="";$d_nveg="checked";}


?>
<!DOCTYPE html>
<html>
<head>
	<title>InternRestro | Edit Dish</title>
	<?php include("../includes/header.php"); ?>	
</head>
<body>
<?php include("../includes/nav.php"); ?>

<form class="modal-content animate" action="" method="post" enctype="multipart/form-data">          
  <div class="imgcontainer" >  
    <img src="../assets/images/avtar1.png" alt="Avatar" class="avatar"><br><br>
    <h3 style="text-align:center; color: #1295c9;">Edit Dish</h3>
  </div>

  <div class="login-box">
      <div class="textbox">
        <i class="fa fa-cutlery"></i> 
        <input type="text" placeholder="Dish Name" name="d_name" value="<?php echo $d_name; ?>" required >
      </div>
  
    <div class="textbox">
      <i class="fa fa-pencil"></i>
      <textarea style="font-size: 15px; width: 80%; background: none; color: white;border: none;outline: none;" rows="5" placeholder="Please Write Description of the Dish." name="d_description" required ><?php echo $d_description; ?></textarea>
    </div>       
  
	<span style="color: #1295c9;font-size: 20px;"><b>Dish Type : </b></span><br><br>
	<div class="col-md-12">
	  <div class="btn-group" data-toggle="buttons">              
	    <label class="btn btn-success active" style="background-color: #62760c !important;">
	      <input type="radio" name="d_type" value="veg" autocomplete="off" <?php echo $d_veg; ?> > Veg
	    </label>
	    <label class="btn btn-danger" style="background-color: #e84a5f !important;">
	      <input type="radio" name="d_type" value="nveg" autocomplete="off" <?php echo $d_nveg; ?> > Non-Veg
	    </label>
	  </div>
	</div>

	<div class="textbox">
		<i class="fa fa-rupee"></i>
		<input type="text" placeholder="Price Tag" name="d_price" value="<?php echo $d_price; ?>" required>
	</div> 
	<br><br>       
	<input type="hidden" name="dish_id" value="<?php echo $dish_id; ?>">
    <input type="submit" name="edit_dish" class="btn login_btn" value="Update Dish"><br><br>
    <br>
  </div>
</form>

<?php echo $msg; ?>

</body>
</html>
