<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define('BASE_PATH', dirname(__DIR__));

// Load cấu hình database
require_once BASE_PATH . '/app/config/database.php';

// Load controllers
require_once BASE_PATH . '/app/controllers/SinhVienController.php';
require_once BASE_PATH . '/app/controllers/NganhHocController.php';
require_once BASE_PATH . '/app/controllers/HocPhanController.php'; 

// Xử lý route
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'SinhVien';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

$controllerName = $controller . 'Controller';
$controllerFile = BASE_PATH . '/app/controllers/' . $controllerName . '.php';

if (!class_exists($controllerName)) {
    if (file_exists($controllerFile)) {
        require_once $controllerFile;
    } else {
        echo "Không tìm thấy file controller: $controllerFile";
        exit;
    }
}

if (class_exists($controllerName)) {
    $controllerInstance = new $controllerName();

    if (method_exists($controllerInstance, $action)) {
        if (isset($_GET['id'])) {
            $controllerInstance->$action($_GET['id']);
        } else {
            $controllerInstance->$action();
        }
    } else {
        echo "Không tìm thấy action: $action";
    }
} else {
    echo "Không tìm thấy controller class: $controllerName";
}
?>
