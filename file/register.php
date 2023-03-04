<?php
include('../layout/all.php');
include('../layout/header.php');

?>
<?php
if (isset($_POST['BtnSubmit'])) {
    $Name = $_POST['Name'];
    $Email = $_POST['Email'];
    $Address = $_POST['Address'];
    $Gender = $_POST['Gender'];
    $PhoneNumber = $_POST['PhoneNumber'];
    $Date = $_POST['Date'];
    $City = $_POST['City'];
    $Division = $_POST['Division'];
    $CompanyName = $_POST['CompanyName'];
    $CompanyNRC = $_POST['CompanyNRC'];
    $RegisterType = $_POST['RegisterType'];
    $CusStatus = $_POST['StatusType'];
    $Statenumber = $_POST['Statenumber'];
    $District = $_POST['District'];
    $Naing = $_POST['Naing'];
    $NRCNo = $_POST['NRCNo'];
    $check_NRC = "SELECT * FROM register WHERE Statenumber='$Statenumber' and District='$District' and Naing='$Naing' and NRC='$NRCNo'";
    $result1 = mysqli_query($con, $check_NRC);
    $count = mysqli_num_rows($result1);
    if ($count > 0) {
        echo "<script>window.alert('NRC is aleready exist!')</script>";
        echo "<script>window.location='register.php'</script>";
        exit();
    }
 $select = "INSERT INTO register (Name,Statenumber,District,Naing,NRC,Email,Address,Date,Gender,PhoneNumber,City,Division,CompanyName,CompanyNRC,RegisterType,CusStatus)
    values ('$Name','$Statenumber','$District','$Naing','$NRCNo','$Email','$Address','$Date','$Gender','$PhoneNumber',' $City','$Division','$CompanyName','$CompanyNRC','$RegisterType','$CusStatus')";
    $result = mysqli_query($con, $select);
    if ($result) {
        echo "<script>window.alert('Create Successfully');window.location='register.php'</script>";
    } else {
        mysqli_error($con);
    }
}
?>
<?php
$takeno = "select state_number_en from nrcs group by state_number_en";
$query1 = mysqli_query($con, $takeno);

// $takeplace = "select short_district from nrcs";
// $query2 = mysqli_query($con, $takeplace);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .photo {
            max-width: 120px;
            max-height: 120px;
        }

        .header {
            position: relative;
            display: flex;
        }

        .none {
            border-radius: 50%;
            width: 100%;
            height: 100%;
        }

        .BtnChange {
            border: none;
            border-radius: 30px;
            padding: 10px 20px;
            font-weight: 400;
            font-size: 1.2rem;
            background-color: #ccc;
        }

        .change {
            margin-top: auto;
            margin-bottom: auto;
            margin-left: 5%;
        }

        .header .-label {
            cursor: pointer;
            color: black;
        }

        .header input {
            display: none;
        }

        #Company {
            display: none;
        }

        body {}
    </style>
</head>

<body>
    <div class="container registerheader mt-1 w-75 mb-1">
        <form method="POST">
            <div class="row g-3 mt-1">
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
                    <input type="text" class="form-control" id="inputEmail4" name="Name" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">NRC</label>
                    <div class=" d-flex">
                        <div class="w-25">
                            <select class="form-select" name="Statenumber" id="Statenumber">
                                <option value="">No</option>
                                <?php
                                while ($row = mysqli_fetch_array($query1)) {
                                ?>
                                    <option value="<?php echo $row['state_number_en'] ?>"><?php echo $row['state_number_en'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div>
                            <select class="form-select" style="width: 130px;" name="District" id="District">
                            <option value="">District</option>

                            </select>
                        </div>
                        <div class="w-25">
                            <select  class="form-select" name="Naing" id="">
                                <option value="(N)">N</option>
                                <option value="(P)">P</option>
                                <option value="(O)">O</option>
                            </select>
                        </div>
                        <div>
                            <input type="text" class="form-control" name="NRCNo">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">Email</label>

                    <input type="email" class="form-control" id="inputEmail4" name="Email" required>
                </div>
                <div class="col-md-6">
                    <label for="inputPassword4" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" id="inputPassword4" name="PhoneNumber" required>
                </div>
                <div class="col-md-6">
                    <label for="inputState" class="form-label">Gender</label>
                    <select id="inputState" class="form-select" name="Gender" required>
                        <option selected value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="Date" class="form-label">Date Of Birth</label>
                    <input type="date" name="Date" class="form-control" id="Date" required>
                </div>
                <div class="col-md-6">
                    <label for="RegisterType" class="form-label">Register Type</label>
                    <select id="RegisterType" class="form-select" name="RegisterType">
                        <option selected value="Individual ">Individual </option>
                        <option value="Enterprise">Enterprise </option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="StatusType" class="form-label">Status Type</label>
                    <select id="StatusType" class="form-select" name="StatusType">
                        <option selected value="Active ">Active </option>
                        <option value="Block">Block </option>
                    </select>
                </div>
            </div>
            <div class="row g-3 pt-3 mb-3" id="Company">
                <div class="col-md-12">
                    <h3>Company Information</h3>
                </div>
                <div class="col">
                    <label for="CompanyName" class="form-label">Company Name</label>
                    <input type="text" class="form-select" name="CompanyName">
                </div>
                <div class="col">
                    <label for="CompanyNRC" class="form-label">Company NRC</label>
                    <input type="text" class="form-select" name="CompanyNRC">
                </div>
            </div>
            <div class="row g-3 pb-1 pt-2">
                <div class="col-md-12">
                    <h3>Address</h3>
                </div>
                <div class="col-md-12">
                    <label for="inputAddress2" class="form-label">Address </label>
                    <input type="text" name="Address" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor" required>
                </div>
                <div class="col-md-6">
                    <label for="inputCity" class="form-label">Township</label>
                    <input type="text" class="form-control" id="inputCity" name="City" required>
                </div>
                <div class="col-md-6">
                    <label for="Division" class="form-label">Division</label>
                    <select id="Division" class="form-select" name="Division">
                        <option selected value="Yangon">Yangon </option>
                        <option value="Mandalay">Mandalay </option>
                        <option value="Sagaing">Sagaing </option>
                        <option value="Bago">Bago </option>
                        <option value="Magway">Magway </option>
                        <option value="Tanintharyi">Tanintharyi</option>
                        <option value="Shan">Ayeyarwady</option>

                    </select>
                </div>
                <div class="col-12 text-center pb-3 mt-2">
                    <button type="submit" name="BtnSubmit" class="btn btn-primary">Submit</button>
                    <button type="cancel" name="BtnCancel" class="btn btn-dark ">Cancel</button>
                </div>
            </div>

        </form>

    </div>
</body>
<script src="../js/jquery.min.js"></script>

<script>
    // var loadFile = function(event) {
    //     var image = document.getElementById("output");
    //     image.src = URL.createObjectURL(event.target.files[0]);
    // };
    $(document).ready(function() {
        $("#Statenumber").on("change", function() {
            var Statenumber = $(this).val();
            $.ajax({
                url: "district.php",
                type: "POST",
                data: {
                    statenumber: Statenumber
                },
                success: function(result) {
                    $("#District").html(result);
                }
            });
        });
        $("#RegisterType").change(function() {
            if ($(this).val() == 'Enterprise') {
                $("#Company").show(1000);
            } else {
                $("#Company").hide(1000);
            }
        });
    });
</script>

</html>