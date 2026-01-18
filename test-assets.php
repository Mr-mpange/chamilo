<?php
echo "<h1>Asset Test</h1>";

$assets = [
    'web/assets/fontawesome/css/font-awesome.min.css',
    'web/assets/bootstrap/dist/css/bootstrap.min.css',
    'web/assets/jquery/dist/jquery.min.js',
    'web/css/base.css'
];

foreach ($assets as $asset) {
    if (file_exists($asset)) {
        echo "<p>✓ $asset exists</p>";
        echo "<p><a href='$asset' target='_blank'>Test link: $asset</a></p>";
    } else {
        echo "<p>✗ $asset missing</p>";
    }
}
?>