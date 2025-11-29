<div class="feedback-page">

    <h2 class="feedback-title">Feedback</h2>

    <?php if (!empty($successMessage)): ?>
        <p class="feedback-success"><?= htmlspecialchars($successMessage) ?></p>
    <?php endif; ?>

    <?php if (!empty($errorMessage)): ?>
        <p class="feedback-error"><?= htmlspecialchars($errorMessage) ?></p>
    <?php endif; ?>

    <form method="post" action="" class="feedback-form">

        <div class="feedback-field">
            <label for="name" class="feedback-label">Name:</label>
            <input type="text"
                id="name"
                name="name"
                class="feedback-input"
                required
                value="<?= htmlspecialchars($name) ?>">
        </div>

        <div class="feedback-field">
            <label for="email" class="feedback-label">Email:</label>
            <input type="email"
                id="email"
                name="email"
                class="feedback-input"
                required
                value="<?= htmlspecialchars($email) ?>">
        </div>

        <div class="feedback-field">
            <label for="message" class="feedback-label">Message:</label>
            <textarea id="message"
                name="message"
                rows="5"
                class="feedback-textarea"
                required><?= htmlspecialchars($message) ?></textarea>
        </div>

        <button type="submit" class="feedback-btn">Send Feedback</button>
    </form>
</div>
