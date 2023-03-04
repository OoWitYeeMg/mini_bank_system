<?php
include('../layout/all.php');
session_start();
if (empty($_SESSION['Name'])) {
    echo "<script>window.alert('Plz Login First');window.location='login.php'</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../js/style.css">
    <title>Responsive Navbar</title>
    <style>
    </style>
</head>

<body>
    <header>
        <div class="container">
            <input type="checkbox" name="" id="check">

            <div class="logo-container">
                <h3 class="logo">UAB <span>Bank</span></h3>
            </div>

            <div class="nav-btn">
                <div class="nav-links">
                    <ul>
                        <li class="nav-link" style="--i: .6s">
                            <a href="../file/report.php">DashBoard</a>
                        </li>
                        <li class="nav-link" style="--i: .85s">
                            <a href="#">List<i class="fas fa-caret-down"></i></a>
                            <div class="dropdown">
                                <ul>
                                    <li class="dropdown-link">
                                        <a href="../file/transaction.php">Transaction</a>
                                    </li>
                                    <li class="dropdown-link">
                                        <a href="../file/DepositList.php">Deposit</a>
                                    </li>
                                    <li class="dropdown-link">
                                        <a href="../file/WithdrawList.php">Withdraw</a>
                                    </li>
                                    <li class="dropdown-link">
                                        <a href="../file/Transfer.php">Transfer</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-link" style="--i: 1.1s">
                            <a href="#">Account<i class="fas fa-caret-down"></i></a>
                            <div class="dropdown">
                                <ul>
                                    <li class="dropdown-link">
                                        <a href="../file/AccountDisplay.php">Display</a>
                                    </li>
                                    <li class="dropdown-link">
                                        <a href="../file/CustomerDisplay.php">Opening</a>
                                    </li>
                                   
                                </ul>
                            </div>
                        </li>
                        <li class="nav-link" style="--i: 1.1s">
                            <a href="#">Customer<i class="fas fa-caret-down"></i></a>
                            <div class="dropdown">
                                <ul>
                                    <li class="dropdown-link">
                                        <a href="../file/CustomerDisplay.php">Display</a>
                                    </li>
                                    <li class="dropdown-link">
                                        <a href="../file/register.php">Register</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="log-sign" style="--i: 1.8s">
                    <a href="../file/logout.php" class="btn transparent">Sign Out</a>
                    <a href="../file/signup.php" class="btn solid">Sign up</a>
                </div>
            </div>

            <div class="hamburger-menu-container">
                <div class="hamburger-menu">
                    <div></div>
                </div>
            </div>
        </div>
    </header>
<?php
include('../layout/footer.php');
?>