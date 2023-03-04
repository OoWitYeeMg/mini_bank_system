<?php
session_start();
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = "bank";
$con = mysqli_connect('localhost', 'root', '', 'bank');
?>
<?php
if (isset($_POST['BtnLogin'])) {
    if ($_POST['Name'] == null || $_POST['Name'] == "" || empty($_POST['Name'])) {
        $errorName = "<small style='color:red;'>Message is Required!</small>";
    } else {
        $Name = $_POST['Name'];
    }
    // if ($_POST['UserName'] == null || $_POST['UserName'] == "" || empty($_POST['UserName'])) {
    //     $errorUserName = "<small style='color:red;'>Message is Required!</small>";
    // } else {
    //     $UserName = $_POST['UserName'];
    // }
    if ($_POST['Password'] == null || $_POST['Password'] == "" || empty($_POST['Password'])) {
        $errorPassword = "<small style='color:red;'>Message is Required!</small>";
    } else {
        $Password = $_POST['Password'];
    }
    $select = "INSERT INTO login (Name,Password)
    values ('$Name','$Password')";
    $result = mysqli_query($con, $select);
    if ($result) {
        echo "<script>window.alert('Create Successfully');window.location='login.php'</script>";
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
    <link rel="stylesheet" href="../js/style.css">
    <style>
        body {
            background-color:  #3498db;
        }
        .center {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 400px;
            background: white;
            border-radius: 10px;
            padding-top: 30px;
            padding-bottom: 30px;
            border: 1px solid #adadad;
        }

        .center h1 {
            text-align: center;
            padding: 0 0 20px 0;
            border-bottom: 1px solid silver;
        }

        .center form {
            padding: 0 40px;
            box-sizing: border-box;
        }

        form .txt_field {
            position: relative;
            border-bottom: 2px solid #adadad;
            margin: 30px 0;
        }

        .txt_field input {
            width: 100%;
            padding: 0 5px;
            height: 40px;
            font-size: 16px;
            border: none;
            background: none;
            outline: none;
        }

        .txt_field label {
            position: absolute;
            top: 50%;
            left: 5px;
            color: #adadad;
            transform: translateY(-50%);
            font-size: 16px;
            pointer-events: none;
            transition: .5s;
        }

        .txt_field .span1::before {
            content: '';
            position: absolute;
            top: 40px;
            left: 0;
            width: 0%;
            height: 2px;
            background: #a6a6a6;
        }

        .txt_field input:focus~label,
        .txt_field input:valid~label {
            top: -9px;
            color: #3498db;
        }

        .txt_field input:focus~.span1::before,
        .txt_field input:valid~.span1::before {
            width: 100%;
        }

        .pass {
            margin: -5px 0 20px 5px;
            color: #a6a6a6;
            cursor: pointer;
        }

        .pass:hover {
            text-decoration: underline;
        }

        input[type="submit"] {
            width: 100%;
            height: 50px;
            border: 1px solid;
            background: #2691d9;
            border-radius: 25px;
            font-size: 18px;
            color: #e9f4fb;
            font-weight: 700;
            cursor: pointer;
            outline: none;
        }

        input[type="submit"]:hover {
            border-color: #2691d9;
            transition: .5s;
        }

        .signup_link {
            margin: 20px 0;
            text-align: center;
            font-size: 16px;
            color: #666666;
        }

        .signup_link a {
            color: #2691d9;
            text-decoration: none;
        }

        .signup_link a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="center">
        <h1>
            SignUp
        </h1>
        <form action="#" method="POST" autocomplete="off">
            <input type="hidden" name="Login_ID">
            <div class="txt_field">
                <input type="text" name="Name">
                <span class="span1"></span>
                <label for="Name">Name <span><?php if (isset($errorName)) {
                                                    echo $errorName;
                                                } ?>
                    </span></label>

            </div>
            <!-- <div class="txt_field">
                <input type="text" name="UserName">
                <span class="span1"></span>
                <label for="User">User Name <span><?php if (isset($errorUserName)) {
                                                        echo $errorUserName;
                                                    } ?>
                    </span></label>
            </div> -->
            <div class="txt_field">
                <input type="password" name="Password">
                <span class="span1"></span>
                <label for="Password">Password <span><?php if (isset($errorPassword)) {
                                                            echo $errorPassword;
                                                        } ?>
                    </span></label>
            </div>
            
            <div class="button">
                <input type="submit" name="BtnLogin" >
                <!-- <input type="reset" name="BtnReset"> -->
            </div>
           
        </form>
    </div>
</body>

</html>