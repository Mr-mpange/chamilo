<?php
echo "<h1>🚀 Chamilo Installer Test</h1>";

// Test if installer is accessible
$installerPath = 'main/install/index.php';
if (file_exists($installerPath)) {
    echo "<p>✅ <strong>Installer file exists:</strong> $installerPath</p>";
} else {
    echo "<p>❌ <strong>Installer file missing:</strong> $installerPath</p>";
}

// Test configuration
require_once 'app/config/configuration.php';
echo "<p>📋 <strong>System Version:</strong> " . $_configuration['system_version'] . "</p>";
echo "<p>🔗 <strong>Root Web:</strong> " . $_configuration['root_web'] . "</p>";

// Test if installation is blocked
require_once 'main/install/install.lib.php';
require_once 'main/install/version.php';

if (function_exists('isAlreadyInstalledSystem')) {
    $isBlocked = isAlreadyInstalledSystem();
    if ($isBlocked) {
        echo "<p>❌ <strong>Installation blocked:</strong> System appears already installed</p>";
        echo "<p>💡 <strong>Current version:</strong> " . $_configuration['system_version'] . "</p>";
        echo "<p>💡 <strong>New version:</strong> " . $new_version . "</p>";
    } else {
        echo "<p>✅ <strong>Installation allowed:</strong> Ready to proceed</p>";
        echo "<p>🎉 <strong>You can now access the installer at:</strong> <a href='/main/install/index.php'>http://localhost:8000/main/install/index.php</a></p>";
    }
} else {
    echo "<p>⚠️ <strong>Cannot test installation status</strong></p>";
}

echo "<h2>🔗 Quick Links</h2>";
echo "<ul>";
echo "<li><a href='/main/install/index.php'>🚀 Start Installation</a></li>";
echo "<li><a href='/test_db.php'>🔌 Test Database</a></li>";
echo "<li><a href='/'>🏠 Home Page</a></li>";
echo "</ul>";
?>