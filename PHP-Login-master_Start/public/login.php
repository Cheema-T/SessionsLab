<?php
require_once ('config.php');
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../css/signin.css">
<link rel="stylesheet" type="text/css" href="../css/stylesheet.css">
<title>Sign in</title>
</head>
<body>
<div class="container">
    <form action="" method="post" name="Login_Form" class="form-signin">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputUsername">Username</label>
        <input name="Username" type="username" id="inputUsername" class="form-control" placeholder="Username" required autofocus>
        <label for="inputPassword">Password</label>
        <input name="Password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <button name="Submit" value="Login" class="button" type="submit">Sign in</button>
    </form>
    <?php
    if(isset($_POST['Submit'])) {
        $username = $_POST['Username'];
        $password = $_POST['Password'];
        $stmt = $db->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows === 1) {
            $user = $result->fetch_assoc();
            if(password_verify($password, $user['password'])) {
                $_SESSION['Username'] = $user['username'];
                $_SESSION['Active'] = true;
                header("location:index.php");
                exit;
            }
        }
        echo 'Incorrect Username or Password';
    }
    ?>
</div>
</body>
</html>