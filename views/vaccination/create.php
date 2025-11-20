<section>
    <h2>Ghi nhận tiêm chủng</h2>
    <?php if (!empty($error)): ?>
        <div class="alert danger"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>
    <form method="post" action="<?= $basePath ?>/vaccination/store">
        <label>Khách hàng</label>
        <select name="customer_id" required>
            <option value="">Chọn khách hàng</option>
            <?php foreach ($customers as $customer): ?>
                <option value="<?= $customer['id'] ?>"><?= htmlspecialchars($customer['fullname']) ?></option>
            <?php endforeach; ?>
        </select>

        <label>Bệnh</label>
        <select name="disease_id" id="disease_id" required>
            <option value="">Chọn bệnh</option>
            <?php foreach ($diseases as $disease): ?>
                <option value="<?= $disease['id'] ?>"><?= htmlspecialchars($disease['name']) ?></option>
            <?php endforeach; ?>
        </select>

        <label>Vắc xin</label>
        <select name="vaccine_id" id="vaccine_id" required>
            <option value="">Chọn vắc xin</option>
        </select>

        <label>Số mũi</label>
        <input type="number" name="dose_number" min="1" value="1">

        <label>Ngày tiêm</label>
        <input type="date" name="injected_at">

        <label>Lịch hẹn tiếp theo</label>
        <input type="date" name="next_schedule_at">

        <button type="submit">Lưu</button>
    </form>
</section>
