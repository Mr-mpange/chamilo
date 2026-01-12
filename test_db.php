<?php
echo "<h1>🔌 Database Connection Test</h1>";

// Include Chamilo configuration
require_once 'app/config/configuration.php';

echo "<h2>📋 Configuration</h2>";
echo "<p><strong>Host:</strong> " . $_configuration['db_host'] . "</p>";
echo "<p><strong>Database:</strong> " . $_configuration['main_database'] . "</p>";
echo "<p><strong>User:</strong> " . $_configuration['db_user'] . "</p>";
echo "<p><strong>Root Web:</strong> " . $_configuration['root_web'] . "</p>";
echo "<p><strong>Root Sys:</strong> " . $_configuration['root_sys'] . "</p>";

echo "<h2>🔗 Database Connection Test</h2>";

try {
    $dsn = "mysql:host={$_configuration['db_host']};port={$_configuration['db_port']};dbname={$_configuration['main_database']};charset=utf8";
    $pdo = new PDO($dsn, $_configuration['db_user'], $_configuration['db_password']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "<p>✅ <strong>Database connection successful!</strong></p>";
    
    // Test query
    $stmt = $pdo->query("SELECT DATABASE() as current_db, VERSION() as mysql_version");
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
    echo "<p>📊 <strong>Current Database:</strong> " . $result['current_db'] . "</p>";
    echo "<p>🗄️ <strong>MySQL Version:</strong> " . $result['mysql_version'] . "</p>";
    
    // Check if tables exist
    $stmt = $pdo->query("SHOW TABLES");
    $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);
    
    if (count($tables) > 0) {
        echo "<p>📋 <strong>Tables found:</strong> " . count($tables) . " tables</p>";
        echo "<p>🎉 <strong>Chamilo is already installed!</strong></p>";
    } else {
        echo "<p>📋 <strong>Tables:</strong> No tables found - ready for installation</p>";
        echo "<p>🚀 <strong>Ready for Chamilo installation!</strong></p>";
    }
    
} catch (PDOException $e) {
    echo "<p>❌ <strong>Database connection failed:</strong> " . $e->getMessage() . "</p>";
    echo "<p>💡 <strong>Make sure XAMPP MySQL is running!</strong></p>";
}

echo "<h2>🔧 System Requirements Check</h2>";

$requirements = [
    'PHP Version >= 7.4' => version_compare(PHP_VERSION, '7.4.0', '>='),
    'MySQL Extension' => extension_loaded('pdo_mysql'),
    'GD Extension' => extension_loaded('gd'),
    'Intl Extension' => extension_loaded('intl'),
    'Zip Extension' => extension_loaded('zip'),
    'FileInfo Extension' => extension_loaded('fileinfo'),
    'MBString Extension' => extension_loaded('mbstring'),
    'Curl Extension' => extension_loaded('curl'),
    'OpenSSL Extension' => extension_loaded('openssl'),
    'JSON Extension' => extension_loaded('json'),
    'XML Extension' => extension_loaded('xml'),
];

foreach ($requirements as $requirement => $status) {
    $icon = $status ? '✅' : '❌';
    echo "<p>$icon <strong>$requirement</strong></p>";
}

echo "<h2>📁 Directory Permissions</h2>";

$directories = [
    'app/cache' => 'app/cache',
    'app/logs' => 'app/logs',
    'app/courses' => 'app/courses',
    'app/home' => 'app/home',
    'main/default_course_document/images' => 'main/default_course_document/images',
    'main/lang' => 'main/lang',
    'web' => 'web'
];

foreach ($directories as $name => $path) {
    $exists = is_dir($path);
    $writable = $exists ? is_writable($path) : false;
    
    if ($exists && $writable) {
        echo "<p>✅ <strong>$name:</strong> Exists and writable</p>";
    } elseif ($exists) {
        echo "<p>⚠️ <strong>$name:</strong> Exists but not writable</p>";
    } else {
        echo "<p>❌ <strong>$name:</strong> Does not exist</p>";
    }
}

echo "<h2>🚀 Next Steps</h2>";
echo "<ol>";
echo "<li><strong>Start XAMPP MySQL</strong> (if not running)</li>";
echo "<li><strong>Visit installer:</strong> <a href='/main/install/index.php'>http://localhost:8000/main/install/index.php</a></li>";
echo "<li><strong>Follow installation wizard</strong></li>";
echo "<li><strong>Access your LMS:</strong> <a href='/'>http://localhost:8000</a></li>";
echo "</ol>";
?>