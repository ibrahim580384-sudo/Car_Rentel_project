<?php

$conn = mysqli_connect("localhost", "root", "", "users");

if (!$conn) {
    die("Connection error:". mysqli_connect_error());
}
?>