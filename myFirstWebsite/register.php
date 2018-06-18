<?php
include_once 'config.php';
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    userRegester($_POST['email'],$_POST['password1'],$_POST['displayName']);
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ثبت نام</title>
    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/milligram-rtl.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="continer">
    <div class="centerBox">
        <h3>ثبت نام در سایت</h3>
        <form action="register.php" method="post">
            <input type="text" name="displayName" placeholder="نام کامل شما" >
            <input type="text" class="ltr text-left" name="email" placeholder="ایمیل">
            <input type="password" class="ltr text-left" name="password1" placeholder="رمز عبور">
            <input type="password" class="ltr text-left" name="password2" placeholder="تکرار رمز عبور">
            <input type="submit" value="ثبت نام">
        </form>
    </div>
</div>

</body>
</html>


