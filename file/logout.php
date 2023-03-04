<?php
session_start();
$_SESSION["Name"] = "";
session_destroy();
header("Location: login.php");
?>