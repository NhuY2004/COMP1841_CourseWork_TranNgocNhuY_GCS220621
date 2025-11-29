<?php
try {
    include 'includes/DatabaseConnection.php';

    $successMessage = '';
    $errorMessage   = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name    = trim($_POST['name'] ?? '');
        $email   = trim($_POST['email'] ?? '');
        $message = trim($_POST['message'] ?? '');

        if ($name === '' || $email === '' || $message === '') {
            $errorMessage = 'Please fill in all fields.';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errorMessage = 'Please enter a valid email address.';
        } else {
            $sql = 'INSERT INTO feedback (name, email, message)
                    VALUES (:name, :email, :message)';
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':name'    => $name,
                ':email'   => $email,
                ':message' => $message
            ]);

            $successMessage = 'Thank you for your feedback!';
            $name = $email = $message = '';
        }
    } else {
        $name = $email = $message = '';
    }

    $title = 'Feedback';

    ob_start();
    include 'templates/public_feedback.html.php';
    $output = ob_get_clean();

} catch (PDOException $e) {
    $title  = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage();
}
include 'templates/public_layout.html.php';
