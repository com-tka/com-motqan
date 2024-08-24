-- إنشاء جدول المستخدمين
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

-- إدخال بيانات المستخدم الافتراضي
INSERT INTO users (username, password) VALUES 
('MOTQAN', '012266402321aA@');
