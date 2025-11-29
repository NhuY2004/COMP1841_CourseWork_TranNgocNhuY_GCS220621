<?php
require "login/check.php";
try {
    include '../includes/DatabaseConnection.php';
    include '../includes/DatabaseFunctions.php';

    $posts = allPost($pdo);
    $title = 'Post list';
    $totalPosts = totalPost($pdo);

    ob_start();
    include '../templates/admin_post.html.php';
    $output = ob_get_clean();
} catch (PDOException $e) {
    $title = 'An error has occured';
    $output = 'Database error: ' . $e->getMessage();
}

include '../templates/admin_layout.html.php';
?>
