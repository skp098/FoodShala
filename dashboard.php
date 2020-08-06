?php 
include("server/controller.php"); 
?>
<!DOCTYPE html>
<html>
<head>
	<title>InternRestro | Home</title>
	<?php include("includes/header.php"); ?>	
</head>
<body>
<?php include("includes/nav.php"); ?>

<?php

$id =  $_SESSION['u_id'];

?>
<h1>The User ID id : <?php echo $id."----"; ?></h1>

<form action="" method="post">
	<button type="submit" name="logout">Logout</button>
</form>


</body>
</html>
