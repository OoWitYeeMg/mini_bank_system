<?php
include('../layout/all.php');
include('../layout/header.php');

?>
<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $select = "SELECT * from register where RegisterID='$id'";
    $run = mysqli_query($con, $select);
    $row = mysqli_fetch_array($run);

    $select = "SELECT * from account where RegisterID='$id'";
    $query = mysqli_query($con, $select);
    $num = mysqli_num_rows($query);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            height: 1200px;
        }

        #Company {
            display: none;
        }

        .t {
            min-width: 100%;
        }

        .s {
            overflow-x: auto;
        }

        .account {}
    </style>
</head>

<body>
    <div class="container registerheader mt-5 w-75 mb-5">
        <form action="#" method="GET">
            <input type="hidden" value="<?php echo $row['RegisterID'] ?>" name="UpdateRegisterID">
            <div class="row g-3 mt-1" style="background-color: whitesmoke;">
                <div class="col-md-12">
                    <h3>Personal Information</h3>
                </div>
                <!-- <div class="header col-md-12 justify-content-center">
                    <div class="photo">
                        <img src="../image/none.png" id="output" class="none">
                    </div>
                    <div class="change">
                        <label class="-label" for="file">
                            <span class="glyphicon glyphicon-camera"></span>
                            <span class="BtnChange">Change</span>
                        </label>
                        <input id="file" name="Image" type="file" onchange="loadFile(event)" />
                        
                    </div>
                </div> -->
                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label"> Name</label>
                    <input type="text" class="form-control" value="<?php echo $row['Name'] ?>" id="inputEmail4" name="UpdateName" required>
                </div>
                <div class="col-md-6">
                    <label for="inputPassword4" class="form-label">NRC</label>
                    <input type="text" class="form-control" value="<?php echo $row['NRC'] ?>" id="inputPassword4" name="UpdateNRC" required>
                </div>
                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">Email</label>
                    <input type="email" class="form-control" value="<?php echo $row['Email'] ?>" id="inputEmail4" name="UpdateEmail" required>
                </div>
                <div class="col-md-6">
                    <label for="inputPassword4" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" value="<?php echo $row['PhoneNumber'] ?>" id="inputPassword4" name="UpdatePhoneNumber" required>
                </div>
                <div class="col-md-6">
                    <label for="inputState" class="form-label">Gender</label>
                    <select id="inputState" class="form-select" name="UpdateGender" required>
                        <option value="Male" <?= $row['Gender'] == 'Male' ? ' selected="selected"' : '' ?>>Male</option>
                        <option value="Female" <?= $row['Gender'] == 'Female' ? ' selected="selected"' : '' ?>>Female</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="Date" class="form-label">Date Of Birth</label>
                    <input type="date" name="UpdateDate" value="<?php echo $row['Date'] ?>" class="form-control" id="Date" required>
                </div>
                <div class="col-md-6">
                    <label for="RegisterType" class="form-label">Register Type</label>
                    <select id="RegisterType" class="form-select" name="UpdateRegisterType">
                        <option value="Individual" <?= $row['RegisterType'] == 'Individual' ? ' selected="selected"' : '' ?>>Individual </option>
                        <option value="Enterprise" <?= $row['RegisterType'] == 'Enterprise' ? ' selected="selected"' : '' ?>>Enterprise </option>
                    </select>
                </div>
            </div>
            <div class="row g-3 pt-3 mb-3" id="Company">
                <div class="col-md-12">
                    <h3>Company Information</h3>
                </div>
                <div class="col">
                    <label for="CompanyName" class="form-label">Company Name</label>
                    <span value="<?php echo $row['CompanyName'] ?>"><?php echo $row['CompanyName'] ?>"
                </div>
                <div class="col">
                    <label for="CompanyNRC" class="form-label">Company NRC</label>
                    <input type="text" class="form-select" value="<?php echo $row['CompanyNRC'] ?>" name="UpdateCompanyNRC">
                </div>
            </div>
            <div class="row g-3 pb-3 pt-2" style="background-color: whitesmoke;">
                <div class="col-md-12">
                    <h3>Address</h3>
                </div>
                <div class="col-md-12">
                    <label for="inputAddress2" class="form-label">Address </label>
                    <input type="text" name="UpdateAddress" value="<?php echo $row['Address'] ?>" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor" required>
                </div>
                <div class="col-md-6">
                    <label for="inputCity" class="form-label">Township</label>
                    <input type="text" class="form-control" value="<?php echo $row['City'] ?>" id="inputCity" name="UpdateCity" required>
                </div>
                <div class="col-md-6">
                    <label for="Division" class="form-label">Division</label>
                    <select id="Division" class="form-select" name="UpdateDivision">
                        <option value="Yangon" <?= $row['Division'] == 'Yangon' ? ' selected="selected"' : '' ?>>Yangon </option>
                        <option value="Mandalay" <?= $row['Division'] == 'Mandalay' ? ' selected="selected"' : '' ?>>Mandalay </option>
                        <option value="Sagaing" <?= $row['Division'] == 'Sagaing' ? ' selected="selected"' : '' ?>>Sagaing </option>
                        <option value="Bago" <?= $row['Division'] == 'Bago' ? ' selected="selected"' : '' ?>>Bago </option>
                        <option value="Magway" <?= $row['Division'] == 'Magway' ? ' selected="selected"' : '' ?>>Magway </option>
                        <option value="Tanintharyi" <?= $row['Division'] == 'Tanintharyi' ? ' selected="selected"' : '' ?>>Tanintharyi</option>
                        <option value="Shan" <?= $row['Division'] == 'Shan' ? ' selected="selected"' : '' ?>>Ayeyarwady</option>

                    </select>
                </div>
            </div>

            <div class="row mt-3 mb-5 pb-3 account" style="background-color: whitesmoke;">
                <div class="col-md-12">
                    <h4 class="mt-3">Account</h4>
                </div>
                <?php
                while ($row1 = mysqli_fetch_array($query)) {

                ?>
                    <input type="hidden" name="AccountID">
                    <div class="col-md-3">
                        <h6>Customer ID</h6>
                        <span><?php echo $row1['RegisterID'] ?></span>
                    </div>
                    <div class="col-md-3">
                        <h6>Account ID</h6>
                        <span><?php echo $row1['AccountID'] ?></span>
                    </div>
                    <div class="col-md-3">
                        <h6>Account Type</h6>
                        <span><?php echo $row1['AccountType'] ?></span>

                    </div>
                    <div class="col-md-3">
                        <h6>Balance</h6>
                        <span><?php echo $row1['Balance'] ?></span>

                    </div>
                <?php
                }
                ?>
            </div>
        </form>

    </div>

</body>
<script>
    $(Document).ready(function() {
        // $("#RegisterType").change(function(){
        //     if($(this).val() == 'Individual'){
        //       $("#Cheques").show(1000);
        //     }
        //     else{
        //       $("#Cheques").hide(1000);
        //     }
        // });
        $("#RegisterType").change(function() {
            if ($(this).val() == 'Enterprise') {
                $("#Company").show(1000);
            } else {
                $("#Company").hide(1000);
            }
        });
        const item = document.getElementById('RegisterType');
        if (item.value == 'Enterprise') {
            $('#Company').show();
        }
    });
</script>

</html>