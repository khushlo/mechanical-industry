<?php
require_once 'includes/functions.php';
$company = getCompanyInfo();

$page_title = 'About Us';
$page_description = 'Learn more about ' . $company['name'] . ' - your trusted partner for precision machining services and engineering solutions.';

include 'includes/header.php';
?>

<!-- Breadcrumb -->
<section class="breadcrumb-section">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">About Us</li>
            </ol>
        </nav>
        <h1 class="mb-0">About <?php echo $company['name']; ?></h1>
    </div>
</section>

<!-- About Content -->
<section class="section-padding">
    <div class="container">
        <div class="row align-items-center mb-5">
            <div class="col-lg-6" data-aos="fade-right">
                <h2 class="section-title text-start">Our Story</h2>
                <p class="lead"><?php echo $company['about']; ?></p>
                <p>
                    Founded with a vision to deliver uncompromising quality in precision machining, 
                    <?php echo $company['name']; ?> has grown to become a leading manufacturer of 
                    high-precision components for diverse industries. Our journey began with a simple 
                    commitment: to exceed customer expectations through innovative solutions and 
                    exceptional craftsmanship.
                </p>
                <p>
                    Over the years, we have invested heavily in cutting-edge technology, skilled 
                    workforce development, and quality management systems to ensure that every 
                    product that leaves our facility meets the highest standards of precision and reliability.
                </p>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <img src="https://images.unsplash.com/photo-1504307651254-35680f356dfd?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" alt="About Us" class="img-fluid rounded shadow">
            </div>
        </div>

        <!-- Mission, Vision, Values -->
        <div class="row mb-5">
            <div class="col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="0">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <div class="mb-3">
                            <i class="fas fa-bullseye text-primary" style="font-size: 3rem;"></i>
                        </div>
                        <h4>Our Mission</h4>
                        <p>
                            To provide world-class precision machining services that enable our 
                            customers to achieve their goals while maintaining the highest standards 
                            of quality, delivery, and customer satisfaction.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <div class="mb-3">
                            <i class="fas fa-eye text-primary" style="font-size: 3rem;"></i>
                        </div>
                        <h4>Our Vision</h4>
                        <p>
                            To be the preferred partner for precision machining solutions globally, 
                            recognized for our innovation, quality excellence, and commitment to 
                            sustainable manufacturing practices.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="200">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <div class="mb-3">
                            <i class="fas fa-heart text-primary" style="font-size: 3rem;"></i>
                        </div>
                        <h4>Our Values</h4>
                        <p>
                            Quality, Integrity, Innovation, Customer Focus, and Continuous Improvement 
                            form the foundation of everything we do. These values guide our decisions 
                            and shape our company culture.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Capabilities Section -->
<section class="section-padding bg-light">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="section-title">Our Capabilities</h2>
            <p class="section-subtitle">
                Advanced manufacturing capabilities backed by cutting-edge technology
            </p>
        </div>

        <div class="row">
            <div class="col-lg-6 mb-4" data-aos="fade-up" data-aos-delay="0">
                <div class="d-flex">
                    <div class="flex-shrink-0">
                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" 
                             style="width: 60px; height: 60px;">
                            <i class="fas fa-microchip fs-4"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h5>Advanced CNC Machining</h5>
                        <p class="text-muted">
                            State-of-the-art CNC machines capable of handling complex geometries 
                            with tolerances as tight as ±0.005mm.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="d-flex">
                    <div class="flex-shrink-0">
                        <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center" 
                             style="width: 60px; height: 60px;">
                            <i class="fas fa-search fs-4"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h5>Quality Assurance</h5>
                        <p class="text-muted">
                            Comprehensive quality control with CMM inspection, surface finish 
                            analysis, and material certification.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                <div class="d-flex">
                    <div class="flex-shrink-0">
                        <div class="bg-info text-white rounded-circle d-flex align-items-center justify-content-center" 
                             style="width: 60px; height: 60px;">
                            <i class="fas fa-drafting-compass fs-4"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h5>Engineering Support</h5>
                        <p class="text-muted">
                            Complete engineering support from design optimization to 
                            manufacturing feasibility analysis.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mb-4" data-aos="fade-up" data-aos-delay="300">
                <div class="d-flex">
                    <div class="flex-shrink-0">
                        <div class="bg-warning text-white rounded-circle d-flex align-items-center justify-content-center" 
                             style="width: 60px; height: 60px;">
                            <i class="fas fa-shipping-fast fs-4"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h5>Fast Delivery</h5>
                        <p class="text-muted">
                            Optimized production processes ensure quick turnaround times 
                            without compromising quality.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="section-padding">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="section-title">Our Team</h2>
            <p class="section-subtitle">
                Meet the experienced professionals behind our success
            </p>
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="0">
                <div class="card text-center">
                    <div class="card-body">
                        <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=300&q=80" alt="Team Member" 
                             class="rounded-circle mb-3" style="width: 150px; height: 150px; object-fit: cover;">
                        <h5>Rajesh Kumar</h5>
                        <p class="text-primary">Managing Director</p>
                        <p class="text-muted">
                            With over 20 years in precision manufacturing, Rajesh leads our 
                            company with a focus on innovation and customer satisfaction.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="card text-center">
                    <div class="card-body">
                        <img src="https://images.unsplash.com/photo-1494790108755-2616c4f7df67?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=300&q=80" alt="Team Member" 
                             class="rounded-circle mb-3" style="width: 150px; height: 150px; object-fit: cover;">
                        <h5>Priya Sharma</h5>
                        <p class="text-primary">Quality Manager</p>
                        <p class="text-muted">
                            Priya ensures that every product meets our stringent quality 
                            standards through comprehensive testing and inspection processes.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                <div class="card text-center">
                    <div class="card-body">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=300&q=80" alt="Team Member" 
                             class="rounded-circle mb-3" style="width: 150px; height: 150px; object-fit: cover;">
                        <h5>Amit Patel</h5>
                        <p class="text-primary">Production Head</p>
                        <p class="text-muted">
                            Amit oversees our manufacturing operations, ensuring optimal 
                            efficiency and adherence to delivery schedules.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Certifications -->
<section class="section-padding bg-light">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="section-title">Certifications & Standards</h2>
            <p class="section-subtitle">
                Our commitment to quality is validated by international certifications
            </p>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="0">
                <div class="text-center">
                    <div class="mb-3">
                        <i class="fas fa-certificate text-primary" style="font-size: 4rem;"></i>
                    </div>
                    <h5>ISO 9001:2015</h5>
                    <p class="text-muted">Quality Management System</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="text-center">
                    <div class="mb-3">
                        <i class="fas fa-shield-alt text-primary" style="font-size: 4rem;"></i>
                    </div>
                    <h5>ISO 14001</h5>
                    <p class="text-muted">Environmental Management</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                <div class="text-center">
                    <div class="mb-3">
                        <i class="fas fa-users text-primary" style="font-size: 4rem;"></i>
                    </div>
                    <h5>ISO 45001</h5>
                    <p class="text-muted">Occupational Health & Safety</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="300">
                <div class="text-center">
                    <div class="mb-3">
                        <i class="fas fa-check-circle text-primary" style="font-size: 4rem;"></i>
                    </div>
                    <h5>CE Marking</h5>
                    <p class="text-muted">European Conformity</p>
                </div>
            </div>
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
                    <p class="stat-label">Skilled Professionals</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                <div class="stat-card">
                    <span class="stat-number"><?php echo $company['clients_served']; ?>+</span>
                    <p class="stat-label">Satisfied Clients</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="300">
                <div class="stat-card">
                    <span class="stat-number"><?php echo $company['products_delivered']; ?>+</span>
                    <p class="stat-label">Projects Completed</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="section-padding bg-primary text-white">
    <div class="container text-center" data-aos="fade-up">
        <h2 class="mb-3">Partner with Us Today</h2>
        <p class="lead mb-4">
            Experience the difference that precision, quality, and dedication can make to your projects.
        </p>
        <div class="d-flex justify-content-center gap-3 flex-wrap">
            <a href="contact.php" class="btn btn-light btn-lg">
                <i class="fas fa-handshake me-2"></i>
                Start Partnership
            </a>
            <a href="services.php" class="btn btn-outline-light btn-lg">
                <i class="fas fa-cogs me-2"></i>
                Our Services
            </a>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>