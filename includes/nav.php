  <nav class="navbar navbar-expand-sm navbar-light bg-faded navbar-fixed" >
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-content"aria-controls="nav-content" aria-expanded="false" aria-label="Toggle navigation" style="background-color: #f5921d;">
    <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Brand -->

    <a class="nav-link" href="http://localhost/intern_restro/index.php" ><b><span style="color: #1295c9; font-size: 25px;">FOOD<span style="color: #666666;">SHALA</span></span></b></a>
    
    <!-- Links -->
    <div class="collapse navbar-collapse justify-content-end" id="nav-content">   
        <ul class="navbar-nav">        
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/intern_restro/index.php" >Home</a>
          </li>   
          <li class="nav-item">
              <a class="nav-link" href="http://localhost/intern_restro/menu.php">Explore Menu</a>
          </li>      

<?php

// -------------   Chagnes The Content of NavBar if the user logged in is a "CUSTOMER" ------------------------

if($role=="cust"){
  echo "
          <li class='nav-item'>
            <a class='nav-link' href='http://localhost/intern_restro/customer/order.php'> Orders <i class='fa fa-book' aria-hidden='true'></i></a>
          </li>           
          <li class='nav-item'>
            <a class='nav-link'><form method='post' action=''> <button name='logout' style='border:none;background:none;color:white;'><b>Logout</b> <i class='fa fa-sign-out' aria-hidden='true'></i></button> </form></a>
          </li>          
  ";
}


// -------------   Chagnes The Content of NavBar if the user logged in is a "RESTAURANT" ------------------------

else if($role=="restro")
{
echo "
          <li class='nav-item'>
            <a class='nav-link' href='http://localhost/intern_restro/restaurant/add.php'> Add Dish <i class='fa fa-plus' aria-hidden='true'></i></a>
          </li>          
          <li class='nav-item'>
            <a class='nav-link' href='http://localhost/intern_restro/restaurant/orders.php'> Orders <i class='fa fa-book' aria-hidden='true'></i></a>
          </li>
          <li class='nav-item'>
            <a class='nav-link' href='http://localhost/intern_restro/restaurant/dashboard.php'> Dashboard <i class='fa fa-user-circle-o' aria-hidden='true'></i></a>
          </li>            
          <li class='nav-item'>
            <a class='nav-link'><form method='post' action=''> <button name='logout' style='border:none;background:none;color:white;'><b>Logout</b> <i class='fa fa-sign-out' aria-hidden='true'></i></button> </form></a>
          </li>          
";
}

// -------------   Chagnes The Content of NavBar if the user logged in is a "NORMAL VISITING USER" ------------------------

else{
echo "
          <li class='nav-item'>
            <a class='nav-link' href='http://localhost/intern_restro/login.php'> Login <i class='fa fa-sign-in' aria-hidden='true'></i></a>
          </li>
          <li class='nav-item'>
            <a class='nav-link' href='http://localhost/intern_restro/signup.php'> SignUp <i class='fa fa-user-plus' aria-hidden='true'></i></a>
          </li>  
";
}

?>
        </ul>
      </div>
  </nav>  


