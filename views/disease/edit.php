<section>
    <h2>Edit Disease</h2>
    <form method="post" action="<?= $basePath ?>/diseases/<?= $disease['id'] ?>/update">
        <label>Name</label>
        <input type="text" name="name" value="<?= htmlspecialchars($disease['name']) ?>" required>
        <label>Description</label>
        <textarea name="description"><?= htmlspecialchars($disease['description']) ?></textarea>
        <button type="submit">Update</button>
    </form>
</section>
