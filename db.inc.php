<?php
$host='localhost';
$pwd='';
$username='root';
$db='motorent';

$conn=mysqli_connect($host,$username,$pwd,$db);

if(!$conn){
    die("Connection failed");
    }
?>