<?php
// Start session and connect to database
session_start();
include '../include/db.php';

// Today's date in Y-m-d format
$today = date('Y-m-d');

try {
    // Create PDO connection
    $pdo = new PDO("mysql:host=localhost;dbname=pos_db", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare and execute the JOIN query
    $stmt = $pdo->prepare("
        SELECT acm.AddCashierMember_Id, acm.FullName, acm.CreatedAt, 
               c.Cashier_Username
        FROM addcashiermember acm
        INNER JOIN cashier c ON acm.Cashier_Id = c.Cashier_Id
    ");
    $stmt->execute();

    // Fetch all rows
    $cashierMembers = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Database error: " . $e->getMessage());
}

// Pagination setup
$limit = 10;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Count total records
$totalStmt = $conn->query("SELECT COUNT(*) FROM product");
$totalRows = $totalStmt->fetchColumn();
$totalPages = ceil($totalRows / $limit);

// Fetch paginated data
$stmt = $conn->prepare("SELECT Product_Id, ItemName, Category, UnitPrice, Supplier, ExpirationDate FROM product LIMIT :limit OFFSET :offset");
$stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
$stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Total sales for today
$salesStmt = $conn->prepare("SELECT SUM(OrderHistory_TotalAmount) FROM orderhistory WHERE DATE(OrderDate) = ?");
$salesStmt->execute([$today]);
$todaysSales = $salesStmt->fetchColumn();
$todaysSales = $todaysSales ? $todaysSales : 0;

// Total number of orders
$orderCountStmt = $conn->query("SELECT COUNT(*) FROM orderhistory");
$totalOrders = $orderCountStmt->fetchColumn();

// Low stock item count (Product_Quantity < 5)
$lowStockStmt = $conn->query("SELECT COUNT(*) FROM product WHERE Product_Quantity < 5");
$lowStockCount = $lowStockStmt->fetchColumn();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FEUR Canteen - Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <div class="d-flex">
        <div class="main-content p-4 w-100">
        <nav class="sidebar bg-success text-white p-3">
            <h2 class="mb-4">
                <img src="admin.png" alt="FEUR Logo" class="logo">
            </h2>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="#" class="nav-link text-white active" data-section="menu-management-section">
                        <i class="fas fa-utensils me-2"></i>Menu Management
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-white" data-section="cashier-management-section">
                        <i class="fas fa-users me-2"></i>Add Cashier
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-white" data-section="inventory-section">
                        <i class="fas fa-box-open me-2"></i>Inventory
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-white" data-section="orders-section">
                        <i class="fas fa-shopping-cart me-2"></i>Order History
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-white" data-section="reports-section">
                        <i class="fas fa-chart-line me-2"></i>Sales Reports
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link text-white dropdown-toggle" id="settings-dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-cog me-2"></i>System Settings
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark bg-success" aria-labelledby="settings-dropdown">
                        <li>
                            <a class="dropdown-item text-white" href="#admin-credentials" data-section="admin-credentials-section">
                                <i class="fas fa-user-shield me-2"></i>Admin Credentials
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item text-white" href="../login/login.php" id="logout-btn">
                                <i class="fas fa-sign-out-alt me-2"></i>Logout
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
            <div id="dashboard-section">
                <h1 class="display-4 text-success mb-4" >Admin Dashboard</h1>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card text-white bg-success mb-3">
                            <div class="card-header">Today's Sales</div>
                            <div class="card-body">
                                <h5 class="card-title">₱<?= number_format($todaysSales, 2) ?></h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-white bg-success mb-3">
                            <div class="card-header">Total Orders</div>
                            <div class="card-body">
                                <h5 class="card-title"><?= $totalOrders ?> Orders</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-white bg-success mb-3">
                            <div class="card-header">Low Stock Items</div>
                            <div class="card-body">
                                <h5 class="card-title"><?= $lowStockCount ?> Items</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Menu Management -->
            <div id="menu-management-section" class="mt-4 section-content active">
                <h2 class="text-success mb-3">Menu Management</h2>
                <?php if (isset($_GET['success'])): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert" id="statusAlert">
                        Product updated successfully.
                    </div>
                <?php elseif (isset($_GET['deleted'])): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert" id="statusAlert">
                        Product deleted successfully.
                    </div>
		        <?php elseif (isset($_GET['cashier_added'])): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert" id="statusAlert">
                        New cashier added successfully!
                    </div>
                <?php elseif (isset($_GET['added'])): ?>
                    <div class="alert alert-info alert-dismissible fade show" role="alert" id="statusAlert">
                        New product added successfully.
                    </div>
                <?php endif; ?>
                <div class="row">
                    <div class="col-md-12">
                        <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addMenuItemModal">
                            <i class="fas fa-plus me-2"></i>Add New Menu Item
                        </button>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Product ID</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($products as $product): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($product['Product_Id']) ?></td>
                                        <td><?= htmlspecialchars($product['ItemName']) ?></td>
                                        <td><?= htmlspecialchars($product['Category']) ?></td>
                                        <td>₱<?= number_format($product['UnitPrice'], 2) ?></td>
                                        <td>
                                            <button class="btn btn-sm btn-primary me-1" data-bs-toggle="modal" data-bs-target="#editModal<?= $product['Product_Id'] ?>">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <a href="../include/delete_product.php?id=<?= $product['Product_Id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this product?');">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <!-- Edit Modal -->
                                    <div class="modal fade" id="editModal<?= $product['Product_Id'] ?>" tabindex="-1" aria-labelledby="editModalLabel<?= $product['Product_Id'] ?>" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <form method="POST" action="../include/edit_product.php">
                                                <input type="hidden" name="Product_Id" value="<?= $product['Product_Id'] ?>">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-success text-white">
                                                        <h5 class="modal-title" id="editModalLabel<?= $product['Product_Id'] ?>">Edit Product</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label class="form-label">Item Name</label>
                                                            <input type="text" name="ItemName" class="form-control" value="<?= htmlspecialchars($product['ItemName']) ?>" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Category</label>
                                                            <input type="text" name="Category" class="form-control" value="<?= htmlspecialchars($product['Category']) ?>" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Unit Price</label>
                                                            <input type="number" step="0.01" name="UnitPrice" class="form-control" value="<?= htmlspecialchars($product['UnitPrice']) ?>" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Supplier</label>
                                                            <input type="text" name="Supplier" class="form-control" value="<?= htmlspecialchars($product['Supplier']) ?>" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Expiration Date</label>
                                                            <input type="date" name="ExpirationDate" class="form-control" value="<?= htmlspecialchars($product['ExpirationDate']) ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-success">Save Changes</button>
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                <?php endforeach; ?>
                            </tbody>
                        </table>

                        <!-- Add New Menu Item Modal -->
                        <div class="modal fade" id="addMenuItemModal" tabindex="-1" aria-labelledby="addMenuItemLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <form method="POST" action="../include/edit_product.php">
                                    <div class="modal-content">
                                        <div class="modal-header bg-success text-white">
                                            <h5 class="modal-title" id="addMenuItemLabel">Add New Menu Item</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label class="form-label">Item Name</label>
                                                <input type="text" name="ItemName" class="form-control" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Category</label>
                                                <input type="text" name="Category" class="form-control" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Unit Price</label>
                                                <input type="number" step="0.01" name="UnitPrice" class="form-control" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Supplier</label>
                                                <input type="text" name="Supplier" class="form-control" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Expiration Date</label>
                                                <input type="date" name="ExpirationDate" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" name="add" class="btn btn-success">Add Item</button>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>


                        <!-- Pagination -->
                        <nav>
                            <ul class="pagination">
                                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                                    <li class="page-item <?= $i === $page ? 'active' : '' ?>">
                                        <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                                    </li>
                                <?php endfor; ?>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>

            <!-- Cashier Management Section -->
            <div id="cashier-management-section" class="mt-4 section-content">
                <div class="row">
                    <div class="col-md-12">
                    <h2 class="text-success mb-3">Cashier Management</h2>

                    <div class="row">
                        <div class="col-md-12">
                            <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addCashierModal">
                                <i class="fas fa-user-plus me-2"></i>Add New Cashier
                            </button>

                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Cashier ID</th>
                                        <th>Full Name</th>
                                        <th>Username</th>
                                        <th>Created At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($cashierMembers as $member): ?>
                                        <tr>
                                            <td><?= htmlspecialchars($member['AddCashierMember_Id']) ?></td>
                                            <td><?= htmlspecialchars($member['FullName']) ?></td>
                                            <td><?= htmlspecialchars($member['Cashier_Username']) ?></td>
                                            <td><?= htmlspecialchars($member['CreatedAt']) ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    </div>

                    <!-- Add Cashier Modal -->
                    <div class="modal fade" id="addCashierModal" tabindex="-1" aria-labelledby="addCashierModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form method="POST" action="../include/add_cashier.php">
                        <div class="modal-content">
                            <div class="modal-header bg-success text-white">
                            <h5 class="modal-title" id="addCashierModalLabel">Add New Cashier</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Full Name</label>
                                <input type="text" name="FullName" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Cashier Username</label>
                                <input type="text" name="Cashier_Username" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Cashier Password</label>
                                <input type="password" name="Cashier_Password" class="form-control" required>
                            </div>
                            </div>
                            <div class="modal-footer">
                            <button type="submit" name="add_cashier" class="btn btn-success">Add Cashier</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                        </form>
                    </div>
                    </div>

                </div>
            </div>

             <!-- Inventory Section -->
            <div id="inventory-section" class="mt-4 section-content">
                <h2 class="text-success mb-3">Inventory</h2>
                <!-- Inventory Content -->
            </div>

            <!-- Orders Section -->
            <div id="orders-section" class="mt-4 section-content">
                <h2 class="text-success mb-3">Order History</h2>
                <!-- Orders Content -->
            </div>

            <!-- Reports Section -->
            <div id="reports-section" class="mt-4 section-content">
                <h2 class="text-success mb-3">Sales Reports</h2>
                <!-- Reports Content -->
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="admin.js"></script>
<script>
    setTimeout(() => {
        const alert = document.getElementById('statusAlert');
        if (alert) {
            alert.classList.remove('show');
            alert.classList.add('fade');
            setTimeout(() => alert.remove(), 500); // Fully remove after fade
        }
    }, 3000); // 3 seconds

    $(document).ready(function() {
        // Hide all sections by default
        $(".section-content").hide();

        // Show the active section (Menu Management by default)
        $("#menu-management-section").show();

        // Handle navigation click
        $(".nav-link").click(function() {
            // Remove 'active' class from all links and add it to the clicked link
            $(".nav-link").removeClass("active");
            $(this).addClass("active");

            // Hide all sections
            $(".section-content").hide();

            // Show the section corresponding to the clicked link
            var sectionId = $(this).data("section");
            $("#" + sectionId).show();
        });
    });
</script>
</body>
</html>
