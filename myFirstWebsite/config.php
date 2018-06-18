<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$db     = 'myfirstwebsite';
$conn   = mysqli_connect( $dbhost, $dbuser, $dbpass, $db );

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8");

include 'lib/auth.php';
