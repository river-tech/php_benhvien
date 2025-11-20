<section>
    <h2>Cập nhật bệnh</h2>
    <form method="post" action="<?= $basePath ?>/diseases/<?= $disease['id'] ?>/update">
        <label>Mã bệnh</label>
        <input type="text" value="<?= htmlspecialchars($disease['id']) ?>" disabled>
        <label>Tên bệnh</label>
        <input type="text" name="name" value="<?= htmlspecialchars($disease['name']) ?>" required>
        <label>Mô tả</label>
        <textarea name="description"><?= htmlspecialchars($disease['description']) ?></textarea>
        <button type="submit">Lưu</button>
    </form>
</section>
