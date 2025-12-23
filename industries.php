<?php
require_once 'includes/functions.php';
$company = getCompanyInfo();

$page_title = 'Industries We Serve';
$page_description = 'Precision machining solutions for diverse industries including automotive, aerospace, medical, oil & gas, and more.';

// Get all industries
$industries = $db->query("SELECT * FROM industries WHERE status = 'active' ORDER BY name")->fetchAll();

include 'includes/header.php';
?>

<!-- Breadcrumb -->
<section class="breadcrumb-section">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Industries</li>
            </ol>
        </nav>
        <h1 class="mb-0">Industries We Serve</h1>
    </div>
</section>

<!-- Industries Overview -->
<section class="section-padding">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="section-title">Diverse Industry Expertise</h2>
            <p class="section-subtitle">
                Our precision machining solutions serve a wide range of industries, 
                each with unique requirements and quality standards. We understand the specific 
                challenges and deliver tailored solutions.
            </p>
        </div>

        <!-- Industries Grid -->
        <div class="row">
            <?php 
            // Industry-specific images from Unsplash
            $industry_images = [
                'Agriculture' => 'https://images.unsplash.com/photo-1574323347407-f5e1ad6d020b?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
                'Automotive' => 'https://images.unsplash.com/photo-1449824913935-59a10b8d2000?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
                'Fire Fighting' => 'https://images.unsplash.com/photo-1551698618-1dfe5d97d256?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
                'General Engineering' => 'https://images.unsplash.com/photo-1581092335878-52d8db6fe16a?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
                'Hydraulic System' => 'https://images.unsplash.com/photo-1621905251189-08b45d6a269e?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
                'Medical Equipment' => 'https://images.unsplash.com/photo-1559757148-5c350d0d3c56?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
                'Oil & Gas' => 'https://images.unsplash.com/photo-1518709268805-4e9042af2176?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
                'Pumps' => 'https://images.unsplash.com/photo-1581092918056-0c4c3acd3789?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
                'Railway' => 'https://images.unsplash.com/photo-1544947950-fa07a98d237f?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
                'Textile Machinery' => 'https://images.unsplash.com/photo-1558618047-3c8c76ca7d13?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
                'Valve' => 'https://images.unsplash.com/photo-1565193566173-7a0ee3dbe261?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
                'Wind Energy' => 'https://images.unsplash.com/photo-1466611653911-95081537e5b7?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80'
            ];
            
            foreach($industries as $index => $industry): 
                $image_url = $industry_images[$industry['name']] ?? 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80';
            ?>
                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="<?php echo ($index % 6) * 100; ?>">
                    <div class="industry-detail-card h-100">
                        <div class="industry-image">
                            <img src="<?php echo $image_url; ?>" 
                                 alt="<?php echo htmlspecialchars($industry['name']); ?>" 
                                 class="img-fluid">
                            <div class="industry-overlay">
                                <div class="industry-icon-large">
                                    <i class="<?php echo $industry['icon']; ?>"></i>
                                </div>
                            </div>
                        </div>
                        <div class="industry-content">
                            <h4><?php echo htmlspecialchars($industry['name']); ?></h4>
                            <p class="text-muted"><?php echo htmlspecialchars($industry['description']); ?></p>
                            
                            <!-- Industry-specific details -->
                            <?php
                            $industry_details = [
                                'Automotive' => [
                                    'Engine components',
                                    'Transmission parts', 
                                    'Brake system components',
                                    'Suspension parts'
                                ],
                                'Aerospace' => [
                                    'Aircraft engine parts',
                                    'Landing gear components',
                                    'Structural elements',
                                    'Precision fasteners'
                                ],
                                'Medical Equipment' => [
                                    'Surgical instruments',
                                    'Device housings',
                                    'Precision components',
                                    'Implant parts'
                                ],
                                'Oil & Gas' => [
                                    'Valve components',
                                    'Pump parts',
                                    'Pipeline fittings',
                                    'Drilling equipment'
                                ],
                                'Agriculture' => [
                                    'Tractor components',
                                    'Harvester parts',
                                    'Irrigation equipment',
                                    'Implement components'
                                ],
                                'Railway' => [
                                    'Wheel assemblies',
                                    'Brake components',
                                    'Coupling parts',
                                    'Signal equipment'
                                ]
                            ];
                            
                            if (isset($industry_details[$industry['name']])):
                            ?>
                                <ul class="industry-applications">
                                    <?php foreach($industry_details[$industry['name']] as $detail): ?>
                                        <li><i class="fas fa-check text-primary me-2"></i><?php echo $detail; ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php else: ?>
                                <ul class="industry-applications">
                                    <li><i class="fas fa-check text-primary me-2"></i>Precision machined components</li>
                                    <li><i class="fas fa-check text-primary me-2"></i>Custom manufacturing solutions</li>
                                    <li><i class="fas fa-check text-primary me-2"></i>Quality assured products</li>
                                </ul>
                            <?php endif; ?>
                            
                            <a href="contact.php?industry=<?php echo urlencode($industry['name']); ?>" 
                               class="btn btn-outline-primary">
                                <i class="fas fa-envelope me-2"></i>
                                Get Industry Quote
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Industry Statistics -->
<section class="section-padding bg-light">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="section-title">Industry Experience</h2>
            <p class="section-subtitle">
                Years of specialized experience across multiple industrial sectors
            </p>
        </div>

        <div class="row text-center">
            <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="0">
                <div class="stat-card">
                    <span class="stat-number">12+</span>
                    <p class="stat-label">Industries Served</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="stat-card">
                    <span class="stat-number">500+</span>
                    <p class="stat-label">Industry Projects</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                <div class="stat-card">
                    <span class="stat-number">98%</span>
                    <p class="stat-label">Customer Satisfaction</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="300">
                <div class="stat-card">
                    <span class="stat-number">15+</span>
                    <p class="stat-label">Years Experience</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Quality Standards -->
<section class="section-padding">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6" data-aos="fade-right">
                <h2 class="section-title text-start">Industry-Specific Quality Standards</h2>
                <p class="lead">
                    We understand that each industry has unique quality requirements and regulatory standards. 
                    Our processes are designed to meet and exceed these specific requirements.
                </p>
                
                <div class="quality-standards">
                    <div class="row">
                        <div class="col-sm-6 mb-3">
                            <div class="standard-item">
                                <i class="fas fa-certificate text-primary me-3"></i>
                                <div>
                                    <h6 class="mb-1">ISO 9001:2015</h6>
                                    <small class="text-muted">Quality Management</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <div class="standard-item">
                                <i class="fas fa-shield-alt text-primary me-3"></i>
                                <div>
                                    <h6 class="mb-1">AS9100D</h6>
                                    <small class="text-muted">Aerospace Standard</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <div class="standard-item">
                                <i class="fas fa-heartbeat text-primary me-3"></i>
                                <div>
                                    <h6 class="mb-1">ISO 13485</h6>
                                    <small class="text-muted">Medical Devices</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <div class="standard-item">
                                <i class="fas fa-industry text-primary me-3"></i>
                                <div>
                                    <h6 class="mb-1">IATF 16949</h6>
                                    <small class="text-muted">Automotive Quality</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <a href="about.php" class="btn btn-primary mt-3">
                    Learn More About Our Quality
                    <i class="fas fa-arrow-right ms-2"></i>
                </a>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <img src="https://images.unsplash.com/photo-1565193566173-7a0ee3dbe261?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" 
                     alt="Quality Control" class="img-fluid rounded shadow">
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="section-padding bg-primary text-white">
    <div class="container text-center" data-aos="fade-up">
        <h2 class="mb-3">Partner with Industry Experts</h2>
        <p class="lead mb-4">
            Let us apply our industry expertise to your next project. We understand your challenges 
            and deliver solutions that meet your specific requirements.
        </p>
        <div class="d-flex justify-content-center gap-3 flex-wrap">
            <a href="contact.php" class="btn btn-light btn-lg">
                <i class="fas fa-handshake me-2"></i>
                Start Partnership
            </a>
            <a href="products.php" class="btn btn-outline-light btn-lg">
                <i class="fas fa-boxes me-2"></i>
                View Products
            </a>
        </div>
    </div>
</section>

<style>
.industry-detail-card {
    background: white;
    border-radius: 1rem;
    overflow: hidden;
    box-shadow: var(--shadow-md);
    transition: all 0.3s ease;
}

.industry-detail-card:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-xl);
}

.industry-image {
    position: relative;
    height: 200px;
    overflow: hidden;
}

.industry-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: all 0.3s ease;
}

.industry-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(37, 99, 235, 0.8);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: all 0.3s ease;
}

.industry-detail-card:hover .industry-overlay {
    opacity: 1;
}

.industry-detail-card:hover .industry-image img {
    transform: scale(1.05);
}

.industry-icon-large {
    color: white;
    font-size: 3rem;
}

.industry-content {
    padding: 1.5rem;
}

.industry-applications {
    list-style: none;
    padding: 0;
    margin: 1rem 0;
}

.industry-applications li {
    padding: 0.25rem 0;
    font-size: 0.875rem;
}

.standard-item {
    display: flex;
    align-items: center;
    background: #f8f9fa;
    padding: 1rem;
    border-radius: 0.5rem;
    height: 100%;
}

.standard-item i {
    font-size: 1.5rem;
}
</style>

<?php include 'includes/footer.php'; ?>