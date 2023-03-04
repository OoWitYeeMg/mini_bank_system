<?php
include('../layout/all.php');
include('../layout/header.php');

?>
<?php
if(isset($_GET['id'])){
    $id = $_GET['id']; 
    $select="SELECT * from register where RegisterID='$id'";
    $run=mysqli_query($con,$select); 
    $row=mysqli_fetch_array($run);
    
  }
if (isset($_POST['BtnSubmit'])) {
    $CustomerID=$_POST['CustomerID'];
    $AccountID=$_POST['AccountID'];
    $Balance=$_POST['Balance'];
    $AccountType=$_POST['AccountType'];
    $active="Active";
    $date= date('Y-m-d');

    $select1 = "INSERT INTO account (RegisterID,Balance,AccountType,Status)
    values ('$CustomerID','$Balance','$AccountType','$active')";
    $select2 = "INSERT INTO transaction (AccountID,UpdateDate,UpdateBalance,Description)
    SELECT LAST_INSERT_ID(),'$date','$Balance','$active'";

    //print_r($select); exit();
   $result1 = mysqli_query($con, $select1);
   $result2 = mysqli_query($con, $select2);
   
   if ($result2) {
       echo "<script>window.alert('Create Successfully');window.location='AccountDisplay.php'</script>";
   } else {
       mysqli_error($con);
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
    <div class="container mt-3">
        <form action="#" method="POST">
            <div class="row">
                <div class="col-md-12">
                    <h3>Account Register</h3>
                </div>
                <input type="hidden" name="AccountID">
                <div class="col-md-4">
                    <label for="CustomerID" class="form-label">Customer ID </label>
                    <input type="text" name="CustomerID" class="form-control" value="<?php echo $row['RegisterID']?>" id="CustomerID" required>
                </div>
                <div class="col-md-4">
                    <label for="AccountType" class="form-label">Account Type</label>
                    <select id="AccountType" class="form-select" name="AccountType">
                        <option selected value="Saving">Saving Account</option>
                        <option value="6Month">Fixed Deposit Account(6 Months) </option>
                        <option value="1Year">Fixed Deposit Account (1 Year) </option>

                        <!-- <option value="Current">Current Account </option>
                        <option value="Recurring">Recurring Deposit Account </option>
                        <option value="NRI">NRI Account</option> -->
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="Balance" class="form-label">Balance</label>
                    <input type="text" class="form-control" id="Balance" name="Balance" required>
                </div>
                <div class="col-12 text-center pb-3 mt-4" >
                    <button type="submit" name="BtnSubmit" class="btn btn-success">Submit</button>
                    <button type="cancel" name="BtnCancel" class="btn btn-danger ">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>