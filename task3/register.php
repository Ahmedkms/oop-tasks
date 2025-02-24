<?php
require_once 'SessionManager.php';
SessionManager::start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    SessionManager::set('user', $email);
    header("Location: dashboard.php");
    exit();
}

?>

<!-- نموذج إنشاء الحساب -->
<form action="register.php" method="post">
    <input type="email" name="email" placeholder="البريد الإلكتروني" required>
    <input type="password" name="password" placeholder="كلمة المرور" required>
    <button type="submit">إنشاء حساب</button>
</form>
