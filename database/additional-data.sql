-- Additional database schema updates

-- Add contact submissions table
CREATE TABLE contact_submissions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL,
    phone VARCHAR(20),
    company VARCHAR(150),
    industry VARCHAR(100),
    subject VARCHAR(200) NOT NULL,
    message TEXT NOT NULL,
    ip_address VARCHAR(45),
    status ENUM('new', 'read', 'replied') DEFAULT 'new',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Update admin users with proper password hash for 'admin123'
UPDATE admin_users 
SET password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi' 
WHERE username = 'admin';

-- Insert sample products
INSERT INTO products (name, description, category_id, specifications, applications, status) VALUES
('Precision CNC Shaft', 'High-precision machined shaft with tight tolerances for automotive applications.', 1, 'Material: Steel\nTolerance: ±0.005mm\nSurface Finish: Ra 0.8', 'Automotive transmissions, Industrial machinery', 'active'),
('Hydraulic Cylinder Components', 'Custom machined components for hydraulic cylinder assemblies.', 2, 'Material: Stainless Steel\nPressure Rating: 350 Bar\nSurface Treatment: Hard Chrome', 'Construction equipment, Industrial hydraulics', 'active'),
('Valve Body Casting', 'Precision machined valve body from investment casting for fluid control applications.', 5, 'Material: Bronze\nPort Size: 1/2" to 4"\nPressure: Up to 600 PSI', 'Oil & Gas industry, Water treatment', 'active'),
('Engine Mount Bracket', 'Custom engine mount bracket for automotive and marine applications.', 3, 'Material: Aluminum Alloy\nWeight: 2.5kg\nCoating: Anodized', 'Automotive, Marine engines', 'active'),
('Pump Housing', 'High-pressure pump housing with integrated mounting features.', 4, 'Material: Cast Iron\nFlow Rate: 100 LPM\nMax Pressure: 250 Bar', 'Industrial pumps, Hydraulic systems', 'active');

-- Insert default settings if not exists
INSERT IGNORE INTO settings (setting_key, setting_value) VALUES
('meta_description', 'Leading precision machining company specializing in CNC machining, hydraulic components, and custom engineering solutions.'),
('meta_keywords', 'precision machining, CNC machining, hydraulic components, automotive parts, engineering solutions'),
('social_facebook', 'https://facebook.com/precisionindustries'),
('social_twitter', 'https://twitter.com/precisionind'),
('social_linkedin', 'https://linkedin.com/company/precision-industries'),
('working_hours', 'Monday - Friday: 9:00 AM - 6:00 PM, Saturday: 9:00 AM - 2:00 PM'),
('quality_certifications', 'ISO 9001:2015, ISO 14001, ISO 45001, CE Marking'),
('emergency_phone', '+91 98765 43211'),
('whatsapp_number', '+919876543210');

-- Insert sample gallery images
INSERT INTO gallery (title, image, type, status) VALUES
('CNC Machining Center', 'cnc-machine-1.jpg', 'facility', 'active'),
('Quality Control Lab', 'quality-lab.jpg', 'facility', 'active'),
('Finished Products', 'products-display.jpg', 'product', 'active'),
('Manufacturing Floor', 'manufacturing-floor.jpg', 'facility', 'active'),
('Precision Measurement', 'measurement-tools.jpg', 'process', 'active');

-- Create indexes for better performance
CREATE INDEX idx_products_category ON products(category_id);
CREATE INDEX idx_products_status ON products(status);
CREATE INDEX idx_contact_submissions_status ON contact_submissions(status);
CREATE INDEX idx_contact_submissions_created ON contact_submissions(created_at);

-- Create view for product listing with category
CREATE OR REPLACE VIEW product_list_view AS
SELECT 
    p.id,
    p.name,
    p.description,
    p.image,
    p.specifications,
    p.applications,
    p.status,
    p.created_at,
    p.updated_at,
    c.name as category_name,
    c.slug as category_slug
FROM products p
LEFT JOIN categories c ON p.category_id = c.id
WHERE p.status = 'active'
ORDER BY p.created_at DESC;