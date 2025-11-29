<div class="content">
  <p><?= $totalPost ?> posts have been submitted to the Student Forum.</p>

 <table class="post-table">
  <tr>
    <th>Image</th>
    <th>Post Text</th>
    <th>Post Module</th>
    <th>User</th>
  </tr>

  <?php foreach ($post as $post): ?>
    <tr>
      <td class="post-image">
        <?php if ($post['moduleName'] == 'meo meo'): ?>
          <img src="image/hehehe.jpg" alt="meomeo">
        <?php else: ?>
          <img src="image/llllplp.jpg" alt="hello">
        <?php endif; ?>
      </td>

      <td class="post-text">
        <strong>Post Text:</strong>
        <?= htmlspecialchars($post['posttext'], ENT_QUOTES, 'UTF-8') ?>
      </td>

      <td class="post-module">
        <strong>Post Module:</strong>
        <?= htmlspecialchars($post['moduleName'], ENT_QUOTES, 'UTF-8') ?>
      </td>

      <td class="post-user">
        (by <?= htmlspecialchars($post['username'], ENT_QUOTES, 'UTF-8') ?>)
      </td>

    </tr>
  <?php endforeach; ?>
</table>
</div>
