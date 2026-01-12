<?php
// Test CSS Loading and Institute Theme Application
echo "<!DOCTYPE html>\n";
echo "<html>\n<head>\n";
echo "<title>Institute of Accountancy Arusha - CSS Test</title>\n";
echo "<link rel='stylesheet' href='web/css/base.css'>\n";
echo "<link rel='stylesheet' href='web/assets/bootstrap/dist/css/bootstrap.min.css'>\n";
echo "<style>\n";
echo "/* Test Institute Styling */\n";
echo "body { font-family: 'Segoe UI', sans-serif; background: #f8fafc; }\n";
echo ".test-header { background: linear-gradient(135deg, #1e3a8a 0%, #f59e0b 100%); color: white; padding: 20px; text-align: center; }\n";
echo ".test-card { background: white; border-radius: 8px; padding: 20px; margin: 20px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }\n";
echo ".btn-institute { background-color: #1e3a8a; color: white; padding: 10px 20px; border: none; border-radius: 5px; }\n";
echo ".btn-institute:hover { background-color: #f59e0b; color: #1f2937; }\n";
echo "</style>\n";
echo "</head>\n<body>\n";

echo "<div class='test-header'>\n";
echo "<h1>Institute of Accountancy Arusha</h1>\n";
echo "<p>E-Learning Platform - CSS Test</p>\n";
echo "</div>\n";

echo "<div class='container'>\n";
echo "<div class='test-card'>\n";
echo "<h2>CSS Loading Test</h2>\n";
echo "<p>If you can see this styled properly with blue and gold colors, the CSS is working!</p>\n";
echo "<button class='btn-institute'>Test Button</button>\n";
echo "</div>\n";

// Check if CSS files exist
echo "<div class='test-card'>\n";
echo "<h3>CSS File Status</h3>\n";
$cssFiles = [
    'web/css/base.css' => 'Base CSS (with Institute styling)',
    'web/assets/bootstrap/dist/css/bootstrap.min.css' => 'Bootstrap CSS',
    'web/css/themes/institute_arusha/default.css' => 'Institute Theme CSS'
];

foreach ($cssFiles as $file => $description) {
    if (file_exists($file)) {
        echo "<p style='color: green;'>✓ $description - EXISTS</p>\n";
    } else {
        echo "<p style='color: red;'>✗ $description - MISSING</p>\n";
    }
}
echo "</div>\n";

echo "<div class='test-card'>\n";
echo "<h3>Next Steps</h3>\n";
echo "<ol>\n";
echo "<li>Access Chamilo admin panel</li>\n";
echo "<li>Go to Platform → Configuration → Display</li>\n";
echo "<li>Set theme to 'institute_arusha' or add custom CSS</li>\n";
echo "<li>Clear cache and refresh</li>\n";
echo "</ol>\n";
echo "</div>\n";

echo "</div>\n";
echo "</body>\n</html>";
?>