<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>عربة التسوق</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'header.php'; ?>
    
    <main>
        <h1>عربة التسوق</h1>
        <div id="cart-items">
            <!-- يتم تحميل عناصر عربة التسوق هنا بواسطة JavaScript -->
        </div>
        <a href="checkout.php" class="checkout-button">إتمام الشراء</a>
    </main>

    <?php include 'footer.php'; ?>
    <script src="script.js"></script>
</body>
</html>
