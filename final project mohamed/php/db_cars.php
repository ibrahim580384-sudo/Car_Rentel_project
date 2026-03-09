<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "users"; // التعديل هنا: اسم قاعدة البيانات الصح هو users

$conn_cars = mysqli_connect($host, $user, $pass, $dbname);

if (!$conn_cars) {
    die("Connection failed: " . mysqli_connect_error());
}
?>