<?php
require_once 'includes/functions.php';
$company = getCompanyInfo();

$page_title = 'Home';
$page_description = 'Leading precision machining services provider with expertise in CNC machining, quality testing, and product development.';

// Get featured services
$services = $db->query("SELECT * FROM services WHERE status = 'active' ORDER BY id LIMIT 4")->fetchAll();

// Get featured products
$featured_products = $db->query("
    SELECT p.*, c.name as category_name 
    FROM products p 
    LEFT JOIN categories c ON p.category_id = c.id 
    WHERE p.status = 'active' 
    ORDER BY p.created_at DESC 
    LIMIT 6
")->fetchAll();

// Get industries
$industries = $db->query("SELECT * FROM industries WHERE status = 'active' ORDER BY name")->fetchAll();

include 'includes/header.php';
?>

<!-- Hero Section -->
<section class="hero-section">
    <!-- Animated Background -->
    <div class="hero-bg-animation">
        <div class="geometric-shape shape-1"></div>
        <div class="geometric-shape shape-2"></div>
        <div class="geometric-shape shape-3"></div>
        <div class="geometric-shape shape-4"></div>
        <div class="wave-animation"></div>
    </div>
    <div class="container position-relative">
        <div class="row align-items-center">
            <div class="col-lg-8" data-aos="fade-right">
                <div class="hero-content">
                    <h1 class="hero-title"><?php echo $company['tagline']; ?></h1>
                    <p class="hero-subtitle">
                        We specialize in precision CNC machining, delivering high-quality components 
                        for diverse industries with cutting-edge technology and exceptional craftsmanship.
                    </p>
                    <div class="hero-buttons mt-4">
                        <a href="products.php" class="btn btn-primary btn-lg me-3">
                            <i class="fas fa-boxes me-2"></i>
                            View Products
                        </a>
                        <a href="contact.php" class="btn btn-outline-primary btn-lg">
                            <i class="fas fa-phone me-2"></i>
                            Get Quote
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="section-padding">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6" data-aos="fade-right">
                <h2 class="section-title text-start">About <?php echo $company['name']; ?></h2>
                <p class="lead"><?php echo $company['about']; ?></p>
                <p>
                    With over <?php echo $company['years_experience']; ?> years of experience in precision machining, 
                    we have established ourselves as a trusted partner for companies across various industries. 
                    Our state-of-the-art facility and skilled team of <?php echo $company['team_members']; ?> professionals 
                    ensure that every project meets the highest standards of quality and precision.
                </p>
                <div class="row mt-4">
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-check-circle text-primary me-3 fs-4"></i>
                            <span>ISO 9001:2015 Certified</span>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-check-circle text-primary me-3 fs-4"></i>
                            <span>Advanced CNC Technology</span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-check-circle text-primary me-3 fs-4"></i>
                            <span>24/7 Quality Control</span>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-check-circle text-primary me-3 fs-4"></i>
                            <span>On-Time Delivery</span>
                        </div>
                    </div>
                </div>
                <a href="about.php" class="btn btn-primary mt-3">
                    Learn More About Us
                    <i class="fas fa-arrow-right ms-2"></i>
                </a>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="row g-3">
                    <div class="col-6">
                        <img src="https://images.unsplash.com/photo-1504307651254-35680f356dfd?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=500&q=80" alt="Our Facility" class="img-fluid rounded">
                    </div>
                    <div class="col-6">
                        <img src="https://images.unsplash.com/photo-1565193566173-7a0ee3dbe261?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=500&q=80" alt="Quality Control" class="img-fluid rounded">
                    </div>
                    <div class="col-12">
                        <img src="https://images.unsplash.com/photo-1581092335878-52d8db6fe16a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" alt="Our Team" class="img-fluid rounded">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="section-padding bg-light">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="section-title">Our Services</h2>
            <p class="section-subtitle">
                Comprehensive machining solutions tailored to meet your specific requirements
            </p>
        </div>
        
        <div class="row">
            <?php foreach($services as $index => $service): ?>
            <div class="col-lg-6 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="<?php echo $index * 100; ?>">
                <div class="service-card h-100">
                    <div class="service-icon">
                        <i class="<?php echo $service['icon']; ?>"></i>
                    </div>
                    <h4><?php echo htmlspecialchars($service['title']); ?></h4>
                    <p class="text-muted"><?php echo htmlspecialchars($service['description']); ?></p>
                    <a href="services.php#service-<?php echo $service['id']; ?>" class="btn btn-outline-primary">
                        Learn More
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        
        <div class="text-center mt-4" data-aos="fade-up">
            <a href="services.php" class="btn btn-primary btn-lg">
                <i class="fas fa-cogs me-2"></i>
                View All Services
            </a>
        </div>
    </div>
</section>

<!-- Featured Products Section -->
<?php if (!empty($featured_products)): ?>
<section class="section-padding">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="section-title">Featured Products</h2>
            <p class="section-subtitle">
                Explore our precision-engineered components and machined parts
            </p>
        </div>
        
        <div class="row">
            <?php foreach($featured_products as $index => $product): ?>
            <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="<?php echo $index * 100; ?>">
                <div class="product-card">
                    <?php if($product['image']): ?>
                        <img src="assets/uploads/<?php echo $product['image']; ?>" 
                             alt="<?php echo htmlspecialchars($product['name']); ?>" 
                             class="product-image">
                    <?php else: ?>
                        <div class="product-image bg-light d-flex align-items-center justify-content-center">
                            <i class="fas fa-cog text-muted" style="font-size: 3rem;"></i>
                        </div>
                    <?php endif; ?>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($product['name']); ?></h5>
                        <p class="text-muted small mb-2">
                            <i class="fas fa-tag me-1"></i>
                            <?php echo $product['category_name'] ?? 'General'; ?>
                        </p>
                        <p class="card-text"><?php echo substr(strip_tags($product['description']), 0, 100) . '...'; ?></p>
                        <a href="product-details.php?id=<?php echo $product['id']; ?>" class="btn btn-outline-primary">
                            View Details
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        
        <div class="text-center mt-4" data-aos="fade-up">
            <a href="products.php" class="btn btn-primary btn-lg">
                <i class="fas fa-boxes me-2"></i>
                View All Products
            </a>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Industries Section -->
<section class="section-padding bg-light">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="section-title">Industries We Serve</h2>
            <p class="section-subtitle">
                Delivering precision solutions across diverse industrial sectors
            </p>
        </div>
        
        <div class="row">
            <?php foreach(array_slice($industries, 0, 8) as $index => $industry): ?>
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4" data-aos="fade-up" data-aos-delay="<?php echo $index * 100; ?>">
                <div class="industry-card h-100">
                    <div class="industry-icon">
                        <i class="<?php echo $industry['icon']; ?>"></i>
                    </div>
                    <h6><?php echo htmlspecialchars($industry['name']); ?></h6>
                    <p class="text-muted small"><?php echo htmlspecialchars($industry['description']); ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        
        <div class="text-center mt-4" data-aos="fade-up">
            <a href="industries.php" class="btn btn-primary btn-lg">
                <i class="fas fa-industry me-2"></i>
                View All Industries
            </a>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="stats-section">
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="0">
                <div class="stat-card">
                    <span class="stat-number"><?php echo $company['years_experience']; ?>+</span>
                    <p class="stat-label">Years of Experience</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="stat-card">
                    <span class="stat-number"><?php echo $company['team_members']; ?>+</span>
                    <p class="stat-label">Team Members</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                <div class="stat-card">
                    <span class="stat-number"><?php echo $company['clients_served']; ?>+</span>
                    <p class="stat-label">Clients Served</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="300">
                <div class="stat-card">
                    <span class="stat-number"><?php echo $company['products_delivered']; ?>+</span>
                    <p class="stat-label">Products Delivered</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="section-padding bg-primary text-white">
    <div class="container text-center" data-aos="fade-up">
        <h2 class="mb-3">Ready to Start Your Project?</h2>
        <p class="lead mb-4">
            Contact us today for a free consultation and quote. Our team is ready to bring your ideas to life with precision and excellence.
        </p>
        <div class="d-flex justify-content-center gap-3 flex-wrap">
            <a href="contact.php" class="btn btn-light btn-lg">
                <i class="fas fa-phone me-2"></i>
                Get Free Quote
            </a>
            <a href="tel:<?php echo str_replace(' ', '', $company['phone']); ?>" class="btn btn-outline-light btn-lg">
                <i class="fas fa-phone me-2"></i>
                <?php echo $company['phone']; ?>
            </a>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>