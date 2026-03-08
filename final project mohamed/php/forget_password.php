<?php
session_start();

$errors = $_SESSION['forget_errors'] ?? [];
unset($_SESSION['forget_errors']); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="../bootstrap.min.css">
    
    <link rel="stylesheet" href="../aos.css">
    <link rel="stylesheet" href="../css/forget _password.css">
    <title>Forget Password</title>
</head>
<body>

    

    <div class="items">
        <div class="card   shadow-lg p-3 m-5 bg-body-tertiary rounded" style="width: 35rem;" data-aos="zoom-in">

            <div  class="card-title">
                <h1 class="p-2">Reset Password</h1>
            </div>
        
            <div class="card-body " style="width: 25rem;">

                <form action="../php/process_forget.php" method="post">
                    <?php if(isset($_SESSION['status'])): ?>
                        <div class="alert alert-warning small text-center"><?php echo $_SESSION['status']; unset($_SESSION['status']); ?></div>
                    <?php endif; ?>

                    <div class="form-floating m-3">
                        <input type="email" name="email" class="form-control " id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput" >Enter your registered Email</label>
                        <?php if(isset($errors['emailError'])): ?>
                            <div class="text-danger small fw-bold m-2  error"><?php echo $errors['emailError']; ?></div>
                        <?php endif; ?>
                    </div>

                    
                    

                    <div class="m-3">
                        <button type="submit" style="width: 10rem;" name="check_email" class="fw-bold btn btn-outline-info shadow-sm p-2  bg-body-tertiary rounded-pill">verify</button>
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