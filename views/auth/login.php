<section class="auth">
    <h2>Đăng nhập</h2>
    <?php if (!empty($error)): ?>
        <p class="flash error"><?= htmlspecialchars($error) ?></p>
        <a href="<?= $basePath ?>/login">Thử lại</a>
    <?php endif; ?>
    <form method="post" action="<?= $basePath ?>/login">
        <label>Tài khoản</label>
        <input type="text" name="username" required>
        <label>Mật khẩu</label>
        <input type="password" name="password" required>
        <button type="submit">Đăng nhập</button>
    </form>
</section>
