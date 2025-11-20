<section>
    <h2>Danh sách vắc xin</h2>
    <a class="button" href="<?= $basePath ?>/vaccines/create">Thêm vắc xin</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Manufacturer</th>
                <th>Dose Count</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($vaccines as $vaccine): ?>
                <tr>
                    <td><?= htmlspecialchars($vaccine['id']) ?></td>
                    <td><?= htmlspecialchars($vaccine['name']) ?></td>
                    <td><?= htmlspecialchars($vaccine['manufacturer']) ?></td>
                    <td><?= htmlspecialchars($vaccine['dose_count'] ?? '') ?></td>
                    <td><?= number_format($vaccine['price'], 2) ?></td>
                    <td class="table-actions">
                        <a href="<?= $basePath ?>/vaccines/<?= $vaccine['id'] ?>/edit">Sửa</a>
                        <a href="<?= $basePath ?>/vaccines/<?= $vaccine['id'] ?>/delete" onclick="return confirm('Xóa vắc xin này?')">Xóa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>
