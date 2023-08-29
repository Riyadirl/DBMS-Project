<?php 
$host = 'localhost';
$user = 'root';
$pass = '';
$dbName = 'rent_ease_demo';
$conn = mysqli_connect($host, $user, $pass, $dbName);
if(!$conn)
{
    echo 'There are some problem to connect with database'.mysqli_connect_error();
}
?>