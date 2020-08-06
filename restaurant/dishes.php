<?php 
include("../server/controller.php"); 
if($role == "cust" or $role == "")
{header("Location: http://localhost/intern_restro/login.php");}
?>
<!DOCTYPE html>
<html>
<head>
	<title>InternRestro | Listed Dishes</title>
	<?php include("../includes/header.php"); ?>	
</head>
<body>
<?php include("../includes/nav.php"); ?>



<div class="table-responsive" style="width: 80%; margin: 0 auto; margin-top: 50px;">
	<center><b><span style="color: #1295c9; font-size: 35px;">Listed<span style="color: #666666;">Dishes</span></span></b></center>
	<br><br>
<table class="table table-dark table-striped">
  <thead>
    <tr>
      <th scope="col">S.No</th>
      <th scope="col">Dish Image</th>
      <th scope="col">Dish Name</th>
      <th scope="col">Dish Price</th>
      <th scope="col">Active Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
<?php

$restro_id = $_SESSION['u_id'];
$sql = "SELECT * FROM dishes WHERE restro_id='$restro_id'";
$result = mysqli_query($conn, $sql);
$x=1;
while($row = mysqli_fetch_assoc($result)) {		
		$dish_id = $row['dish_id'];		

		$sql1 = "SELECT * FROM dishes WHERE dish_id='$dish_id'";
		$result1 = mysqli_query($conn, $sql1);
		$row1 = mysqli_fetch_assoc($result1);

		$dish_name = $row1['d_name'];
		$dish_price = $row1['d_price'];
		$dish_img = $row1['d_img'];
		$d_active = $row['d_active'];
		if($d_active=="1"){$btn="btn-success";$btn_txt="Active";}else{$btn="btn-danger";$btn_txt="Inactive";}
		echo "
			    <tr>
			      <th scope='row'>$x</th>
			      <td><img src='../restaurant/dish_img/$dish_img' width='100px'></td>
			      <td>$dish_name</td>
			      <td>Rs. $dish_price/-</td>
			      <td>			    
			      <form action='' method='post'>
			      	<input type='hidden' name='d_active' value='$d_active'>
			      	<input type='hidden' name='dish_id' value='$dish_id'>
			      	<button name='set_active' type='submit' class='btn $btn'>$btn_txt</button>
			      </form>
			      </td>
			      <td>
			      			      	
			      	<a href='http://localhost/intern_restro/restaurant/edit.php?dish_id=$dish_id'><button class='btn btn-success'>Edit Dish</button></a>
			      </td>
			    </tr>
		";
		$x++;
}

?>

  </tbody>
</table>
<?php echo $msg; ?>
</div>	
</body>
</html>
