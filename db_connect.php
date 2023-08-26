<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'rent_ease_demo';

// Create a database connection
$connection = mysqli_connect($host, $username, $password, $database);

// Check the connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
