<div class="feedback-container">
    <h2 class="feedback-title">Manage Feedback</h2>

    <?php if (empty($feedbacks)): ?>
        <p class="feedback-empty">No feedback found.</p>
    <?php else: ?>
        <table class="feedback-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User name</th>
                    <th>Email</th>
                    <th>Message</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($feedbacks as $fb): ?>
                <tr>
                    <td class="feedback-id"><?= htmlspecialchars($fb['id']) ?></td>
                    <td><?= htmlspecialchars($fb['name'] ?? '') ?></td>
                    <td><?= htmlspecialchars($fb['email'] ?? '') ?></td>
                    <td class="feedback-message">
                        <?= nl2br(htmlspecialchars($fb['message'] ?? '')) ?>
                    </td>
                    <td><?= htmlspecialchars($fb['feedbackdate'] ?? '') ?></td>
                    <td class="feedback-actions">
                        <form method="post" action="" class="feedback-form"
                              onsubmit="return confirm('Delete this feedback?');">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($fb['id']) ?>">
                            <button type="submit" name="delete_feedback" class="btn-delete">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>
