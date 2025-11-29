<?php
require "login/Check.php";
try {
    include '../includes/DatabaseConnection.php';
    include '../includes/DatabaseFunctions.php';
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['add_user'])) {
            if (!empty($_POST['name']) && !empty($_POST['password'])) {
                $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);

                $sql = 'INSERT INTO user (name, email, password) 
                        VALUES (:name, :email, :password)';
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    'name'     => $_POST['name'],
                    'email'    => $_POST['email'] ?? '',
                    'password' => $hashedPassword
                ]);

                header('location: manage.php');
                exit();
            }

        } elseif (isset($_POST['update_user'])) {

            $sql = 'UPDATE user SET name = :name, email = :email';
            $parameters = [
                'name'  => $_POST['name'],
                'email' => $_POST['email'] ?? '',
                'id'    => $_POST['id']
            ];

            if (!empty($_POST['password'])) {
                $sql .= ', password = :password';
                $parameters['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
            }

            $sql .= ' WHERE id = :id';
            $stmt = $pdo->prepare($sql);
            $stmt->execute($parameters);

            header('location: manage.php');
            exit();
        } elseif (isset($_POST['delete_user'])) {
            $checkSql = 'SELECT COUNT(*) FROM post WHERE userid = :id';
            $checkStmt = $pdo->prepare($checkSql);
            $checkStmt->execute(['id' => $_POST['id']]);
            $count = $checkStmt->fetchColumn();

            if ($count == 0) {
                $sql = 'DELETE FROM user WHERE id = :id';
                $stmt = $pdo->prepare($sql);
                $stmt->execute(['id' => $_POST['id']]);
                header('location: manage.php');
                exit();
            } else {
                $error = "Cannot delete user because they have {$count} post(s).";
                header('location: manage.php?error=' . urlencode($error));
                exit();
            }
        } elseif (isset($_POST['edit_user'])) {
            $sql = 'SELECT * FROM user WHERE id = :id';
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['id' => $_POST['id']]);
            $edituser = $stmt->fetch();
        }
    }
    $users = allusers($pdo);

    $title = 'User Management';

    ob_start();
    include '../templates/manage.html.php';
    $output = ob_get_clean();

} catch (PDOException $e) {
    $title = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage();
}

include '../templates/admin_layout.html.php';