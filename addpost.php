<?php
if (isset($_POST['posttext'])) {
    try {

        include 'includes/DatabaseConnection.php';
        include 'includes/DatabaseFunctions.php';
        insertpost($pdo, $_POST['posttext'], $_FILES['fileToUpload']['name'], $_POST['users'], $_POST['module']);
        include 'includes/addpost.php';
        header('location: post.php');
    } catch (PDOException $e) {
        $title = 'An error has occurred';
        $output = 'Database error: ' . $e->getMessage();
    }
} else {
    include 'includes/DatabaseConnection.php';
    include 'includes/DatabaseFunctions.php';
    $title = 'Add a new post';
    $users = allusers($pdo);
    $modules = allmodules($pdo);
    ob_start();
    include 'templates/addpost.html.php';
    $output = ob_get_clean();
}
include 'templates/public_layout.html.php';