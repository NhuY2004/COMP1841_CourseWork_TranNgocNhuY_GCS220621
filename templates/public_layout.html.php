<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title><?= $title ?></title>
  <link rel="stylesheet" href="post.css">
  <link rel="stylesheet" href="public_feedback.css">
</head>
<body>
<header>
  <h1>Nhu Y </h1>
</header>

<nav>
  <ul>
    <li><a href="index.php">Home</a></li>
    <li><a href="post.php">Post List</a></li>
    <li><a href="module.php">Module</a></li>
    <li><a href="addpost.php">Add post</a></li>
    <li><a href="users.php">Users</a></li>
    <li><a href="feedback.php">Feedback</a></li>
    <li><a href="admin/login/login.html">Admin Login</a></li>
    
  </ul>
</nav>

<main>
  <?= $output ?>
</main>
</body>
</html>
