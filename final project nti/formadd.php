<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bitcount+Single:wght@100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" 
                    rel="stylesheet">
     <link rel="stylesheet" href="css/form.css">
    <title>ADD CAR</title>
</head>
<body>
     <!-- start database -->
      <?php 
      require('db.php');
      $resalt = mysqli_query($connect , "SELECT * FROM `forms`");
      $username ="";
      $email ="";
      $phone ="";
      $brand ="";
      $model ="";

      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $phone = $_POST['number'];
        $brand = $_POST['brand'];
        $model = $_POST['model'];
      }
      $send ="";
      if(isset($_POST['send'])){
        if(!empty($username) && !empty($email) && !empty($phone)
            && !empty($brand) && !empty($model)){
        $send ="INSERT INTO forms (`username`,`email`,`phone`,`brand`,`model`)
         VALUES ('$username','$email','$phone','$brand','$model')";
         if(mysqli_query($connect ,$send )){
            $sucsses = "Message sent successfully! We will contact you soon";
            $username=$email=$phone=$brand=$model="";
         }
         
      }else{
         $errors ="All fildes required";
      }
      }
      ?>
   <h1 class="text text-center text-warning mt-5"><spain class=" text-secondary">ADD </spain>THE CAR</h1>
    <div class="container py-5">
        <div class="row">

       
           <?php 
           if(isset($errors)){ ?>
            <div class="alert alert-danger mt-3">
                <?php echo $errors ?>
            </div>
          <?php }?>

           <?php 
           if(isset($sucsses)){ ?>
            <div class="alert alert-success mt-3">
                <?php echo $sucsses ?>
            </div>
          <?php }?>
    
          <form method ="post" class="w-50 text-warning bg-secondary col-md-6" id="form"  >

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email </label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Phone number</label>
                    <input type="tel" name="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Brand</label>
                    <input type="text" name="brand" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Model year</label>
                    <input type="text" name="model" class="form-control" id="exampleInputPassword1">
                </div>
                <button type="submit" name="send" class="btn btn-warning">Send</button>
            </form>

         </div>   
    </div>

</body>
</html>