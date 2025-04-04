<?php
session_start();

// pages that dont need logins
$public_pages = [
    'login.php',
    'register.php'
];

$current_page = basename($_SERVER['PHP_SELF']);

if (!in_array($current_page, $public_pages)) {
    if (!isset($_SESSION['Username'])) {
        $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI'];
        header("Location: login.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/stylesheet.css">