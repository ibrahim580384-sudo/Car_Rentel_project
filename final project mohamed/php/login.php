<?php
session_start();

if (isset($_SESSION['user_id'])) {
    header("Location: ../index.php");
    exit();
}

$errors = $_SESSION['login_errors'] ?? [];
$status = $_SESSION['status'] ?? null; 

unset($_SESSION['login_errors']);
unset($_SESSION['status']); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="../bootstrap.min.css">
    <link rel="stylesheet" href="../aos.css">
    <link rel="stylesheet" href="../css/login.css">
    <title>Log in</title>
</head>
<body>

    

    <div class="items">
        <div class="card   shadow-lg p-3 m-5 bg-body-tertiary rounded" style="width: 35rem;" data-aos="zoom-in">

            <div  class="card-title">
                <h1 class="p-2">Welcome Back</h1>
                <p>Please Login to continue</p>

            </div>
        
            <div class="card-body " style="width: 25rem;">

                <form action="../php/process_login.php" method="post">

                    <?php if(isset($status) && $status): ?>
                         <div class="alert alert-success small text-center fw-bold py-2 mb-3 shadow-sm">
                            <?php echo $status; ?>
                        </div>
                    <?php endif; ?>

                    <div class="form-floating m-3">
                        <input type="email" name="email" class="form-control " id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput" >Email</label>
                        <?php if(isset($errors['emailError'])): ?>
                            <div class="text-danger small fw-bold mt-1 ms-2"><?php echo $errors['emailError']; ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="form-floating m-3">
                        <input type="password" name="password" class="form-control " id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Password</label>
                        <?php if(isset($errors['passError'])): ?>
                            <div class="text-danger small fw-bold mt-1 ms-2"><?php echo $errors['passError']; ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="form-floating m-3">
                        <a href="../php/forget_password.php" class="d-flex justify-content-end text-decoration-none fw-bold link-info">forget password?</a>
                    </div>

                    <div class="m-3">
                        <button type="submit" style="width: 21rem;" name="login" class="fw-bold btn btn-outline-info shadow-sm p-2  bg-body-tertiary rounded-pill">log in</button>
                    </div>
                    <hr>
                    <div>
                        <p class="fw-bold">Don't have anacount? <a href="../php/register.php" class="text-decoration-none fw-bold link-info">rigester</a></p>
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