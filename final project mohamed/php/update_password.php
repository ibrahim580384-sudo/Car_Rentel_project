<?php
session_start();
include 'db.php';

if (isset($_POST['update_now'])) {
    $new_p     = $_POST['new_pass'];
    $confirm_p = $_POST['confirm_pass'];
    $email     = $_SESSION['reset_email'] ?? ''; 
    $token     = $_POST['token'] ?? '';

    // 1. التأكد من وجود إيميل في السيشن
    if (empty($email)) {
        $_SESSION['status'] = "The session is over, try again from the beginning.";
        header("Location: forget_password.php");
        exit();
    }

    // 2. التأكد من تطابق الباسوردين
    if ($new_p !== $confirm_p) {
        $_SESSION['status'] = "The password does not match!";
        header("Location: new_password.php?token=" . $token); // مسار مباشر
        exit();
    }

    // 3. تشفير الباسورد
    $hashed = password_hash($new_p, PASSWORD_DEFAULT);

    // 4. التحديث في الداتا بيز
    $query = "UPDATE users SET password = '$hashed' WHERE email = '$email'";
    
    if (mysqli_query($conn, $query)) {
        unset($_SESSION['reset_token'], $_SESSION['reset_email']);
        $_SESSION['status'] = "Your password has been changed! Login now.";
        header("Location:login.php"); // مسار مباشر لملف جنبك في نفس الفولدر
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}