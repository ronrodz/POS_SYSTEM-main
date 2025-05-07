<?php
session_start();
include 'db.php';

if (isset($_GET['cashier_id'])) {
    $cashierId = $_GET['cashier_id'];

    $conn->prepare("DELETE FROM addcashiermember WHERE Cashier_Id = ?")->execute([$cashierId]);
    $conn->prepare("DELETE FROM cashier WHERE Cashier_Id = ?")->execute([$cashierId]);

    $_SESSION['success_message'] = "Cashier deleted successfully.";
    header("Location: ../admin/admin.php");
    exit;
}
?>
