<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <style>
            a:hover{
                background-color: #EAB543;
            }
            nav{
                font-weight: bold;
                font-family: Arial, Helvetica, sans-serif;
            }
        </style>
</head>

<body>
    <div class="row" style="background-color: #74b9ff">
        <div class="col-4">
            <a href="index.php" class="text-white" style="text-decoration: none"><h1 style="color: #182C61">Rent Ease</h1></a>
        </div>
        <div class="col-8">
            <?php if(isset($_SESSION['user'])){
                ?>
                <nav>
                <ul class="nav justify-content-end">

                    <li class="nav-item">
                        <a class="nav-link active text-dark" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="search.php">Search</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="add.php">List Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="delete.php">Update details</a>
                    </li>
                    <li class="nav-item">
                        <a href="payment.php" class="nav-link text-dark">Payment</a>
                    </li>
                    <li class="nav-item">
                        <a href="review.php" class="nav-link text-dark">Review</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="about.php">AboutUs</a>
                    </li>
                    <li class="nav-item">
                        <form action="logout.php" method="POST">
                            <input type="submit" name="submit" value="LogOut" class="btn text-danger nav-link">
                        </form>
                    </li>
                </ul>
            </nav>
                <?php
            }
            else{
                ?>
                <nav>
                <ul class="nav justify-content-end">

                    <li class="nav-item">
                        <a class="nav-link active text-dark" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="search.php">Search</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="add.php">List Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="delete.php">Update details</a>
                    </li>
                    <li class="nav-item">
                        <a href="payment.php" class="nav-link text-dark">Payment</a>
                    </li>
                    <li class="nav-item">
                        <a href="review.php" class="nav-link text-dark">Review</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="about.php">AboutUs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="login.php">Login/Registration</a>
                    </li>
                </ul>
            </nav>
                <?php
            }
            ?>
            
        </div>
    </div>
</body>

</html>