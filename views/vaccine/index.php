<section>
    <h2>Vaccines</h2>
    <a href="<?= $basePath ?>/vaccines/create">Create Vaccine</a>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Manufacturer</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($vaccines as $vaccine): ?>
                <tr>
                    <td><?= htmlspecialchars($vaccine['name']) ?></td>
                    <td><?= htmlspecialchars($vaccine['manufacturer']) ?></td>
                    <td><?= number_format($vaccine['price'], 2) ?></td>
                    <td>
                        <a href="<?= $basePath ?>/vaccines/<?= $vaccine['id'] ?>/edit">Edit</a>
                        <a href="<?= $basePath ?>/vaccines/<?= $vaccine['id'] ?>/delete" onclick="return confirm('Delete vaccine?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>
