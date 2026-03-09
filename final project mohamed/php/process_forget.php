<?php
session_start();
include 'db.php';

if (isset($_POST['check_email'])) {
    $email = trim($_POST['email']);
    $errors = [];

    if (empty($email)) {
        $errors['emailError'] = "Email is required!";
    } else {
        $email = mysqli_real_escape_string($conn, $email);
        $query = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
    // تخزين الإيميل في السيشن لاستخدامه في ملف التحديث
            $_SESSION['reset_email'] = $email; 
            header("Location: new_password.php?token=..."); 
         exit();
        } else {
            $errors['emailError'] = "This email is not registered!";
        }
    }

    // أهم جزء: لو فيه أخطاء ارجع فوراً لصفحة الفورجيت
    if (!empty($errors)) {
        $_SESSION['forget_errors'] = $errors;
        header("Location: ../php/forget_password.php"); // تأكد من المسار ده صح
        exit();
    }
} else {
    // لو حد دخل على الملف ده من غير ما يدوس على الزرار
    header("Location: ../php/forget_password.php");
    exit();
}