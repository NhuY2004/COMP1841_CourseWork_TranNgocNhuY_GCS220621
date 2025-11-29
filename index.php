<?php
$title = 'Internet Post Database';
ob_start();
include __DIR__ . '/templates/public_home.html.php';
$output = ob_get_clean();
include __DIR__ . '/templates/public_layout.html.php';
?>
