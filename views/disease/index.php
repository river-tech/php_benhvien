<section>
    <h2>Danh mục bệnh</h2>
    <form method="post" action="<?= $basePath ?>/diseases">
        <label>Mã bệnh</label>
        <input type="text" name="id" required>
        <label>Tên bệnh</label>
        <input type="text" name="name" required>
        <label>Mô tả</label>
        <textarea name="description"></textarea>
        <button type="submit">Thêm bệnh</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>Mã</th>
                <th>Tên bệnh</th>
                <th>Mô tả</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($diseases as $disease): ?>
                <tr>
                    <td><?= htmlspecialchars($disease['id']) ?></td>
                    <td><?= htmlspecialchars($disease['name']) ?></td>
                    <td><?= htmlspecialchars($disease['description']) ?></td>
                    <td>
                        <a href="<?= $basePath ?>/diseases/<?= $disease['id'] ?>/edit">Sửa</a>
                        <a href="<?= $basePath ?>/diseases/<?= $disease['id'] ?>/delete" onclick="return confirm('Xóa bệnh này?')">Xóa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>
