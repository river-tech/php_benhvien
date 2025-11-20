<section>
    <h2>Edit Vaccine</h2>
    <form method="post" action="<?= $basePath ?>/vaccines/<?= $vaccine['id'] ?>/update">
        <label>Name</label>
        <input type="text" name="name" value="<?= htmlspecialchars($vaccine['name']) ?>" required>
        <label>Manufacturer</label>
        <input type="text" name="manufacturer" value="<?= htmlspecialchars($vaccine['manufacturer']) ?>" required>
        <label>Price</label>
        <input type="number" step="0.01" name="price" value="<?= htmlspecialchars($vaccine['price']) ?>" required>
        <label>Description</label>
        <textarea name="description"><?= htmlspecialchars($vaccine['description']) ?></textarea>
        <fieldset>
            <legend>Diseases</legend>
            <?php foreach ($diseases as $disease): ?>
                <label>
                    <input type="checkbox" name="diseases[]" value="<?= $disease['id'] ?>" <?= in_array($disease['id'], $vaccine['disease_ids'] ?? []) ? 'checked' : '' ?>>
                    <?= htmlspecialchars($disease['name']) ?>
                </label>
            <?php endforeach; ?>
        </fieldset>
        <button type="submit">Update</button>
    </form>
</section>
