<?php
session_start();
include '../include/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Common fields
    $name = $_POST['ItemName'] ?? '';
    $category = $_POST['Category'] ?? '';
    $price = $_POST['UnitPrice'] ?? 0;
    $supplier = $_POST['Supplier'] ?? '';
    $expiration = $_POST['ExpirationDate'] ?? null;

    if (isset($_POST['add'])) {
        // Add new product
        $stmt = $conn->prepare("INSERT INTO product (ItemName, Category, UnitPrice, Supplier, ExpirationDate) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$name, $category, $price, $supplier, $expiration]);

        header("Location: ../admin/admin.php?added=1");
        exit;
    } elseif (isset($_POST['Product_Id'])) {
        // Edit existing product
        $id = $_POST['Product_Id'];

        $stmt = $conn->prepare("UPDATE product SET ItemName = ?, Category = ?, UnitPrice = ?, Supplier = ?, ExpirationDate = ? WHERE Product_Id = ?");
        $stmt->execute([$name, $category, $price, $supplier, $expiration, $id]);

        header("Location: ../admin/admin.php?success=1");
        exit;
    }
}

echo "Invalid request.";
