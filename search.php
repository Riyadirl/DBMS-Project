<!DOCTYPE html>
<html>

<head>
    <title>Rest-Ease Rental Search</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-4">
        <h2>Home Search For Dhaka</h2>
        <form method="GET" action="search.php">
            <div class="form-group">
                <label for="sub_district">Sub District:</label>
                <select class="form-control" id="sub_district" name="sub_district">

                    <?php
                    $subDistricts = array("Motiheel", "Dhanmondi", "Uttara", "Mohammadpur", "badda", "Mirpur", "Gulshan", "Jatrabari");
                    foreach ($subDistricts as $subDistrict) {
                        echo "<option value='$subDistrict'>$subDistrict</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="area">Area:</label>
                <select class="form-control" id="area" name="area">

                    <?php
                    $areas = array("Ward no. 34", "Ward no. 35", "Ward no. 47", "Ward no. 48", "Ward no. 31", "Ward no. 32", "Ward no. 33", "Ward no. 47", "Ward no. 48", "Digha");
                    foreach ($areas as $area) {
                        echo "<option value='$area'>$area</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label>Category:</label><br>
                <?php
                $categories = array("family", "bachelor", "female bachelor");
                foreach ($categories as $category) {
                    echo "<div class='form-check form-check-inline'>";
                    echo "<input class='form-check-input' type='radio' id='$category' name='category' value='$category'>";
                    echo "<label class='form-check-label' for='$category'>$category</label>";
                    echo "</div>";
                }
                ?>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="min_rent">Min Rent:</label>
                    <input type="number" class="form-control" id="min_rent" name="min_rent" placeholder="Minimum Rent">
                </div>
                <div class="form-group col-md-6">
                    <label for="max_rent">Max Rent:</label>
                    <input type="number" class="form-control" id="max_rent" name="max_rent" placeholder="Maximum Rent">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>

        <h2>Search Results:</h2>

        <?php
        //db connection
        include('./db_connect.php');


        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $sub_district = $_GET["sub_district"];
            $area = $_GET["area"];
            $category = $_GET["category"];
            $min_rent = $_GET["min_rent"];
            $max_rent = $_GET["max_rent"];

            // sql query
            $query = "SELECT h.* FROM homes h
                  INNER JOIN categories c ON h.holding_number = c.holding_number
                  WHERE h.sub_district = '$sub_district'
                  AND h.area = '$area'
                  AND c.category = '$category'
                  AND h.rent_amount BETWEEN $min_rent AND $max_rent";

            //display the results
            $result = $conn->query($query);
            if ($result->num_rows > 0) {
                echo "<table class='table table-bordered'>";
                echo "<thead>";
                echo "<tr>";
                echo "<th>Holding Number</th>";
                echo "<th>Sub District</th>";
                echo "<th>Area</th>";
                echo "<th>Category</th>";
                echo "<th>Rent Amount</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["holding_number"] . "</td>";
                    echo "<td>" . $row["sub_district"] . "</td>";
                    echo "<td>" . $row["area"] . "</td>";
                    echo "<td>" . $row["category"] . "</td>";
                    echo "<td>" . $row["rent_amount"] . "</td>";
                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";
            } else {
                echo "No results found.";
            }

            $conn->close();
        


        }
        ?>
    </div>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>