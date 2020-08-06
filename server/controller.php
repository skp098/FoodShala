<?php
session_start();

// Setting us the type of role if the user is logged in to check on every page and do the validation accordingly

if(isset($_SESSION['u_id'])){
	$role = $_SESSION['role'];
}
else { $role = ""; }
$conn = mysqli_connect('localhost', 'root', '', 'intern_restro');
$msg="";


// ---------- Handle SignUp ----------

if (isset($_POST['signup'])) {
	
// generating a random userid

$u_id = "IR".rand(10,1000000);
$name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$phone = mysqli_real_escape_string($conn, $_POST['phone']);
$pref = mysqli_real_escape_string($conn, $_POST['pref']);
$role1 = mysqli_real_escape_string($conn, $_POST['role']);
$restro_name = mysqli_real_escape_string($conn, $_POST['restro_name']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$password = md5($password);	

// ---------  Checking if the user already exist or not -----------

$sql = "SELECT * FROM `users` WHERE `email`='$email' OR `phone`='$phone'";

if (mysqli_num_rows(mysqli_query($conn, $sql))>0) {
	$msg = "<script>swal('Oops!', 'You already have an account! Please login to continue.', 'error');</script>";
}
else{

$sql = "INSERT INTO `users`( `u_id`, `email`, `phone`, `role`, `pass`) 
	VALUES ('$u_id','$email','$phone','$role1','$password')";	

if (mysqli_query($conn, $sql)) {

// ---------  Checking if the user signed up as a customer than inserting value in customer table -----------

	if($role1=="cust"){
		$sql = "INSERT INTO `customer`( `cust_id`, `name`,`email`, `phone`, `pref`) 
		VALUES ('$u_id','$name','$email','$phone','$pref')";

		if (mysqli_query($conn, $sql)) {
			$msg = "<script>swal('Registration successful!', 'Please login to continue.', 'success');</script>";
		}
		else {	
			$msg = "<script>swal('Error!', 'Something Went Wrong! Please try again', 'error');</script>";
		}
	}
	else
// ---------  Checking if the user signed up as a RESTAURANT than inserting value in rataurant table -----------		
	if($role1=="restro"){
		$sql = "INSERT INTO `restaurant`( `restro_id`, `name`,`email`, `phone`, `restro_name`) 
		VALUES ('$u_id','$name','$email','$phone','$restro_name')";

		if (mysqli_query($conn, $sql)) {
			echo "$name<br>$email<br>$phone<br>$pref<br>$password<br>$u_id<br>$role";
		}
		else {	
			$msg = "<script>swal('Registration successful!', 'Please login to continue.', 'success');</script>";
		}				
	}
// ---------  Redirecting the user to login after successful signup -----------
	$msg = "<script>swal('Registration Successful!', 'Please login to continue.', 'success').then((value) => {
			window.location.href = 'http://localhost/intern_restro/login.php';
		});</script>";	
} 
else {	
	$msg = "<script>swal('Error!', 'Something Went Wrong! Please try again', 'error');</script>";	
}
}

mysqli_close($conn);


}

// ---------- Handle Login ----------

if (isset($_POST['login'])) {
	
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);

	$sql = "SELECT * FROM `users` WHERE `email`='$email'";

	if (mysqli_num_rows(mysqli_query($conn, $sql))>0) {

		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		$hash_pass =  $row['pass'];

		if(md5($password) == $hash_pass){
			$hash_pass =  $row['pass'];
			$role =  $row['role'];
			$msg = "<script>swal('Yeyyyy', 'Password Matched', 'success');</script>";
			session_start();
			$_SESSION['u_id'] = $row['u_id'];
			$_SESSION['role'] = $row['role'];

// ---------  Redirecting user to respective dashboard according to their role after login -----------		

			if($role == "cust"){ header("Location: http://localhost/intern_restro/menu.php"); }else
			if($role == "restro"){ header("Location: http://localhost/intern_restro/restaurant/dashboard.php"); }	
      
    }else{
    	$msg = "<script>swal('Oops!', 'Incorrect Password!!.', 'error');</script>";
    }
		
	}
	else{
		$msg = "<script>swal('Oops!', 'Email Does Not Exist! Please check your email.', 'error');</script>";	
	}
}



// ---------- Handle LogOut ----------

if (isset($_POST['logout'])) {
	session_destroy();
// ---------  Redirecting user after logout to login  -----------	
	header("Location: http://localhost/intern_restro/login.php");
}


// ---------- Handle Add Dish ----------

if (isset($_POST['add_dish'])) {

$dish_id = "DISH".rand(10,1000000);
$restro_id = $_SESSION['u_id'];
$d_name = mysqli_real_escape_string($conn, $_POST['d_name']);
$d_description = mysqli_real_escape_string($conn, $_POST['d_description']);
$d_type = mysqli_real_escape_string($conn, $_POST['d_type']);
$d_price = mysqli_real_escape_string($conn, $_POST['d_price']);


$target_dir = "dish_img/";
$image_name = $_FILES["d_img"]["name"];
$target_file = $target_dir . basename($_FILES["d_img"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if (file_exists($target_file)) {
  $msg = "<script>swal('Oops!', 'Image Already Exist.', 'error');</script>";	  
}
else 
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg")
{
  $msg = "<script>swal('Oops!', 'Only JPG, JPEG & PNG files are allowed.', 'error');</script>";
  $uploadOk = 0;
}
else
{
  if (move_uploaded_file($_FILES["d_img"]["tmp_name"], $target_file)) {

	$sql = "INSERT INTO `dishes`( `dish_id`, `restro_id`,`d_name`, `d_description`, `d_type`, `d_price`, `d_img`) 
	VALUES ('$dish_id','$restro_id','$d_name','$d_description','$d_type','$d_price','$image_name')";

	if (mysqli_query($conn, $sql)) {
		$msg = "<script>swal('Image Uploaded!', '', 'success');</script>";
		$msg = "<script>swal('Dish Added!', 'Dish has been added successfully.', 'success');</script>";	
	}	    
  }
  else {
    $msg = "<script>swal('Oops!', 'Error Uploading the image.', 'error');</script>";
  }		
}


}


// ---------- Handle Order ----------

if (isset($_POST['order'])) {
	
	if($role == "cust"){
	$order_id = "ORD".rand(10,1000000);
	$cust_id = $_SESSION['u_id'];
	$dish_id = mysqli_real_escape_string($conn, $_POST['dish_id']);

	$sql = "SELECT * FROM `dishes` WHERE `dish_id`='$dish_id'";

	if (mysqli_num_rows(mysqli_query($conn, $sql))>0) {

		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		$restro_id =  $row['restro_id'];
		$date = date("d-M-Y");

		$sql = "INSERT INTO `orders`( `order_id`, `dish_id`,`restro_id`, `cust_id`,`date`) 
		VALUES ('$order_id','$dish_id','$restro_id','$cust_id','$date')";

		if (mysqli_query($conn, $sql)) {
			$msg = "<script>swal('Order Placed', 'Your order has been placed you may check under your order history.', 'success');</script>";	
		}else{
			$msg = "<script>swal('Oops!', 'Something Went Wrong. Please try again.', 'error');</script>";
		}
	}


	}
	else
	if($role == "restro"){ $msg = "<script>swal('Acces Denied!', 'You are not allowd to place order. Kindly login as a customer.', 'error');</script>"; }
	else{
			$msg = "<script>swal('Oops!', 'Please login to order food item.', 'error').then((value) => {
			window.location.href = 'http://localhost/intern_restro/login.php';
			});</script>";		
	}
}


// ---------- Handle Edit Dish ----------

if (isset($_POST['edit_dish'])) {

$dish_id = mysqli_real_escape_string($conn, $_POST['dish_id']);
$d_name = mysqli_real_escape_string($conn, $_POST['d_name']);
$d_description = mysqli_real_escape_string($conn, $_POST['d_description']);
$d_type = mysqli_real_escape_string($conn, $_POST['d_type']);
$d_price = mysqli_real_escape_string($conn, $_POST['d_price']);


$sql = "UPDATE `dishes` SET `d_name`='$d_name',`d_description`='$d_description', `d_type`='$d_type', `d_price`='$d_price' WHERE `dish_id`='$dish_id'";

if (mysqli_query($conn, $sql)) {	
	$msg = "<script>swal('Dish Edited Successfully!', '', 'success');</script>";	
}	    

}



// ---------- Handle Dish Active ----------

if (isset($_POST['set_active'])) {

$dish_id = mysqli_real_escape_string($conn, $_POST['dish_id']);
$d_active = mysqli_real_escape_string($conn, $_POST['d_active']);
if($d_active==1){$d_active=0;}else{$d_active=1;}


$sql = "UPDATE `dishes` SET `d_active`='$d_active' WHERE `dish_id`='$dish_id'";

if (mysqli_query($conn, $sql)) {	
	$msg = "<script>swal('Dish Status Changed!', '', 'success');</script>";	
}	

}

?>

