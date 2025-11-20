<section>
    <h2>Cost Statistics</h2>
    <table>
        <thead>
            <tr>
                <th>Customer</th>
                <th>Total Cost</th>
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
