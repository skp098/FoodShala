<?php 
  include("server/controller.php"); 
?>
<!DOCTYPE html>
<html>
<head>
	<title>InternRestro | Menu</title>
	<?php include("includes/header.php"); ?>	
	<link rel="stylesheet" type="text/css" href="http://localhost/intern_restro/includes/css/menue_style.css">
</head>
<body>
<?php include("includes/nav.php"); ?>


<div class="row r1">
<?php

if($role == "cust"){
  $cust_id = $_SESSION['u_id'];
  $sql1 = "SELECT * FROM customer WHERE cust_id='$cust_id'";
  $result1 = mysqli_query($conn, $sql1);
  $row1 = mysqli_fetch_assoc($result1);
  $pref=  $row1['pref'];
// ---------  Fetching the dishes according to the user preferance weather veg/non-veg and also if the dishes are active or not -----------  
  if($pref=="veg")
  {
    $sql = "SELECT * FROM dishes WHERE d_active='1' AND d_type='veg'";
  }
  else{
    $sql = "SELECT * FROM dishes WHERE d_active='1'";
  }
}
else{
  $sql = "SELECT * FROM dishes WHERE d_active='1'";
}

$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($result)) {

// -------  Fetching the Restaurant name for the dish -----------  

  $restro_id = $row['restro_id'];
  $sql1 = "SELECT * FROM restaurant WHERE restro_id='$restro_id'";
  $result1 = mysqli_query($conn, $sql1);
  $row1 = mysqli_fetch_assoc($result1);
  $restro_name = $row1['restro_name'];


echo "

    <div class='col-md-3 box1' style='background-image: url(http://localhost/intern_restro/restaurant/dish_img/".$row['d_img'].");'>
      <div class='col-md-12 box1_child' > 
        <p style='margin-top: 10px;'>
          <form method='post' action=''>
           <b>".$row['d_name']."</b>
           ($restro_name)
            <br>
                ".$row['d_description']."
            <br>
        </p> 
        <p style='margin-bottom: 100px;'>
           <img src='http://localhost/intern_restro/assets/images/".$row['d_type'].".png' width='20px' style='margin-top: 0px;'>
           <b>&nbsp;&nbsp;&#8377; ".$row['d_price']."/-</b>
           <input type='hidden' name='dish_id' value='".$row['dish_id']."'/>
           <button class='add' name='order' type='submit' >Order</button>
           <br>
          </form>
        </p>
        <br>
        <br>
      </div>
    </div>

    ";

 }



?>    
</div>  
<?php echo $msg; ?>
</body>
</html>
