<?php
include('../layout/all.php');
include('../layout/header.php');
?>
<?php
$date = date("Y-m-d");
$select = "SELECT * from transaction where UpdateDate='$date' order by TransactionID desc";
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
                <h3>Transaction List</h3>
                <div class=" s  mt-3">
                    <table class="table t">
                        <thead class="">
                            <tr class=" text-center">
                                <th class="col">TransactionID</th>
                                <th class="col ">AccountID</th>
                                <th class="col ">Amount</th>
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

                                echo "<td class='pt-3'>" . $row['UpdateBalance'] . "</td>";

                                echo "<td class='pt-3'>" . $row['UpdateDate'] . "</td>";

                            ?>
                                <td><button class="btn disabled <?php
                                                                if ($row['Description'] == 'Deposit') {
                                                                    echo "btn-info text-white";
                                                                } elseif ($row['Description'] == 'Inactive') {
                                                                    echo "btn-dark text-white";
                                                                } elseif ($row['Description'] == 'Active') {
                                                                    echo "btn-success text-white";
                                                                }
                                                                 else {
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