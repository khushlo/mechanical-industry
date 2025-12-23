<?php
require_once '../includes/functions.php';
requireAdmin();

$company = getCompanyInfo();

// Get dashboard statistics
$stats = [
    'products' => $db->query("SELECT COUNT(*) as count FROM products WHERE status = 'active'")->fetch()['count'],
    'categories' => $db->query("SELECT COUNT(*) as count FROM categories WHERE status = 'active'")->fetch()['count'],
    'services' => $db->query("SELECT COUNT(*) as count FROM services WHERE status = 'active'")->fetch()['count'],
    'industries' => $db->query("SELECT COUNT(*) as count FROM industries WHERE status = 'active'")->fetch()['count']
];

// Recent products
$recent_products = $db->query("SELECT p.*, c.name as category_name FROM products p 
    LEFT JOIN categories c ON p.category_id = c.id 
    ORDER BY p.created_at DESC LIMIT 5")->fetchAll();

$page_title = 'Dashboard';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?> - Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <?php include 'includes/sidebar.php'; ?>

        <!-- Main Content -->
        <main class="main-content">
            <!-- Header -->
            <?php include 'includes/header.php'; ?>

            <!-- Content -->
            <div class="content">
                <div class="container-fluid">
                    <!-- Welcome Section -->
                    <div class="row mb-4">
                        <div class="col-12">
                            <div class="welcome-card">
                                <div class="d-flex align-items-center">
                                    <div class="welcome-icon">
                                        <i class="fas fa-tachometer-alt"></i>
                                    </div>
                                    <div>
                                        <h2 class="mb-1">Welcome back, <?php echo $_SESSION['admin_username']; ?>!</h2>
                                        <p class="text-muted mb-0">Here's what's happening with your website today.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Statistics Cards -->
                    <div class="row mb-4">
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="stat-card">
                                <div class="stat-icon bg-primary">
                                    <i class="fas fa-boxes"></i>
                                </div>
                                <div class="stat-details">
                                    <h3 class="stat-number"><?php echo $stats['products']; ?></h3>
                                    <p class="stat-label">Active Products</p>
                                </div>
                                <a href="products.php" class="stat-link">View Products <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="stat-card">
                                <div class="stat-icon bg-success">
                                    <i class="fas fa-tags"></i>
                                </div>
                                <div class="stat-details">
                                    <h3 class="stat-number"><?php echo $stats['categories']; ?></h3>
                                    <p class="stat-label">Categories</p>
                                </div>
                                <a href="categories.php" class="stat-link">Manage Categories <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="stat-card">
                                <div class="stat-icon bg-info">
                                    <i class="fas fa-cogs"></i>
                                </div>
                                <div class="stat-details">
                                    <h3 class="stat-number"><?php echo $stats['services']; ?></h3>
                                    <p class="stat-label">Services</p>
                                </div>
                                <a href="services.php" class="stat-link">Manage Services <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="stat-card">
                                <div class="stat-icon bg-warning">
                                    <i class="fas fa-industry"></i>
                                </div>
                                <div class="stat-details">
                                    <h3 class="stat-number"><?php echo $stats['industries']; ?></h3>
                                    <p class="stat-label">Industries</p>
                                </div>
                                <a href="industries.php" class="stat-link">Manage Industries <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="row mb-4">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0"><i class="fas fa-bolt me-2"></i>Quick Actions</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-6 mb-3">
                                            <a href="products.php?action=add" class="btn btn-primary w-100">
                                                <i class="fas fa-plus me-2"></i>Add Product
                                            </a>
                                        </div>
                                        <div class="col-lg-3 col-md-6 mb-3">
                                            <a href="categories.php?action=add" class="btn btn-success w-100">
                                                <i class="fas fa-tags me-2"></i>Add Category
                                            </a>
                                        </div>
                                        <div class="col-lg-3 col-md-6 mb-3">
                                            <a href="gallery.php?action=add" class="btn btn-info w-100">
                                                <i class="fas fa-images me-2"></i>Upload Images
                                            </a>
                                        </div>
                                        <div class="col-lg-3 col-md-6 mb-3">
                                            <a href="settings.php" class="btn btn-warning w-100">
                                                <i class="fas fa-cog me-2"></i>Settings
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Products -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0"><i class="fas fa-clock me-2"></i>Recent Products</h5>
                                    <a href="products.php" class="btn btn-sm btn-outline-primary">View All</a>
                                </div>
                                <div class="card-body">
                                    <?php if (empty($recent_products)): ?>
                                        <div class="text-center py-4">
                                            <i class="fas fa-boxes text-muted mb-3" style="font-size: 3rem;"></i>
                                            <h5 class="text-muted">No Products Yet</h5>
                                            <p class="text-muted">Start by adding your first product.</p>
                                            <a href="products.php?action=add" class="btn btn-primary">
                                                <i class="fas fa-plus me-2"></i>Add Product
                                            </a>
                                        </div>
                                    <?php else: ?>
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Image</th>
                                                        <th>Product Name</th>
                                                        <th>Category</th>
                                                        <th>Status</th>
                                                        <th>Created</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($recent_products as $product): ?>
                                                        <tr>
                                                            <td>
                                                                <?php if ($product['image']): ?>
                                                                    <img src="../assets/uploads/<?php echo $product['image']; ?>" 
                                                                         alt="<?php echo htmlspecialchars($product['name']); ?>" 
                                                                         class="img-thumbnail" style="width: 50px; height: 50px; object-fit: cover;">
                                                                <?php else: ?>
                                                                    <div class="bg-light d-flex align-items-center justify-content-center" 
                                                                         style="width: 50px; height: 50px;">
                                                                        <i class="fas fa-image text-muted"></i>
                                                                    </div>
                                                                <?php endif; ?>
                                                            </td>
                                                            <td>
                                                                <strong><?php echo htmlspecialchars($product['name']); ?></strong>
                                                            </td>
                                                            <td>
                                                                <span class="badge bg-secondary">
                                                                    <?php echo $product['category_name'] ?? 'Uncategorized'; ?>
                                                                </span>
                                                            </td>
                                                            <td>
                                                                <span class="badge <?php echo $product['status'] === 'active' ? 'bg-success' : 'bg-warning'; ?>">
                                                                    <?php echo ucfirst($product['status']); ?>
                                                                </span>
                                                            </td>
                                                            <td><?php echo date('M d, Y', strtotime($product['created_at'])); ?></td>
                                                            <td>
                                                                <a href="products.php?action=edit&id=<?php echo $product['id']; ?>" 
                                                                   class="btn btn-sm btn-outline-primary">
                                                                    <i class="fas fa-edit"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/admin.js"></script>
</body>
</html>