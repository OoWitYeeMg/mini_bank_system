<?php
include('../layout/all.php');
include('../layout/header.php');
?>
<?php
$select2 = "SELECT * from register inner join account on register.RegisterID=account.RegisterID where account.Status='Active'";
$result1 = mysqli_query($con, $select2);

$select3 = "SELECT * from register inner join account on register.RegisterID=account.RegisterID where account.Status='Active'";
$result2 = mysqli_query($con, $select3);

if (isset($_POST['BtnSubmit'])) {
    $select = "SELECT * from account";
    $run = mysqli_query($con, $select);
    $row6 = mysqli_fetch_array($run);

    $UpdateAccountID = $_POST['UpdateAccountID'];
    $UpdateAmount = $_POST['UpdateAmount'];
    $total = $row6['Balance'] + $UpdateAmount;
    $update = "UPDATE account SET Balance='$total' WHERE AccountID='$UpdateAccountID'";
    $query = mysqli_query($con, $update);
    if ($query) {
        // header('Location: Deposit.php'); 
    }
    $AccountType1 = $_POST['RegisterID'];
    $UpdateAmount1 = $_POST['UpdateAmount'];
    $total1 = $row6['Balance'] - $UpdateAmount1;
    $query1 = mysqli_query($con, "UPDATE account SET Balance='$total1' WHERE AccountID='$AccountType1'");
    if ($query1) {
        // header('on: search.php'); 
    }
    // $description = "Transfer";
    // $date = date("Y-m-d");
    // $minusamount = -+$UpdateAmount;
    // $insert = "INSERT INTO transaction (AccountID,UpdateDate,UpdateBalance,Description)
    //    values ('$AccountType1','$date','$minusamount','$description')";
    // $result = mysqli_query($con, $insert);
    // if ($result) {
    //     // echo "<script>window.alert('Create Successfully');window.location='T.php'</script>";
    // }
    // $description1 = "Receive";
    // $insert = "INSERT INTO transaction (AccountID,UpdateDate,UpdateBalance,Description)
    //    values ('$UpdateAccountID','$date','$UpdateAmount','$description1')";
    // $result = mysqli_query($con, $insert);
    // if ($result) {
    //     echo "<script>window.alert('Transfer Successfully');window.location='transaction.php'</script>";
    // }
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
        <form action="#" method="post">
            <div class="row">
                <div class="col-md-12 mb-2">
                    <h2>Transfer</h2>
                </div>
                <div class="col-md-6 mb-2">
                    <label for="Name" class="form-label">Transfer From</label>
                    <select class="form-select" name="RegisterID" id="RegisterID">
                        <option value="">No</option>
                        <?php
                        while ($row1 = mysqli_fetch_array($result1)) {
                        ?>
                            <option value="<?php echo $row1['AccountID'] ?>"><?php echo $row1['AccountID'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-6 mb-2">
                    <label for="Name" class="form-label">Account Type</label>
                    <select class="form-select" name="AccountType1" id="AccountType1">

                    </select>
                </div>
                <div class="col-md-6 mb-2">
                    <label for="Name" class="form-label">Transfer To</label>
                    <select class="form-select" name="UpdateAccountID" id="RegisterIDS">
                        <option value="">No</option>
                        <?php
                        while ($row2 = mysqli_fetch_array($result2)) {
                        ?>
                            <option value="<?php echo $row2['AccountID'] ?>"><?php echo $row2['AccountID'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-6 mb-2">
                    <label for="AccountType" class="form-label">Account Type</label>
                    <select class="form-select" name="AccountType2" id="AccountType2">

                    </select>
                </div>
                <div class="col-md-12">
                    <label for="AccountType" class="form-label">Amount</label>
                    <input type="text" name="UpdateAmount" class="form-control" id="UpdateAmount" required>
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
    $(document).ready(function() {
        $("#RegisterID").on("change", function() {
            var RegisterID = $(this).val();
            $.ajax({
                url: "account.php",
                type: "POST",
                data: {
                    RegisterID: RegisterID
                },
                success: function(result) {
                    $("#AccountType1").html(result);
                }
            });
        });
        $("#RegisterIDS").on("change", function() {
            var RegisterIDS = $(this).val();
            $.ajax({
                url: "account1.php",
                type: "POST",
                data: {
                    RegisterIDS: RegisterIDS
                },
                success: function(result) {
                    $("#AccountType2").html(result);
                }
            });
        });
    });
</script>

</html>