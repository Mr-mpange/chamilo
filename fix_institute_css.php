<?php
/**
 * Institute of Accountancy Arusha - CSS Fix Script
 * This script fixes CSS loading issues and applies Institute branding
 */

echo "<h1>Institute of Accountancy Arusha - CSS Fix</h1>\n";

// Step 1: Verify asset structure
echo "<h2>Step 1: Checking Asset Structure</h2>\n";

$requiredDirs = [
    'web/css',
    'web/css/themes',
    'web/css/themes/institute_arusha',
    'web/assets',
    'web/assets/bootstrap/dist/css'
];

foreach ($requiredDirs as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
        echo "Created directory: $dir<br>\n";
    } else {
        echo "Directory exists: $dir<br>\n";
    }
}

// Step 2: Copy Bootstrap CSS if missing
echo "<h2>Step 2: Ensuring Bootstrap CSS</h2>\n";
$bootstrapSource = 'app/Resources/public/assets/bootstrap/dist/css/bootstrap.min.css';
$bootstrapTarget = 'web/assets/bootstrap/dist/css/bootstrap.min.css';

if (file_exists($bootstrapSource) && !file_exists($bootstrapTarget)) {
    if (!is_dir(dirname($bootstrapTarget))) {
        mkdir(dirname($bootstrapTarget), 0755, true);
    }
    copy($bootstrapSource, $bootstrapTarget);
    echo "Copied Bootstrap CSS<br>\n";
} else {
    echo "Bootstrap CSS already exists or source not found<br>\n";
}

// Step 3: Create Institute theme configuration
echo "<h2>Step 3: Creating Institute Theme Configuration</h2>\n";

$themeConfig = '<?php
/**
 * Institute of Accountancy Arusha Theme Configuration
 */
$theme_name = "Institute of Accountancy Arusha";
$theme_author = "Chamilo Team";
$theme_version = "1.0";
$theme_screenshot = "screenshot.png";
$theme_description = "Professional theme for Institute of Accountancy Arusha with blue and gold branding";
';

file_put_contents('web/css/themes/institute_arusha/theme.conf.php', $themeConfig);
echo "Created theme configuration<br>\n";

// Step 4: Inject CSS directly into base.css if not already there
echo "<h2>Step 4: Applying Institute CSS</h2>\n";

$baseCssPath = 'web/css/base.css';
if (file_exists($baseCssPath)) {
    $baseCssContent = file_get_contents($baseCssPath);
    
    // Check if Institute CSS is already added
    if (strpos($baseCssContent, 'Institute of Accountancy Arusha') === false) {
        $instituteCss = '

/* ========================================
   INSTITUTE OF ACCOUNTANCY ARUSHA THEME
   ======================================== */

/* Primary Colors */
:root {
    --iaa-primary: #1e3a8a !important;
    --iaa-secondary: #f59e0b !important;
    --iaa-accent: #059669 !important;
}

/* Body and General Styling */
body {
    font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif !important;
    background-color: #f8fafc !important;
}

/* Header and Navigation */
.navbar, .navbar-default {
    background: linear-gradient(135deg, #1e3a8a 0%, #f59e0b 100%) !important;
    border-bottom: 3px solid #f59e0b !important;
    border-radius: 0 !important;
}

.navbar-brand {
    color: white !important;
    font-weight: bold !important;
    font-size: 20px !important;
}

.navbar-nav > li > a {
    color: rgba(255,255,255,0.9) !important;
}

.navbar-nav > li > a:hover,
.navbar-nav > li > a:focus {
    color: #f59e0b !important;
    background-color: rgba(255,255,255,0.1) !important;
}

/* Buttons */
.btn-primary {
    background-color: #1e3a8a !important;
    border-color: #1e3a8a !important;
}

.btn-primary:hover,
.btn-primary:focus {
    background-color: #f59e0b !important;
    border-color: #f59e0b !important;
    color: #1f2937 !important;
}

.btn-success {
    background-color: #059669 !important;
    border-color: #059669 !important;
}

/* Panels and Cards */
.panel-heading,
.card-header {
    background: linear-gradient(135deg, #1e3a8a 0%, #f59e0b 100%) !important;
    color: white !important;
    font-weight: bold !important;
}

.panel-title {
    color: white !important;
}

.panel,
.card {
    border-radius: 8px !important;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1) !important;
}

/* Tables */
.table thead th {
    background-color: #1e3a8a !important;
    color: white !important;
    border: none !important;
}

.table tbody tr:hover {
    background-color: rgba(30, 58, 138, 0.05) !important;
}

/* Forms */
.form-control:focus {
    border-color: #1e3a8a !important;
    box-shadow: 0 0 0 0.2rem rgba(30, 58, 138, 0.25) !important;
}

/* Links */
a {
    color: #1e3a8a !important;
}

a:hover {
    color: #f59e0b !important;
}

/* Progress Bars */
.progress-bar {
    background-color: #f59e0b !important;
}

/* Alerts */
.alert-info {
    background-color: #e0f2fe !important;
    border-color: #1e3a8a !important;
    color: #1e3a8a !important;
}

/* Footer */
#footer,
.footer {
    background-color: #1f2937 !important;
    color: white !important;
}

#footer a,
.footer a {
    color: #f59e0b !important;
}

/* Institute Header */
.institute-header {
    background: linear-gradient(135deg, #1e3a8a 0%, #f59e0b 100%) !important;
    color: white !important;
    padding: 20px !important;
    text-align: center !important;
    margin-bottom: 20px !important;
    border-radius: 8px !important;
}

.institute-title {
    font-size: 32px !important;
    font-weight: bold !important;
    margin: 0 !important;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.3) !important;
}

.institute-subtitle {
    font-size: 18px !important;
    opacity: 0.9 !important;
    margin: 10px 0 0 0 !important;
}

/* Course Items */
.course-item:hover {
    transform: translateY(-3px) !important;
    box-shadow: 0 4px 12px rgba(0,0,0,0.15) !important;
    transition: all 0.3s ease !important;
}

/* Login Page */
.login-wall {
    background: linear-gradient(135deg, #f8fafc 0%, #e0e7ff 100%) !important;
}

/* Responsive Design */
@media (max-width: 768px) {
    .institute-title {
        font-size: 24px !important;
    }
    .institute-subtitle {
        font-size: 16px !important;
    }
    .navbar-brand {
        font-size: 16px !important;
    }
}

/* End Institute of Accountancy Arusha Theme */
';
        
        file_put_contents($baseCssPath, $baseCssContent . $instituteCss);
        echo "Added Institute CSS to base.css<br>\n";
    } else {
        echo "Institute CSS already exists in base.css<br>\n";
    }
} else {
    echo "base.css not found<br>\n";
}

// Step 5: Create a header injection file
echo "<h2>Step 5: Creating Header Injection</h2>\n";

$headerInjection = '<!-- Institute of Accountancy Arusha Header -->
<div class="institute-header">
    <h1 class="institute-title">Institute of Accountancy Arusha</h1>
    <p class="institute-subtitle">Professional E-Learning Platform</p>
</div>
<style>
/* Additional Institute Styling */
.institute-header {
    background: linear-gradient(135deg, #1e3a8a 0%, #f59e0b 100%);
    color: white;
    padding: 20px;
    text-align: center;
    margin-bottom: 20px;
    border-radius: 8px;
}
.institute-title {
    font-size: 32px;
    font-weight: bold;
    margin: 0;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
}
.institute-subtitle {
    font-size: 18px;
    opacity: 0.9;
    margin: 10px 0 0 0;
}
@media (max-width: 768px) {
    .institute-title { font-size: 24px; }
    .institute-subtitle { font-size: 16px; }
}
</style>';

file_put_contents('web/institute_header.html', $headerInjection);
echo "Created header injection file<br>\n";

// Step 6: Create admin instructions
echo "<h2>Step 6: Admin Panel Instructions</h2>\n";
echo "<div style='background: #f0f8ff; padding: 15px; border-left: 4px solid #1e3a8a; margin: 20px 0;'>\n";
echo "<h3>To Complete the Setup:</h3>\n";
echo "<ol>\n";
echo "<li><strong>Access Admin Panel:</strong> Go to your Chamilo admin area</li>\n";
echo "<li><strong>Platform Settings:</strong> Navigate to Platform → Configuration → Display</li>\n";
echo "<li><strong>Set Theme:</strong> Change theme to 'institute_arusha' if available</li>\n";
echo "<li><strong>Custom CSS:</strong> Or add the Institute CSS to the 'Extra CSS' field</li>\n";
echo "<li><strong>Header Injection:</strong> Add the header HTML to 'Extra HTML' field</li>\n";
echo "<li><strong>Clear Cache:</strong> Clear Chamilo cache and refresh browser</li>\n";
echo "</ol>\n";
echo "</div>\n";

echo "<h2>✅ CSS Fix Complete!</h2>\n";
echo "<p>The Institute of Accountancy Arusha styling has been applied. Test the styling by visiting: <a href='test_css_fix.php'>test_css_fix.php</a></p>\n";
?>