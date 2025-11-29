<?php
function query($pdo, $sql, $parameters = []){
  $query = $pdo->prepare($sql);
  $query->execute($parameters);
  return $query;
}
function updatePost($pdo, $postId, $posttext) {
    $query = 'UPDATE post SET posttext = :posttext WHERE id = :id';
    $parameters = [':posttext' => $posttext, ':id' => $postId];
    query($pdo, $query, $parameters);
}
function deletePost($pdo, $id) {
    $query = 'DELETE FROM post WHERE id = :id';
    $parameters = [':id' => $id];
    query($pdo, 'DELETE FROM post WHERE id = :id', $parameters);
}

function insertPost($pdo, $posttext, $userid, $moduleid) {
    $query = 'INSERT INTO post (posttext, postdate, userid, moduleid)
              VALUES (:posttext, CURDATE(), :userid, :moduleid)';
    $parameters = [
        ':posttext' => $posttext,
        ':userid' => $userid,
        ':moduleid' => $moduleid
    ];
    query($pdo, $query, $parameters);
}

function getPost($pdo, $id) {
  $parameters = [':id' => $id];
  $query = query($pdo, 'SELECT * FROM post WHERE id = :id', $parameters);
  return $query->fetch();
}

function totalPost($pdo) {
    $query = $pdo->query('SELECT COUNT(*) FROM post');
    $query->execute();
    $row = $query->fetch();
    return $row [0];
}
function allUsers($pdo) {
    $users = query($pdo, 'SELECT * FROM user');
    return $users->fetchAll();
}

function allModules($pdo) {
    $modules = query($pdo, 'SELECT * FROM module');
    return $modules->fetchAll();
}
function allPost($pdo) {
    $posts = query($pdo, 'SELECT post.id, posttext, user.name AS username, 
                                 user.email, module.moduleName 
                          FROM post
                          LEFT JOIN user ON userid = user.id
                          LEFT JOIN module ON moduleid = module.id');
    return $posts->fetchAll();
}

?>
