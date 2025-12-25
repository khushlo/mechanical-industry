<?php
// Bootstrap file to load environment variables and initialize the application

// Load Composer autoloader
if (file_exists(__DIR__ . '/vendor/autoload.php')) {
    require_once __DIR__ . '/vendor/autoload.php';
    
    // Load environment variables from .env file
    if (class_exists('Dotenv\Dotenv')) {
        $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
        
        // Load .env file if it exists
        if (file_exists(__DIR__ . '/.env')) {
            $dotenv->load();
        }
    }
}

// Initialize database connection
require_once 'config/database.php';
$database = new Database();
$db = $database->getConnection();

// Get company information
require_once 'includes/functions.php';
?>