<?php
session_start();
include 'db_cars.php';

if (isset($_POST['signup'])) {
    $errors = [];

    // 1. استلام البيانات النصية
    $manufacturer = mysqli_real_escape_string($conn_cars, $_POST['manufacturer'] ?? '');
    $model = mysqli_real_escape_string($conn_cars, $_POST['model'] ?? '');
    $year = mysqli_real_escape_string($conn_cars, $_POST['year'] ?? '');

    // 2. التحقق من النصوص أولاً
    if (empty($manufacturer)) $errors['manufacturer'] = "Please write the company name!";
    if (empty($model)) $errors['model'] = "Please write the car model!";
    if (empty($year)) $errors['year'] = "Please write the year of manufacture!";
    
    // 3. التحقق من وجود ملفات الصور (الاسم مش كفاية، لازم نشيك لو فيه خطأ في الرفع)
    if (empty($_FILES['Cfront']['name'])) $errors['Cfront'] = "A copy of the license (front) is required!";
    if (empty($_FILES['Cback']['name'])) $errors['Cback'] = "A copy of the license (back) is required!";
    if (empty($_FILES['Nfront']['name'])) $errors['Nfront'] = "A photocopy of the card (front) is required!";
    if (empty($_FILES['Nback']['name'])) $errors['Nback'] = "A photocopy of the card (back) is required!";

    // 4. لو فيه أي خطأ، ارجع للفورم فوراً
    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        $_SESSION['old'] = $_POST; 
        header("Location: FormUPload.php"); // لو الملفين في نفس الفولدر، لو لا عدل المسار
        exit();
    }

    // 5. دالة الرفع المعدلة بمسار فولدر صحيح
    function uploadImage($fileKey) {
        $targetDir = "uploads/"; // تأكد إن الفولدر ده موجود جنب ملف الـ php ده
        if (!is_dir($targetDir)) mkdir($targetDir, 0777, true);
        
        $fileName = time() . "_" . basename($_FILES[$fileKey]["name"]);
        $targetFilePath = $targetDir . $fileName;
        
        if (move_uploaded_file($_FILES[$fileKey]["tmp_name"], $targetFilePath)) {
            return $targetFilePath;
        }
        return null;
    }

    $c_front = uploadImage('Cfront');
    $c_back = uploadImage('Cback');
    $n_front = uploadImage('Nfront');
    $n_back = uploadImage('Nback');

    // 6. الحفظ في الداتا بيز
    if ($c_front && $c_back && $n_front && $n_back) {
        $sql = "INSERT INTO car_details (car_license_front, car_license_back, manufacturer, car_model, production_year, national_id_front, national_id_back) 
                VALUES ('$c_front', '$c_back', '$manufacturer', '$model', '$year', '$n_front', '$n_back')";

        if (mysqli_query($conn_cars, $sql)) {
            $_SESSION['success'] = "Saving successfully!";
            unset($_SESSION['errors'], $_SESSION['old']); 
            header("Location: FormUPload.php");
            exit();
        } else {
            $_SESSION['errors']['db'] = "Database error: " . mysqli_error($conn_cars);
            header("Location: FormUPload.php");
            exit();
        }
    } else {
        $_SESSION['errors']['upload'] = "Failed to upload one or more images.";
        header("Location: FormUPload.php");
        exit();
    }
}