<?php
include('../layout/all.php');
include('../layout/header.php');
?>
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $select = "SELECT * from account where AccountID='$id'";
    $run = mysqli_query($con, $select);
    $row = mysqli_fetch_array($run);
}
if (isset($_POST['BtnSubmit'])) {

    $id = $_POST['UpdateAccountID'];

    $select = "SELECT * from account where AccountID='$id'";
    $run = mysqli_query($con, $select);
    $row = mysqli_fetch_array($run);
    $UpdateAmount = $_POST['UpdateAmount'];

    if ($row['Balance'] > $UpdateAmount) {
        $total = $row['Balance'] - $UpdateAmount;
        $query = mysqli_query($con, "UPDATE account SET Balance='$total' WHERE AccountID='$id'");

        $date = date("Y-m-d");
        $desciption = "Withdraw";
        $minusamount = -+$UpdateAmount;
        $insert = "INSERT INTO transaction (AccountID,UpdateDate,UpdateBalance,Description)
                 values ('$id','$date','$minusamount','$desciption')";
        $result = mysqli_query($con, $insert);
        if ($result) {
            echo "<script>window.alert('Successfully Withdraw');window.location='WithdrawList.php'</script>";
        } else {
            mysqli_error($con);
        }
    } elseif ($row['Balance']==$UpdateAmount) {
        echo '<script>alert("Leave Atleast 1000kyat")</script>';
    } else {
        echo '<script>alert("Not enough amount in your account")</script>';
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container justify-content-center mt-3">
        <form action="" method="post">
            <div class="row">
                <div class="col-md-12 mb-2">
                    <h2>Withdraw </h2>
                </div>
                <div class="col-md-6">
                    <label for="CustomerID" class="form-label">Customer ID </label>
                    <input type="text" name="UpdateAccountID" class="form-control" value="<?php echo $row['AccountID'] ?>" id="CustomerID" required>
                </div>
                <div class="col-md-6">
                    <label for="AccountType" class="form-label">Amount</label>
                    <input type="text" name="UpdateAmount" class="form-control" id="CustomerID" required>

                </div>

                <div class="col-12 text-center pb-3 mt-4">
                    <button type="submit" name="BtnSubmit" class="btn btn-success">Submit</button>
                    <button type="cancel" name="BtnCancel" class="btn btn-danger ">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</body>
<script>

</script>

</html>