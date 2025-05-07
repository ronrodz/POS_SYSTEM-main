<?php
session_start();
include '../include/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $role = $_POST['role'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the role is 'admin' or 'cashier' and build the query accordingly
    if ($role === 'admin') {
        $query = "SELECT * FROM admin WHERE Admin_Username = :username";
    } else {
        $query = "SELECT * FROM cashier WHERE Cashier_Username = :username";
    }

    // PDO prepared statement with bindParam() for safe input handling
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // Debugging: Print out the row to verify the result
    // var_dump($row);

    if ($row) {
        // Determine the column name based on role
        $hashedPassword = $role === 'admin' ? $row['Admin_Password'] : $row['Cashier_Password'];

        // Trim both user input and stored hashed password for comparison
        $password = trim($password);
        $hashedPassword = trim($hashedPassword);

        // Debugging: Print out the password and hashed password for comparison
        // var_dump($password);
        // var_dump($hashedPassword);

        // Check if the entered password matches the hashed password stored in the database
        if (password_verify($password, $hashedPassword)) {
            // Successful login
            if ($role === 'admin') {
                header("Location: ../admin/admin.html");
            } else {
                header("Location: ../cashier/cashier.html");
            }
            exit;
        } else {
            $error = "Invalid password.";  // If password does not match
        }
    } else {
        $error = "User not found.";  // If user is not found
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FEUR CANTEEN - Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 left-panel">
                <div class="logo-container text-center">
                    <img id="logo" src="admin.png" alt="FEU Roosevelt Logo" class="feur-logo">
                    <h1 class="system-name">FEUR CANTEEN</h1>
                </div>
            </div>
            <div class="col-md-6 right-panel">
                <div class="login-container">
                    <h2 class="text-center mb-4">Welcome!</h2>

                    <?php if (!empty($error)): ?>
                        <div class="alert alert-danger"><?php echo $error; ?></div>
                    <?php endif; ?>

                    <div class="login-type-selector mb-4">
                        <div class="btn-group w-100" role="group">
                            <button type="button" class="btn login-type-btn active" id="admin-btn">Admin</button>
                            <button type="button" class="btn login-type-btn" id="cashier-btn">Cashier</button>
                        </div>
                    </div>

                    <form method="POST" action="login.php" id="login-form">
                        <input type="hidden" name="role" id="login-role" value="admin">

                        <div class="form-group mb-3">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control" id="username" placeholder="Enter username" required>
                        </div>

                        <div class="form-group mb-4">
                            <label for="password">Password</label>
                            <div class="input-group">
                                <input type="password" name="password" class="form-control" id="password" placeholder="Enter password" required>
                                <button class="btn btn-outline-secondary" type="button" id="toggle-password">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </div>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn login-btn">Login</button>
                        </div>
                    </form>

                    <div class="login-footer text-center mt-5">
                        <p>&copy; 2025 FEU Roosevelt Canteen Management System</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
        const logo = document.getElementById('logo');
        const adminBtn = document.getElementById('admin-btn');
        const cashierBtn = document.getElementById('cashier-btn');
        const roleInput = document.getElementById('login-role');
        const passwordInput = document.getElementById('password');
        const togglePassword = document.getElementById('toggle-password');

        let currentLoginType = 'admin';

        adminBtn.addEventListener('click', () => setLoginType('admin'));
        cashierBtn.addEventListener('click', () => setLoginType('cashier'));

        function setLoginType(type) {
            currentLoginType = type;
            roleInput.value = type;

            adminBtn.classList.toggle('active', type === 'admin');
            cashierBtn.classList.toggle('active', type === 'cashier');

            logo.src = type === 'admin' ? 'admin.png' : 'cashier.png';
            logo.style.width = '500px';
        }

        togglePassword.addEventListener('click', () => {
            const isPassword = passwordInput.type === 'password';
            passwordInput.type = isPassword ? 'text' : 'password';
            const icon = togglePassword.querySelector('i');
            icon.className = isPassword ? 'bi bi-eye-slash' : 'bi bi-eye';
        });
    });
    </script>
</body>
</html>
