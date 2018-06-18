<?php
define('ROLEADMIN', 'admin');
define('ROLEAUTHOR', 'author');
define('ROLESUBSCRIBER', 'subscriber');

function userRegester($email, $password, $displayName, $role = ROLESUBSCRIBER)
{
    global $conn;
    $hashpassword = password_hash($password,PASSWORD_BCRYPT);
    $sql = "INSERT INTO `users`(`email`, `password`, `display_name`, `role`) 
                        VALUES ('$email','$hashpassword','$displayName','$role'); ";

    $result = mysqli_query($conn,$sql);
    var_dump($result);
}