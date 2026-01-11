<?php
// Simple test page for Chamilo
echo "<h1>Chamilo 1.11.32 Test Page</h1>";
echo "<p>PHP Version: " . PHP_VERSION . "</p>";

// Check configuration
if (file_exists('app/config/configuration.php')) {
    echo "<p>✓ Configuration file exists</p>";
    
    // Include configuration
    require_once 'app/config/configuration.php';
    
    echo "<h2>Database Configuration</h2>";
    echo "<p>Host: " . $_configuration['db_host'] . "</p>";
    echo "<p>Database: " . $_configuration['main_database'] . "</p>";
    echo "<p>User: " . $_configuration['db_user'] . "</p>";
    
    echo "<h2>System Configuration</h2>";
    echo "<p>Root Web: " . $_configuration['root_web'] . "</p>";
    echo "<p>Root Sys: " . $_configuration['root_sys'] . "</p>";
    echo "<p>Version: " . $_configuration['system_version'] . "</p>";
} else {
    echo "<p>✗ Configuration file missing</p>";
}

// Check main directories
$dirs = ['main', 'app', 'src', 'web'];
echo "<h2>Directory Check</h2>";
foreach ($dirs as $dir) {
    if (is_dir($dir)) {
        echo "<p>✓ $dir directory exists</p>";
    } else {
        echo "<p>✗ $dir directory missing</p>";
    }
}

// Check PHP extensions
echo "<h2>PHP Extensions</h2>";
$required_extensions = ['curl', 'gd', 'intl', 'zip', 'fileinfo', 'mbstring'];
foreach ($required_extensions as $ext) {
    if (extension_loaded($ext)) {
        echo "<p>✓ $ext extension loaded</p>";
    } else {
        echo "<p>✗ $ext extension missing</p>";
    }
}

echo "<h2>Next Steps</h2>";
echo "<p>1. Install missing PHP extensions</p>";
echo "<p>2. Complete composer installation</p>";
echo "<p>3. Set up database</p>";
echo "<p>4. Run Chamilo installer</p>";
?>