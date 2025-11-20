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
    <title>Hospital Management</title>
    <link rel="stylesheet" href="<?= $basePath ?>/css/style.css">
    <script src="<?= $basePath ?>/js/vaccination.js" defer></script>
</head>
<body>
    <header>
        <h1>Hospital Vaccination Management</h1>
        <?php if (!empty($_SESSION['user'])): ?>
            <p class="welcome">Welcome, <?= htmlspecialchars($_SESSION['user']['fullname'] ?? $_SESSION['user']['username']) ?></p>
            <nav>
                <a href="<?= $basePath ?>/vaccines">Vaccines</a>
                <a href="<?= $basePath ?>/diseases">Diseases</a>
                <a href="<?= $basePath ?>/customers/register">Customers</a>
                <a href="<?= $basePath ?>/vaccination/create">Vaccination</a>
                <a href="<?= $basePath ?>/history">History</a>
                <a href="<?= $basePath ?>/statistics">Statistics</a>
                <a href="<?= $basePath ?>/logout">Logout</a>
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
