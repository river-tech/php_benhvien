<?php
if (!isset($viewPath)) {
    throw new RuntimeException('View path is missing');
}
$basePath = rtrim($basePath ?? '', '/');
?>
<!DOCTYPE html>
<html lang="en">
<head data-base="<?= $basePath ?>">
    <meta charset="UTF-8">
    <title>Quản lý tiêm chủng</title>
    <link rel="stylesheet" href="<?= $basePath ?>/css/style.css">
    <script src="<?= $basePath ?>/js/vaccination.js" defer></script>
</head>
<body>
    <header>
        <h1>Quản lý tiêm chủng bệnh viện</h1>
        <?php if (!empty($_SESSION['user'])): ?>
            <p class="welcome">Xin chào, <?= htmlspecialchars($_SESSION['user']['fullname'] ?? $_SESSION['user']['username']) ?></p>
            <nav>
                <a href="<?= $basePath ?>/vaccines">Vắc xin</a>
                <a href="<?= $basePath ?>/diseases">Bệnh</a>
                <a href="<?= $basePath ?>/customers/register">Khách hàng</a>
                <a href="<?= $basePath ?>/vaccination/create">Ghi nhận tiêm</a>
                <a href="<?= $basePath ?>/history">Lịch sử</a>
                <a href="<?= $basePath ?>/statistics">Thống kê</a>
                <a href="<?= $basePath ?>/logout">Đăng xuất</a>
            </nav>
        <?php endif; ?>
    </header>
    <main>
        <?php if (!empty($_SESSION['flash'])): ?>
            <div class="flash"><?= htmlspecialchars($_SESSION['flash']) ?></div>
            <?php unset($_SESSION['flash']); ?>
        <?php endif; ?>
        <?php include $viewPath; ?>
    </main>
</body>
</html>
