<?php
session_start();

// Include the database connection file
include '../include/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Debugging: Print all POST data
    echo '<pre>';
    print_r($_POST); // Check what data is being sent
    echo '</pre>';

    if (isset($_POST['add_cashier'])) {  // Update this to match the button name
        echo "Form is being submitted!";  // For debugging

        // Handle adding new cashier
        $fullname = $_POST['FullName'];
        $username = $_POST['Cashier_Username'];
        $password = $_POST['Cashier_Password']; // Capture the cashier password
        $createdAt = date('Y-m-d H:i:s'); // Current timestamp for CreatedAt

        // Prepare to insert into the cashier table
        $stmt1 = $conn->prepare("INSERT INTO cashier (Cashier_Username, Cashier_Password) VALUES (?, ?)");
        $stmt1->execute([$username, password_hash($password, PASSWORD_DEFAULT)]); // Hash password before inserting

        // Get the generated Cashier_Id
        $cashierId = $conn->lastInsertId();

        // Prepare to insert into addcashiermember table
        $stmt2 = $conn->prepare("INSERT INTO addcashiermember (FullName, CreatedAt, Cashier_Id) VALUES (?, ?, ?)");
        $stmt2->execute([$fullname, $createdAt, $cashierId]);

        // Redirect back to the admin page with a success message
        header("Location: ../admin/admin.php?cashier_added=1");
        exit;
    } else {
        echo "Add button not set!"; // For debugging
    }
} else {
    echo "Invalid request."; // For debugging
}
?>
