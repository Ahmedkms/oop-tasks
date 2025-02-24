<?php
require_once 'SessionManager.php';
SessionManager::start();

$validEmail = "ahmed.khfci377@gmail.com";
$validPassword = "123456";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($email === $validEmail && $password === $validPassword) {
        SessionManager::set('user', $email);
        header("Location: dashboard.php"); // تحويل المستخدم بعد تسجيل الدخول
        exit();
    } else {
        SessionManager::setError("البريد الإلكتروني أو كلمة المرور غير صحيحة!");
        header("Location: login.php");
        exit();
    }
}

?>

<!-- نموذج تسجيل الدخول -->
<form action="<?php $_SERVER["PHP_SELF"] ?>" method="post">
    <input type="email" name="email" placeholder="البريد الإلكتروني" required>
    <input type="password" name="password" placeholder="كلمة المرور" required>
    <button type="submit">تسجيل الدخول</button>
    <p style="color: red;">
        <?php echo SessionManager::getError(); ?>
    </p>
</form>
