<?php
// Bootstrap file for PHP development server
// Suppress deprecation warnings for better development experience
error_reporting(E_ALL & ~E_DEPRECATED & ~E_STRICT);
ini_set('display_errors', 0);

// Get the requested URI
$uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

// Remove query parameters for file checking
$filePath = __DIR__ . $uri;

// If it's a static file (CSS, JS, images, etc.) that exists, serve it directly
if ($uri !== '/' && file_exists($filePath)) {
    $extension = pathinfo($uri, PATHINFO_EXTENSION);
    
    // Set appropriate content type for static files
    switch ($extension) {
        case 'css':
            header('Content-Type: text/css');
            break;
        case 'js':
            header('Content-Type: application/javascript');
            break;
        case 'png':
            header('Content-Type: image/png');
            break;
        case 'jpg':
        case 'jpeg':
            header('Content-Type: image/jpeg');
            break;
        case 'gif':
            header('Content-Type: image/gif');
            break;
        case 'ico':
            header('Content-Type: image/x-icon');
            break;
    }
    
    return false; // Let PHP serve the file directly
}

// For PHP files, include them
if (file_exists($filePath) && pathinfo($uri, PATHINFO_EXTENSION) === 'php') {
    include $filePath;
    return;
}

// Default to index.php for root requests
if ($uri === '/') {
    include __DIR__ . '/index.php';
    return;
}

// Return 404 for non-existent files
http_response_code(404);
echo "File not found: " . htmlspecialchars($uri);