<?php
/**
 * Quick PHP Settings Test
 * Tests if the required PHP settings are properly configured
 */

echo "<h1>🧪 PHP Settings Test</h1>";

echo "<h2>📊 Current Configuration</h2>";

$tests = [
    'Upload Max Filesize' => [
        'current' => ini_get('upload_max_filesize'),
        'required' => '10M',
        'test' => function($current) { return return_bytes($current) >= return_bytes('10M'); }
    ],
    'Post Max Size' => [
        'current' => ini_get('post_max_size'),
        'required' => '10M', 
        'test' => function($current) { return return_bytes($current) >= return_bytes('10M'); }
    ],
    'Memory Limit' => [
        'current' => ini_get('memory_limit'),
        'required' => '128M',
        'test' => function($current) { return return_bytes($current) >= return_bytes('128M'); }
    ],
    'Session Cookie HTTPOnly' => [
        'current' => ini_get('session.cookie_httponly') ? 'On' : 'Off',
        'required' => 'On',
        'test' => function($current) { return $current === 'On'; }
    ],
    'File Uploads' => [
        'current' => ini_get('file_uploads') ? 'On' : 'Off',
        'required' => 'On',
        'test' => function($current) { return $current === 'On'; }
    ]
];

$all_passed = true;

foreach ($tests as $name => $config) {
    $passed = $config['test']($config['current']);
    $status = $passed ? '✅' : '❌';
    
    if (!$passed) $all_passed = false;
    
    echo "<p>$status <strong>$name:</strong> {$config['current']} (Required: {$config['required']})</p>";
}

echo "<h2>🎯 Overall Status</h2>";

if ($all_passed) {
    echo "<div style='background: #d4edda; border: 1px solid #c3e6cb; padding: 15px; border-radius: 5px;'>";
    echo "<h3 style='color: #155724; margin: 0;'>🎉 All Tests Passed!</h3>";
    echo "<p style='color: #155724; margin: 5px 0 0 0;'>Your PHP configuration meets all Chamilo requirements.</p>";
    echo "</div>";
    
    echo "<h3>🚀 Next Steps</h3>";
    echo "<p><a href='test_final_requirements.php' style='background: #007bff; color: white; padding: 10px 15px; text-decoration: none; border-radius: 5px;'>Run Full Requirements Check</a></p>";
    echo "<p><a href='main/install/index.php' style='background: #28a745; color: white; padding: 10px 15px; text-decoration: none; border-radius: 5px;'>Start Chamilo Installation</a></p>";
} else {
    echo "<div style='background: #f8d7da; border: 1px solid #f5c6cb; padding: 15px; border-radius: 5px;'>";
    echo "<h3 style='color: #721c24; margin: 0;'>⚠️ Configuration Issues Found</h3>";
    echo "<p style='color: #721c24; margin: 5px 0 0 0;'>Some PHP settings need to be adjusted.</p>";
    echo "</div>";
    
    echo "<h3>🔧 Solutions</h3>";
    echo "<p><a href='fix_php_config.php' style='background: #ffc107; color: #212529; padding: 10px 15px; text-decoration: none; border-radius: 5px;'>View Configuration Solutions</a></p>";
}

function return_bytes($val) {
    $val = trim($val);
    if (empty($val)) return 0;
    
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

<style>
body { font-family: Arial, sans-serif; margin: 20px; }
h1 { color: #333; }
h2 { color: #666; border-bottom: 2px solid #eee; padding-bottom: 5px; }
p { margin: 8px 0; }
pre { background: #f8f9fa; padding: 10px; border-radius: 5px; overflow-x: auto; }
a { text-decoration: none; }
a:hover { opacity: 0.8; }
</style>