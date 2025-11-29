<?php
include __DIR__ . '/../includes/DatabaseConnection.php';

$sql = 'DELETE FROM post WHERE id = :id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $_POST['id']);
$stmt->execute();

header('location: post.php');
?>
