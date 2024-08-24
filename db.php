<?php
include 'config.php';

$connection = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

// التحقق من الاتصال
if ($connection->connect_error) {
    die("فشل الاتصال بقاعدة البيانات: " . $connection->connect_error);
}
?>
