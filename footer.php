<?php
  require"config/db.inc.php";
  $query="SELECT * FROM site_sittings LIMIT 1";
  $result = mysqli_query($conn,$query);
  $data = mysqli_fetch_assoc($result); 
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/home.css">
    <title>Document</title>
</head>
<body>
    <div class="footer">
  <div class="container ">
    <div class="row">
      <div class="col-lg-4">
        <div class="text">
        <h2>MotionRent</h2>
        <p>Cras fermentum odio eu feugiat lide par naso tierra.
           Justo eget nada terra videa magna derita valies darta donna mare fermentum iaculis eu non diam phasellus.</p>
           <div class="icon">
               <a href="<?php echo $data['x'] ?> "><i class="fa-brands fa-x-twitter"></i></a>   
             <a href="<?php echo $data['facebook'] ?> "><i class="fa-brands fa-facebook"></i></a> 
             <a href="<?php echo $data['instagram'] ?> "><i class="fa-brands fa-instagram"></i></a> 
              
              </div>
       </div>       
      </div>
        
       <div class="col-lg-2">
        <div class="text">
          <h5>Useful Links</h5>
          <ul>
            <li>Home</li>
            <li>About US</li>
            <li>Car Rentel</li>
            <li>Rent My Car</li>
            <li>Privacy policy</li>
          </ul>
        </div>
       </div>
          <div class="col-lg-3">
        <div class="text">
          <h5>Our Services</h5>
          <ul>
            <li>Web Design</li>
            <li>Web Development</li>
            <li>Product Management</li>
            <li>Marketing</li>
            <li>Graphic Design</li>
          </ul>
        </div>
       </div>
       <div class="col-lg-3">
        <div class="box">
          <h5>Contact Us</h5>
          <p>A108 Adam StreetNew York, NY 535022United States</p>
        </div>
        <div class="box">
          
          <p><span>Phone:</span><?php echo $data['phone'] ?> <br>
          <span>Email:</span><?php echo $data['email'] ?></p>
        </div>
       </div>


    </div>
  
  </div>
  <div class="container cop text-center">
      <div class="copy">
     <p>© Copyright <b>MotionRent</b> All Rights Reserved <br> 
     Designed by <span>Team NTI</span></p>
    </div>
  </div>
</div>
</body>
</html>