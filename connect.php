<?php
$db = 'localhost';
$root = 'root';
$password = '';
$user = 'app';
$conn = mysqli_connect($db, $root, $password, $user);
//$db = new mysqli('localhost', 'root', '', 'app');
if($conn->connect_errno){
    die('sorry');
}