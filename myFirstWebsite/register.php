<?php
include_once 'config.php';

$errorMsg = [];

// submit form
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // email validation
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errorMsg [] = "لطفا ایمیلی معتبر وارد نمایید.";
    }

    // password validation
    if ($_POST['password1'] === $_POST['password2']) {
        // check strong Password
        checkPassword($_POST['password1'], $errorMsg);
    } else {
        $errorMsg [] = "پسوردهای وارد شده مطابق هم نیستند.";
    }

    // check not empty form submit
    if (!empty($_POST['email']) and !empty($_POST['password1']) and !empty($_POST['displayName'])) {
        // if not error
        if (empty($errorMsg)) {
            $res = userRegister($_POST['email'], $_POST['password1'], $_POST['displayName']);
            // if email user exist return 1
            if ($res == 1) {
                $errorMsg [] = "کاربری قبلا با این ایمیل ثبت نام کرده است";
            }
        }
    }

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
    <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <?php if (empty($errorMsg)): ?>
            <div class="centerBox success">
                ثبت نام شما با موفقیت انجام شد.
            </div>
        <?php else: ?>
            <div class="centerBox error">
                <?php foreach ($errorMsg as $eMsg) {
                    echo $eMsg . '<br>';
                } ?>
            </div>
        <?php endif; ?>
    <?php endif; ?>

    <div class="centerBox">
        <h3>ثبت نام در سایت</h3>
        <form action="register.php" method="post">
            <input type="text" name="displayName" placeholder="نام کامل شما"
                   value="<?php echo $_POST['displayName'] ?? ""; ?>">
            <input type="text" class="ltr text-left" name="email" placeholder="ایمیل"
                   value="<?php echo $_POST['email'] ?? "" ?>">
            <input type="password" class="ltr text-left" name="password1" placeholder="رمز عبور">
            <input type="password" class="ltr text-left" name="password2" placeholder="تکرار رمز عبور">
            <input type="submit" value="ثبت نام">
        </form>
    </div>
</div>

</body>
</html>


