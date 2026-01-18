<?php
// Bootstrap file to suppress deprecation warnings before any libraries load
error_reporting(E_ALL & ~E_DEPRECATED & ~E_NOTICE);
ini_set('display_errors', '0');
ini_set('display_startup_errors', '0');

// Get the requested URI
$uri = $_SERVER['REQUEST_URI'];
$path = parse_url($uri, PHP_URL_PATH);

// Handle static files - let PHP serve them directly
if (preg_match('/\.(css|js|png|jpg|jpeg|gif|ico|svg|woff|woff2|ttf|eot|map)$/i', $path)) {
    $filePath = __DIR__ . $path;
    if (file_exists($filePath)) {
        // Set appropriate content type
        $extension = strtolower(pathinfo($path, PATHINFO_EXTENSION));
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
            case 'svg':
                header('Content-Type: image/svg+xml');
                break;
            case 'woff':
                header('Content-Type: font/woff');
                break;
            case 'woff2':
                header('Content-Type: font/woff2');
                break;
            case 'ttf':
                header('Content-Type: font/ttf');
                break;
            case 'eot':
                header('Content-Type: application/vnd.ms-fontobject');
                break;
        }
        return false; // Let PHP serve the file directly
    }
}

// For root requests, load index.php
if ($path === '/') {
    require_once __DIR__ . '/index.php';
    return;
}

// For other PHP files, include them if they exist
$filePath = __DIR__ . $path;
if (file_exists($filePath) && pathinfo($path, PATHINFO_EXTENSION) === 'php') {
    require_once $filePath;
    return;
}

// For other existing files, let PHP handle them
if (file_exists(__DIR__ . $path)) {
    return false;
}

// 404 for non-existent files
http_response_code(404);
echo "File not found: " . htmlspecialchars($path);