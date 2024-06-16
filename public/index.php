<head>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<div class="flex flex-col h-screen">
    
<?php
// /bikestores/public/index.php


require '../vendor/autoload.php';
require_once("../helpers/PdfGenerator.php");
require_once ("../helpers/View.php");

// Incluir configuración y archivos comunes
require_once '../config/config.php';
// Obtener la URL solicitada
$request = trim($_SERVER['REQUEST_URI'], '/');
// Eliminar la parte inicial de la URL que no nos interesa
$request = str_replace('php/bikestores/', '', $request);

// Dividir la URL en partes
$urlComponents = explode('/', $request);
// Asignar los parámetros de la URL a variables
$page = isset($urlComponents[1]) ? $urlComponents[1] : 'index';
$action = isset($urlComponents[2]) ? $urlComponents[2] : 'index';
// Enrutamiento
if (!str_contains($action,"report")) require_once("../layout/header.php");
switch ($page) {
    case "office":
        require_once '../controllers/OfficesController.php';
        $controller = new OfficesController($pdo);
        if($action == "index") $controller->index();
        if($action == "create") $controller->create();
        if($action == "delete") $controller->delete();
        if($action == "reporte") $controller->report();
        break;
    case "auth":
        require_once '../controllers/AuthController.php';
        $controller = new AuthController($pdo);
        if($action == "login") $controller->loginForm();

        break;
    default:
        echo "saludos";
        break;
}
if (!str_contains($action,"report")) require_once("../layout/footer.php");

// Incluir el pie de página
?>
</div>
