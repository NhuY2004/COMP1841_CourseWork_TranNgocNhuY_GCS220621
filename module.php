<?php
try {
    include 'includes/DatabaseConnection.php';
    include 'includes/DatabaseFunctions.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        if (isset($_POST['add_module'])) {
            if (!empty($_POST['name'])) {
                insertModule($pdo, $_POST['name']);
            }
            header('location: module.php');
            exit();
        }

        if (isset($_POST['update_module'])) {
            if (!empty($_POST['name']) && !empty($_POST['id'])) {
                updateModule($pdo, (int)$_POST['id'], $_POST['name']);
            }
            header('location: module.php');
            exit();
        }

        if (isset($_POST['delete_module'])) {
            $id = (int)$_POST['id'];

            $count = countPostsByModule($pdo, $id);

            if ($count === 0) {
                deleteModule($pdo, $id);
                $err = '';
            } else {
                $err = "Cannot delete module because it is being used by {$count} post(s).";
            }

            header('location: module.php' . ($err ? '?error=' . urlencode($err) : ''));
            exit();
        }

        if (isset($_POST['edit_module'])) {
            $editmodule = getModuleById($pdo, (int)$_POST['id']);
        }
    }

    $modules = allModules($pdo);
    $title = 'Manage module';

    ob_start();
    include 'templates/module.html.php';
    $output = ob_get_clean();

} catch (PDOException $e) {
    $title = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage();
}

include 'templates/public_layout.html.php';
?>
