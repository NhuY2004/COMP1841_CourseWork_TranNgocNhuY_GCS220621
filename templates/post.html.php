<div class="content">
  <p><?= $totalPosts?> posts have been submitted to the Student Forum.</p>

 <table class="post-table">
  <tr>
    <th>Image</th>
    <th>Post Text</th>
    <th>Post Module</th>
    <th>User</th>
  </tr>

  <?php foreach ($posts as $posts): ?>
    <tr>
      <td class="post-image">
        <?php if ($posts['moduleName'] == 'meo meo'): ?>
          <img src="image/hehehe.jpg" alt="meomeo">
        <?php else: ?>
          <img src="image/llllplp.jpg" alt="hello">
        <?php endif; ?>
      </td>
          
      <td class="post-text">
        <strong>Post Text:</strong>
        <?= htmlspecialchars($posts['posttext'], ENT_QUOTES, 'UTF-8') ?>
      </td>

      <td class="post-module">
        <strong>Post Module:</strong>
        <?= htmlspecialchars($posts['moduleName'], ENT_QUOTES, 'UTF-8') ?>
      </td>

      <td class="post-user">
        (by <?= htmlspecialchars($posts['username'], ENT_QUOTES, 'UTF-8') ?>)
        <a href="editpost.php?id=<?= $posts['id'] ?>">Edit</a>
      </td>

      <td class="post-delete">
        <form action="deletepost.php" method="post">
          <input type="hidden" name="id" value="<?= $posts['id'] ?>">
          <input type="submit" value="Delete">
        </form>
      </td>
    </tr>
  <?php endforeach; ?>
</table>
</div>
