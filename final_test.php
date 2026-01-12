<?php
echo "<h1>🎯 Final Chamilo Installation Test</h1>";

$allGood = true;

// Test 1: Configuration
echo "<h2>1. Configuration Test</h2>";
if (file_exists('app/config/configuration.php')) {
    require_once 'app/config/configuration.php';
    echo "<p>✅ Configuration loaded successfully</p>";
    echo "<p>📋 System Version: " . $_configuration['system_version'] . " (bypasses installation check)</p>";
    echo "<p>🔗 Database: " . $_configuration['main_database'] . "</p>";
    echo "<p>🌐 Web URL: " . $_configuration['root_web'] . "</p>";
} else {
    echo "<p>❌ Configuration file missing</p>";
    $allGood = false;
}

// Test 2: Database Connection
echo "<h2>2. Database Connection Test</h2>";
try {
    $dsn = "mysql:host={$_configuration['db_host']};port={$_configuration['db_port']};dbname={$_configuration['main_database']};charset=utf8";
    $pdo = new PDO($dsn, $_configuration['db_user'], $_configuration['db_password']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $stmt = $pdo->query("SELECT COUNT(*) as table_count FROM information_schema.tables WHERE table_schema = '{$_configuration['main_database']}'");
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
    echo "<p>✅ Database connection successful</p>";
    echo "<p>📊 Tables in database: " . $result['table_count'] . " (should be 0 for fresh install)</p>";
} catch (PDOException $e) {
    echo "<p>❌ Database connection failed: " . $e->getMessage() . "</p>";
    $allGood = false;
}

// Test 3: Required Extensions
echo "<h2>3. PHP Extensions Test</h2>";
$required_extensions = ['pdo_mysql', 'gd', 'intl', 'zip', 'fileinfo', 'mbstring', 'curl', 'openssl', 'json', 'xml'];
foreach ($required_extensions as $ext) {
    if (extension_loaded($ext)) {
        echo "<p>✅ $ext extension loaded</p>";
    } else {
        echo "<p>❌ $ext extension missing</p>";
        $allGood = false;
    }
}

// Test 4: Directory Permissions
echo "<h2>4. Directory Permissions Test</h2>";
$directories = ['app/cache', 'app/logs', 'app/courses', 'app/home', 'web'];
foreach ($directories as $dir) {
    if (is_dir($dir) && is_writable($dir)) {
        echo "<p>✅ $dir is writable</p>";
    } else {
        echo "<p>❌ $dir is not writable or doesn't exist</p>";
        $allGood = false;
    }
}

// Test 5: Installer Access
echo "<h2>5. Installer Access Test</h2>";
if (file_exists('main/install/index.php')) {
    echo "<p>✅ Installer file exists</p>";
} else {
    echo "<p>❌ Installer file missing</p>";
    $allGood = false;
}

// Test 6: Logo File
echo "<h2>6. Assets Test</h2>";
if (file_exists('web/css/themes/chamilo/images/header-logo.png')) {
    echo "<p>✅ Header logo file exists</p>";
} else {
    echo "<p>⚠️ Header logo file missing (may cause visual issues)</p>";
}

// Final Result
echo "<h2>🎯 Final Result</h2>";
if ($allGood) {
    echo "<div style='background: #d4edda; border: 1px solid #c3e6cb; padding: 15px; border-radius: 5px; color: #155724;'>";
    echo "<h3>🎉 SUCCESS! Your Chamilo installation is ready!</h3>";
    echo "<p><strong>Next step:</strong> Open your browser and go to:</p>";
    echo "<p><a href='http://localhost:8000/main/install/index.php' style='font-size: 18px; font-weight: bold;'>http://localhost:8000/main/install/index.php</a></p>";
    echo "<p>The installation wizard will guide you through the final setup steps.</p>";
    echo "</div>";
} else {
    echo "<div style='background: #f8d7da; border: 1px solid #f5c6cb; padding: 15px; border-radius: 5px; color: #721c24;'>";
    echo "<h3>❌ Issues Found</h3>";
    echo "<p>Please fix the issues above before proceeding with installation.</p>";
    echo "</div>";
}

echo "<h2>📋 Quick Links</h2>";
echo "<ul>";
echo "<li><a href='/main/install/index.php'>🚀 Start Installation</a></li>";
echo "<li><a href='/test_db.php'>🔌 Database Test</a></li>";
echo "<li><a href='/'>🏠 Home Page</a></li>";
echo "</ul>";
?>