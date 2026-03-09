<?php 
session_start();
$errors = $_SESSION['errors'] ?? [];
$old = $_SESSION['old'] ?? [];
$success = $_SESSION['success'] ?? "";
unset($_SESSION['errors']); 
unset($_SESSION['old']);
unset($_SESSION['success']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap.min.css">
    <link rel="stylesheet" href="../aos.css">
    <link rel="stylesheet" href="../css/regester.css">
    <title>Car Registration</title>
</head>
<body>
    <div class="items">
        <div class="card shadow-lg p-3 bg-body-tertiary rounded" style="width: 60rem;" data-aos="zoom-in">
            <div class="card-title">
                <h1 class="p-3 fw-bold">Car Information</h1>
            </div>

            <div class="card-body">
                <?php if ($success): ?>
                    <div class="alert alert-success text-center fw-bold"><?php echo $success; ?></div>
                <?php endif; ?>

                <form action="../php/process_car_info.php" method="post" enctype="multipart/form-data">
                    <div class="row g-3">
                        
                        <div class="col-12">
                            <label class="form-label fw-bold d-flex justify-content-start">Car License (Front)</label>
                            <input class="form-control <?php echo isset($errors['Cfront']) ? 'is-invalid' : ''; ?>" name="Cfront" type="file">
                            <?php if(isset($errors['Cfront'])): ?>
                                <small class="text-danger mt-2 fw-bold d-flex justify-content-start"><?php echo $errors['Cfront']; ?></small>
                            <?php endif; ?>
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-bold d-flex justify-content-start">Car License (Back)</label>
                            <input class="form-control <?php echo isset($errors['Cback']) ? 'is-invalid' : ''; ?>" name="Cback" type="file">
                            <?php if(isset($errors['Cback'])): ?>
                                <small class="text-danger mt-2 fw-bold d-flex justify-content-start"><?php echo $errors['Cback']; ?></small>
                            <?php endif; ?>
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-bold d-flex justify-content-start">Manufacturer</label>
                            <input type="text" name="manufacturer" class="form-control <?php echo isset($errors['manufacturer']) ? 'is-invalid' : ''; ?>" 
                                   placeholder="BMW, Mercedes, Toyota,...." value="<?php echo $old['manufacturer'] ?? ''; ?>">
                            <?php if(isset($errors['manufacturer'])): ?>
                                <small class="text-danger mt-2 fw-bold d-flex justify-content-start"><?php echo $errors['manufacturer']; ?></small>
                            <?php endif; ?>
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-bold d-flex justify-content-start">Car model</label>
                            <input type="text" name="model" class="form-control <?php echo isset($errors['model']) ? 'is-invalid' : ''; ?>" 
                                   placeholder="M5, Corolla, Elantra,...." value="<?php echo $old['model'] ?? ''; ?>">
                            <?php if(isset($errors['model'])): ?>
                                <small class="text-danger mt-2 fw-bold d-flex justify-content-start"><?php echo $errors['model']; ?></small>
                            <?php endif; ?>
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-bold d-flex justify-content-start">Production Year</label>
                            <input type="text" name="year" class="form-control <?php echo isset($errors['year']) ? 'is-invalid' : ''; ?>" 
                                   placeholder="2026, 2025,......." value="<?php echo $old['year'] ?? ''; ?>">
                            <?php if(isset($errors['year'])): ?>
                                <small class="text-danger mt-2 fw-bold d-flex justify-content-start"><?php echo $errors['year']; ?></small>
                            <?php endif; ?>
                        </div>

                        <hr>
                        <h1 class="p-3 fw-bold">Contact Information</h1>

                        <div class="col-12">
                            <label class="form-label fw-bold d-flex justify-content-start">National ID (Front)</label>
                            <input class="form-control <?php echo isset($errors['Nfront']) ? 'is-invalid' : ''; ?>" name="Nfront" type="file">
                            <?php if(isset($errors['Nfront'])): ?>
                                <small class="text-danger mt-2 fw-bold d-flex justify-content-start"><?php echo $errors['Nfront']; ?></small>
                            <?php endif; ?>
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-bold d-flex justify-content-start">National ID (Back)</label>
                            <input class="form-control <?php echo isset($errors['Nback']) ? 'is-invalid' : ''; ?>" name="Nback" type="file">
                            <?php if(isset($errors['Nback'])): ?>
                                <small class="text-danger mt-2 fw-bold d-flex justify-content-start"><?php echo $errors['Nback']; ?></small>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="m-3 text-center">
                        <button type="submit" name="signup" style="width: 21rem;" class="fw-bold btn btn-outline-info shadow-sm p-2 rounded-pill">confirmation</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="../aos.js"></script>
    <script>AOS.init({ duration: 1500, once: true });</script>
    <script src="../bootstrap.bundle.min.js"></script>
</body>
</html>