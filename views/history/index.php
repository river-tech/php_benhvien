<section>
    <h2>Lịch sử tiêm chủng</h2>
    <table>
        <thead>
            <tr>
                <th>Khách hàng</th>
                <th>Bệnh</th>
                <th>Vắc xin</th>
                <th>Số mũi</th>
                <th>Ngày tiêm</th>
                <th>Lịch hẹn tiếp theo</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($records as $record): ?>
                <tr>
                    <td><?= htmlspecialchars($record['customer_name']) ?></td>
                    <td><?= htmlspecialchars($record['disease_name']) ?></td>
                    <td><?= htmlspecialchars($record['vaccine_name']) ?></td>
                    <td><?= htmlspecialchars($record['dose_number']) ?></td>
                    <td><?= htmlspecialchars($record['injected_at']) ?></td>
                    <td><?= htmlspecialchars($record['next_schedule_at']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>
