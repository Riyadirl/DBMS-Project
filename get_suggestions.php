<?php
// Include the database connection
include('./db_connect.php');

// Get the keyword from the AJAX request
$keyword = $_GET['keyword'];

// Perform your database query to get suggestions for sub-district
$subDistrictQuery = "SELECT DISTINCT sub_district FROM homes WHERE sub_district LIKE '%$keyword%'";
$subDistrictResult = mysqli_query($connection, $subDistrictQuery);

// Perform your database query to get suggestions for area
$areaQuery = "SELECT DISTINCT area FROM homes WHERE area LIKE '%$keyword%'";
$areaResult = mysqli_query($connection, $areaQuery);

// Process the query results and generate suggestions
if ($subDistrictResult && $areaResult) {
    while ($row = mysqli_fetch_assoc($subDistrictResult)) {
        echo "<option value='" . $row['sub_district'] . "'>";
    }

    while ($row = mysqli_fetch_assoc($areaResult)) {
        echo "<option value='" . $row['area'] . "'>";
    }
} else {
    echo "Error executing the query: " . mysqli_error($connection);
}

// Close the database connection
mysqli_close($connection);
