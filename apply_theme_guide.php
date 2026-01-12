<?php
echo "<h1>🎨 Apply Institute of Accountancy Arusha Theme</h1>";
echo "<h2>Step-by-Step Guide to Apply Your Custom Styling</h2>";

echo "<div style='background: #d4edda; padding: 20px; border-radius: 8px; margin: 20px 0; text-align: center;'>";
echo "<h3>✅ Theme Files Ready!</h3>";
echo "<p>All custom theme files have been created and are ready to apply.</p>";
echo "</div>";

echo "<h2>🚀 Quick Application Method</h2>";
echo "<div style='background: #fff3cd; padding: 20px; border-radius: 8px; margin: 20px 0;'>";
echo "<h3>📋 Follow These Steps:</h3>";
echo "<ol style='font-size: 16px; line-height: 1.8;'>";
echo "<li><strong>Login to Admin Panel:</strong> <a href='http://localhost:8000/main/admin/' target='_blank' style='color: #1e3a8a; font-weight: bold;'>http://localhost:8000/main/admin/</a></li>";
echo "<li><strong>Navigate to:</strong> Platform → Configuration → Display</li>";
echo "<li><strong>Find 'Extra CSS' or 'Custom CSS' field</strong></li>";
echo "<li><strong>Copy CSS from:</strong> <a href='institute_quick_css.css' target='_blank' style='color: #1e3a8a;'>institute_quick_css.css</a></li>";
echo "<li><strong>Paste the CSS</strong> in the Extra CSS field</li>";
echo "<li><strong>Find 'Header Extra Content' field</strong></li>";
echo "<li><strong>Copy HTML from:</strong> <a href='institute_header.html' target='_blank' style='color: #1e3a8a;'>institute_header.html</a></li>";
echo "<li><strong>Paste the HTML</strong> in the Header Extra Content field</li>";
echo "<li><strong>Save Changes</strong></li>";
echo "<li><strong>Visit your platform</strong> to see the new theme!</li>";
echo "</ol>";
echo "</div>";

// Read and display the CSS content
if (file_exists('institute_quick_css.css')) {
    $css_content = file_get_contents('institute_quick_css.css');
    echo "<h2>📄 CSS Code to Copy</h2>";
    echo "<div style='background: #f8f9fa; padding: 20px; border-radius: 8px; margin: 20px 0;'>";
    echo "<h3>📋 Copy this entire CSS code:</h3>";
    echo "<textarea readonly style='width: 100%; height: 300px; font-family: monospace; padding: 10px; border: 1px solid #ccc; border-radius: 4px; font-size: 12px;'>";
    echo htmlspecialchars($css_content);
    echo "</textarea>";
    echo "<p><strong>Instructions:</strong> Select all text above (Ctrl+A), copy (Ctrl+C), then paste in Admin Panel</p>";
    echo "</div>";
}

// Read and display the HTML content
if (file_exists('institute_header.html')) {
    $html_content = file_get_contents('institute_header.html');
    echo "<h2>🏢 Header HTML Code to Copy</h2>";
    echo "<div style='background: #f3e5f5; padding: 20px; border-radius: 8px; margin: 20px 0;'>";
    echo "<h3>📋 Copy this HTML code:</h3>";
    echo "<textarea readonly style='width: 100%; height: 200px; font-family: monospace; padding: 10px; border: 1px solid #ccc; border-radius: 4px; font-size: 12px;'>";
    echo htmlspecialchars($html_content);
    echo "</textarea>";
    echo "<p><strong>Instructions:</strong> Select all text above (Ctrl+A), copy (Ctrl+C), then paste in Header Extra Content field</p>";
    echo "</div>";
}

echo "<h2>🎯 Expected Results</h2>";
echo "<div style='background: #e3f2fd; padding: 20px; border-radius: 8px; margin: 20px 0;'>";
echo "<h3>✅ After applying the theme, you should see:</h3>";
echo "<ul>";
echo "<li>🎨 <strong>Institute Header:</strong> Blue and gold gradient header with institute name</li>";
echo "<li>🔵 <strong>Blue Navigation:</strong> Deep blue navigation bar with gold hover effects</li>";
echo "<li>🟡 <strong>Gold Accents:</strong> Gold buttons and highlights throughout</li>";
echo "<li>📱 <strong>Responsive Design:</strong> Works on mobile and desktop</li>";
echo "<li>🎓 <strong>Professional Look:</strong> Clean, academic appearance</li>";
echo "</ul>";
echo "</div>";

echo "<h2>🔧 Alternative Method: Theme Selection</h2>";
echo "<div style='background: #cce5ff; padding: 20px; border-radius: 8px; margin: 20px 0;'>";
echo "<h3>📋 If theme dropdown is available:</h3>";
echo "<ol>";
echo "<li><strong>Admin Panel → Platform → Configuration → Display</strong></li>";
echo "<li><strong>Look for 'Theme' or 'Visual Theme' dropdown</strong></li>";
echo "<li><strong>Select 'institute_arusha' if available</strong></li>";
echo "<li><strong>Save changes</strong></li>";
echo "</ol>";
echo "<p><strong>Note:</strong> The CSS injection method above is more reliable and immediate.</p>";
echo "</div>";

echo "<h2>🧪 Testing Your Theme</h2>";
echo "<div style='background: #d1ecf1; padding: 20px; border-radius: 8px; margin: 20px 0;'>";
echo "<h3>🔍 Verification Checklist:</h3>";
echo "<ul>";
echo "<li>✅ <strong>Header Branding:</strong> Institute name appears at the top</li>";
echo "<li>✅ <strong>Color Scheme:</strong> Blue and gold colors throughout</li>";
echo "<li>✅ <strong>Navigation:</strong> Blue navigation bar with hover effects</li>";
echo "<li>✅ <strong>Buttons:</strong> Blue primary buttons that turn gold on hover</li>";
echo "<li>✅ <strong>Responsive:</strong> Looks good on mobile devices</li>";
echo "</ul>";
echo "</div>";

echo "<h2>🎓 Platform URLs</h2>";
echo "<div style='background: #f8f9fa; padding: 20px; border-radius: 8px; margin: 20px 0;'>";
echo "<h3>🔗 Quick Access Links:</h3>";
echo "<ul style='font-size: 16px; line-height: 1.8;'>";
echo "<li><strong>Main Platform:</strong> <a href='http://localhost:8000/' target='_blank' style='color: #1e3a8a;'>http://localhost:8000/</a></li>";
echo "<li><strong>Admin Panel:</strong> <a href='http://localhost:8000/main/admin/' target='_blank' style='color: #1e3a8a;'>http://localhost:8000/main/admin/</a></li>";
echo "<li><strong>Login Page:</strong> <a href='http://localhost:8000/main/auth/login.php' target='_blank' style='color: #1e3a8a;'>http://localhost:8000/main/auth/login.php</a></li>";
echo "</ul>";
echo "</div>";

echo "<div style='background: linear-gradient(135deg, #1e3a8a 0%, #f59e0b 100%); color: white; padding: 30px; border-radius: 12px; margin: 30px 0; text-align: center;'>";
echo "<h2>🎨 Theme Application Ready!</h2>";
echo "<h3>Institute of Accountancy Arusha</h3>";
echo "<p style='font-size: 18px; margin: 20px 0;'>Follow the steps above to apply your custom theme!</p>";
echo "<p style='margin-top: 30px;'>";
echo "<a href='http://localhost:8000/main/admin/' target='_blank' style='background: white; color: #1e3a8a; padding: 15px 30px; text-decoration: none; border-radius: 8px; font-weight: bold; font-size: 16px; margin: 10px;'>⚙️ Go to Admin Panel</a>";
echo "<a href='http://localhost:8000/' target='_blank' style='background: rgba(255,255,255,0.2); color: white; padding: 15px 30px; text-decoration: none; border-radius: 8px; font-weight: bold; font-size: 16px; margin: 10px; border: 2px solid white;'>🏠 View Platform</a>";
echo "</p>";
echo "</div>";

echo "<h2>💡 Troubleshooting</h2>";
echo "<div style='background: #fff3cd; padding: 20px; border-radius: 8px; margin: 20px 0;'>";
echo "<h3>❓ If the theme doesn't apply:</h3>";
echo "<ul>";
echo "<li><strong>Clear browser cache:</strong> Ctrl+F5 or Ctrl+Shift+R</li>";
echo "<li><strong>Check CSS field:</strong> Make sure CSS was pasted correctly</li>";
echo "<li><strong>Check HTML field:</strong> Ensure header HTML was added</li>";
echo "<li><strong>Save settings:</strong> Don't forget to save changes in admin panel</li>";
echo "<li><strong>Try different browser:</strong> Test in Chrome, Firefox, or Edge</li>";
echo "</ul>";
echo "</div>";
?>