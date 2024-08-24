<header>
    <nav>
        <a href="index.html">الرئيسية</a>
        <a href="product.php">المنتجات</a>
        <a href="cart.php">عربة التسوق</a>
        <a href="about.php">عن الموقع</a>
        <a href="contact.php">اتصل بنا</a>
        <?php if (!isset($_SESSION['user_id'])): ?>
            <a href="login.php">تسجيل الدخول</a>
            <a href="register.php">تسجيل</a>
        <?php else: ?>
            <a href="logout.php">تسجيل الخروج</a>
        <?php endif; ?>
    </nav>
</header>
