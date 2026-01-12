<?php
/**
 * Institute of Accountancy Arusha - Header Injection Script
 * This script adds the institute branding to the Chamilo header
 */

echo "<h1>🎨 Apply Institute Branding</h1>";

// Check if we can modify the main template
$template_path = 'main/template/default/layout/layout_1_col.tpl';
$header_template = 'main/template/default/layout/head.tpl';

echo "<h2>📋 Theme Integration Steps</h2>";

echo "<div style='background: #f8f9fa; padding: 20px; border-radius: 8px; margin: 20px 0;'>";
echo "<h3>✅ Files Created:</h3>";
echo "<ul>";
echo "<li>✅ <strong>Custom Theme CSS:</strong> web/css/themes/institute_arusha/default.css</li>";
echo "<li>✅ <strong>Theme Configuration:</strong> web/css/themes/institute_arusha/theme.conf.php</li>";
echo "<li>✅ <strong>Images Directory:</strong> web/css/themes/institute_arusha/images/</li>";
echo "</ul>";
echo "</div>";

echo "<h2>🔧 Manual Integration Required</h2>";
echo "<div style='background: #fff3cd; padding: 20px; border-radius: 8px; margin: 20px 0;'>";
echo "<h3>⚙️ Admin Panel Configuration:</h3>";
echo "<ol>";
echo "<li><strong>Login to Admin Panel:</strong> <a href='http://localhost:8000/main/admin/' target='_blank'>http://localhost:8000/main/admin/</a></li>";
echo "<li><strong>Go to Platform Settings:</strong> Platform → Configuration → Platform</li>";
echo "<li><strong>Change Institution Name:</strong> Set to 'Institute of Accountancy Arusha'</li>";
echo "<li><strong>Go to Display Settings:</strong> Platform → Configuration → Display</li>";
echo "<li><strong>Select Custom Theme:</strong> Choose 'institute_arusha' from theme dropdown</li>";
echo "<li><strong>Save Changes</strong></li>";
echo "</ol>";
echo "</div>";

echo "<h2>🎨 Alternative: Direct CSS Injection</h2>";
echo "<div style='background: #e3f2fd; padding: 20px; border-radius: 8px; margin: 20px 0;'>";
echo "<h3>📝 Quick CSS Application:</h3>";
echo "<p>If the theme selection doesn't work, you can inject CSS directly:</p>";
echo "<ol>";
echo "<li><strong>Admin Panel → Platform → Configuration → Display</strong></li>";
echo "<li><strong>Find 'Extra CSS' or 'Custom CSS' field</strong></li>";
echo "<li><strong>Copy and paste the CSS from institute_theme.css</strong></li>";
echo "<li><strong>Save settings</strong></li>";
echo "</ol>";
echo "</div>";

// Create a simplified CSS injection file
$css_injection = "
/* Institute of Accountancy Arusha - Quick CSS Injection */
body { font-family: 'Segoe UI', sans-serif; }
.navbar { background-color: #1e3a8a !important; }
.btn-primary { background-color: #1e3a8a; border-color: #1e3a8a; }
.btn-primary:hover { background-color: #f59e0b; border-color: #f59e0b; color: #1f2937; }
.panel-heading { background: linear-gradient(135deg, #1e3a8a 0%, #f59e0b 100%); color: white; }
";

echo "<h2>📄 Quick CSS Code</h2>";
echo "<div style='background: #f8f9fa; padding: 20px; border-radius: 8px; margin: 20px 0;'>";
echo "<h3>📋 Copy this CSS to Admin Panel:</h3>";
echo "<textarea style='width: 100%; height: 200px; font-family: monospace; padding: 10px; border: 1px solid #ccc; border-radius: 4px;'>";
echo htmlspecialchars($css_injection);
echo "</textarea>";
echo "<p><strong>Instructions:</strong> Copy the above CSS and paste it in Admin Panel → Platform → Configuration → Display → Extra CSS</p>";
echo "</div>";

echo "<h2>🏢 Institute Header HTML</h2>";
echo "<div style='background: #f3e5f5; padding: 20px; border-radius: 8px; margin: 20px 0;'>";
echo "<h3>📝 Custom Header Code:</h3>";
echo "<p>Add this HTML to display the Institute branding:</p>";
echo "<textarea style='width: 100%; height: 150px; font-family: monospace; padding: 10px; border: 1px solid #ccc; border-radius: 4px;'>";
$header_html = '<div class="institute-branding" style="background: linear-gradient(135deg, #1e3a8a 0%, #f59e0b 100%); color: white; padding: 15px; text-align: center;">
    <h1 class="institute-title" style="margin: 0; font-size: 28px; font-weight: bold;">Institute of Accountancy Arusha</h1>
    <p class="institute-subtitle" style="margin: 5px 0 0 0; font-size: 16px; opacity: 0.9;">E-Learning Platform</p>
</div>';
echo htmlspecialchars($header_html);
echo "</textarea>";
echo "<p><strong>Instructions:</strong> Add this HTML in Admin Panel → Platform → Configuration → Display → Header Extra Content</p>";
echo "</div>";

echo "<h2>🎯 Testing Your Theme</h2>";
echo "<div style='background: #d4edda; padding: 20px; border-radius: 8px; margin: 20px 0;'>";
echo "<h3>✅ Verification Steps:</h3>";
echo "<ol>";
echo "<li><strong>Visit your platform:</strong> <a href='http://localhost:8000/' target='_blank'>http://localhost:8000/</a></li>";
echo "<li><strong>Check for Institute branding</strong> in the header</li>";
echo "<li><strong>Verify blue and gold colors</strong> are applied</li>";
echo "<li><strong>Test responsive design</strong> on different screen sizes</li>";
echo "<li><strong>Check login page styling</strong></li>";
echo "</ol>";
echo "</div>";

echo "<h2>🚀 Complete Integration Guide</h2>";
echo "<div style='background: #cce5ff; padding: 20px; border-radius: 8px; margin: 20px 0;'>";
echo "<h3>📋 Step-by-Step:</h3>";
echo "<ol style='font-size: 16px; line-height: 1.8;'>";
echo "<li><strong>Access Admin Panel:</strong> <a href='http://localhost:8000/main/admin/' target='_blank'>Login as Administrator</a></li>";
echo "<li><strong>Navigate to Display Settings:</strong> Platform → Configuration → Display</li>";
echo "<li><strong>Apply Institute Branding:</strong> Use the CSS and HTML code above</li>";
echo "<li><strong>Set Institution Name:</strong> Platform → Configuration → Platform</li>";
echo "<li><strong>Test the Changes:</strong> Visit the main platform to see the new theme</li>";
echo "</ol>";
echo "</div>";

echo "<div style='background: linear-gradient(135deg, #1e3a8a 0%, #f59e0b 100%); color: white; padding: 30px; border-radius: 12px; margin: 30px 0; text-align: center;'>";
echo "<h2>🎓 Institute of Accountancy Arusha</h2>";
echo "<h3>Theme Integration Ready!</h3>";
echo "<p style='font-size: 18px; margin: 20px 0;'>Your custom theme files are created and ready to apply!</p>";
echo "<p style='margin-top: 30px;'>";
echo "<a href='http://localhost:8000/main/admin/' target='_blank' style='background: white; color: #1e3a8a; padding: 15px 30px; text-decoration: none; border-radius: 8px; font-weight: bold; font-size: 16px; margin: 10px;'>⚙️ Apply Theme in Admin</a>";
echo "</p>";
echo "</div>";
?>