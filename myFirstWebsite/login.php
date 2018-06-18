<?php
include_once "config.php";
if($_SERVER["REQUEST_METHOD"] == "GET" and $_GET['action'] == 'logout') {
    logout();
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    login($_POST['email'],$_POST['password']);
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ورود</title>
    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/milligram-rtl.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="continer">
    <div class="centerBox">
        <h3>ورود به سایت</h3>
        <form action="login.php" method="post">
            <input type="text" class="ltr text-left" name="email" placeholder="ایمیل">
            <input type="password" class="ltr text-left" name="password" placeholder="رمز عبور">
            <input type="submit" value="ورود">
        </form>
    </div>
</div>

</body>
</html>