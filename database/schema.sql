-- Create Database
CREATE DATABASE IF NOT EXISTS mechanical_industry;
USE mechanical_industry;

-- Products Table
CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    category_id INT,
    image VARCHAR(255),
    specifications TEXT,
    applications TEXT,
    status ENUM('active', 'inactive') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Categories Table
CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    slug VARCHAR(255) UNIQUE,
    status ENUM('active', 'inactive') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Services Table
CREATE TABLE services (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    icon VARCHAR(100),
    image VARCHAR(255),
    status ENUM('active', 'inactive') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Industries Table
CREATE TABLE industries (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    icon VARCHAR(100),
    status ENUM('active', 'inactive') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Gallery Table
CREATE TABLE gallery (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    image VARCHAR(255) NOT NULL,
    type ENUM('product', 'facility', 'process') DEFAULT 'product',
    status ENUM('active', 'inactive') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Admin Users Table
CREATE TABLE admin_users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'editor') DEFAULT 'admin',
    status ENUM('active', 'inactive') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Company Settings Table
CREATE TABLE settings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    setting_key VARCHAR(100) UNIQUE NOT NULL,
    setting_value TEXT,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Insert Default Categories
INSERT INTO categories (name, description, slug) VALUES
('CNC Machining Parts', 'Precision CNC machined components', 'cnc-machining-parts'),
('Hydraulic Components', 'Hydraulic system components and parts', 'hydraulic-components'),
('Automotive Parts', 'Automotive industry precision parts', 'automotive-parts'),
('General Engineering', 'General engineering components', 'general-engineering'),
('Valve Components', 'Various valve components and assemblies', 'valve-components');

-- Insert Default Industries
INSERT INTO industries (name, description, icon) VALUES
('Agriculture', 'Agricultural machinery and equipment', 'fas fa-tractor'),
('Automotive', 'Automotive industry components', 'fas fa-car'),
('Fire Fighting', 'Fire safety and fighting equipment', 'fas fa-fire-extinguisher'),
('General Engineering', 'General engineering solutions', 'fas fa-cogs'),
('Hydraulic System', 'Hydraulic system components', 'fas fa-tools'),
('Medical Equipment', 'Medical device components', 'fas fa-stethoscope'),
('Oil & Gas', 'Oil and gas industry equipment', 'fas fa-oil-well'),
('Pumps', 'Various pump components', 'fas fa-pump-soap'),
('Railway', 'Railway system components', 'fas fa-train'),
('Textile Machinery', 'Textile industry machinery', 'fas fa-industry'),
('Valve', 'Industrial valve systems', 'fas fa-valve'),
('Wind Energy', 'Wind energy system components', 'fas fa-wind');

-- Insert Default Services
INSERT INTO services (title, description, icon) VALUES
('Precision CNC Machining', 'High-precision CNC machining services for complex components with tight tolerances.', 'fas fa-cog'),
('Quality Testing & Inspection', 'Comprehensive quality control and testing procedures to ensure product excellence.', 'fas fa-search'),
('Raw Material Processing', 'Processing of various raw materials including bar stock, forgings, and castings.', 'fas fa-hammer'),
('Product Development', 'Custom product development and engineering design services.', 'fas fa-drafting-compass');

-- Insert Default Admin User (password: admin123)
INSERT INTO admin_users (username, email, password) VALUES
('admin', 'admin@company.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi');

-- Insert Default Settings
INSERT INTO settings (setting_key, setting_value) VALUES
('company_name', 'Precision Industries'),
('company_tagline', 'Excellence in Precision Machining'),
('company_email', 'info@precisionindustries.com'),
('company_phone', '+91 98765 43210'),
('company_address', '123 Industrial Area, Manufacturing Hub, India'),
('about_company', 'We are a leading manufacturer of precision machined components serving various industries with excellence and quality.'),
('years_experience', '15'),
('team_members', '50'),
('clients_served', '200'),
('products_delivered', '1000');