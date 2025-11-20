<section class="auth">
    <h2>Login</h2>
    <?php if (!empty($error)): ?>
        <p class="flash error"><?= htmlspecialchars($error) ?></p>
        <a href="<?= $basePath ?>/login">Try Again</a>
    <?php endif; ?>
    <form method="post" action="<?= $basePath ?>/login">
        <label>Username</label>
        <input type="text" name="username" required>
        <label>Password</label>
        <input type="password" name="password" required>
        <button type="submit">Login</button>
    </form>
</section>
