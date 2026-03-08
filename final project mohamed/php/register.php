<?php 
session_start();

$errors = $_SESSION['errors'] ?? [];
$old = $_SESSION['old'] ?? [];

unset($_SESSION['errors']); 
unset($_SESSION['old']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="../bootstrap.min.css">
    <link rel="stylesheet" href="../aos.css">
    <link rel="stylesheet" href="../css/regester.css">
    <title>Rigester</title>
</head>
<body>

    
        <div class="items">
        <div class="card   shadow-lg p-3 m-5 bg-body-tertiary rounded" style="width: 50rem; " data-aos="zoom-in">
            <div  class="card-title">
                <h1 class="p-3 fw-bold">Register</h1>
            </div>
            <div class="card-body " style="width: 100%;">
                <form action="../php/process_register.php" method="post">
                   <div class="row g-3">
                        <div class="col-6">
                            <input type="text" name="fname" class="form-control " placeholder="First name" aria-label="First name" value="<?php echo $old['fname'] ?? ''; ?>">
                            <?php if(isset($errors['fname'])): ?>
                                <div class="text-danger small mt-2 fw-bold error"><?php echo $errors['fname'] ?></div>
                            <?php endif; ?>
                           
                        </div>
    
                        <div class="col-6">
                            <input type="text" name="lname" class="form-control " placeholder="Last name" aria-label="Last name" value="<?php echo $old['lname'] ?? ''; ?>">
                            <?php if(isset($errors['lname'])): ?>
                                <div class="text-danger small mt-2 fw-bold error"><?php echo $errors['lname'] ?></div>
                            <?php endif; ?>
                        </div>

                        <div class="col-12">
                            <input type="text" name="Username" class="form-control " placeholder="User Name" aria-label="User Name" value="<?php echo $old['username'] ?? ''; ?>">
                            <?php if(isset($errors['username'])): ?>
                                <div class="text-danger small mt-2 fw-bold error"><?php echo $errors['username'] ?></div>
                            <?php endif; ?>
                            <?php if(isset($errors['username1'])): ?>
                                 <div class="text-danger small mt-2 fw-bold error"><?php echo $errors['username1'] ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="col-12">
                            <input type="email" name="email" class="form-control " placeholder="Email" aria-label="name@gmail.come" value="<?php echo $old['email'] ?? ''; ?>">
                            <?php if(isset($errors['email'])): ?>
                                <div class="text-danger small mt-2 fw-bold error"><?php echo $errors['email'] ?></div>
                            <?php endif; ?>
                            <?php if(isset($errors['email1'])): ?>
                                <div class="text-danger small mt-2 fw-bold error"><?php echo $errors['email1'] ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="col-12">
                            <input type="tel" name="phone" class="form-control " placeholder="Phone" aria-label="+20100000" value="<?php echo $old['phone'] ?? ''; ?>">
                            <?php if(isset($errors['phone'] )): ?>
                                <div class="text-danger small mt-2 fw-bold error"><?php echo $errors['phone']  ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="col-12">
                            <input type="password" name="password" class="form-control " placeholder="Password" aria-label="" value="<?php echo $old['password'] ?? ''; ?>">
                           <?php if(isset($errors['password'] )): ?>
                                <div class="text-danger small mt-2 fw-bold error"><?php echo $errors['password']  ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="col-12">
                            <input type="password" name="cpassword" class="form-control " placeholder="Confirm password" aria-label="" value="<?php echo $old['cpassword'] ?? ''; ?>">
                           <?php if(isset($errors['cpassword'] )): ?>
                                <div class="text-danger  small mt-2 fw-bold error" ><?php echo $errors['cpassword']  ?></div>
                            <?php endif; ?>
                        </div>
                        
                        
                        
                        <div class="col-12 d-flex align-items-center justify-content-start">
                            <span class="pe-3">Type :-</span>

                            <input type="radio" name="u_type" class="form-check-input m-1" value="rented" placeholder="" aria-label="" value="<?php echo $old['u_type'] ?? ''; ?>">
                            <label for="" class="me-2">Rented</label>
                            

                            <input type="radio" name="u_type" class="form-check-input m-1" value="tenant" placeholder="" aria-label="" value="<?php echo $old['u_type'] ?? ''; ?>">
                            <label for="" >Tenant</label>
                            <?php if(isset($errors['u_type'] )): ?>
                                <div class="text-danger small ms-2 fw-bold error"><?php echo $errors['u_type']  ?></div>
                            <?php endif; ?>

                            
                        </div> 

                    </div>

                    
                    <div class="m-3">
                        <button type="submit" name="register" style="width: 21rem;" class="fw-bold btn btn-outline-info shadow-sm p-2  bg-body-tertiary rounded-pill">Register</button>
                    </div>

                    <hr>

                    <div>
                        <p class="fw-bold">Arealdy have an account? <a href="../php/login.php" class="text-decoration-none fw-bold link-info">Login</a></p>
                    </div>

                </form>

            </div>

        </div>

    </div>

    
    
    
   

    <script src="../aos.js"></script>
    <script>
      AOS.init({
        duration: 1500,   // سرعة الحركة
        offset: 100,      // يبدأ الحركة قبل الوصول للعنصر بـ 100 بكسل
        once: true        // الحركة هتحصل مرة واحدة بس ومش هتتكرر تاني
      });
    </script>
    
     <script src="../bootstrap.bundle.min.js"></script>
</body>
</html>