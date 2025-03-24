<?php
class UserController
{
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            // Kiểm tra đơn giản
            if ($username === 'admin' && $password === '123456') {
                session_start();
                $_SESSION['user'] = $username;
                header("Location: /ktgk/public/index.php?controller=SinhVien&action=index");
                exit;
            } else {
                $error = "Sai tên đăng nhập hoặc mật khẩu!";
                include BASE_PATH . '/app/views/user/login.php';
            }
        } else {
            include BASE_PATH . '/app/views/user/login.php';
        }
    }
}
?>
