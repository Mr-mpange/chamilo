<?php
// Test basic Chamilo bootstrap
echo "Testing Chamilo Bootstrap...\n";

// Check if main files exist
$files = [
    'main/inc/global.inc.php',
    'app/config/configuration.php',
    'app/autoload.php'
];

foreach ($files as $file) {
    if (file_exists($file)) {
        echo "✓ $file exists\n";
    } else {
        echo "✗ $file missing\n";
    }
}

// Try to include the autoloader
if (file_exists('app/autoload.php')) {
    echo "\nTrying to load app/autoload.php...\n";
    try {
        require_once 'app/autoload.php';
        echo "✓ app/autoload.php loaded successfully\n";
    } catch (Exception $e) {
        echo "✗ Error loading app/autoload.php: " . $e->getMessage() . "\n";
    }
}

// Try to include global.inc.php
if (file_exists('main/inc/global.inc.php')) {
    echo "\nTrying to load main/inc/global.inc.php...\n";
    try {
        require_once 'main/inc/global.inc.php';
        echo "✓ main/inc/global.inc.php loaded successfully\n";
        echo "✓ Chamilo is working!\n";
    } catch (Exception $e) {
        echo "✗ Error loading main/inc/global.inc.php: " . $e->getMessage() . "\n";
    } catch (Error $e) {
        echo "✗ Fatal error loading main/inc/global.inc.php: " . $e->getMessage() . "\n";
    }
}
?>