<section>
    <h2>Vaccination History</h2>
    <table>
        <thead>
            <tr>
                <th>Customer</th>
                <th>Disease</th>
                <th>Vaccine</th>
                <th>Dose</th>
                <th>Injected At</th>
                <th>Next Schedule</th>
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
