<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
  <div class="header">
    <nav>
      <ul class="nav justify-content-end">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="search.php">Search</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="add.php">List Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="delete.php" onclick="doSomething()">Update Home details</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Login/Registration</a>
        </li>
        <li class="nav-item">
          <a href="payment.php" class="nav-link">Payment</a>
        </li>
        <li class="nav-item">
          <a href="review.php" class="nav-link">Review</a>
        </li>
        <li class="nav-item">
          <form action="logout.php" method="POST">
            <input type="submit" name="submit" value="LogOut" class="btn btn_danger nav-link">
          </form>
        </li>
      </ul>
    </nav>
  </div>
</body>
</html>