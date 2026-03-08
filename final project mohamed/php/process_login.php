<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $email    = trim($_POST['email']);
    $password = $_POST['password'];
    $errors   = [];

  
    if (empty($email)) {
        $errors['emailError'] = "Email is required!";
    }
    if (empty($password)) {
        $errors['passError'] = "Password is required!";
    }

    
    if (empty($errors)) {
       
        $email = mysqli_real_escape_string($conn, $email);
        $query = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);
            
           
            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id']   = $user['id'];
                $_SESSION['user_type']  = $user['user_type']; 
                header("Location: ../index.php");
                exit();
            } else {
                $errors['passError'] = "Incorrect password!";
            }
        } else {
            $errors['emailError'] = "This email is not registered!";
        }
    }

    
    if (!empty($errors)) {
        $_SESSION['login_errors'] = $errors;
        header("Location: ../php/login.php");
        exit();
    }
}