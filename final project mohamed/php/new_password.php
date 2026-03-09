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
    <title>Set New Password</title>
</head>
<body>

    

    <div class="items">
        <div class="card   shadow-lg p-3 m-5 bg-body-tertiary rounded" style="width: 35rem;" data-aos="zoom-in">

            <div  class="card-title">
                <h1 class="p-2">New Password</h1>
                <p>Enter your new password for account recovery</p>
            </div>
        
            <div class="card-body " style="width: 25rem;">

                <form action="../php/update_password.php" method="post">
    
                    <input type="hidden" name="token" value="<?php echo isset($_GET['token']) ? htmlspecialchars($_GET['token']) : ''; ?>">

                    <div class="form-floating m-3">
                        <input type="password" name="new_pass" class="form-control" id="nP" placeholder="New Password" required>
                        <label for="nP">New Password</label>
                    </div>
    
                    <div class="form-floating m-3">
                        <input type="password" name="confirm_pass" class="form-control" id="cP" placeholder="Confirm Password" required>
                        <label for="cP">Confirm Password</label>
                    </div>

                    <div class="m-3">
                        <button type="submit" name="update_now" class="fw-bold btn btn-outline-info shadow-sm p-2 bg-body-tertiary rounded-pill" style="width: 10rem;">verify</button>
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