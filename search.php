<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rent-Ease - Search</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <!-- Navigation Bar -->
    <?php include 'header.php'; ?>

    <div class="container mt-4">
        <h2>Search for Rental Homes</h2>
        <form action="search.php" method="get">
            <div class="mb-3">
                <label for="district" class="form-label">Select District</label>
                <select class="form-select" name="district" id="district">
                    <option value="Dhaka">Dhaka</option>
                    <!-- Add more district options here if needed -->
                </select>
            </div>
            <div class="mb-3">
                <label for="sub_district" class="form-label">Select Sub-District</label>
                <select class="form-select" name="sub_district" id="sub_district">
                    <!-- Options will be populated dynamically using JavaScript -->
                </select>
            </div>
            <div class="mb-3">
                <label for="area" class="form-label">Select Area</label>
                <select class="form-select" name="area" id="area">
                    <option value="Ward no. 31">Ward no. 31</option>
                    <option value="Ward no. 32">Ward no. 32</option>
                    <option value="Ward no. 33">Ward no. 33</option>
                    <option value="Ward no. 34">Ward no. 34</option>
                    <option value="Ward no. 35">Ward no. 35</option>
                    <option value="Ward no. 53">Ward no. 53</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Select Category</label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="category[]" value="family"
                        id="category_family">
                    <label class="form-check-label" for="category_family">Family</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="category[]" value="bachelor"
                        id="category_bachelor">
                    <label class="form-check-label" for="category_bachelor">Bachelor</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="category[]" value="female_bachelor"
                        id="category_female_bachelor">
                    <label class="form-check-label" for="category_female_bachelor">Female Bachelor</label>
                </div>
            </div>
            <div class="mb-3">
                <label for="min_rent" class="form-label">Minimum Rent Amount</label>
                <input type="number" class="form-control" name="min_rent" id="min_rent">
            </div>
            <div class="mb-3">
                <label for="max_rent" class="form-label">Maximum Rent Amount</label>
                <input type="number" class="form-control" name="max_rent" id="max_rent">
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>

        <?php
        // Include database connection
        include('./db_connect.php');

        // Process search form
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $district = $_GET["district"];
            $sub_district = $_GET["sub_district"];
            $area = $_GET["area"];
            $categories = isset($_GET["category"]) ? $_GET["category"] : array();
            $min_rent = isset($_GET["min_rent"]) ? $_GET["min_rent"] : null;
            $max_rent = isset($_GET["max_rent"]) ? $_GET["max_rent"] : null;

            // Build and execute SQL query based on search criteria
            $sql = "SELECT h.*, c.category
                    FROM homes h
                    LEFT JOIN categories c ON h.holding_number = c.holding_number
                    WHERE h.city = 'Dhaka' 
                    AND (h.sub_district = '$sub_district' OR '$sub_district' = '')
                    AND (h.area = '$area' OR '$area' = '')";
            
            if (!empty($categories)) {
                $category_conditions = array();
                foreach ($categories as $category) {
                    $category_conditions[] = "c.category = '$category'";
                }
                $category_condition = implode(" OR ", $category_conditions);
                $sql .= " AND ($category_condition)";
            }

            if (!is_null($min_rent)) {
                $sql .= " AND h.rent_amount >= $min_rent";
            }

            if (!is_null($max_rent)) {
                $sql .= " AND h.rent_amount <= $max_rent";
            }

            // Execute the query and display the results
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo '<h4 class="mt-3">Search Results</h4>';
                echo '<table class="table table-bordered">';
                echo '<tr><th>House Name</th><th>Bedrooms</th><th>Washrooms</th><th>Balconies</th><th>Rent Amount</th><th>Category</th></tr>';
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $row["house_name"] . '</td>';
                    echo '<td>' . $row["bed_room"] . '</td>';
                    echo '<td>' . $row["wash_room"] . '</td>';
                    echo '<td>' . $row["balcony"] . '</td>';
                    echo '<td>' . $row["rent_amount"] . '</td>';
                    echo '<td>' . $row["category"] . '</td>';
                    echo '</tr>';
                }
                echo '</table>';
            } else {
                echo '<p class="mt-3">No results found.</p>';
            }
        }

        $conn->close();
        ?>

    </div>

    <!-- Footer -->
    <?php include 'footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    // You may need JavaScript code to populate sub-district and area dropdowns based on the selected district
    // and handle any other dynamic interactions on the search form.
    </script>
</body>

</html>