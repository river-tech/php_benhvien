<section>
    <h2>Register Customer</h2>
    <form method="post" action="<?= $basePath ?>/customers/register">
        <label>Full Name</label>
        <input type="text" name="fullname" required>
        <label>Phone</label>
        <input type="text" name="phone" required>
        <label>Email</label>
        <input type="email" name="email" required>
        <label>Address</label>
        <input type="text" name="address">
        <label>Date of Birth</label>
        <input type="date" name="dob">
        <button type="submit">Register</button>
    </form>
</section>
