<?php
try {
    include __DIR__ . '/includes/DatabaseConnection.php';
    include __DIR__ . '/includes/DatabaseFunctions.php';
    $sql = 'SELECT post.id, posttext, user.name AS username, email, module.moduleName
            FROM post
            INNER JOIN user ON userid = user.id
            INNER JOIN module ON module.id = post.moduleid';

    $post = $pdo->query($sql);
    $title = 'Post list';
    $totalPost = totalPost($pdo);
    ob_start();
    include __DIR__ . '/templates/public_post.html.php';
    $output = ob_get_clean();
} catch (PDOException $e) {
    $title = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage();
}

include __DIR__ . '/templates/public_layout.html.php';
?>
