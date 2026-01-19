<?php
/**
 * PHP Configuration Fix Script for Chamilo
 * This script helps apply the required PHP settings for Chamilo LMS
 */

echo "<h1>🔧 PHP Configuration Fix</h1>";

// Check if we can modify settings at runtime
echo "<h2>📋 Current Settings vs Required</h2>";

$requirements = [
    'upload_max_filesize' => ['current' => ini_get('upload_max_filesize'), 'required' => '10M'],
    'post_max_size' => ['current' => ini_get('post_max_size'), 'required' => '10M'],
    'memory_limit' => ['current' => ini_get('memory_limit'), 'required' => '128M'],
    'session.cookie_httponly' => ['current' => ini_get('session.cookie_httponly') ? 'On' : 'Off', 'required' => 'On']
];

foreach ($requirements as $setting => $values) {
    $status = '❌';
    if ($setting === 'upload_max_filesize' || $setting === 'post_max_size') {
        $current_bytes = return_bytes($values['current']);
        $required_bytes = return_bytes($values['required']);
        if ($current_bytes >= $required_bytes) $status = '✅';
    } elseif ($setting === 'memory_limit') {
        $current_bytes = return_bytes($values['current']);
        $required_bytes = return_bytes($values['required']);
        if ($current_bytes >= $required_bytes) $status = '✅';
    } elseif ($setting === 'session.cookie_httponly') {
        if ($values['current'] === $values['required']) $status = '✅';
    }
    
    echo "<p>$status <strong>$setting:</strong> {$values['current']} (Required: {$values['required']})</p>";
}

echo "<h2>🛠️ Solutions</h2>";

echo "<h3>Option 1: Using .htaccess (Apache)</h3>";
echo "<p>Add these lines to your .htaccess file:</p>";
echo "<pre>";
echo "php_value upload_max_filesize 20M\n";
echo "php_value post_max_size 20M\n";
echo "php_value memory_limit 256M\n";
echo "php_value session.cookie_httponly 1\n";
echo "</pre>";

echo "<h3>Option 2: Using php.ini</h3>";
echo "<p>Add these lines to your php.ini file:</p>";
echo "<pre>";
echo "upload_max_filesize = 20M\n";
echo "post_max_size = 20M\n";
echo "memory_limit = 256M\n";
echo "session.cookie_httponly = On\n";
echo "</pre>";

echo "<h3>Option 3: Development Server with Custom INI</h3>";
echo "<p>Start PHP development server with custom configuration:</p>";
echo "<pre>php -S localhost:8000 -c php_config_fix.ini server.php</pre>";

echo "<h3>Option 4: Runtime Configuration (Limited)</h3>";
echo "<p>Some settings can be changed at runtime:</p>";

// Try to set what we can at runtime
$runtime_changes = [];

if (ini_set('memory_limit', '256M')) {
    $runtime_changes[] = "✅ memory_limit set to 256M";
} else {
    $runtime_changes[] = "❌ memory_limit cannot be changed at runtime";
}

if (ini_set('session.cookie_httponly', '1')) {
    $runtime_changes[] = "✅ session.cookie_httponly enabled";
} else {
    $runtime_changes[] = "❌ session.cookie_httponly cannot be changed at runtime";
}

// These cannot be changed at runtime
$runtime_changes[] = "❌ upload_max_filesize cannot be changed at runtime";
$runtime_changes[] = "❌ post_max_size cannot be changed at runtime";

foreach ($runtime_changes as $change) {
    echo "<p>$change</p>";
}

echo "<h2>🎯 Recommended Action</h2>";
echo "<p><strong>For Development:</strong> Use the custom INI file with the development server</p>";
echo "<p><strong>For Production:</strong> Modify your server's php.ini or use .htaccess</p>";

echo "<h3>🔗 Quick Links</h3>";
echo "<p><a href='test_final_requirements.php'>🔄 Re-run Requirements Check</a></p>";
echo "<p><a href='main/install/index.php'>🚀 Continue to Installation</a></p>";

function return_bytes($val) {
    $val = trim($val);
    $last = strtolower($val[strlen($val)-1]);
    $val = (int)$val;
    switch($last) {
        case 'g':
            $val *= 1024;
        case 'm':
            $val *= 1024;
        case 'k':
            $val *= 1024;
    }
    return $val;
}
?>