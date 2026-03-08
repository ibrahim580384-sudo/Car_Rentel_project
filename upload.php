<?php

$conn = mysqli_connect("localhost","root","","car_rental");

if(!$conn){
    die("Connection Failed");
}

$national_id = $_POST['national_id'];

$id_front = $_FILES['id_front']['name'];
$id_back = $_FILES['id_back']['name'];
$license_front = $_FILES['license_front']['name'];
$license_back = $_FILES['license_back']['name'];
$attachment = $_FILES['attachment']['name'];

move_uploaded_file($_FILES['id_front']['tmp_name'],"uploads/".$id_front);
move_uploaded_file($_FILES['id_back']['tmp_name'],"uploads/".$id_back);
move_uploaded_file($_FILES['license_front']['tmp_name'],"uploads/".$license_front);
move_uploaded_file($_FILES['license_back']['tmp_name'],"uploads/".$license_back);
move_uploaded_file($_FILES['attachment']['tmp_name'],"uploads/".$attachment);

$sql = "INSERT INTO customer_verification
(national_id,id_front,id_back,license_front,license_back,attachment)
VALUES
('$national_id','$id_front','$id_back','$license_front','$license_back','$attachment')";

mysqli_query($conn,$sql);

echo "Verification Submitted Successfully";

?>