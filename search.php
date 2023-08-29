<!DOCTYPE html>
<html>

<head>
    <title>Rent-Ease Search</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script>
    $(document).ready(function() {
        function getSuggestions(inputField, suggestionList) {
            var keyword = inputField.val();
            if (keyword !== '') {
                $.ajax({
                    url: 'get_suggestions.php',
                    method: 'GET',
                    data: {
                        keyword: keyword
                    },
                    success: function(response) {
                        suggestionList.html(response);
                    }
                });
            } else {
                suggestionList.empty();
            }
        }

        $('#sub_district').on('input', function() {
            getSuggestions($(this), $('#sub_district_list'));
        });

        $('#area').on('input', function() {
            getSuggestions($(this), $('#area_list'));
        });
    });
    </script>
</head>

<body style="background-color: #dfe6e9">
    <?php include 'nav.php'; ?>
    <div class="container mt-5">
        <h1 class="mb-4">Rent-Ease Search</h1>

        <form action="search.php" method="get">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="sub_district">Sub District:</label>
                    <input type="text" id="sub_district" name="selected_sub_district" list="sub_district_list">
                    <datalist id="sub_district_list"></datalist>
                </div>
                <div class="form-group col-md-4">
                    <label for="area">Area:</label>
                    <input type="text" id="area" name="selected_area" list="area_list">
                    <datalist id="area_list"></datalist>
                </div>
                <div class="form-group col-md-4">
                    <label>Categories:</label><br>
                    <div class="form-check form-check-inline">
                        <input type="checkbox" class="form-check-input" id="family" name="family" value="Yes">
                        <label class="form-check-label" for="family">Family</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="checkbox" class="form-check-input" id="male_bachelor" name="male_bachelor"
                            value="Yes">
                        <label class="form-check-label" for="male_bachelor">Male Bachelor</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="checkbox" class="form-check-input" id="female_bachelor" name="female_bachelor"
                            value="Yes">
                        <label class="form-check-label" for="female_bachelor">Female Bachelor</label>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="min_rent">Min Rent Amount:</label>
                    <input type="number" class="form-control" id="min_rent" name="min_rent">
                </div>
                <div class="form-group col-md-6">
                    <label for="max_rent">Max Rent Amount:</label>
                    <input type="number" class="form-control" id="max_rent" name="max_rent">
                </div>
            </div>
            <button type="submit" class="btn btn-primary" name="search">Search</button>
        </form>

        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>Holding Number</th>
                    <th>Rent Amount</th>
                    <th>View Details</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if(isset($_GET['search'])){
// Include the database connection
include('./db_connect.php');

// Get user inputs
$selectedSubDistrict = isset($_GET['selected_sub_district']) ? $_GET['selected_sub_district'] : '';
$selectedArea = isset($_GET['selected_area']) ? $_GET['selected_area'] : '';
$familyCategory = isset($_GET['family']) ? $_GET['family'] : null;
$maleBachelorCategory = isset($_GET['male_bachelor']) ? $_GET['male_bachelor'] : null;
$femaleBachelorCategory = isset($_GET['female_bachelor']) ? $_GET['female_bachelor'] : null;
$minRent = isset($_GET['min_rent']) ? $_GET['min_rent'] : null;
$maxRent = isset($_GET['max_rent']) ? $_GET['max_rent'] : null;

// Build the SQL query using the input values
$query = "SELECT h.*, c.*
FROM homes h
INNER JOIN categories c ON h.holding_number = c.holding_number
WHERE h.district = 'Dhaka'
AND h.sub_district LIKE '%$selectedSubDistrict%'
AND h.area LIKE '%$selectedArea%'
AND (c.family = '$familyCategory' OR c.male_bechelor = '$maleBachelorCategory' OR c.female_bechelor = '$femaleBachelorCategory')
AND h.rent_amount BETWEEN $minRent AND $maxRent";


// Execute the query
$result = mysqli_query($connection, $query);
//

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['holding_number'] . "</td>";
        echo "<td>" . $row['rent_amount'] . "</td>";
        echo "<td><a href='view_details.php?holding_number=" . $row['holding_number'] . "' class='btn btn-info'>View Details</a></td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='3'>No results found</td></tr>";
}

//

mysqli_close($connection);


                }
                ?>
            </tbody>
        </table>

    </div>
    <?php include("footer.php"); ?>
</body>

</html>