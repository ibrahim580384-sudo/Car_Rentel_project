<?php
session_start();
include 'db.php'; 

$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $fname  = $_POST['fname'] ?? '';
    $lname  = $_POST['lname'] ?? '';
    $username  = $_POST['Username'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $password  = $_POST['password'] ?? '';
    $cpassword  = $_POST['cpassword'] ?? '';
    $u_type  = $_POST['u_type'] ?? '';

   
    if (empty($fname)) { 
        $errors['fname'] = "First name required!"; 
        }
    if (empty($lname)) { 
        $errors['lname'] = "Second name required!"; 
        }
    if (empty($username)) { 
        $errors['username'] = "User name required!"; 
        }
    if (empty($email)) {
         $errors['email'] = "Email required!"; 
         }
    if (empty($phone)) {
         $errors['phone'] = "Phone number required!"; 
         }
    if(empty($password)) {
        $errors['password'] = "Password required!"; 
         }
    if(strlen($password) <6) {
        $errors['password'] = "Password less than 6 characters!"; 
         }

    if ($password !== $cpassword) {
         $errors['cpassword'] = "Password does not match!"; 
         }
    if (empty($u_type)) {
         $errors['u_type'] = "You must select the account type!"; 
         }
    
    
    if (empty($errors)) {
    
        $check_query = "SELECT username, email FROM users WHERE username = '$username' OR email = '$email' LIMIT 1";
        $check_result = mysqli_query($conn, $check_query); 
    
        if (mysqli_num_rows($check_result) > 0) {
        $existing_data = mysqli_fetch_assoc($check_result);
        if ($existing_data['username'] === $username) {
            $errors['username1'] = "This username is already taken!"; 
        } else {
            $errors['email1'] = "This email is already registered!";
        }
    }
}

  
    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        $_SESSION['old'] = $_POST;
        header("Location: register.php");
        exit();
    }

    
    $hashed = password_hash($password, PASSWORD_DEFAULT);
    
    $query = "INSERT INTO users (first_name, last_name, username, email, phone, password, user_type) 
            VALUES ('$fname', '$lname', '$username', '$email', '$phone', '$hashed', '$u_type')";
      $result = mysqli_query($conn, $query);




    
    if ($result) {
        $_SESSION['success'] = "Registration successful! Log in now.";
        header("Location: ../php/login.php"); 
        exit();
    } else {
        echo "خطأ في القاعدة: " . mysqli_error($conn);
    }
}