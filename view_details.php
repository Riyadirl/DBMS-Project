<!DOCTYPE html>
<html>

<head>
    <title>Rent-Ease Property Details</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <?php
        include('./header.php');


        include('./db_connect.php');

        // Get the holding number from the URL parameter
        $holdingNumber = isset($_GET['holding_number']) ? $_GET['holding_number'] : null;

        // Validate and sanitize input
        if (!$holdingNumber || !is_numeric($holdingNumber)) {
            echo "<div class='alert alert-danger'>Invalid holding number.</div>";
        } else {
            // Query to retrieve property details
            $detailsQuery = "SELECT * FROM homes WHERE holding_number = $holdingNumber";

            // Execute the query
            $result = mysqli_query($connection, $detailsQuery);

            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);

                echo "<h1>Home Details</h1>";
                echo "<div class='card'>";
                echo "<div class='card-body'>";
                echo "<h5 class='card-title'>" . $row['house_name'] . "</h5>";
                echo "<p class='card-text'>Bedrooms: " . $row['bed_room'] . "</p>";
                echo "<p class='card-text'>Bathrooms: " . $row['wash_room'] . "</p>";
                echo "<p class='card-text'>Balconies: " . $row['balcony'] . "</p>";
                echo "<p class='card-text'>Rent Amount: " . $row['rent_amount'] . "</p>";
                echo "<p class='card-text'>District: " . $row['district'] . "</p>";
                echo "<p class='card-text'>Sub District: " . $row['sub_district'] . "</p>";
                echo "<p class='card-text'>Area: " . $row['area'] . "</p>";
                echo "<p class='card-text'>Status: " . $row['status'] . "</p>";
                echo "<p class='card-text'>Address: " . $row['address'] . "</p>";
                echo "</div>";
                echo "</div>";
            } else {
                echo "<div class='alert alert-danger'>Property not found.</div>";
            }
        }


        mysqli_close($connection);

        include('./footer.php');
        ?>
    </div>
</body>

</html>