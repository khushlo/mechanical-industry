    <!-- Footer -->
    <footer class="footer-custom text-light mt-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <h5 class="text-primary mb-3">
                        <i class="fas fa-cogs me-2"></i>
                        <?php echo $company['name']; ?>
                    </h5>
                    <p class="text-muted mb-3"><?php echo $company['tagline']; ?></p>
                    <p class="text-muted small"><?php echo $company['about']; ?></p>
                    <div class="social-links mt-3">
                        <a href="#" class="text-light me-3"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-light me-3"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-light me-3"><i class="fab fa-linkedin"></i></a>
                        <a href="#" class="text-light me-3"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                
                <div class="col-lg-2 col-md-6 mb-4">
                    <h6 class="text-primary mb-3">Quick Links</h6>
                    <ul class="list-unstyled">
                        <li><a href="index.php" class="text-muted text-decoration-none hover-primary">Home</a></li>
                        <li><a href="about.php" class="text-muted text-decoration-none hover-primary">About Us</a></li>
                        <li><a href="services.php" class="text-muted text-decoration-none hover-primary">Services</a></li>
                        <li><a href="products.php" class="text-muted text-decoration-none hover-primary">Products</a></li>
                        <li><a href="contact.php" class="text-muted text-decoration-none hover-primary">Contact</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-3 col-md-6 mb-4">
                    <h6 class="text-primary mb-3">Our Services</h6>
                    <ul class="list-unstyled">
                        <?php
                        $services = $db->query("SELECT * FROM services WHERE status = 'active' LIMIT 5")->fetchAll();
                        foreach($services as $service):
                        ?>
                        <li><a href="services.php#service-<?php echo $service['id']; ?>" class="text-muted text-decoration-none hover-primary">
                            <i class="<?php echo $service['icon']; ?> me-2 small"></i>
                            <?php echo $service['title']; ?>
                        </a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                
                <div class="col-lg-3 col-md-6 mb-4">
                    <h6 class="text-primary mb-3">Contact Info</h6>
                    <div class="contact-info">
                        <p class="text-muted mb-2">
                            <i class="fas fa-map-marker-alt text-primary me-2"></i>
                            <?php echo $company['address']; ?>
                        </p>
                        <p class="text-muted mb-2">
                            <i class="fas fa-phone text-primary me-2"></i>
                            <a href="tel:<?php echo str_replace(' ', '', $company['phone']); ?>" class="text-muted text-decoration-none">
                                <?php echo $company['phone']; ?>
                            </a>
                        </p>
                        <p class="text-muted mb-2">
                            <i class="fas fa-envelope text-primary me-2"></i>
                            <a href="mailto:<?php echo $company['email']; ?>" class="text-muted text-decoration-none">
                                <?php echo $company['email']; ?>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
            
            <hr class="my-4 border-secondary">
            
            <div class="row align-items-center">
                <div class="col-md-6">
                    <p class="text-muted small mb-0">
                        &copy; <?php echo date('Y'); ?> <?php echo $company['name']; ?>. All rights reserved.
                    </p>
                </div>
                <div class="col-md-6 text-end">
                    <p class="text-muted small mb-0">
                        Designed with <i class="fas fa-heart text-danger"></i> for Excellence
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <button class="btn btn-primary btn-back-to-top" id="backToTopBtn" onclick="scrollToTop()">
        <i class="fas fa-arrow-up"></i>
    </button>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- AOS Animation -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
    <!-- Custom JS -->
    <script src="assets/js/main.js"></script>
    
    <script>
        // Initialize AOS with optimized settings for better UX
        AOS.init({
            duration: 500, // Reduced from 1000ms to 500ms
            easing: 'cubic-bezier(0.25, 0.46, 0.45, 0.94)', // More natural easing
            once: true,
            offset: 50, // Trigger animations earlier
            delay: 0, // Remove global delay
            disable: 'mobile' // Disable on mobile for performance (optional)
        });
        
        // Back to top functionality
        window.addEventListener('scroll', function() {
            const backToTopBtn = document.getElementById('backToTopBtn');
            if (window.scrollY > 300) {
                backToTopBtn.classList.add('show');
            } else {
                backToTopBtn.classList.remove('show');
            }
        });
        
        function scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }
    </script>
</body>
</html>