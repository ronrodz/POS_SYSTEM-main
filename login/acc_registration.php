<?php
include '../include/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $role = $_POST['role']; // 'admin' or 'cashier'
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($role) || empty($username) || empty($password)) {
        echo "All fields are required.";
        exit;
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    try {
        if ($role == 'admin') {
            $sql = "INSERT INTO admin (Admin_Username, Admin_Password) VALUES (?, ?)";
        } elseif ($role == 'cashier') {
            $sql = "INSERT INTO cashier (Cashier_Username, Cashier_Password) VALUES (?, ?)";
        } else {
            echo "Invalid role selected.";
            exit;
        }

        $stmt = $conn->prepare($sql);
        $stmt->execute([$username, $hashedPassword]);

        echo "Account registered successfully for $role.";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<!-- HTML Form -->
<form method="POST" action="acc_registration.php">
    <label for="role">Register As:</label>
    <select name="role" required>
        <option value="">-- Select Role --</option>
        <option value="admin">Admin</option>
        <option value="cashier">Cashier</option>
    </select>
    <br><br>

    <label>Username:</label>
    <input type="text" name="username" required>
    <br><br>

    <label>Password:</label>
    <input type="password" name="password" required>
    <br><br>

    <button type="submit">Register</button>
</form>
