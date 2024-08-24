<?php
header('Content-Type: application/json');
include 'db.php';

$query = $_GET['q'];

$sql = "SELECT * FROM products WHERE name LIKE ?";
$stmt = $connection->prepare($sql);
$search_query = "%" . $query . "%";
$stmt->bind_param("s", $search_query);
$stmt->execute();
$result = $stmt->get_result();

$products = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
}

echo json_encode($products);
$stmt->close();
?>
