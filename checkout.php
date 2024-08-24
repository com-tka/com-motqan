<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إتمام الشراء</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'header.php'; ?>
    
    <main>
        <h1>إتمام الشراء</h1>
        <form action="checkout_action.php" method="post">
            <label for="address">العنوان:</label>
            <input type="text" id="address" name="address" required>
            <label for="payment">طريقة الدفع:</label>
            <select id="payment" name="payment" required>
                <option value="credit_card">بطاقة ائتمان</option>
                <option value="paypal">PayPal</option>
            </select>
            <button type="submit">إتمام الطلب</button>
        </form>
    </main>

    <?php include 'footer.php'; ?>
</body>
</html>
