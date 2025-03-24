<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define('BASE_PATH', dirname(__DIR__));

require_once BASE_PATH . '/app/config/database.php';
require_once BASE_PATH . '/app/controllers/SinhVienController.php';
require_once BASE_PATH . '/app/controllers/NganhHocController.php'; 

$controllerName = isset($_GET['controller']) ? $_GET['controller'] . 'Controller' : 'SinhVienController';
$actionName = isset($_GET['action']) ? $_GET['action'] : 'index';

if (class_exists($controllerName)) {
    $controller = new $controllerName();

    if (method_exists($controller, $actionName)) {
        if (isset($_GET['id'])) {
            $controller->$actionName($_GET['id']);
        } else {
            $controller->$actionName();
        }
    } else {
        echo "Không tìm thấy action: $actionName";
    }
} else {
    echo "Không tìm thấy controller: $controllerName";
}
