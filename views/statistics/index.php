<section>
    <h2>Thống kê chi phí</h2>
    <table>
        <thead>
            <tr>
                <th>Khách hàng</th>
                <th>Tổng chi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($stats as $row): ?>
                <tr>
                    <td><?= htmlspecialchars($row['fullname']) ?></td>
                    <td><?= number_format($row['total_cost'], 2) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>
