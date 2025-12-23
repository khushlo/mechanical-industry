<?php
session_start();

// Configuration
define('BASE_URL', 'http://localhost/yogesh-website');
define('UPLOAD_PATH', 'assets/uploads/');
define('MAX_FILE_SIZE', 5 * 1024 * 1024); // 5MB

// Database connection
require_once 'config/database.php';
$db = new Database();

// Helper Functions
function redirect($url) {
    header("Location: " . $url);
    exit();
}

function sanitize($data) {
    return htmlspecialchars(strip_tags(trim($data)));
}

function uploadImage($file, $directory = 'products/') {
    if (!isset($file) || $file['error'] != 0) {
        return false;
    }

    $allowed_types = ['image/jpeg', 'image/jpg', 'image/png', 'image/webp'];
    if (!in_array($file['type'], $allowed_types)) {
        return false;
    }

    if ($file['size'] > MAX_FILE_SIZE) {
        return false;
    }

    $upload_dir = UPLOAD_PATH . $directory;
    if (!file_exists($upload_dir)) {
        mkdir($upload_dir, 0755, true);
    }

    $file_extension = pathinfo($file['name'], PATHINFO_EXTENSION);
    $new_filename = uniqid() . '.' . $file_extension;
    $upload_path = $upload_dir . $new_filename;

    if (move_uploaded_file($file['tmp_name'], $upload_path)) {
        return $directory . $new_filename;
    }

    return false;
}

function getSetting($key, $default = '') {
    global $db;
    $result = $db->query("SELECT setting_value FROM settings WHERE setting_key = ?", [$key]);
    if ($result && $row = $result->fetch()) {
        return $row['setting_value'];
    }
    return $default;
}

function isAdmin() {
    return isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true;
}

function requireAdmin() {
    if (!isAdmin()) {
        redirect('admin/login.php');
    }
}

// Get company information
function getCompanyInfo() {
    return [
        'name' => getSetting('company_name', 'Precision Industries'),
        'tagline' => getSetting('company_tagline', 'Excellence in Precision Machining'),
        'email' => getSetting('company_email', 'info@company.com'),
        'phone' => getSetting('company_phone', '+91 98765 43210'),
        'address' => getSetting('company_address', '123 Industrial Area, India'),
        'about' => getSetting('about_company', 'Leading precision machining company.'),
        'years_experience' => getSetting('years_experience', '10'),
        'team_members' => getSetting('team_members', '25'),
        'clients_served' => getSetting('clients_served', '100'),
        'products_delivered' => getSetting('products_delivered', '500')
    ];
}

// Error handling
function handleError($message) {
    error_log($message);
    // In production, don't show detailed errors
    if ($_ENV['APP_ENV'] === 'production') {
        die('An error occurred. Please try again later.');
    } else {
        die($message);
    }
}
?>