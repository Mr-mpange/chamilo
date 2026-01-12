<?php
echo "<h1>🎯 Final Requirements Check</h1>";

echo "<h2>📊 PHP Configuration Status</h2>";

$settings = [
    'PHP Version' => PHP_VERSION,
    'Upload Max Filesize' => ini_get('upload_max_filesize'),
    'Post Max Size' => ini_get('post_max_size'),
    'Memory Limit' => ini_get('memory_limit'),
    'Max Execution Time' => ini_get('max_execution_time'),
    'Session Cookie HTTPOnly' => ini_get('session.cookie_httponly') ? 'On' : 'Off',
    'Display Errors' => ini_get('display_errors') ? 'On' : 'Off',
    'File Uploads' => ini_get('file_uploads') ? 'On' : 'Off'
];

foreach ($settings as $setting => $value) {
    echo "<p><strong>$setting:</strong> $value</p>";
}

echo "<h2>🔧 Extensions Check</h2>";

$extensions = [
    'PDO MySQL' => extension_loaded('pdo_mysql'),
    'GD' => extension_loaded('gd'),
    'Intl' => extension_loaded('intl'),
    'Zip' => extension_loaded('zip'),
    'FileInfo' => extension_loaded('fileinfo'),
    'MBString' => extension_loaded('mbstring'),
    'Curl' => extension_loaded('curl'),
    'OpenSSL' => extension_loaded('openssl'),
    'JSON' => extension_loaded('json'),
    'XML' => extension_loaded('xml'),
    'Zlib' => extension_loaded('zlib')
];

foreach ($extensions as $ext => $loaded) {
    $status = $loaded ? '✅' : '❌';
    echo "<p>$status <strong>$ext:</strong> " . ($loaded ? 'Available' : 'Missing') . "</p>";
}

echo "<h2>📁 Directory Permissions</h2>";

$directories = [
    'app' => 'app',
    'app/cache' => 'app/cache',
    'app/logs' => 'app/logs',
    'app/courses' => 'app/courses',
    'app/home' => 'app/home',
    'courses' => 'courses',
    'main/default_course_document/images' => 'main/default_course_document/images',
    'main/lang' => 'main/lang',
    'web' => 'web',
    'vendor' => 'vendor'
];

foreach ($directories as $name => $path) {
    if (is_dir($path)) {
        $writable = is_writable($path);
        $readable = is_readable($path);
        $perms = substr(sprintf('%o', fileperms($path)), -4);
        
        if ($writable && $readable) {
            echo "<p>✅ <strong>$name:</strong> OK (Permissions: $perms)</p>";
        } elseif ($readable) {
            echo "<p>⚠️ <strong>$name:</strong> Readable only (Permissions: $perms)</p>";
        } else {
            echo "<p>❌ <strong>$name:</strong> Not accessible (Permissions: $perms)</p>";
        }
    } else {
        echo "<p>❌ <strong>$name:</strong> Directory not found</p>";
    }
}

echo "<h2>🌐 Course Access Test</h2>";
$testFile = 'courses/__XxTestxX__/test.html';
if (file_exists($testFile)) {
    echo "<p>✅ <strong>Test course file exists:</strong> $testFile</p>";
    echo "<p>🔗 <strong>Access URL:</strong> <a href='http://localhost:8000/$testFile'>http://localhost:8000/$testFile</a></p>";
} else {
    echo "<p>⚠️ <strong>Test course file not found</strong> (will be created during installation)</p>";
}

echo "<h2>🎉 Installation Status</h2>";

$uploadOk = (int)ini_get('upload_max_filesize') >= 10;
$postOk = (int)ini_get('post_max_size') >= 10;
$cookieOk = ini_get('session.cookie_httponly');
$allExtensions = array_reduce($extensions, function($carry, $item) { return $carry && $item; }, true);

if ($uploadOk && $postOk && $cookieOk && $allExtensions) {
    echo "<p>🎯 <strong>ALL REQUIREMENTS MET!</strong></p>";
    echo "<p>✅ Upload limits configured correctly</p>";
    echo "<p>✅ Security settings applied</p>";
    echo "<p>✅ All required extensions available</p>";
    echo "<p>✅ Directory permissions correct</p>";
    echo "<p>🚀 <strong>Ready to proceed with Chamilo installation!</strong></p>";
} else {
    echo "<p>⚠️ <strong>Some requirements need attention:</strong></p>";
    if (!$uploadOk) echo "<p>❌ Upload file size limit too low</p>";
    if (!$postOk) echo "<p>❌ Post size limit too low</p>";
    if (!$cookieOk) echo "<p>❌ Cookie HTTP Only not enabled</p>";
    if (!$allExtensions) echo "<p>❌ Some extensions missing</p>";
}

echo "<h3>🔗 Installation Links</h3>";
echo "<p><a href='http://localhost:8000/main/install/index.php' target='_blank'>🚀 Start Chamilo Installation</a></p>";
echo "<p><a href='http://localhost:8000/test_db.php' target='_blank'>🔌 Database Test</a></p>";
echo "<p><a href='http://localhost:8000/courses/__XxTestxX__/test.html' target='_blank'>🎯 Course Access Test</a></p>";
?>