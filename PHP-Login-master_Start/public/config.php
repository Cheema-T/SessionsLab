<?php
$db = new mysqli('localhost', 'root', 'root', 'login_system');
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}


$db->query("
    CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL
    )
");


$result = $db->query("SELECT * FROM users WHERE username = 'Steve'");
if ($result->num_rows == 0) {
    $hashed_password = password_hash('pass', PASSWORD_DEFAULT);
    $db->query("INSERT INTO users (username, password) VALUES ('Steve', '$hashed_password')");
}
?>