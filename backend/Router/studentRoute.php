<?php
require_once('../Controller/studentController.php');

$action = isset($_GET['action']) ? $_GET['action'] : '';



$controller = new studentController();

if (isset($_GET['action'])) {
    $action = $_GET['action'];

    switch ($action) {
        case 'create':
            $controller->getCreate_API();
            break;
        case 'getAll':
            $controller->getAllData_API();
            break;
        case 'update':
            $controller->getUpdate_API();
            break;
        case 'delete':
            $controller->getDelete_API();
            break;
        default:
            echo json_encode("Invalid action.");
            break;
    }
}
?>