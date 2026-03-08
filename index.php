<?php
  require"config/db.inc.php";
  $query="SELECT * FROM site_sittings WHERE id=1; ";
  $result = mysqli_query($conn,$query);
  $data = mysqli_fetch_assoc($result); 
   
?>
<?php 
  require"config/db.inc.php";
  $quer="SELECT image FROM site_sittings WHERE id BETWEEN 2 AND 6; ";
  $res = mysqli_query($conn,$quer);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Playfair+Display:ital,wght@0,900;1,900&family=Roboto+Slab:wght@100..900&display=swap" rel="stylesheet">
    <title>MotionRent</title>
</head>
<body>
<!-- 1 -->
 <?php require "includes/nav.php";?>
<!-- 2 -->
<div class="head pt-5 pb-5 " id="hero" >
     
    <div class="text " id="scrollspyHeading1">
        <h1 >Welcome To MotionRent</h1>
        <p>Premium car rental services for unforgettable road trips</p>
        
    </div>
</div>
<!-- 3 -->
<div class="about">
<div class="container">
    <div class="main-title mt-5 mb-5 position-relative text-center">
        <span class="text-uppercase ab" id="scrollspyHeading2">About</span>
        <h2>About<span>US</span></h2>
      </div>
      <div class="row">
        <div class="col-lg-7 ">
          <div class="box">
          <img src="image/deal.jpg" class="img-fluid" alt="">
          <div class="caption">
            <h2><?php echo $data['about']; ?></h2>
          </div>
          </div>
        </div>
        <div class="col-lg-5 ">
         <span class="text-uppercase">About US</span>
         <h1>MotionRent</h1>
         <p class="p1 text-black-50">We make care lease services easy.</p>

         <p class="text-black-50">Our first leasing deal came out in 2004. Since then,
           we've become the leaders on the market, supplying vehicles of different models for over 15 years.</p>
           <h5> <i class="fa-solid fa-circle-check"></i>   Sports cars;</h5>
           <h5> <i class="fa-solid fa-circle-check"></i>   Executive-class car;</h5>
           <h5> <i class="fa-solid fa-circle-check"></i>   Budget vehicles.</h5>
           <p class="text-black-50">FutureLease is able to get you the fittest leasing deals. Our goal is to build a continuous collaboration between the company and our clients,
             to make sure you'll go back to us time and time again.</p>


        </div>
      </div>
</div>
<div class="att pt-5">
<h1 class="text-uppercase text-center pt-5 pb-5">Want some advice? <br>
We're up to it.</h1>
</div>

</div>

<!-- 4-->
  <div class="scrol text-center">
  <div class="main-title mt-5 mb-5 position-relative text-center">
        <span class="text-uppercase ab" id="scrollspyHeading2">cars</span>
        <h2>Available <span>options</span></h2>
      </div>
      
 <div class="carousel-container">
  <div class="carousel-track">
   <?php 
 while($row = mysqli_fetch_assoc($res)){
echo '<img src="'.$row['image'].'">';
}

mysqli_data_seek($res,0);

while($row = mysqli_fetch_assoc($res)){
echo '<img src="'.$row['image'].'">';
}
?>
 
  </div>
</div>
  <p>Your journey, your rules. Book the perfect car today.Affordable rates, top-notch vehicles, and 24/7 support
    <br>Explore more with our convenient, reliable car hire options.
  </p>
</div> 
<!-- 5 -->
<div class="step">
  <div class="container">
     <div class="main-title mt-5 mb-5 position-relative text-center">
        <span class="text-uppercase ab" id="scrollspyHeading2">steps</span>
        <h2 class="text-uppercase">How To <span>Lease</span> a Car</h2>
        <p class="text-black-50 cad">If you've never leased a car before, we'll guide you through the process.</p>
      </div>

      <div class="row">
       <div class="col-lg-4">
        <div class="text text-center pt-5 pb-5">
         <span class="number">01.</span>
         <h4 class="fw-bold">Design Your Lease Deal</h4>
         <p class="text-black-50">The first step is to design a lease agreement and decide on the lease period and mileage included.</p>

        </div>
       </div>
        <div class="col-lg-4">
        <div class="text text-center pt-5 pb-5">
         <span class="number">02.</span>
         <h4 class="fw-bold">Estimate THE Monthly Payment</h4>
         <p class="text-black-50">The formula is complicated, but we will calculate all the payments and find the best offers for you.</p>

        </div>
       </div>
        <div class="col-lg-4">
        <div class="text text-center pt-5 pb-5">
         <span class="number">03.</span>
         <h4 class="fw-bold">Sign the contract</h4>
         <p class="text-black-50">When we have discussed the details, you sign the contract and receive the keys to your car. It's that simple!</p>

        </div>
       </div>

      </div>

  </div>
</div>

<!-- 6 -->
<!-- <div class="mar pt-5 ">
  <div class="container">
    <div class="row">
      <div class="col-lg-3">
        <div class="img text-center">
        <img src="image/download.svg" alt=""  width="185px">
        </div>
      </div>
      <div class="col-lg-3">
        <div class="imga text-center">
        <img src="image/download (1).svg" alt=""  width="175px">
        </div>
      </div>
      <div class="col-lg-3 text-center">
        <div class="imge text-center">
        <img src="image/download (4).svg" alt=""  width="135px" >
        </div>
      </div>
      <div class="col-lg-3 text-center">
        <div class="img">
        <img src="image/download (3).svg" alt=""  width="185px">
        </div>
      </div>
   
    </div>
  </div>
</div> -->
<!-- 7 -->
<div class="contact">
  <div class="container">
     <div class="main-title mt-5 mb-5 position-relative text-center">
        <span class="text-uppercase ab" id="scrollspyHeading2">Contact</span>
        <h2>Contact<span>US</span></h2>
      </div>
      <div class="map">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d24200.503063700082!2d-73.90106912200497!3d40.6946127080301!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25c11aa458453%3A0x8b29c89949c0c67c!2zQnVzaHdpY2ssINio2LHZiNmD2YTZitmG2Iwg2YbZitmI2YrZiNix2YM!5e0!3m2!1sar!2sus!4v1772053078517!5m2!1sar!2sus" width="100%" height="300" style="border:0; background-color: black;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
         </div>
      <div class="row">
        
        <div class="col-lg-7">
        <div class="text">
          <span><i class="fa-solid fa-location-dot"></i><span class="m">142 Madison St, Brooklyn, NY 11216, USA</span></span>
        </div>
        <br>
         <div class="text">
          <span><i class="fa-solid fa-phone"></i><span class="m"><?php echo $data['phone'] ?> </span></span>
        </div>
        </div>
        <div class="col-lg-5">
         <div class="text">
          <span><i class="fa-brands fa-whatsapp"></i><span class="m"><?php echo $data['whatsapp'] ?> </span></span>
        </div>
        <br>
        <div class="text">
          <span><i class="fa-solid fa-envelope"></i><span class="m"><?php echo $data['email'] ?> </span></span>
        </div>
        </div>
        
        
         
      
      </div>
      </div>




  </div>
</div>
<!-- 8 -->
<?php require "includes/footer.php";?>

<script src="js/script.js"></script>
 <script src="js/bootstrap.bundle.min.js"> </script>
    <script src="js/all.min.js"></script>
</body>
</html>