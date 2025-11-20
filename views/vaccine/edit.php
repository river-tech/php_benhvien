<section>
    <h2>Cập nhật vắc xin</h2>
    <form method="post" action="<?= $basePath ?>/vaccines/<?= $vaccine['id'] ?>/update">
        <label>Mã vắc xin</label>
        <input type="text" value="<?= htmlspecialchars($vaccine['id']) ?>" disabled>
        <label>Tên vắc xin</label>
        <input type="text" name="name" value="<?= htmlspecialchars($vaccine['name']) ?>" required>
        <label>Hãng sản xuất</label>
        <input type="text" name="manufacturer" value="<?= htmlspecialchars($vaccine['manufacturer']) ?>" required>
        <label>Giá (VND)</label>
        <input type="number" step="1" name="price" value="<?= htmlspecialchars($vaccine['price']) ?>" required>
        <label>Số mũi</label>
        <input type="number" name="dose_count" min="1" value="<?= htmlspecialchars($vaccine['dose_count'] ?? 1) ?>" required>
        <label>Mô tả</label>
        <textarea name="description"><?= htmlspecialchars($vaccine['description']) ?></textarea>
        <fieldset>
            <legend>Phòng bệnh</legend>
            <?php foreach ($diseases as $disease): ?>
                <label>
                    <input type="checkbox" name="diseases[]" value="<?= $disease['id'] ?>" <?= in_array($disease['id'], $vaccine['disease_ids'] ?? []) ? 'checked' : '' ?>>
                    <?= htmlspecialchars($disease['name']) ?>
                </label>
            <?php endforeach; ?>
        </fieldset>
        <button type="submit">Lưu</button>
    </form>
</section>
