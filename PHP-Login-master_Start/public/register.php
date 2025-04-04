<?php
require_once ('config.php');
session_start();

if(isset($_POST['Register'])) {
    $username = trim($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $db->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();

    $_SESSION['Username'] = $username;
    header("location: index.php");
}
?>