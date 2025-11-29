<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title><?= $title ?></title>
  <link rel="stylesheet" href="../post.css">
  <link rel="stylesheet" href="../templates/admin_feedback.css">
</head>
<body>
<header id ="admin">
  <h1>Nhu Y</h1>
</header>

<nav>
  <ul>
    <li><a href="post.php">Post List</a></li>
    <li><a href="addpost.php">Add a new post</a></li>
    <li><a href="manage.php">Manage Users</a></li>
    <li><a href="manage_modules.php">Manage Modules</a></li>
    <li><a href="manage_feedback.php">Manage Feedback</a></li>
    <li><a href="../admin/login/logout.php">Public Site/Logout</a></li>
  </ul>
</nav>

<main>
  <?= $output ?>
</main>
</body>
</html>

