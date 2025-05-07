<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_cashier'])) {
    $cashierId = $_POST['Cashier_Id'];
    $fullname = $_POST['FullName'];
    $username = $_POST['Cashier_Username'];

    // Optional: Check for unique username (excluding current cashier)
    $stmt = $conn->prepare("SELECT COUNT(*) FROM cashier WHERE Cashier_Username = ? AND Cashier_Id != ?");
    $stmt->execute([$username, $cashierId]);
    if ($stmt->fetchColumn() > 0) {
        $_SESSION['error_message'] = "Username already exists.";
        header("Location: ../admin/admin.php");
        exit;
    }

    // Update both tables
    $conn->prepare("UPDATE addcashiermember SET FullName = ? WHERE Cashier_Id = ?")
         ->execute([$fullname, $cashierId]);

    $conn->prepare("UPDATE cashier SET Cashier_Username = ? WHERE Cashier_Id = ?")
         ->execute([$username, $cashierId]);

    $_SESSION['success_message'] = "Cashier updated successfully.";
    header("Location: ../admin/admin.php");
    exit;
}
?>
