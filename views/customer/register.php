<section>
    <h2>Đăng ký khách hàng</h2>
    <form method="post" action="<?= $basePath ?>/customers/register">
        <label>Mã khách hàng</label>
        <input type="text" name="id" required>

        <label>Họ tên</label>
        <input type="text" name="fullname" required>

        <label>Số điện thoại</label>
        <input type="text" name="phone" required>

        <label>Địa chỉ</label>
        <input type="text" name="address">

        <label>Ngày sinh</label>
        <input type="date" name="dob">

        <label>Giới tính</label>
        <input type="text" name="gender">

        <button type="submit">Lưu</button>
    </form>
</section>
