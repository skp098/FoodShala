<?php 
include("../server/controller.php");
if($role == "restro" or $role == "")
{header("Location: http://localhost/intern_restro/login.php");} 
?>
<!DOCTYPE html>
<html>
<head>
	<title>InternRestro | Home</title>
	<?php include("../includes/header.php"); ?>	
</head>
<body>
<?php include("../includes/nav.php"); ?>



<div class="table-responsive" style="width: 80%; margin: 0 auto; margin-top: 50px;">
	<center><b><span style="color: #1295c9; font-size: 35px;">Order<span style="color: #666666;">History</span></span></b></center>
	<br><br>
<table class="table table-dark table-striped">
  <thead>
    <tr>
      <th scope="col">S.No</th>
      <th scope="col">Dish Image</th>
      <th scope="col">Dish Name</th>
      <th scope="col">Dish Price</th>
      <th scope="col">Order Date</th>
    </tr>
  </thead>
  <tbody>
<?php

$cust_id = $_SESSION['u_id'];
$sql = "SELECT * FROM orders WHERE cust_id='$cust_id'";
$result = mysqli_query($conn, $sql);
$x=1;
while($row = mysqli_fetch_assoc($result)) {		
		$dish_id = $row['dish_id'];
		$sql1 = "SELECT * FROM dishes WHERE dish_id='$dish_id'";
		$result1 = mysqli_query($conn, $sql1);
		$row1 = mysqli_fetch_assoc($result1);
		$dish_img = $row1['d_img'];
		$dish_name = $row1['d_name'];
		$dish_price = $row1['d_price'];
		$date = $row['date'];
		echo "
			    <tr>
			      <th scope='row'>$x</th>
			      <td><img src='../restaurant/dish_img/$dish_img' width='100px'></td>
			      <td>$dish_name</td>
			      <td>Rs. $dish_price/-</td>
			      <td>$date</td>
			    </tr>
		";
		$x++;
}

?>

  </tbody>
</table>

</div>	

</body>
</html>
