<?php
require_once 'includes/functions.php';
$company = getCompanyInfo();

$page_title = 'Services';
$page_description = 'Comprehensive precision machining services including CNC machining, quality testing, and product development.';

// Get all services
$services = $db->query("SELECT * FROM services WHERE status = 'active' ORDER BY id")->fetchAll();

include 'includes/header.php';
?>

<!-- Breadcrumb -->
<section class="breadcrumb-section">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Services</li>
            </ol>
        </nav>
        <h1 class="mb-0">Our Services</h1>
    </div>
</section>

<!-- Services Overview -->
<section class="section-padding">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="section-title">Comprehensive Manufacturing Solutions</h2>
            <p class="section-subtitle">
                From concept to completion, we provide end-to-end precision machining services 
                tailored to meet the demanding requirements of modern industry.
            </p>
        </div>

        <!-- Services Grid -->
        <div class="row">
            <?php foreach($services as $index => $service): ?>
                <div class="col-lg-6 mb-5" id="service-<?php echo $service['id']; ?>" data-aos="fade-up" data-aos-delay="<?php echo $index * 100; ?>">
                    <div class="row align-items-center">
                        <div class="col-md-4 mb-3 mb-md-0">
                            <div class="service-image-container">
                                <?php
                                // Service-specific images from Unsplash
                                $service_images = [
                                    1 => 'https://images.unsplash.com/photo-1581092918056-0c4c3acd3789?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80',
                                    2 => 'https://images.unsplash.com/photo-1565193566173-7a0ee3dbe261?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80',
                                    3 => 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80',
                                    4 => 'https://images.unsplash.com/photo-1581092335878-52d8db6fe16a?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80'
                                ];
                                $image_url = $service_images[$service['id']] ?? $service_images[1];
                                ?>
                                <img src="<?php echo $image_url; ?>" 
                                     alt="<?php echo htmlspecialchars($service['title']); ?>" 
                                     class="img-fluid rounded shadow">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="service-content">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="service-icon me-3">
                                        <i class="<?php echo $service['icon']; ?>"></i>
                                    </div>
                                    <h3><?php echo htmlspecialchars($service['title']); ?></h3>
                                </div>
                                <p class="text-muted mb-3"><?php echo htmlspecialchars($service['description']); ?></p>
                                
                                <!-- Service details based on service type -->
                                <?php if($service['id'] == 1): // CNC Machining ?>
                                    <ul class="list-unstyled mb-3">
                                        <li><i class="fas fa-check text-primary me-2"></i>3, 4, and 5-axis CNC machining</li>
                                        <li><i class="fas fa-check text-primary me-2"></i>Tolerance as tight as ±0.005mm</li>
                                        <li><i class="fas fa-check text-primary me-2"></i>Materials: Steel, Aluminum, Brass, Titanium</li>
                                        <li><i class="fas fa-check text-primary me-2"></i>Prototype to production volumes</li>
                                    </ul>
                                <?php elseif($service['id'] == 2): // Quality Testing ?>
                                    <ul class="list-unstyled mb-3">
                                        <li><i class="fas fa-check text-primary me-2"></i>CMM dimensional inspection</li>
                                        <li><i class="fas fa-check text-primary me-2"></i>Surface roughness testing</li>
                                        <li><i class="fas fa-check text-primary me-2"></i>Material certification</li>
                                        <li><i class="fas fa-check text-primary me-2"></i>First article inspection reports</li>
                                    </ul>
                                <?php elseif($service['id'] == 3): // Material Processing ?>
                                    <ul class="list-unstyled mb-3">
                                        <li><i class="fas fa-check text-primary me-2"></i>Heat treatment processes</li>
                                        <li><i class="fas fa-check text-primary me-2"></i>Surface finishing options</li>
                                        <li><i class="fas fa-check text-primary me-2"></i>Anodizing and plating</li>
                                        <li><i class="fas fa-check text-primary me-2"></i>Custom material sourcing</li>
                                    </ul>
                                <?php elseif($service['id'] == 4): // Product Development ?>
                                    <ul class="list-unstyled mb-3">
                                        <li><i class="fas fa-check text-primary me-2"></i>Design for manufacturability</li>
                                        <li><i class="fas fa-check text-primary me-2"></i>Prototype development</li>
                                        <li><i class="fas fa-check text-primary me-2"></i>Cost optimization analysis</li>
                                        <li><i class="fas fa-check text-primary me-2"></i>Engineering consultation</li>
                                    </ul>
                                <?php endif; ?>
                                
                                <a href="contact.php?service=<?php echo urlencode($service['title']); ?>" class="btn btn-primary">
                                    <i class="fas fa-envelope me-2"></i>
                                    Get Quote
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <?php if($index < count($services) - 1): ?>
                    <div class="col-12"><hr class="my-5"></div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Capabilities Section -->
<section class="section-padding bg-light">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="section-title">Our Capabilities</h2>
            <p class="section-subtitle">
                State-of-the-art equipment and experienced professionals deliver exceptional results
            </p>
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="0">
                <div class="capability-card text-center h-100">
                    <div class="capability-icon">
                        <i class="fas fa-cog text-primary"></i>
                    </div>
                    <h4>Advanced Machinery</h4>
                    <p class="text-muted">
                        Latest CNC machines with multi-axis capabilities for complex geometries 
                        and tight tolerances.
                    </p>
                    <ul class="list-unstyled small">
                        <li>• 5-axis CNC machining centers</li>
                        <li>• Swiss-type lathes</li>
                        <li>• Wire EDM machines</li>
                        <li>• Surface grinding equipment</li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="capability-card text-center h-100">
                    <div class="capability-icon">
                        <i class="fas fa-microscope text-primary"></i>
                    </div>
                    <h4>Quality Control</h4>
                    <p class="text-muted">
                        Comprehensive quality assurance with advanced measuring equipment 
                        and certified processes.
                    </p>
                    <ul class="list-unstyled small">
                        <li>• CMM inspection</li>
                        <li>• Optical comparators</li>
                        <li>• Surface roughness testers</li>
                        <li>• Hardness testing</li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                <div class="capability-card text-center h-100">
                    <div class="capability-icon">
                        <i class="fas fa-shipping-fast text-primary"></i>
                    </div>
                    <h4>Fast Turnaround</h4>
                    <p class="text-muted">
                        Optimized workflow and efficient project management ensure 
                        quick delivery without compromising quality.
                    </p>
                    <ul class="list-unstyled small">
                        <li>• Rush orders available</li>
                        <li>• Efficient scheduling</li>
                        <li>• Real-time progress tracking</li>
                        <li>• Flexible delivery options</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Process Section -->
<section class="section-padding">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="section-title">Our Process</h2>
            <p class="section-subtitle">
                A systematic approach to ensure quality, efficiency, and customer satisfaction
            </p>
        </div>

        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="0">
                <div class="process-step text-center">
                    <div class="process-number">1</div>
                    <h5>Consultation</h5>
                    <p class="text-muted">
                        We analyze your requirements, review drawings, and provide 
                        technical recommendations.
                    </p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="process-step text-center">
                    <div class="process-number">2</div>
                    <h5>Planning</h5>
                    <p class="text-muted">
                        Detailed project planning including material selection, 
                        machining strategy, and timeline.
                    </p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                <div class="process-step text-center">
                    <div class="process-number">3</div>
                    <h5>Manufacturing</h5>
                    <p class="text-muted">
                        Precision machining using advanced CNC equipment and 
                        experienced technicians.
                    </p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="300">
                <div class="process-step text-center">
                    <div class="process-number">4</div>
                    <h5>Quality Check</h5>
                    <p class="text-muted">
                        Thorough inspection and testing to ensure parts meet 
                        your exact specifications.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="section-padding bg-primary text-white">
    <div class="container text-center" data-aos="fade-up">
        <h2 class="mb-3">Ready to Get Started?</h2>
        <p class="lead mb-4">
            Let's discuss your project requirements and see how our precision machining 
            services can bring your ideas to life.
        </p>
        <div class="d-flex justify-content-center gap-3 flex-wrap">
            <a href="contact.php" class="btn btn-light btn-lg">
                <i class="fas fa-phone me-2"></i>
                Get Free Quote
            </a>
            <a href="mailto:<?php echo $company['email']; ?>" class="btn btn-outline-light btn-lg">
                <i class="fas fa-envelope me-2"></i>
                Email Us
            </a>
        </div>
    </div>
</section>

<style>
.service-icon {
    width: 60px;
    height: 60px;
    background: var(--gradient-primary);
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
}

.capability-card {
    background: white;
    padding: 2rem 1.5rem;
    border-radius: 1rem;
    box-shadow: var(--shadow-md);
    transition: all 0.3s ease;
}

.capability-card:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-xl);
}

.capability-icon {
    font-size: 3rem;
    margin-bottom: 1.5rem;
}

.process-step {
    padding: 1.5rem;
}

.process-number {
    width: 60px;
    height: 60px;
    background: var(--gradient-primary);
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    font-weight: bold;
    margin: 0 auto 1rem;
}

.service-image-container img {
    width: 100%;
    height: 250px;
    object-fit: cover;
}
</style>

<?php include 'includes/footer.php'; ?>