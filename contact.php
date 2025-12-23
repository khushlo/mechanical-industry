<?php
require_once 'includes/functions.php';
$company = getCompanyInfo();

$page_title = 'Contact Us';
$page_description = 'Get in touch with ' . $company['name'] . ' for your precision machining needs. Request a quote or schedule a consultation today.';

$success_message = '';
$error_message = '';

include 'includes/header.php';
?>

<!-- Breadcrumb -->
<section class="breadcrumb-section">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
            </ol>
        </nav>
        <h1 class="mb-0">Contact <?php echo $company['name']; ?></h1>
    </div>
</section>

<!-- Contact Section -->
<section class="section-padding">
    <div class="container">
        <div class="row">
            <!-- Contact Form -->
            <div class="col-lg-8" data-aos="fade-right">
                <div class="contact-form">
                    <h3 class="mb-4">Get in Touch</h3>
                    <p class="text-muted mb-4">
                        Ready to discuss your project? Fill out the form below and we'll get back to you 
                        within 24 hours with a detailed quote and timeline.
                    </p>

                    <form id="contactForm" class="needs-validation" novalidate>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="firstName" class="form-label">First Name *</label>
                                <input type="text" class="form-control" id="firstName" name="first_name" required>
                                <div class="invalid-feedback">
                                    Please provide your first name.
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="lastName" class="form-label">Last Name *</label>
                                <input type="text" class="form-control" id="lastName" name="last_name" required>
                                <div class="invalid-feedback">
                                    Please provide your last name.
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email Address *</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                                <div class="invalid-feedback">
                                    Please provide a valid email address.
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="tel" class="form-control" id="phone" name="phone">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="company" class="form-label">Company Name</label>
                                <input type="text" class="form-control" id="company" name="company">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="industry" class="form-label">Industry</label>
                                <select class="form-select" id="industry" name="industry">
                                    <option value="">Select Industry</option>
                                    <option value="automotive">Automotive</option>
                                    <option value="aerospace">Aerospace</option>
                                    <option value="medical">Medical Equipment</option>
                                    <option value="oil-gas">Oil & Gas</option>
                                    <option value="agriculture">Agriculture</option>
                                    <option value="hydraulic">Hydraulic Systems</option>
                                    <option value="railway">Railway</option>
                                    <option value="textile">Textile Machinery</option>
                                    <option value="valve">Valve Systems</option>
                                    <option value="wind-energy">Wind Energy</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="subject" class="form-label">Subject *</label>
                            <select class="form-select" id="subject" name="subject" required>
                                <option value="">Select Subject</option>
                                <option value="quote">Request Quote</option>
                                <option value="consultation">Schedule Consultation</option>
                                <option value="general">General Inquiry</option>
                                <option value="support">Technical Support</option>
                                <option value="partnership">Partnership Opportunity</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select a subject.
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="message" class="form-label">Message *</label>
                            <textarea class="form-control" id="message" name="message" rows="6" 
                                      placeholder="Please describe your project requirements, specifications, quantities, and timeline..." 
                                      required></textarea>
                            <div class="invalid-feedback">
                                Please provide details about your inquiry.
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="attachment" class="form-label">Attach Files (Optional)</label>
                            <input type="file" class="form-control" id="attachment" name="attachment" 
                                   accept=".pdf,.doc,.docx,.dwg,.step,.stp,.iges" multiple>
                            <div class="form-text">
                                Supported formats: PDF, DOC, DOCX, DWG, STEP, IGES (Max size: 10MB per file)
                            </div>
                        </div>

                        <div class="mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="privacy" name="privacy" required>
                                <label class="form-check-label" for="privacy">
                                    I agree to the <a href="privacy-policy.php" target="_blank">Privacy Policy</a> 
                                    and consent to the processing of my personal data. *
                                </label>
                                <div class="invalid-feedback">
                                    You must agree to our privacy policy.
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg">
                            <i class="fas fa-paper-plane me-2"></i>
                            Send Message
                        </button>
                    </form>
                </div>
            </div>

            <!-- Contact Information -->
            <div class="col-lg-4" data-aos="fade-left">
                <div class="sticky-top" style="top: 2rem;">
                    <!-- Contact Info Card -->
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title mb-4">
                                <i class="fas fa-map-marker-alt text-primary me-2"></i>
                                Contact Information
                            </h5>
                            
                            <div class="contact-info-item mb-3">
                                <div class="d-flex">
                                    <div class="flex-shrink-0">
                                        <i class="fas fa-map-marker-alt text-primary"></i>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h6 class="mb-1">Address</h6>
                                        <p class="text-muted small mb-0"><?php echo $company['address']; ?></p>
                                    </div>
                                </div>
                            </div>

                            <div class="contact-info-item mb-3">
                                <div class="d-flex">
                                    <div class="flex-shrink-0">
                                        <i class="fas fa-phone text-primary"></i>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h6 class="mb-1">Phone</h6>
                                        <p class="text-muted small mb-0">
                                            <a href="tel:<?php echo str_replace(' ', '', $company['phone']); ?>" 
                                               class="text-decoration-none">
                                                <?php echo $company['phone']; ?>
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="contact-info-item mb-3">
                                <div class="d-flex">
                                    <div class="flex-shrink-0">
                                        <i class="fas fa-envelope text-primary"></i>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h6 class="mb-1">Email</h6>
                                        <p class="text-muted small mb-0">
                                            <a href="mailto:<?php echo $company['email']; ?>" 
                                               class="text-decoration-none">
                                                <?php echo $company['email']; ?>
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="contact-info-item">
                                <div class="d-flex">
                                    <div class="flex-shrink-0">
                                        <i class="fas fa-clock text-primary"></i>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h6 class="mb-1">Business Hours</h6>
                                        <p class="text-muted small mb-1">Monday - Friday: 9:00 AM - 6:00 PM</p>
                                        <p class="text-muted small mb-0">Saturday: 9:00 AM - 2:00 PM</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title mb-3">Quick Actions</h5>
                            <div class="d-grid gap-2">
                                <a href="tel:<?php echo str_replace(' ', '', $company['phone']); ?>" 
                                   class="btn btn-outline-primary">
                                    <i class="fas fa-phone me-2"></i>
                                    Call Now
                                </a>
                                <a href="mailto:<?php echo $company['email']; ?>" 
                                   class="btn btn-outline-primary">
                                    <i class="fas fa-envelope me-2"></i>
                                    Send Email
                                </a>
                                <a href="https://wa.me/919876543210?text=Hello, I'm interested in your precision machining services" 
                                   target="_blank" class="btn btn-outline-success">
                                    <i class="fab fa-whatsapp me-2"></i>
                                    WhatsApp
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Emergency Contact -->
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title mb-3 text-danger">
                                <i class="fas fa-exclamation-triangle me-2"></i>
                                Emergency Contact
                            </h5>
                            <p class="small text-muted mb-2">For urgent production issues:</p>
                            <p class="fw-bold mb-0">
                                <i class="fas fa-phone text-danger me-2"></i>
                                +91 98765 43211
                            </p>
                            <small class="text-muted">Available 24/7</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="mb-0">
    <div class="container-fluid px-0">
        <div class="row g-0">
            <div class="col-12">
                <div class="map-container" style="height: 400px; background: #f8f9fa;">
                    <!-- Replace with actual Google Maps embed -->
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3671.123456789!2d72.5714!3d23.0225!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjPCsDAxJzIxLjAiTiA3MsKwMzQnMTcuMCJF!5e0!3m2!1sen!2sin!4v1234567890"
                        width="100%" 
                        height="400" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="section-padding bg-light">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="section-title">Frequently Asked Questions</h2>
            <p class="section-subtitle">
                Quick answers to common questions about our services
            </p>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="accordion" id="faqAccordion">
                    <div class="accordion-item mb-3" data-aos="fade-up" data-aos-delay="0">
                        <h2 class="accordion-header" id="faq1">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1">
                                What is your typical lead time for custom machined parts?
                            </button>
                        </h2>
                        <div id="collapse1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Our typical lead time varies depending on complexity and quantity. Simple parts can be completed 
                                in 3-5 business days, while complex assemblies may take 2-3 weeks. We always provide accurate 
                                timelines during the quoting process.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item mb-3" data-aos="fade-up" data-aos-delay="100">
                        <h2 class="accordion-header" id="faq2">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2">
                                What materials do you work with?
                            </button>
                        </h2>
                        <div id="collapse2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                We work with a wide range of materials including aluminum, steel, stainless steel, brass, 
                                bronze, titanium, and various engineering plastics. If you have specific material requirements, 
                                please discuss them with our team.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item mb-3" data-aos="fade-up" data-aos-delay="200">
                        <h2 class="accordion-header" id="faq3">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3">
                                Do you provide design and engineering support?
                            </button>
                        </h2>
                        <div id="collapse3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Yes, we offer complete design and engineering support. Our team can help optimize your 
                                designs for manufacturability, suggest material improvements, and provide value engineering 
                                to reduce costs while maintaining quality.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item" data-aos="fade-up" data-aos-delay="300">
                        <h2 class="accordion-header" id="faq4">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4">
                                What quality certifications do you have?
                            </button>
                        </h2>
                        <div id="collapse4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                We are ISO 9001:2015 certified and maintain strict quality control procedures. All parts 
                                are inspected using calibrated measuring equipment, and we provide detailed inspection 
                                reports with every shipment.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>