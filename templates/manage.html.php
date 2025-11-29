<h2 class="mb-4">Manage Users</h2>

<?php if (isset($_GET['error'])): ?>
    <div class="alert alert-danger">
        <?= htmlspecialchars($_GET['error'], ENT_QUOTES, 'UTF-8') ?>
    </div>
<?php endif; ?>

<form method="post" action="" class="mb-5">
    <?php if (isset($edituser)): ?>
        <h3>Edit User</h3>
        <input type="hidden" name="id" value="<?= htmlspecialchars($edituser['id']) ?>">
    <?php else: ?>
        <h3>Add New User</h3>
    <?php endif; ?>

    <div class="form-group mb-3">
        <label for="name">User Name:</label>
        <input type="text" name="name" id="name" class="form-control" required
               value="<?= isset($edituser) ? htmlspecialchars($edituser['name']) : '' ?>">
    </div>

    <div class="form-group mb-3">
        <label for="email">User Email:</label>
        <input type="email" name="email" id="email" class="form-control"
               value="<?= isset($edituser) ? htmlspecialchars($edituser['email']) : '' ?>">
    </div>

    <div class="form-group mb-3">
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" class="form-control"
               <?= !isset($edituser) ? 'required' : '' ?>>

        <?php if (isset($edituser)): ?>
            <small class="form-text text-muted">
                Leave blank to keep current password.
            </small>
        <?php endif; ?>
    </div>

    <?php if (isset($edituser)): ?>
        <button type="submit" name="update_user" class="btn btn-primary">Update User</button>
        <a href="manage.php" class="btn btn-secondary">Cancel</a>
    <?php else: ?>
        <button type="submit" name="add_user" class="btn btn-success">Add User</button>
    <?php endif; ?>
</form>

<h3>Existing Users</h3>
<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th style="width: 30%;">Name</th>
            <th style="width: 40%;">Email</th>
            <th style="width: 30%;">Actions</th>
        </tr>
    </thead>

    <tbody>
        <?php if (empty($users)): ?>
            <tr>
                <td colspan="3" class="text-center">No users found</td>
            </tr>
        <?php else: ?>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= htmlspecialchars($user['name']) ?></td>
                    <td><?= htmlspecialchars($user['email']) ?></td>
                    <td>
                        <form method="post" action="" style="display:inline;">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($user['id']) ?>">
                            <button type="submit" name="edit_user" class="btn btn-warning btn-sm">Edit</button>
                        </form>
                        
                        <form method="post" action="" style="display:inline;">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($user['id']) ?>">
                            <button type="submit" name="delete_user" class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure you want to delete this user?');">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>
