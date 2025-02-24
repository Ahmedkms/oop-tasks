<?php

class SessionManager {
    
    // بدء الجلسة إذا لم تكن قد بدأت بالفعل
    public static function start() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    // ضبط قيمة داخل الجلسة
    public static function set($key, $value) {
        $_SESSION[$key] = $value;
    }

    // جلب قيمة معينة من الجلسة
    public static function get($key) {
        return $_SESSION[$key] ?? null;
    }

    // التحقق مما إذا كان المفتاح موجودًا في الجلسة
    public static function has($key) {
        return isset($_SESSION[$key]);
    }

    // إزالة مفتاح معين من الجلسة
    public static function remove($key) {
        if (self::has($key)) {
            unset($_SESSION[$key]);
        }
    }

    // مسح جميع بيانات الجلسة
    public static function destroy() {
        session_unset();
        session_destroy();
    }

    // إضافة رسالة خطأ إلى الجلسة
    public static function setError($message) {
        $_SESSION['error'] = $message;
    }

    // جلب رسالة الخطأ وعرضها مرة واحدة
    public static function getError() {
        if (self::has('error')) {
            $error = $_SESSION['error'];
            self::remove('error');
            return $error;
        }
        return null;
    }
}

?>
