<?php
include 'includes/DatabaseConnection.php';
function totalPost(){
    $query = $pdo->prepare('SELECT COUNT(*) FROM post');
    $query ->execute();
    $row = $query->fetch();
    return $row[0];
}
echo totalPost($pdo);