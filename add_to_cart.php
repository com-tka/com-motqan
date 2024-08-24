<?php
session_start();
include 'db.php';

if (isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];
    
    if (!isset($_SESSION['user_id'])) {
        echo "يرجى تسجيل الدخول أولاً.";
        exit();
    }

    $user_id = $_SESSION['user_id'];
    $sql = "INSERT INTO cart (user_id, product_id) VALUES (?, ?)";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("ii", $user_id, $product_id);
    
    if ($stmt->execute()) {
        echo "تم إضافة المنتج إلى عربة التسوق.";
    } else {
        echo "حدث خطأ أثناء إضافة المنتج.";
    }
    
    $stmt->close();
}
?>
