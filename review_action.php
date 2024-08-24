<?php
session_start();
include 'db.php';

if (isset($_POST['product_id']) && isset($_POST['review_text'])) {
    $product_id = $_POST['product_id'];
    $review_text = $_POST['review_text'];
    
    if (!isset($_SESSION['user_id'])) {
        echo "يرجى تسجيل الدخول أولاً.";
        exit();
    }

    $user_id = $_SESSION['user_id'];
    $sql = "INSERT INTO reviews (user_id, product_id, review_text) VALUES (?, ?, ?)";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("iis", $user_id, $product_id, $review_text);
    
    if ($stmt->execute()) {
        echo "تم إضافة المراجعة.";
    } else {
        echo "حدث خطأ أثناء إضافة المراجعة.";
    }
    
    $stmt->close();
}
?>
