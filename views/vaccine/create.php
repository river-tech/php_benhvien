<section>
    <h2>Create Vaccine</h2>
    <form method="post" action="<?= $basePath ?>/vaccines">
        <label>Name</label>
        <input type="text" name="name" required>
        <label>Manufacturer</label>
        <input type="text" name="manufacturer" required>
        <label>Price</label>
        <input type="number" step="0.01" name="price" required>
        <label>Description</label>
        <textarea name="description"></textarea>
        <fieldset>
            <legend>Diseases</legend>
            <?php foreach ($diseases as $disease): ?>
                <label>
                    <input type="checkbox" name="diseases[]" value="<?= $disease['id'] ?>">
                    <?= htmlspecialchars($disease['name']) ?>
                </label>
            <?php endforeach; ?>
        </fieldset>
        <button type="submit">Save</button>
    </form>
</section>
