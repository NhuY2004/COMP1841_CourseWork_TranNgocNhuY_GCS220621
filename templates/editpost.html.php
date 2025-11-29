<form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= htmlspecialchars($post['id']) ?>">

    <p>
        <label for="posttext"><strong>Post Text:</strong></label><br>
        <textarea name="posttext" id="posttext" rows="4" cols="60" required><?= htmlspecialchars($post['posttext']) ?></textarea>
    </p>

    <p>
        <strong>Current image:</strong><br>
        <?php if (!empty($post['imagepath'])): ?>
            <img src="../<?= htmlspecialchars($post['imagepath']) ?>" alt=""
                 style="max-width:200px; display:block; margin-bottom:8px;">
        <?php else: ?>
            <em>No image</em><br>
        <?php endif; ?>
    </p>

    <p>
        <label for="image"><strong>Change image (optional):</strong></label><br>
        <input type="file" name="image" id="image" accept="image/*">
    </p>

    <p>
        <button type="submit">Save changes</button>
    </p>
</form>
