<?php
header('Content-Type: application/json');
include 'db.php';

$product_id = $_GET['product_id'];

$sql = "SELECT reviews.review_text, reviews.created_at FROM reviews WHERE reviews.product_id = ?";
$stmt = $connection->prepare($sql);
$stmt->bind_param("i", $product_id);
$stmt->execute();
$result = $stmt->get_result();

$reviews = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $reviews[] = $row;
    }
}

echo json_encode($reviews);
$stmt->close();
?>
