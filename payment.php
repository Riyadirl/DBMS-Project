<?php
include("connection.php");
include("nav.php");
if(!isset($_SESSION['user'])){
    echo "<script>alert('Please log in first');
    document.location='index.php';
    </script>";
}
$user = $_SESSION['user'];
$sql = "SELECT balance FROM users WHERE username = '$user'";
$run = mysqli_query($conn, $sql);
if($run){
    $result = mysqli_fetch_assoc($run);
    $balance = $result['balance'];
}
else{
    echo "<script>alert('Something Wrong, please try again letter');
    document.location='payment.php';
    </script>";
}
if(isset($_POST['deposit'])){
    header("location:deposit.php");
}
if(isset($_POST['pay'])){
    $ruser = $_POST['user'];
    $amount = $_POST['amount'];
    $month = $_POST['month'];
    $year = $_POST['year'];
    if($ruser == NULL or $amount == NULL or $year == NULL){
        echo "<script>alert('Please fillup all field');
        document.location='payment.php'</script>";
    }
    else{
        $sql = "SELECT balance FROM users WHERE username = '$ruser'";
        $run = mysqli_query($conn, $sql);
        if($run){
            $result = mysqli_fetch_assoc($run);
            $rbalance = $result['balance'];
        }
        else{
            echo "<script>alert('Some problem, try letter');</script>";
        }
        if($balance >= $amount){
            $balance -= $amount;
            $rbalance += $amount;
            $sql = "INSERT INTO `payment`(`user`, `ruser`, `amount`, `month`, `year`) VALUES ('$user','$ruser','$amount','$month','$year')";
            $run = mysqli_query($conn, $sql);
            $sql = "UPDATE users SET balance = '$balance' WHERE username = '$user'";
            $run = mysqli_query($conn, $sql);
            $sql = "UPDATE users SET balance = '$rbalance' WHERE username = '$ruser'";
            $run = mysqli_query($conn, $sql);
            if($run){
                echo "<script>alert('Payment successful');</script>";
            }
            else{
                echo "<script>alert('something wrong, please try letter');</script>";
            }
        }
        else{
            echo "<script>alert('Not enough balance, Please deposit first');
            document.location='payment.php';
            </script>";
        }
    }
    
    /**/
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Payment</title>
    <style>
        .font-weight-bold{
            margin-bottom: 0px;
        }
    </style>
</head>

<body style="background-color: #dfe6e9">
    <div class="container">
        <div class="content-justify-center" style="margin-left: 300px">
            <form action="payment.php" method="POST" class="form">
                <div class="row m-2">
                    <div class="col-6">
                        <label for="" class="form-control font-weight-bold"><?php echo 'User: '.$_SESSION['user']; ?></label>
                        <label for="" class="form-control font-weight-bold"><?php echo 'Available Balance: '.$balance; ?></label>
                        <input type="text" placeholder="Enter recipient user name" name="user" class="form-control">
                        <input type="number" placeholder="Enter amount" name="amount" class="form-control">
                        <input type="text" name="year" placeholder="Enter year" class="form-control">
                        <label for="month" class="form-control font-weight-bold">Select month</label>
                        <select name="month" id="month" class="form-control">
                            <option value="January">January</option>
                            <option value="February">February</option>
                            <option value="March">March</option>
                            <option value="April">April</option>
                            <option value="May">May</option>
                            <option value="June">June</option>
                            <option value="July">July</option>
                            <option value="August">August</option>
                            <option value="September">September</option>
                            <option value="October">Octobor</option>
                            <option value="Nobember">Nobember</option>
                            <option value="December">December</option>
                        </select>
                    </div>
                </div>
                <div class="row m-2">
                    <div class="col-3">
                        <input type="submit" value="Pay" name="pay" class="form-control btn btn-success">
                    </div>
                    <div class="col-3">
                        <input type="submit" value="Deposit" name="deposit" class="form-control btn btn-info">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php include("footer.php"); ?>
</body>

</html>