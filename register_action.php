<?php
include 'db.php';

$username = $_POST['username'];
$password = $_POST['password'];

// حماية من SQL Injection
$username = $connection->real_escape_string($username);
$password = $connection->real_escape_string($password);

// تشفير كلمة المرور
$password_hashed = password_hash($password, PASSWORD_BCRYPT);

$sql = "INSERT INTO users (username, password) VALUES (?, ?)";
$stmt = $connection->prepare($sql);
$stmt->bind_param("ss", $username, $password_hashed);

if ($stmt->execute()) {
    echo "تم التسجيل بنجاح.";
    header('Location: login.php');
} else {
    echo "حدث خطأ أثناء التسجيل.";
}

$stmt->close();
?>
