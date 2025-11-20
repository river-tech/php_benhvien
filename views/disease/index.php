<section>
    <h2>Diseases</h2>
    <form method="post" action="<?= $basePath ?>/diseases">
        <label>Name</label>
        <input type="text" name="name" required>
        <label>Description</label>
        <textarea name="description"></textarea>
        <button type="submit">Add Disease</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($diseases as $disease): ?>
                <tr>
                    <td><?= htmlspecialchars($disease['name']) ?></td>
                    <td><?= htmlspecialchars($disease['description']) ?></td>
                    <td>
                        <a href="<?= $basePath ?>/diseases/<?= $disease['id'] ?>/edit">Edit</a>
                        <a href="<?= $basePath ?>/diseases/<?= $disease['id'] ?>/delete" onclick="return confirm('Delete disease?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>
