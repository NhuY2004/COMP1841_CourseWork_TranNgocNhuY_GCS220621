<?php
require "login/Check.php";

try {
    include '../includes/DatabaseConnection.php';
    include '../includes/DatabaseFunctions.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['delete_feedback']) && !empty($_POST['id'])) {
            $sql = 'DELETE FROM feedback WHERE id = :id';
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['id' => $_POST['id']]);

            header('location: manage_feedback.php');
            exit();
        }
    }
    $sql = 'SELECT * FROM feedback ORDER BY id DESC';
    $stmt = $pdo->query($sql);
    $feedbacks = $stmt->fetchAll();

    $title = 'Manage Feedback';

    ob_start();
    include '../templates/admin_feedback.html.php';
    $output = ob_get_clean();

} catch (PDOException $e) {
    $title  = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage();
}

include '../templates/admin_layout.html.php';
?>
