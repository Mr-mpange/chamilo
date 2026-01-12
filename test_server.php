<?php
echo "<h1>🎉 Chamilo Server Test</h1>";
echo "<p><strong>Status:</strong> PHP Development Server is running!</p>";
echo "<p><strong>PHP Version:</strong> " . PHP_VERSION . "</p>";
echo "<p><strong>Server Time:</strong> " . date('Y-m-d H:i:s') . "</p>";

echo "<h2>📋 Quick Links</h2>";
echo "<ul>";
echo "<li><a href='/'>Main Chamilo Site</a></li>";
echo "<li><a href='/simple_test.php'>System Test Page</a></li>";
echo "<li><a href='/main/install/index.php'>Chamilo Installer</a></li>";
echo "<li><a href='/SETUP_GUIDE.md'>Setup Guide</a></li>";
echo "</ul>";

echo "<h2>🔧 Next Steps</h2>";
echo "<ol>";
echo "<li>Install MySQL/MariaDB (XAMPP recommended)</li>";
echo "<li>Create database 'chamilo_db'</li>";
echo "<li>Run the Chamilo installer</li>";
echo "<li>Start using your LMS!</li>";
echo "</ol>";

echo "<h2>📊 System Status</h2>";
$checks = [
    'PHP Extensions' => [
        'gd' => extension_loaded('gd'),
        'intl' => extension_loaded('intl'),
        'zip' => extension_loaded('zip'),
        'fileinfo' => extension_loaded('fileinfo'),
        'mbstring' => extension_loaded('mbstring'),
        'curl' => extension_loaded('curl'),
    ],
    'Directories' => [
        'main' => is_dir('main'),
        'app' => is_dir('app'),
        'src' => is_dir('src'),
        'vendor' => is_dir('vendor'),
        'web' => is_dir('web'),
    ],
    'Files' => [
        'configuration.php' => file_exists('app/config/configuration.php'),
        'autoload.php' => file_exists('vendor/autoload.php'),
        'index.php' => file_exists('index.php'),
    ]
];

foreach ($checks as $category => $items) {
    echo "<h3>$category</h3><ul>";
    foreach ($items as $name => $status) {
        $icon = $status ? '✅' : '❌';
        echo "<li>$icon $name</li>";
    }
    echo "</ul>";
}
?>