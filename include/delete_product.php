<?php
// delete_product.php
session_start();
include '../include/db.php';

$id = $_GET['id'] ?? null;

if ($id) {
    $stmt = $conn->prepare("DELETE FROM product WHERE Product_Id = ?");
    $stmt->execute([$id]);
    header("Location: ../admin/admin.php?deleted=1");
    exit;
} else {
    echo "Invalid product ID.";
}
