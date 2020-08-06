<?php 
include("../server/controller.php"); 
if($role == "cust" or $role == "")
{header("Location: http://localhost/intern_restro/login.php");}
?>
<!DOCTYPE html>
<html>
<head>
	<title>InternRestro | Dashboard</title>
	<?php include("../includes/header.php"); ?>	
</head>
<body>
<?php include("../includes/nav.php"); ?>
<br><br>
<div class="modal-content animate" action="" method="post">          
<br>
<center>
	<i class="fa fa-pencil-square-o" aria-hidden="true" style="font-size: 50px;"></i><br><br>
	<a href="http://localhost/intern_restro/restaurant/add.php"><input class="btn login_btn" value="Add Dish"></a><br><br>

	<a href="http://localhost/intern_restro/restaurant/orders.php"><input class="btn login_btn" value="Orders"></a><br><br>

	<a href="http://localhost/intern_restro/restaurant/dishes.php"><input class="btn login_btn" value="Listed Dish"></a><br><br>
</center>    

  <br>
</div>
</body>
</html>
