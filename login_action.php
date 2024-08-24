<?php
session_start();
include 'db.php';

$username = $_POST['username'];
$password = $_POST['password'];

// حماية من SQL Injection
$username = $connection->real_escape_string($username);
$password = $connection->real_escape_string($password);

$sql = "SELECT * FROM users WHERE username = ? AND password = ?";
$stmt = $connection->prepare($sql);
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $_SESSION['user_id'] = $user['id'];
    header('Location: index.html');
} else {
    echo "اسم المستخدم أو كلمة المرور غير صحيحة.";
}

$stmt->close();
?>
