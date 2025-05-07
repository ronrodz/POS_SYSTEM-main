<?php
session_start();
include '../include/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add'])) {
    // Handle adding new product
    $name = $_POST['ItemName'];
    $category = $_POST['Category'];
    $price = $_POST['UnitPrice'];
    $supplier = $_POST['Supplier'];
    $expiration = $_POST['ExpirationDate'];

    $stmt = $conn->prepare("INSERT INTO product (ItemName, Category, UnitPrice, Supplier, ExpirationDate) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$name, $category, $price, $supplier, $expiration]);

    header("Location: ../admin/admin.php?added=1");
    exit;
}

echo "Invalid request.";
