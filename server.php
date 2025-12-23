<?php
// Railway port configuration
$port = $_ENV['PORT'] ?? getenv('PORT') ?? 8080;

// Start PHP built-in server (for Railway deployment)
if (php_sapi_name() === 'cli') {
    echo "Starting server on port {$port}...\n";
    exec("php -S 0.0.0.0:{$port} -t .");
} else {
    // For web server deployments
    $_SERVER['SERVER_PORT'] = $port;
}
?>