<?php
include('../layout/all.php');
include('../layout/header.php');
?>
<?php
$date = date("Y-m-d");
if (isset($_POST['BtnSubmit'])) {
    $SDate = $_POST['SDate'];
    $EDate = $_POST['EDate'];
    $Search = $_POST['Search'];
    $AccountType = $_POST['AccountType'];
    $select = "select * from transaction R inner join account A on R.AccountID=A.AccountID 
    where (UpdateDate between '" . $SDate . "' and '" . $EDate . "') and 
    A.AccountID like '%$Search%' and A.AccountType like '%$AccountType%'";
} else {
    $select = "SELECT * from transaction inner join account on account.AccountID where transaction.AccountID order by TransactionID desc";
}

$query = mysqli_query($con, $select);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* @media (max-width:900px) { */

        .t {
            min-width: 100%;
        }

        .s {
            overflow-x: auto;
        }

        /* } */
    </style>
</head>

<body>
    <div class="container-fluid mt-3">
        <form action="#" method="post">
            <div class="container-fluid w-100">
                <div class="row g-0 justify-content-center">
                    <div class="col-md-12">
                        <h3>Report File</h3>
                    </div>
                    <div class="col-md-3  input-group w-25">
                        <input type="date" name="SDate" class="form-select" value="<?php if (isset($SDate)) {
                                                                                        echo $_POST['SDate'];
                                                                                    } else {
                                                                                        echo $date;
                                                                                    } ?>">
                    </div>
                    <div class="col-md-3 input-group w-25">
                        <input type="date" name="EDate" class="form-select" value="<?php if (isset($EDate)) {
                                                                                        echo $_POST['EDate'];
                                                                                    } else {
                                                                                        echo $date;
                                                                                    } ?>">
                    </div>
                    <div class="col-md-3 input-group w-25">
                        <select id="AccountType" class="form-select" name="AccountType">
                            <option value="" selected>Account Type</option>
                            <option value="Saving" <?php if (isset($_POST['AccountType'])) {
                                                        if ($_POST['AccountType'] == 'Saving') {
                                                            echo "selected";
                                                        }
                                                    }  ?>>Saving Account</option>
                            <option value="6Month" <?php if (isset($_POST['AccountType'])) {
                                                        if ($_POST['AccountType'] == '6Month') {
                                                            echo "selected";
                                                        }
                                                    } ?>>Fixed Deposit Account(6 Months)</option>
                            <option value="1Year" <?php if (isset($_POST['AccountType'])) {
                                                        if ($_POST['AccountType'] == '1Year') {
                                                            echo "selected";
                                                        }
                                                    } ?>>Fixed Deposit Account (1 Year)</option>
                        </select>
                    </div>
                    <div class=" col-md-3 input-group rounded  w-25">
                        <input type="search" class="form-control" placeholder="Search" name="Search" aria-label="Search"
                         value="<?php if (isset($_POST['Search'])) {echo $_POST['Search'];}  ?>" aria-describedby="search-addon" />
                        <button type="submit" class="border-0 bg-success" name="BtnSubmit"><span class="input-group-text border-0 bg-success" id="search-addon">
                                <i class="fa fa-search"></i>
                            </span></button>
                            <button type="clear" class="border-0 bg-danger" name="BtnClear"><span class="input-group-text border-0 bg-danger" id="search-addon">
                            <i class="fa fa-refresh bg-danger"></i>
                        </span></button>
                    </div>
                </div>
                <div class=" s  mt-3">
                    <table class="table t">
                        <thead class="">
                            <tr class=" text-center">
                                <th class="col">TransactionID</th>
                                <th class="col ">AccountID</th>
                                <th class="col ">Type</th>
                                <th class="col ">Balance</th>
                                <th class="col ">Date</th>
                                <th class="col ">Description</th>
                                <!-- <th class="col "><a href="../third/search.php" class="text-decoration-none text-dark">Refresh<i class="fa-solid fa-arrows-rotate ms-2 "></i></a></th> -->

                            </tr>
                        </thead>
                        <tbody class="text-center">

                            <?php

                            while ($row = mysqli_fetch_array($query)) {

                                echo "<tr>";

                                echo "<td class='pt-3'>" . $row['TransactionID'] . "</td>";

                                echo "<td class='pt-3'>" . $row['AccountID'] . "</td>";

                                echo "<td class='pt-3'>" . $row['AccountType'] . "</td>";


                                echo "<td class='pt-3'>" . $row['Balance'] . "</td>";

                                echo "<td class='pt-3'>" . $row['UpdateDate'] . "</td>";

                            ?>
                                <td><button class="btn disabled <?php
                                                                if ($row['Description'] == 'Deposit') {
                                                                    echo "btn-info text-white";
                                                                } elseif ($row['Description'] == 'Inactive') {
                                                                    echo "btn-dark text-white";
                                                                } elseif ($row['Description'] == 'Active') {
                                                                    echo "btn-success text-white";
                                                                } else {
                                                                    echo "btn-danger text-white";
                                                                }
                                                                ?>"><?php echo $row['Description']; ?></button></td>

                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
    </div>
</body>

</html>