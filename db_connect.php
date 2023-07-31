<?php




// Connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'rent_ease_demo');
// Check connection
if (!$conn) {
    echo 'Connection error: ' . mysqli_connect_error();
}
