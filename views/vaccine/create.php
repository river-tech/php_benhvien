<section>
    <h2>Thêm vắc xin</h2>
    <form method="post" action="<?= $basePath ?>/vaccines">
        <label>Mã vắc xin</label>
        <input type="text" name="id" required>
        <label>Tên vắc xin</label>
        <input type="text" name="name" required>
        <label>Hãng sản xuất</label>
        <input type="text" name="manufacturer" required>
        <label>Giá (VND)</label>
        <input type="number" step="1" name="price" required>
        <label>Số mũi</label>
        <input type="number" name="dose_count" min="1" value="1" required>
        <label>Mô tả</label>
        <textarea name="description"></textarea>
        <fieldset>
            <legend>Phòng bệnh</legend>
            <?php foreach ($diseases as $disease): ?>
                <label>
                    <input type="checkbox" name="diseases[]" value="<?= $disease['id'] ?>">
                    <?= htmlspecialchars($disease['name']) ?>
                </label>
            <?php endforeach; ?>
        </fieldset>
        <button type="submit">Lưu</button>
    </form>
</section>
