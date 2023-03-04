<?php
include('../layout/all.php');
include('../layout/header.php');
?>
<?php
$active="Active";
if (isset($_POST['BtnSearch'])) {
    $Search = $_POST['Search'];
    $select = "select * from register R inner join account A on R.RegisterID=A.RegisterID where (R.NRC LIKE '%$Search%' 
    or A.AccountID LIKE '%$Search%' or R.Name like '%$Search%' or A.Balance like '%$Search%') and A.Status='Active'";
} else {
    $select = "SELECT * from register inner join account on register.RegisterID=account.RegisterID where account.Status='Active'";
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
            <div class="row">
                <div class="col-md-12">
                    <h3>Deposit List</h3>
                </div>
                <div class="input-group col-md-12 rounded mt-2">
                    <input type="search" class="form-control" placeholder="Search" name="Search" aria-label="Search" aria-describedby="search-addon" />
                    <button type="submit" class="border-0" name="BtnSearch"><span class="input-group-text border-0" id="search-addon">
                            <i class="fas fa-search"></i>
                        </span></button>
                </div>
            </div>
            <div class="container-fluid w-100 mt-3">
                <div class=" s ">
                    <table class="table t">
                        <thead class="">
                            <tr class=" text-center">
                                <th class="col ">AccountID</th>
                                <th class="col ">Name</th>
                                <th class="col ">NRC</th>
                                <th class="col ">Balance</th>
                                <th class="col ">Status</th>
                                <th class="col"></th>
                                <!-- <th class="col "><a href="../third/search.php" class="text-decoration-none text-dark">Refresh<i class="fa-solid fa-arrows-rotate ms-2 "></i></a></th> -->

                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php

                            while ($row = mysqli_fetch_array($query)) {

                                $nrc = $row['Statenumber'] . '/' . $row['District'] . $row['Naing'] . $row['NRC'];

                                echo "<tr>";

                                echo "<td class='pt-3'>" . $row['AccountID'] . "</td>";

                                echo "<td class='pt-3'>" . $row['Name'] . "</td>";

                                echo "<td class='pt-3'>" . $nrc . "</td>";

                                echo "<td class='pt-3'>" . $row['Balance'] . "</td>";

                                echo "<td class='pt-3'>" . $row['Status'] . "</td>";

                                echo "<td>";

                                if ($row['Status'] == 'Active') {
                                    echo "<a href='Transfer.php?id=$row[AccountID]' class='btn btn-info text-white btn-del ' id='BtnDelete'>Transfer</a>";
                                } else {
                                    echo "<a href='Transfer.php?id=$row[AccountID]' class='btn disabled btn-info text-white btn-del ' id='BtnDelete'>Deposit</a>";
                                }
                                echo "</td>";
                            }

                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
    </div>
</body>

</html>