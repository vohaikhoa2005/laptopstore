<?php
require_once dirname(__DIR__, 2) . '/config/app.php';
require_once dirname(__DIR__, 2) . '/config/database.php'; // $conn is PDO

$id = $_GET['id'] ?? '';
if ($id) {
    $conn->prepare('DELETE FROM product_images WHERE product_id = :product_id')->execute([':product_id' => $id]);
    $stmt = $conn->prepare('DELETE FROM products WHERE id = :id');
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
}
header('Location: index.php');
exit;
