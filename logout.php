<?php

session_start();
if (isset($_SESSION['name'])) {
    
session_unset();
session_destroy();
ob_start();
header("location:sign-in.php");
ob_end_flush(); }
//include 'home.php';
//include 'home.php';
exit();
?>