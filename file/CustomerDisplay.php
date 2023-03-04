<?php
include('../layout/all.php');
include('../layout/header.php');
?>
<?php

$select = "SELECT * from register";
$query = mysqli_query($con, $select);
$num = mysqli_num_rows($query);

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
    <div class="container-fluid  w-100">
        <div class=" s mt-3 ">
            <h3>Customer List</h3>
            <table class="table t">
                <thead>
                    <tr class=" align-items-end text-center py-3">
                        <th class="col">CustomerID</th>
                        <th class="col ">Name</th>
                        <th class="col ">NRC</th>
                        <th class="col ">Register Type</th>
                        <th class="col ">Status</th>
                        <th class="col "></th>

                    </tr>
                </thead>
                <tbody class="text-center bg-light">
                    <?php

                    while ($row = mysqli_fetch_array($query)) {
                        // if (($row['CusStatus']=='Block')) {
                        $nrc = $row['Statenumber'] . '/' . $row['District'] . $row['Naing'] . $row['NRC'];
                        // } else {
                        // }

                        // $formattedDate = date("d-m-Y", strtotime($row["Date"]));
                        echo "<tr>";

                        echo "<td class='pt-3'>" . $row['RegisterID'] . "</td>";

                        echo "<td class='pt-3'>" . $row['Name'] . "</td>";

                        echo "<td class='pt-3'>" . $nrc . "</td>";

                        echo "<td class='pt-3' >" . $row['RegisterType'] . "</td>";

                        echo "<td class='pt-3'>" . $row['CusStatus'] . "</td>";

                        echo "<td>";
                        if ($row['CusStatus'] == 'Active ') {
                            echo "<a href='AccountRegister.php?id=$row[RegisterID]' class='btn btn-outline-success btn-del me-2' id='BtnAccountRegister'> Register</a>";
                        } else {
                            echo "<a href='AccountRegister.php?id=$row[RegisterID]' class='btn btn-outline-danger btn-del me-2 disabled' id='BtnAccountRegister'> Register</a>";
                        }
                        echo "<a href='detail.php?id=$row[RegisterID]' class='btn btn-outline-success btn-del px-3 me-2' id='BtnDelete'>Detail</a>";
                        echo "<a href='CustomerUpdate.php?id=$row[RegisterID]' class='btn btn-outline-success btn-upd px-3 me-2'  id='BtnUpdate'>Update</a>";

                        echo "</td>";

                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>