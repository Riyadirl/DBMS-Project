<?php
include('./db_connect.php'); // Your database connection code

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['sub_district'])) {
    $sub_district = mysqli_real_escape_string($conn, $_POST['sub_district']);

    $query = "SELECT DISTINCT area FROM districts WHERE sub_district = '$sub_district'";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    $areas = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $areas[] = $row['area'];
    }

    echo '<option value="">Select Area</option>';
    foreach ($areas as $area) {
        echo "<option value='$area'>$area</option>";
    }
}
