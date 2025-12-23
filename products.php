<?php
require_once 'includes/functions.php';
$company = getCompanyInfo();

$page_title = 'Products';
$page_description = 'Explore our precision machined products and components for various industries.';

// Get categories for filter
$categories = $db->query("SELECT * FROM categories WHERE status = 'active' ORDER BY name")->fetchAll();

// Get current category filter
$current_category = $_GET['category'] ?? '';

// Build query based on filters
$query = "SELECT p.*, c.name as category_name FROM products p 
          LEFT JOIN categories c ON p.category_id = c.id 
          WHERE p.status = 'active'";
$params = [];

if ($current_category) {
    $query .= " AND c.slug = ?";
    $params[] = $current_category;
}

$query .= " ORDER BY p.created_at DESC";

$products = $db->query($query, $params)->fetchAll();

include 'includes/header.php';
?>

<!-- Breadcrumb -->
<section class="breadcrumb-section">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Products</li>
            </ol>
        </nav>
        <h1 class="mb-0">Our Products</h1>
    </div>
</section>

<!-- Products Section -->
<section class="section-padding">
    <div class="container">
        <!-- Filter Section -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="d-flex flex-wrap align-items-center justify-content-between">
                    <h3 class="mb-3 mb-md-0">Product Categories</h3>
                    <div class="product-filters">
                        <a href="products.php" class="btn <?php echo empty($current_category) ? 'btn-primary' : 'btn-outline-primary'; ?> me-2 mb-2">
                            All Products
                        </a>
                        <?php foreach($categories as $category): ?>
                            <a href="products.php?category=<?php echo $category['slug']; ?>" 
                               class="btn <?php echo $current_category === $category['slug'] ? 'btn-primary' : 'btn-outline-primary'; ?> me-2 mb-2">
                                <?php echo htmlspecialchars($category['name']); ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Products Grid -->
        <?php if (empty($products)): ?>
            <div class="text-center py-5">
                <i class="fas fa-boxes text-muted mb-3" style="font-size: 4rem;"></i>
                <h3 class="text-muted">No Products Found</h3>
                <p class="text-muted">
                    <?php if ($current_category): ?>
                        No products found in this category. 
                        <a href="products.php" class="text-decoration-none">View all products</a>
                    <?php else: ?>
                        We're updating our product catalog. Please check back soon.
                    <?php endif; ?>
                </p>
            </div>
        <?php else: ?>
            <div class="row">
                <?php foreach($products as $index => $product): ?>
                    <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="<?php echo ($index % 6) * 100; ?>">
                        <div class="product-card h-100">
                            <?php if($product['image']): ?>
                                <img src="assets/uploads/<?php echo $product['image']; ?>" 
                                     alt="<?php echo htmlspecialchars($product['name']); ?>" 
                                     class="product-image">
                            <?php else: ?>
                                <img src="https://images.unsplash.com/photo-1581092335878-52d8db6fe16a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=500&q=80" 
                                     alt="<?php echo htmlspecialchars($product['name']); ?>" 
                                     class="product-image">
                            <?php endif; ?>
                            
                            <div class="card-body d-flex flex-column">
                                <div class="mb-2">
                                    <span class="badge bg-primary mb-2">
                                        <i class="fas fa-tag me-1"></i>
                                        <?php echo $product['category_name'] ?? 'General'; ?>
                                    </span>
                                </div>
                                
                                <h5 class="card-title"><?php echo htmlspecialchars($product['name']); ?></h5>
                                
                                <p class="card-text flex-grow-1">
                                    <?php 
                                    $description = strip_tags($product['description']);
                                    echo strlen($description) > 120 ? substr($description, 0, 120) . '...' : $description; 
                                    ?>
                                </p>
                                
                                <div class="mt-auto">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <a href="product-details.php?id=<?php echo $product['id']; ?>" class="btn btn-primary">
                                            <i class="fas fa-eye me-2"></i>
                                            View Details
                                        </a>
                                        <button class="btn btn-outline-secondary" onclick="addToFavorites(<?php echo $product['id']; ?>)" 
                                                title="Add to Favorites">
                                            <i class="fas fa-heart"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Pagination (if needed) -->
            <?php if (count($products) > 12): ?>
                <nav aria-label="Products pagination" class="mt-5">
                    <ul class="pagination justify-content-center">
                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                </nav>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</section>

<!-- CTA Section -->
<section class="section-padding bg-light">
    <div class="container text-center" data-aos="fade-up">
        <h2 class="mb-3">Need Custom Manufacturing?</h2>
        <p class="lead mb-4">
            Can't find what you're looking for? We specialize in custom precision machining 
            to meet your exact specifications and requirements.
        </p>
        <div class="d-flex justify-content-center gap-3 flex-wrap">
            <a href="contact.php" class="btn btn-primary btn-lg">
                <i class="fas fa-cogs me-2"></i>
                Request Custom Quote
            </a>
            <a href="services.php" class="btn btn-outline-primary btn-lg">
                <i class="fas fa-wrench me-2"></i>
                View Services
            </a>
        </div>
    </div>
</section>

<script>
function addToFavorites(productId) {
    // Add to favorites functionality (can be implemented later)
    showAlert('info', 'Feature coming soon! Product added to your wishlist.');
}
</script>

<?php include 'includes/footer.php'; ?>