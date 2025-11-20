<section>
    <h2>Register Vaccination</h2>
    <form method="post" action="<?= $basePath ?>/vaccination/store">
        <label>Customer</label>
        <select name="customer_id" required>
            <option value="">Select customer</option>
            <?php foreach ($customers as $customer): ?>
                <option value="<?= $customer['id'] ?>"><?= htmlspecialchars($customer['fullname']) ?></option>
            <?php endforeach; ?>
        </select>

        <label>Disease</label>
        <select name="disease_id" id="disease_id" required>
            <option value="">Select disease</option>
            <?php foreach ($diseases as $disease): ?>
                <option value="<?= $disease['id'] ?>"><?= htmlspecialchars($disease['name']) ?></option>
            <?php endforeach; ?>
        </select>

        <label>Vaccine</label>
        <select name="vaccine_id" id="vaccine_id" required>
            <option value="">Select vaccine</option>
        </select>

        <label>Dose Number</label>
        <input type="number" name="dose_number" min="1" value="1">

        <label>Injection Date</label>
        <input type="date" name="injected_at">

        <label>Next Schedule</label>
        <input type="date" name="next_schedule_at">

        <button type="submit">Save</button>
    </form>
</section>
