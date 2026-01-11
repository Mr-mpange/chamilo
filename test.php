<?php
echo "PHP Version: " . PHP_VERSION . "\n";
echo "Extensions loaded:\n";
foreach (get_loaded_extensions() as $ext) {
    echo "- $ext\n";
}

// Test if main Chamilo files exist
echo "\nChamilo files check:\n";
$files = [
    'main/inc/global.inc.php',
    'app/config/configuration.php',
    'vendor/autoload.php'
];

foreach ($files as $file) {
    echo "- $file: " . (file_exists($file) ? "EXISTS" : "MISSING") . "\n";
}
?>