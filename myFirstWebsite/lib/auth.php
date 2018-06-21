<?php
define('ROLEADMIN', 'admin');
define('ROLEAUTHOR', 'author');
define('ROLESUBSCRIBER', 'subscriber');


// return detail user
function get_user_info($email)
{
    global $conn;
    $sql = "SELECT * FROM users where email='$email'";
    $result = mysqli_query($conn, $sql);
    $conunt = mysqli_fetch_assoc($result);
    return $conunt;
}

// if user exist return 1
function user_exists($email)
{
    global $conn;
    $sql = "SELECT count(*) as c FROM users where email='$email'";
    $result = mysqli_query($conn, $sql);
    $conunt = mysqli_fetch_assoc($result);
    return $conunt['c'];
}

// get detail user with form submit
function userRegister($email, $password, $displayName, $role = ROLESUBSCRIBER)
{

    // check user exist
    if (user_exists($email)) {
        return 1;
    }

    global $conn;
    $hashpassword = password_hash($password, PASSWORD_BCRYPT);
    $sql = "INSERT INTO `users`(`email`, `password`, `display_name`, `role`) 
                        VALUES ('$email','$hashpassword','$displayName','$role'); ";

    mysqli_query($conn, $sql);
}

// check Password Strong
function checkPassword($pwd, &$errors)
{
    $errors_init = $errors;

    if (empty($pwd)) {
        $errors[] = "رمز عبور وارد نشده است.";
    }

    if (strlen($pwd) < 8) {
        $errors[] = "پسورد خیلی کوتاه است";
    }

    if (!preg_match("#[0-9]+#", $pwd)) {
        $errors[] = "پسورد باید شامل اعداد باشد.";
    }

    if (!preg_match("#[a-zA-Z]+#", $pwd)) {
        $errors[] = "پسورد باید شامل حروف بزرگ و کوچک باشد.";
    }

    return ($errors == $errors_init);
}

function login($email, $password)
{

    if (!user_exists($email)) {
        return -1;
    }

    $user_info = get_user_info($email);
    if (password_verify($password, $user_info['password'])) {
        $_SESSION['login'] = $email;
        header("Location: index.php");
        return true;
    }
    return -1;
}

function logout()
{
    $_SESSION['login'] = '';
    unset($_SESSION['login']);
}

function user_logged_in()
{
    if (empty($_SESSION['login'])) {
        return false;
    }
    return true;
}
