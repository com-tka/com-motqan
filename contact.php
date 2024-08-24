<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>اتصل بنا</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'header.php'; ?>
    
    <main>
        <h1>اتصل بنا</h1>
        <form action="contact_action.php" method="post">
            <label for="name">الاسم:</label>
            <input type="text" id="name" name="name" required>
            <label for="email">البريد الإلكتروني:</label>
            <input type="email" id="email" name="email" required>
            <label for="message">الرسالة:</label>
            <textarea id="message" name="message" required></textarea>
            <button type="submit">إرسال</button>
        </form>
    </main>

    <?php include 'footer.php'; ?>
</body>
</html>
